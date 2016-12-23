<?php
require_once("/home/cabox/workspace/constants.php");
require_once(UTILITIES);
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

function updateContinent($id, $name) {
	//Create and validate the updated continent
	$continent = new Continent($id, $name);
	$result = $continent->validate();
	
	if ( $result->status != 0 ) {
		//Return the ValidationResponse object
		return new ValidationResponse(1, "Updated continent is not valid", $result->data);
	}
	
	//Update the continent in the database
	$result = Continent::update($continent);
	return $result;
}

function deleteContinent($id) {
	//Handle empty/invalid ids
	if ( !isPositiveInt($id) ) {
		return new ValidationResponse(1, "Valid ID is required for deletion");
	}
	
	//Delete the specified continent
	$result = Continent::delete($id);	
	return $result;
}
