<?php
require_once("/home/cabox/workspace/constants.php");

/*echo "<pre>";
//DEBUG: Server Request URI
print_r($_SERVER["REQUEST_URI"]);
echo "</pre>";*/

require_once(ROUTES);

try {
	//Create a new route and call it
	//TODO: Add request variable validation (if empty, redirect to home)
	if ( !isset($_REQUEST["request"]) ) {
		$request = "/";
	} else {
		$request = $_REQUEST["request"];
	}
	
	$route = new Route($request);
	$route->call();
} catch(Exception $e) {
	//TODO: Add exception handling
	echo "Top Exception - Need to handle this";
}
