<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('log_error') ) {
	function log_error($message,$logger_name='root') {
		static $_log;
		$_log =& load_class('Log');
		$_log->write_log('error', $message, false, $logger_name);
	}
}

if ( ! function_exists('log_info') ) {
	function log_info($message,$logger_name='root') {
		static $_log;
		$_log =& load_class('Log');
		$_log->write_log('info', $message, false, $logger_name);
	}
}

if ( ! function_exists('log_debug') ) {
	function log_debug($message,$logger_name='root') {
		static $_log;
		$_log =& load_class('Log');
		$_log->write_log('debug', $message, false, $logger_name);
	}
}