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
			//Get the requested continent and return the result
			$result = readContinent($id);
			return new ApiResponse($result->status, $result->message, $result->data);
			break;
		} else {
			//Get the continents and return the result
			$result = readContinents();
			return new ApiResponse($result->status, $result->message, $result->data);
		}
		break;
	case "POST":
		//Get the continent parameters
		$name = isset($_POST["name"]) ? $_POST["name"] : "";
		//Create the continent and return the result
		$result = createContinent($name);
		return new ApiResponse($result->status, $result->message, $result->data);
	case "PUT":
		//Get the updated continent parameters
		$id = 	isset($this->PUT["id"]) 	? $this->PUT["id"] 	: "";
		$name = isset($this->PUT["name"]) 	? $this->PUT["name"]	: "";
		//Update the continent and return the result
		$result = updateContinent($id, $name);
		return new ApiResponse($result->status, $result->message, $result->data);
	case "DELETE":
		//Get the id of the continent to delete
		$id = isset($this->args[0]) ? $this->args[0] : "";
		//Delete the continent and return the result
		$result = deleteContinent($id);
		return new ApiResponse($result->status, $result->message, $result->data);
	default:
		break;
}

//Return a generic API response
return new ApiResponse($status, $message, $data);

