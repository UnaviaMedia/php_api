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
}

function isPositiveInt($value) {
	if ( is_numeric($value) && ((string)(int)$value === (string)$value) && (int)$value >= 0 ) {
		return true;
	}

	return false;
}