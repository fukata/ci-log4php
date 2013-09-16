<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'third_party/ci_log4php/Logger.php';
class MY_Log extends CI_Log {

	protected $logger;
	protected $loggers = array();
	protected $initialized = false;

	public function __construct() {
		parent::__construct();

		$log_config_file = 'log4php.xml';
		if ($this->initialized === false) {
			$this->initialized = true;
			$config_file = APPPATH . 'config/'.$log_config_file;
			if ( defined('ENVIRONMENT') && file_exists( APPPATH . 'config/' . ENVIRONMENT . '/'.$log_config_file ) ) {
				$config_file = APPPATH . 'config/' . ENVIRONMENT . '/'.$log_config_file;
			}
			Logger::configure($config_file);
			$this->logger = Logger::getRootLogger();
			$this->loggers['root'] = $this->logger;
		}
	}

	public function write_log($level = 'error', $msg, $php_error = FALSE, $logger_names='root') {
		if ($this->_enabled === FALSE) {
			return FALSE;
		}

		$level = strtoupper($level);

		if ( ! isset($this->_levels[$level]) OR ($this->_levels[$level] > $this->_threshold) ) {
			return FALSE;
		}

		if(!is_array($logger_names)) {
			$logger_names = array($logger_names);
		}
		foreach($logger_names as $logger_name) {
			if(!isset($this->loggers[$logger_name])) {
				$this->loggers[$logger_name] = Logger::getLogger($logger_name);
			}

			$logger = $this->loggers[$logger_name];
			switch ($level) {
				case 'ERROR':
					$logger->error($msg);
					break;
				case 'INFO':
					$logger->info($msg);
					break;
				case 'DEBUG':
					$logger->debug($msg);
					break;
				case 'FATAL':
					$logger->fatal($msg);
					break;
				default:
					$logger->debug($msg);
					break;
			}

		}
		return TRUE;
	}
}
