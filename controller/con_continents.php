<?php
require_once("/home/cabox/workspace/constants.php");
require_once(MODELS . "/Continent.php");

function readContinents() {
	//Get a list of all continents
	$result = Continent::readAll();
	
	return $result;
}

function readContinent($id) {
	//Get the specified continent
	$result = Continent::read($id);
	
	return $result;
}

function createContinent($name) {
	//Create and validate the continent
	$continent = new Continent("", $name);
	$result = $continent->validate();

	if ( $result->status != 0 ) {
		//Return the ValidationResult object
		return $result;
	}

	//Add the continent to the database
	$result = Continent::create($continent);

	return $result;
}
