<?php
/**
 * @package WooCommerce iDEAL Checkout
 * @version 1.6
 */
/*
Plugin Name: iDEAL Checkout
Plugin URI: https://www.ideal-checkout.nl
Description: 
Author: iDEAL Checkout
Version: 1.0
Author URI: https://www.ideal-checkout.nl
*/


function showMessage($sMessage, $sErrorMessage = false)
{
	if($sErrorMessage) 
	{
		echo '<div id="message" class="error">';
	}
	else 
	{
		echo '<div id="message" class="updated fade">';
	}

	echo '<p><strong>' . $sMessage . '</strong></p></div>';
}

function showMessageDeleteInstall()
{
    // Shows as an error message. You could add a link to the right page if you wanted.
    showMessage('Let op: idealcheckout/install.php staat nog op de server, voer deze uit en verwijder deze daarna!', true);
}

if(file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/idealcheckout/install.php'))
{
	add_action('admin_notices', 'showMessageDeleteInstall');
}

function showAdminMessages()
{
    // Shows as an error message. You could add a link to the right page if you wanted.
    showMessage('iDEAL Checkout is niet actief omdat WooCommerce niet actief is, activeer WooCommerce om de iDEAL Checkout plugin te gebruiken', true);
}

if(class_exists('WooCommerce'))
{
	include 'idealcheckout.php';
}
else
{
	add_action('admin_notices', 'showAdminMessages');
}