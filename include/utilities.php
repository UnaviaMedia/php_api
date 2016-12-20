<?php
require_once("/home/cabox/workspace/constants.php");

class ApiResponse {
	public $status;
	public $response;
	public $data;

	function __construct($status, $response, $data = "") {
		$this->response = $response;

		//Handle invalid status codes (set as warning and overwrite response message)
		if ( isPositiveInt($status) ) {
			$this->status = $status;
		} else {
			$this->status = 2;
			$this->response = "Invalid API reponse status code specified";
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