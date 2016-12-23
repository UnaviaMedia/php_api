<?php
require_once("/home/cabox/workspace/constants.php");
require_once(UTILITIES);
require_once(CONTROLLERS . "/con_continents.php");

$status = 1;
$message = "API Error - continents";
$data = "";

switch($this->method) {
	case "GET":
		//Either get all continents or a single one
		if ( isset($this->args[0]) ) {
			//Get the requested continent id from the arguments
			$id = $this->args[0];
			//Get the requested continent
			$result = readContinent($id);
			return new ApiResponse($result->status, $result->message, $result->data);
			break;
		} else {
			//Get the continents
			$result = readContinents();
			return new ApiResponse($result->status, $result->message, $result->data);
		}
		break;
	case "POST":
		/*$name = $_GET["name"];
		$continent = new Continent("", $name);
		$data = createContinent($continent);*/
		break;
	case "PUT":
		/*$id = $_POST["id"];
		$name = $_POST["name"];
		$continent = new Continent($id, $name);
		$data = updateContinent($continent);*/
		break;
	case "DELETE":
		/*$id = $_POST["id"];
		$data = deleteContinent($id);*/
		break;
	default:
		break;
}

//Return the proper API response
return new ApiResponse($status, $message, $data);

