<?php
require_once("/home/cabox/workspace/constants.php");
require_once(API_BASE);

class API_V1 extends API {
	public function __construct($request, $origin) {
		parent::__construct($request);
	}
	
	//Endpoint method
	protected function example() {
		switch($this->method) {
			//Handle GET request method
			case "GET":
				return "GET successful";
				break;
			//All other request methods are not supported
			case "POST":
			case "PUT":
			case "DELETE":
			default:
				return "Unsupported request type";
				break;
		}
	}
}
