<?php
require_once("/home/cabox/workspace/constants.php");

/**
 * @brief	Base class for different response types that handles the status and response data
 */
class Response {
	public $responseType;
	public $status;
	public $response;
	public $data;
	
	function __construct($status, $response, $data = "") {
		$this->response = $response;
		$this->data = $data;
		
		//Handle invalid response status codes
		if ( isPositiveInt($status) ) {
			$this->status = $status;
		} else {
			//Set the response status as warning and override the response
			$this->status = 2;
			$this->response = "Invalid $this->responseType response status code specified";
		}
	}
}

/**
 * @brief	Class to handle validation response status
 */
class ValidationResponse extends Response {

	function __construct($status, $response, $data = "") {
		$this->responseType = "Validation";
		
		parent::__construct($status, $response, $data);
	}
}

/**
 * @brief	Class to handle database response status and data
 */
class DatabaseResponse extends Response {

	function __construct($status, $response, $data = "") {
		$this->responseType = "Database";
		
		parent::__construct($status, $response, $data);
	}
}

/**
 * @brief	Class to handle API response status and data
 */
class ApiResponse extends Response {
	
	//Set the HTTP code for the API response (by default empty)
	public function setHttpCode($code) {
		$this->httpCode = $code;
	}

	function __construct($status, $response, $data = "") {
		$this->responseType = "API";
		
		parent::__construct($status, $response, $data);
	}
	
	/**
	 * @brief	Set the HTTP/1.1 response header and status code
	 */
	public function setResponseHeader() {
		$statusCode = "";
		
		//If a code was specified set it as the HTTP status code
		if ( isset($this->httpCode) ) {
			$statusCode = $this->httpCode;
		} else {
			switch ($this->status) {
				case 0:
					$statusCode = 200;
					break;
				case 1:
				default:
					$statusCode = 500;
					break;
			}
		}
		
		//Remove the HTTP status code from the response object
		unset($this->httpCode);
		
		//Set the header information
		header("HTTP/1.1 " . $statusCode . " " . $this->requestStatus($statusCode));
	}
	
	/**
	 * @brief	Get the HTTP status description that corresponds with the HTTP code
	 * @param	$code	HTTP status code to retrieve description for
	 * @return	HTTP status code description
	 */
	private function requestStatus($code) {
		$status = array(  
			200 => 'OK',
			404 => 'Not Found',   
			405 => 'Method Not Allowed',
			500 => 'Internal Server Error',
		); 
		
		//If the status code is not valid return a generic server error
		return ($status[$code]) ? $status[$code] : $status[500]; 
	}
}

/**
 * @brief	Class to handle model validation errors
 */
class ValidationError {
	public $fieldName;
	public $message;
	
	function __construct($fieldName, $message) {
		$this->fieldName = $fieldName;
		$this->message = $message;
	}
}

/**
 * @brief	Whether a value is a positive integer
 * @param	$value	Integer to check
 * @return	Whether the value is a positive integer
 */
function isPositiveInt($value) {
	if ( is_numeric($value) && ((string)(int)$value === (string)$value) && (int)$value >= 0 ) {
		return true;
	}

	return false;
}