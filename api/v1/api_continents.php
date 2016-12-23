<?php
require_once("/home/cabox/workspace/constants.php");
require_once(UTILITIES);
require_once(MODELS . "/Continent.php");

$status = 1;
$response = "API Error";
$data = "";

switch($this->method) {
	case "GET":
		if ( $this->args[0] ) {
			$continents = readContinents();
			$result = $continents;
			break;
		} else {
			$id = $_GET["id"];
			$continent = readContinent($id);
			$result = $continent;
			break;
		}
		break;
	case "POST":
		$name = $_GET["name"];
		$continent = new Continent("", $name);
		$data = createContinent($continent);
		break;
	case "PUT":
		$id = $_POST["id"];
		$name = $_POST["name"];
		$continent = new Continent($id, $name);
		$data = updateContinent($continent);
		break;
	case "DELETE":
		$id = $_POST["id"];
		$data = deleteContinent($id);
		break;
	default:
		break;
}

//Return the proper API response
return new ApiResponse($status, $response, $data);

