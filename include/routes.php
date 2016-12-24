<?php
require_once("/home/cabox/workspace/constants.php");

class Route {
	public static $VALID_ROUTES = array(
		"home" => array("index", "about", "error"),
		"continents" => array("list", "details", "create", "delete")
	);
	
	//The HTTP method this request was made in, either GET, POST, PUT or DELETE
	//protected $method = "";
	//The Model requested in the URI. eg: /files
	protected $controller = "";
	//An optional additional descriptor about the controller, used for things that can not be handled by the basic methods.
	//	eg: /files/process
	protected $action = "";
	//Any additional URI components after the controller and action have been removed, in our case, an integer ID for the resource. 
	//	eg: /<controller>/<action>/<arg0>/<arg1> or /<controller>/<arg0>
	protected $args = Array();
	
	function __construct($request) {
		//Get the request arguments
		$this->args = explode('/', rtrim($request, '/'));
		//Get the controller from the request
		$this->controller = array_shift($this->args);
		//Get the requested controller action if one exists
		//TODO: Possibly set action equal to controller if no action is specified???
		if ( array_key_exists(0, $this->args) && !is_numeric($this->args[0]) ) {
			$this->action = array_shift($this->args);
		}
		
		//DEBUG: Route information
		//print_r($this);
	}
	
	//Determine whether requested controller exists
	public static function controllerExists($controller) {
		//Check if the requested controller exists
		//TODO: Add more error handling
		if ( array_key_exists($controller, self::$VALID_ROUTES) ) {
			//DEBUG: Display whether controller exists
			//echo "DEBUG: Controller $controller does exist<br />";
			return true;
		}
		//DEBUG: Display whether controller exists
		//echo "DEBUG: Controller $controller does not exist<br />";
		return false;
	}
	
	//Determine whether specified controller contains specified action
	public static function controllerActionExists($controller, $action) {
		//Check if the requested action exists in the requested controller
		//TODO: Add more error handling
		if ( self::controllerExists($controller) && in_array($action, self::$VALID_ROUTES[$controller]) ) {
			//DEBUG: Display whether controller and action exist
			//echo "DEBUG: Action $action does exist in controller $controller<br />";
			return true;
		}
		
		//DEBUG: Display whether controller and action exist
		//echo "DEBUG: Action $action does not exists in controller $controller<br />";
		return false;
	}
	
	//Perform the route actions
	public function call() {
		//Check controller and action
		if ( Route::controllerActionExists($this->controller, $this->action) ) {
			//Actions if both controller and action are found (typical path)
			//DEBUG: Routing logic path
			//echo "Routing Logic Path => 1";
		}
		//Check controller and index
		else if ( Route::controllerActionExists($this->controller, "index") ) {
			//Assign default controller action if no action was requested
			$this->action = "index";
			//DEBUG: Routing logic path
			//echo "Routing Logic Path => 2";
		}
		//Check home and action
		else if ( Route::controllerActionExists("home", $this->controller) ) {
			//Set the action to the controller if no action is found as default controller will be used
			//TODO: Change logic to group requested controller with requested action checks and then default controller with action checks
			$this->action = $this->controller;
			//Assign default controller if no controller was requested and default controller contains requested action
			$this->controller = "home";
			//DEBUG: Routing logic path
			//echo "Routing Logic Path => 3";
		}
		//Check home controller and index page
		//TODO: Remove this and replace with error page (they likely don't want to go to home if they just mistyped)
		else if ( Route::controllerActionExists("home", "index") ) {
			//Assign default controller and action if none are specified
			$this->controller = "home";
			$this->action = "index";
			//DEBUG: Routing logic path
			//echo "Routing Logic Path => 4";
		}
		//Display error when no controller and action are requested and the home controller/action don't exist (shouldn't happen)
		else {
			//TODO: Set 404 Page Not Found header
			$this->controller = "home";
			$this->action = "error";
			//DEBUG: Routing logic path
			//echo "Routing Logic Path => 5";
		}
		
		//Require the matching controller file
		require_once(CONTROLLERS . "/" . ucfirst($this->controller) . "Controller.php");

		//Create the necessary controller
		switch($this->controller) {
			case "continents":
				$this->controller = new ContinentsController();
				break;
			case "home":
				$this->controller = new HomeController();
				break;
			default:
				break;
		}

		//Call the specified action (function in controller class)
		$this->controller->{$this->action}();
	}
}