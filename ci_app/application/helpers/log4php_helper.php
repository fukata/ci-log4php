<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('log_error') ) {
	function log_error($message) {
		static $_log;
		if (config_item('log_threshold') == 0) return;
		$_log =& load_class('Log');
		$_log->write_log('error', $message, false);
	}
}

if ( ! function_exists('log_info') ) {
	function log_info($message) {
		static $_log;
		if (config_item('log_threshold') == 0) return;
		$_log =& load_class('Log');
		$_log->write_log('info', $message, false);
	}
}

if ( ! function_exists('log_debug') ) {
	function log_debug($message) {
		static $_log;
		if (config_item('log_threshold') == 0) return;
		$_log =& load_class('Log');
		$_log->write_log('debug', $message, false);
	}
}