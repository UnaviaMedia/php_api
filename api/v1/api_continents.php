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
				$countries = readCountries();
				return $countries;
				break;
			default:
				$id = $_GET["id"];
				$country = readCountry($id);
				return $country;
				break;
		}
		break;
	case "POST":
		$name = $_GET["name"];
		$country = new Country("", $name);
		$result = createCountry($country);
		return $result;
		break;
	case "PUT":
		$id = $_POST["id"];
		$name = $_POST["name"];
		$country = new Country($id, $name);
		$result = updateCountry($country);
		return $result;
		break;
	case "DELETE":
		$id = $_POST["id"];
		$result = deleteCountry($id);
		return $result;
		break;
	default:
		break;
}