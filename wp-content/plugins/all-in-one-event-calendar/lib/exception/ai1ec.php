<?php

/**
 * Abstract base class for all our excpetion.
 *
 * @author     Time.ly Network Inc.
 * @since      2.0
 *
 * @package    AI1EC
 * @subpackage AI1EC.Exception
 */
class Ai1ec_Exception extends Exception {

	/**
	 * A message to be displayed for admin
	 *
	 * Specific Exceptions should override this.
	 *
	 * @return string Message to be displayed for admin
	 */
	public function get_html_message() {
		return $this->getMessage();
	}

<<<<<<< HEAD
=======
	/**
	 * Return the èath of the plugin to disable it.
	 * If empty it disables core.
	 * 
	 * @return string
	 */
	public function plugin_to_disable() {
		return '';
	}
>>>>>>> 9efb4dcb7bab652eca0d348558c1d99ac49cc27f
}