<?php
require_once("/home/cabox/workspace/constants.php");

/*echo "<pre>";
//DEBUG: Server Request URI
print_r($_SERVER["REQUEST_URI"]);
echo "</pre>";*/

//Get the requested controller and action
//	TODO: Add advanced functionality for additional arguments
/*if ( isset($_GET["controller"]) && isset($_GET["action"]) ) {
	$controller = $_GET("controller");
	$action = $_GET("controller");
} else {
	$controller = "pages";
	$action = "home";
}*/

require_once(ROUTES);

try {
	//Create a new route and call it
	//TODO: Add request variable validation (if empty, redirect to home)
	$route = new Route($_REQUEST["request"]);
	$route->call();
} catch(Exception $e) {
	//TODO: Add exception handling
	echo "Top Exception - Need to handle this";
}
