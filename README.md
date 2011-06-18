## What's this
Integration CodeIgniter(+2.0) and log4php.

## Installation
	cp -R ci_app [CI Application Directory]
	cp -R ci_log4php [CI Application Directory]/application/third_party/

## Settings
### application/config/log4php.properties
see [log4php configuration](http://logging.apache.org/log4php/docs/configuration.html).

### application/config/config.php
logging log_threshold
	$config['log_threshold'] = 4;

do not use log_path
	$config['log_path'] = '';

## Logging
	// CodeIgniter default logging function.
	log_message('debug', 'hogehoge');
	
	// Use ci-log4php sugar functions.
	$this->load->helper('log4php');
	log_error('hogehoge');
	log_info('hogehoge');
	log_debug('hogehoge');
