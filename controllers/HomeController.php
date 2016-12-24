<?php
require_once("/home/cabox/workspace/constants.php");

class HomeController {
	public function index() {
		$testVar = "Reached";
		
		//Get the view
		require_once(VIEWS . "/Home/index.php");
	}
	
	//About page
	public function about() {
		$aboutVar = "Reached About";
		
		//Get the view
		require_once(VIEWS . "/Home/about.php");
	}
	
	//Error page
	public function error() {		
		require_once(VIEWS . "/Home/error.php");
	}
}