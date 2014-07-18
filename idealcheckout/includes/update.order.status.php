<?php


	// Update order status when required
	function idealcheckout_update_order_status($aRecord, $sView)
	{
		idealcheckout_sendMail($aRecord);
	}

?>