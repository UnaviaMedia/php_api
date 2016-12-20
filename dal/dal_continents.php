<?php

require_once("/home/cabox/workspace/constants.php");
require_once(DATABASE);
require_once(MODELS . "/Continent.php");

//TODO: Use prepared statements

function createContinent($continent) {
	$conn = DB::connect();
	$sql = sprintf("INSERT INTO continents VALUES (default, '%s');", $continent->getName());
	
	if ( $conn->query($sql) != true ) {
		return $conn->error;
	}
	
	return true;
}

function readContinent($id) {
	$conn = DB::connect();
	$sql = "SELECT * FROM continents WHERE id=$id LIMIT 1;";
	$result = $conn->query($sql);
	
	$row = $result->fetch_assoc()[0];
	$continent = new Continent($row["id"], $row["name"]);
	return $continent;
}

function readCountries() {
	$conn = DB::connect();
	$sql = "SELECT * FROM continents ORDER BY id;";
	$result = $conn->query($sql);
	
	$continents = array();
	
	while ( $row = $result->fetch_assoc() ) {
		$continent = new Continent($row["id"], $row["name"]);
		$continents[] = $continent;
	}
	
	return $continents;
}

function updateContinent($continent) {
	$conn = DB::connect();
	$sql = "UPDATE continents SET name='{$continent->getName()}' WHERE id='{$continent->getId()}';";
	
	if ( $conn->query($sql) != true ) {
		return $conn->error;
	}
	
	return true;
}

function deleteContinent($id) {
	$conn = DB::connect();
	$sql = "DELETE FROM continents WHERE id='$id';";
	
	if ( $conn->query($sql) ) {
		return $conn->error;
	}
	
	return true;
}
