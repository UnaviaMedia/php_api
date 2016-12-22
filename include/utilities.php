<?php
require_once("/home/cabox/workspace/constants.php");

class ValidationResponse {
	public $status;
	public $response;
	public $data;

	function __construct($status, $response, $data = "") {
		$this->response = $response;

		//Handle invalid validation status codes (set as error and overwrite response message)
		if ( $status != 0 && $status != 1 ) {
			$this->status = $status;
		} else {
			$this->status = 1;
			$this->response = "Invalid Validation response status code specified";
		}

		$this->data = $data;
	}
}

class ApiResponse {
	public $status;
	public $response;
	public $data;
	
	public function setHttpCode($code) {
		$this->code = $code;
	}

	function __construct($status, $response, $data = "") {
		$this->response = $response;

		//Handle invalid response status codes (set as warning and overwrite response message)
		if ( isPositiveInt($status) ) {
			$this->status = $status;
		} else {
			$this->status = 2;
			$this->response = "Invalid API response status code specified";
		}

		$this->data = $data;
	}	
	
	public function setResponseHeader() {
		$status = "";
		
		//If a code was specified set it as the HTTP status code
		if ( $this->httpCode ) {
			$status = $this->httpCode;
		} else {
			switch ($status) {
				case 0:
					$status = 200;
					break;
				case 1:
				default:
					$status = 500;
					break;
			}
		}
		
		//Set the header information
		header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
	}
	
	private function requestStatus($code) {
		$status = array(  
			200 => 'OK',
			404 => 'Not Found',   
			405 => 'Method Not Allowed',
			500 => 'Internal Server Error',
		); 
		
		return ($status[$code]) ? $status[$code] : $status[500]; 
	}
}

function isPositiveInt($value) {
	if ( is_numeric($value) && ((string)(int)$value === (string)$value) && (int)$value >= 0 ) {
		return true;
	}

	return false;
}