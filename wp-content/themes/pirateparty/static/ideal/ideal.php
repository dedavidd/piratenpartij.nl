<?php
	/*
		Donatiescript
		Ontwikkeld voor het ontvangen van donaties m.b.v. iDEAL Lite (Rabobank) of iDEAL Basic (ING Bank).

		Auteur:     Martijn Wieringa
		Email:      info@php-solutions.nl
		Website:    http://www.php-solutions.nl
		Licentie:   http://creativecommons.org/licenses/by/3.0/nl/
	*/
	include(dirname(__FILE__) . '/ideal/library/ideallite.cls.php');

	$html = '';

	if(empty($_POST['amount'])) {

		// No amount if this is not a result-request, then show the form.
		if(empty($_GET['ideal']['status'])) {

			// Toon donatie formulier
			$html .= '
				<div style="float: left;" >
					<img src="resources/logo_ideal.png" alt="iDeal logo" />
				</div>
				<div style="float: left; font-size: 20px; padding-top: 25px;" >
					<form action="ideal.php" method="post">
						<span id="txtBedrag" >Donatiebedrag: &euro;</span>
						<input id="inBedrag" class="textfield" name="amount" type="text" value="10,00">
						<input id="btnDoneer" type="submit" value="Doneer!" >
					</form>
				</div>
				<div style="clear: both;" ></div>';
		} else {
			// Meld de status van de betaling
			$sPaymentId = (empty($_GET['ideal']['id']) ? '' : $_GET['ideal']['id']);
			$sPaymentCode = (empty($_GET['ideal']['code']) ? '' : $_GET['ideal']['code']);
			$sPaymentStatus = ((empty($_GET['ideal']['status']) || (in_array($_GET['ideal']['status'], array('success', 'cancel', 'error')) == false)) ? 'error' : $_GET['ideal']['status']);

			// Send confirmation to screen
			if(strcasecmp($sPaymentStatus, 'success') === 0) {
				//$html .= '<p>Uw betaling is met succes ontvangen.</p>';.
				header('Location: donatie_success.html');
				die('<center><br/><br/>Je donatie is met succes ontvangen.<br/><a href="donatie_success.html">Klik hier als je niet word doorgestuurd.</a></center>');
			} else {
				$html .= '
					<p>Er is helaas een fout opgetreden bij het verwerken van je donatie.<br/><br/></p>
					<p>
						<a href="ideal.php" >Probeer opnieuw te doneren via iDeal &rarr;<br/></a>
						<a href="https://piratenpartij.nl/doneren" >Kies een andere manier om te doneren &rarr;</a>
					</p>';
			}
		}
	} else { // Toon iDEAL Lite formulier (met AUTO SUBMIT)
		$sPaymentId = date('YmdHis');
		$sPaymentCode = randomCode(32);
		$fPaymentAmount = floatval(str_replace(',', '.', $_POST['amount']));

		if($fPaymentAmount >= 1) { // Minimaal 1 euro
			// Save order in folder
			$aPaymentData = array('id' => $sPaymentId, 'code' => $sPaymentCode, 'amount' => $fPaymentAmount, 'date' => date('Y-m-d'), 'time' => date('H:i:s'), 'ip' => $_SERVER['REMOTE_ADDR'], 'status' => 'open');
			//writeToFile($sPaymentFile, serialize($aPaymentData));

			$oIdeal = new IdealLite();

			// Bepaal de URL waar de bezoeker naar toe wordt gestuurd nadat de ideal betaling is afgerond (of bij fouten)
			$sCurrentUrl = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, strpos($_SERVER['SERVER_PROTOCOL'], '/')) . '://' . $_SERVER['SERVER_NAME'] . '/') . substr($_SERVER['SCRIPT_NAME'], 1);
			$sReturnUrl = substr($sCurrentUrl, 0, strrpos($sCurrentUrl, '/') + 1);

			$oIdeal->setUrlCancel($sReturnUrl . 'ideal.php?ideal[id]=' . $sPaymentId . '&ideal[code]=' . $sPaymentCode . '&ideal[status]=cancel');
			$oIdeal->setUrlError($sReturnUrl . 'ideal.php?ideal[id]=' . $sPaymentId . '&ideal[code]=' . $sPaymentCode . '&ideal[status]=error');
			$oIdeal->setUrlSuccess($sReturnUrl . 'ideal.php?ideal[id]=' . $sPaymentId . '&ideal[code]=' . $sPaymentCode . '&ideal[status]=success');

			// Set order details
			$oIdeal->setAmount($fPaymentAmount); // Bedrag (in EURO's)
			$oIdeal->setOrderId($sPaymentId); // Unieke order referentie (tot 16 karakters)
			$oIdeal->setOrderDescription('Donatie t.b.v. PiratenPartij NL'); // Order omschrijving (tot 32 karakters)

			// Customize submit button
			$oIdeal->setButton('Verder >>');

			$html = '<div class="wrapper"><p><img alt="iDEAL" border="0" src="images/ideal.gif"></p><p>Afrekenen via je eigen bank.</p>' . $oIdeal->createForm() . '</div>';

			if(IDEAL_TEST_MODE == false) {
				$html .= '<script type="text/javascript"> function doAutoSubmit() { document.forms[0].submit(); } setTimeout(\'doAutoSubmit()\', 100); </script>';
			}
		} else {
			$html .= '<p>Vanwege de transactiekosten die iDeal rekent is het minimum donatie bedrag 1 euro.<br><br><a href="ideal.php">Terug</a></p>';
		}
	}

	ideal_output($html);


	function ideal_output($html) {
		// Bouw deze HTML code naar eigen inzicht om zodat ze aansluit bij jou website
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Doneren | Piratenpartij</title>
		<link rel=StyleSheet href="resources/style.css" type="text/css" />
	</head>
	<body>
		<div id="piza" >
			<img src="resources/header.jpg" alt="Doneer aan PiratenPartij Nederland!" />
			<div id="donatieInformatie" >
				Campagne voeren en opkomen voor algemene belangen kost behalve tijd en energie ook geld. De Piratenpartij draait geheel op de contributies van haar leden en individuele giften. Wij zijn daar heel dankbaar voor. Als jij ons wilt helpen met een gift is dat meer dan welkom! En aangezien we ANBI status genieten, is jouw donatie nog aftrekbaar voor de belastingen ook!
			</div>
			<div style="clear: both;" ></div>
			<div id="donatieInformatie" >
				'.$html.'
			</div>
			<div style="clear: both;" ></div>
			<div id="donatieInformatie" >
				<a href="https://piratenpartij.nl/doneren" >&larr; Terug naar Piratenpartij.nl</a>
			</div>
		</div>
	</body>
</html>';

		exit;
	}

	// Read content from file
	function readFromFile($sPath) {
		return file_get_contents($sPath);
	}

	// Write content to file
	function writeToFile($sPath, $sContent, $bClearFile = false) {
		if(file_exists($sPath) == false) {
			// Create file
			touch($sPath);

			// When creating a new file, we update file mode 
			// to avoid access problems with other tools like FTP.
			chmod($sPath, 0777);
		}

		if($bClearFile) {
			// Override file contents
			file_put_contents($sPath, $sContent);
		} else {
			// Append content to file
			file_put_contents($sPath, $sContent, FILE_APPEND);
		}
	}

	// Create a random code with N digits.
	function randomCode($iLength = 64) {
		$aCharacters = array('a', 'b', 'c', 'd', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

		$sResult = '';

		for($i = 0; $i < $iLength; $i++) { // (62 ^ [$digits] mogelijke codes)
			$sResult .= $aCharacters[rand(0, sizeof($aCharacters) - 1)];
		}
		return $sResult;
	}
?>
