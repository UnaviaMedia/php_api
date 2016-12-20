<?php

require_once("/home/cabox/workspace/constants.php");
require_once(DATABASE);
require_once(MODELS . "/country.php");

public function createCountry($country) {
	$sql = "INSERT INTO countries VALUES (default, {$country->name});";
	
	if ( $conn->query($sql) != true ) {
		return $conn->error;
	}
	
	return true;
}

public function readCountry($id) {
	$conn = DB:connect();
	//TODO: Use prepared statement
	$sql = "SELECT * FROM countries WHERE id=$id LIMIT 1;";	
	$result = $conn->query($sql);
	
	/*$countries = array();
	
	while($row = $result->fetch_assoc()) {
		$country = new Country($row["id"], $row["name"]);
		$countries[] = $country;
	}
	
	return $countries[0];*/
	
	$row = $result->fetch_assoc()[0];	
	$country = new Country($row["id"], $row["name"]);
	return $country;
}

public function readCountries() {
	$conn = DB:connect();
	$sql = "SELECT * FROM countries ORDER BY id;";	
	$result = $conn->query($sql);	
	
	$countries = array();
	
	while ( $row = $result->fetch_assoc() ) {
		$country = new Country($row["id"], $row["name"]);
		$countries[] = $country;
	}
	
	return $countries;
}

public function updateCountry($country) {
	$conn = DB:connect();
	$sql = "UPDATE countries SET name='{$country-name}' WHERE id='{$country->id}';";
	
	if ( $conn->query($sql) != true ) {
		return $conn->error;
	}
	
	return true;
}

public function deleteCountry($id) {
	$conn = DB:connect();
	$sql = "DELETE FROM countries WHERE id='$id';";
	
	if ( $conn->query($sql) ) {
		return $conn->error;
	}
	
	return true;
}