<?php
require_once("/home/cabox/workspace/constants.php");
require_once(DAL . "/dal_continents.php");

function readContinents() {
	Continent::readAll();
}

function createContinent($name) {
	//Create and validate the record
	$result = new Continent("", $name);

	if ( $result["status"] == 0 ) {
		//Successful creation
	} else {
		//Return an error or warning
		return;
	}

	//Add the record to the database
	$result = Continent::create($continent);

	if ( $result["status"] == 0) {
		//Successful insertion
	} else {
		//Error or warning
		return;
	}
}