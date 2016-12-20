<?php
require_once("/home/cabox/workspace/constants.php");
require_once(UTILITIES);

$status = 1;
$response = "API Error";
$data = "";

switch($this->method) {
	case "GET":
		$status = 0;
		$response = "Example API Usage";
		$data = array("version" => $this->version);
		break;
	case "POST":
	case "PUT":
	case "DELETE":
	default:
		//$status = 1;
		$response = "Only GET methods are accepted for the sample API";
		//$data = "";
		break;
}

//Return the proper API response
return new ApiResponse($status, $response, $data);