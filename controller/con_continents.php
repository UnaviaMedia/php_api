<?php
require_once("/home/cabox/workspace/constants.php");
require_once(MODELS . "/Continent.php");

function readContinents() {
	//Get database response object
	$result = Continent::readAll();
	
	return $result;
}

function readContinent($id) {
	//Get database reponse object
	$result = Continent::read($id);
	
	return $result;
}

/*function createContinent($name) {
	//Create and validate the record
	$result = new Continent("", $name);

	if ( $result->status == 0 ) {
		//Successful creation
	} else {
		//Return an error or warning
		return;
	}

	//Add the record to the database
	$result = Continent::create($continent);

	//NOTE: Currently not needed as I can just create ApiResponse from DatabaseResponse object
	if ( $result->status == 0 ) {
		//Successful insertion
		return;
	} else {
		//Error or warning
		return;
	}
}*/
