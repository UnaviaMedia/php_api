<?php
require_once("/home/cabox/workspace/constants.php");

//DEBUG: Server Request URI
//print_r($_SERVER["REQUEST_URI"]);

require_once(ROUTES);

try {
	//Get the request
	$request = isset($_REQUEST["request"]) ? $_REQUEST["request"] : "";
	
	//Create a new route and call it
	$route = new Route($request);
	$route->call();
} catch(Exception $e) {
	//TODO: Add exception handling
	echo "Top Exception - Need to handle this";
}
