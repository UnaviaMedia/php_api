<?php
require_once("/home/cabox/workspace/constants.php");
require_once(CONTROLLERS . "/func_continents.php");

class ContinentsController {
	public function index() {
		//Perform index actions
		$result = readContinents();
		
		$continents = $result->data;
		
		//Get the index page
		require_once(VIEWS . "/Continents/index.php");
	}
}