<?php
require_once("/home/cabox/workspace/constants.php");

class HomeController {
	public function index() {
		//Get the index page
		require_once(VIEWS . "/Home/index.php");
	}
	
	//About page
	public function about() {
		//Get the about page
		require_once(VIEWS . "/Home/about.php");
	}
	
	//Error page
	public function error() {
		//Get the error page
		require_once(VIEWS . "/Home/error.php");
	}
}
