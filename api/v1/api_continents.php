<?php
require_once("/home/cabox/workspace/constants.php");
require_once(MODELS . "/Continent.php");

$status = 1;
$response = "API Error";
$data = "";

switch($this->method) {
	case "GET":
		switch($this->verb) {
			case "list":
				$continents = readContinents();
				return $continents;
				break;
			default:
				$id = $_GET["id"];
				$continent = readContinent($id);
				return $continent;
				break;
		}
		break;
	case "POST":
		$name = $_GET["name"];
		$continent = new Continent("", $name);
		$result = createContinent($continent);
		return $result;
		break;
	case "PUT":
		$id = $_POST["id"];
		$name = $_POST["name"];
		$continent = new Continent($id, $name);
		$result = updateContinent($continent);
		return $result;
		break;
	case "DELETE":
		$id = $_POST["id"];
		$result = deleteContinent($id);
		return $result;
		break;
	default:
		break;
}