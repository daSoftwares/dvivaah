<?php
/**
 *
 * PHP versions 4 and 5
 *
 * This component is provided for the Mobile SMS Gateway
 * 
 * http://www.smsgatewayhub.com
 * 
 * Free SMS credits are available for testing.
 *
 * This component is licensed under The MIT License
 * 
 * written by Rohit Shrivastava
 * http://www.dasoftwares.tk/
 *
 */

class SmsComponent extends Component {

	/**
	 * Controller variable
	 *
	 * @var object
	 * @access protected
	 */

	var $Controller;

	/**
	 * Initialization variable
	 *
	 * @var boolean
	 * @access protected
	 */

	var $_init_done = false;

	/**
	 * Username for Panacea SMS Gateway
	 *
	 * @var string
	 * @access public
	 */
	var $username = null;

	/**
	 * Password for Panacea SMS Gateway
	 *
	 * @var string
	 * @access public
	 */
	var $password = null;

	
	/**
	 * Default 'from' number
	 *
	 * @var string
	 * @access public
	 */

	var $default_from_number = "DVIVAH";

	/**
	 * URL of the Panacea Mobile gateway
	 *
	 * @var string
	 * @access public
	 */

	var $api_url = "http://login.smsgatewayhub.com/smsapi/pushsms.aspx?";
	
	/**
	 * Startup component
	 *
	 * @param object $controller Instantiating controller
	 * @access public
	 */
	function __construct(&$Controller) {
		if(!function_exists('curl_init')) {
			$this->initializationError();
			return false;
		}
		$this->Controller =& $controller;

		$this->_init_done = true;
		$this->username = 'tusharughade';
		$this->password = '197571';

	}
	
	/**
	 * Send SMS
	 * 
	 * @param string
	 * @param string
	 * @param string
	 * 
	 * @access protected
	 */

	function send($templateName, $data, $to, $message = null, $from = null) {
		
		// substitute related template value
		$message = empty($message) ? $this->putTemplateValues($templateName, $data) : $message;
		
		if($this->_init_done && $message) {
			$error = false;
			
			$parameters = array(
				'user' => $this->username,
				'pwd' => $this->password,
				'to' => $to,
				'sid' => is_null($from) ? $this->default_from_number : $from,
				'msg' => $message,
				'fl' => 0,
				'gwid' => 2 // for transactional
			);
			$required_parameters = array('user', 'pwd', 'msg', 'sid', 'to', 'gwid');
				
			foreach($required_parameters as $parameter) {
				if(empty($parameters[$parameter])) {
					trigger_error("Parameter {$parameter} is required");
					$error = true;
				}
			}
				
			if(!$error) {
				$url = $this->api_url;
				foreach($parameters as $key => $value) {
					$url .= "&".urlencode($key)."=".urlencode($value);
				}
				

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$result = curl_exec($ch);

				$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				if(($code >= 200) && ($code <= 400)) {
					/* Successfully sent */
					return true;
				}
			}
		} else {
			$this->initializationError();
		}
		return false;

	}

	/**
	 * Generic Initialization error
	 */

	function initializationError() {
		trigger_error('The SMS component requires curl to operate.');
	}

	function putTemplateValues($templateName = null, $data = array('%username%' => 'test', '%registeredEmail%'  => 'test@test.com')){
		
		$smsStr = null;
		
		if(!empty($templateName)){
			$templateArray = Configure::read('smsTemplates');
			$smsStr = str_replace(array_keys($data),$data, $templateArray[$templateName]);
			
			return $smsStr;
		}
		
		return false;
	}

}
