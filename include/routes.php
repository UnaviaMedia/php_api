<?php
require_once("/home/cabox/workspace/constants.php");

class Route {
	public static $VALID_ROUTES = array(
		"home" => array("index", "about", "error"),
		//"continents" => array("index", "details", "create", "delete")
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
		$this->controller = strtolower(array_shift($this->args));
		//Get the requested controller action if one exists
		//TODO: Possibly set action equal to controller if no action is specified???
		if ( array_key_exists(0, $this->args) && !is_numeric($this->args[0]) ) {
			$this->action = strtolower(array_shift($this->args));
		}
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
		//DEBUG: Display controller and action
		//echo "<pre>C => $this->controller\nA => $this->action\n</pre>";
		
		//Display the default page if no controller (and consequently no action) was specified
		if ( $this->controller != "" ) {
			//Verify that the requested controller exists
			//	If not, it could be that an action was requested from the default controller ("/About" looks nicer than "/Home/About")
			if ( Route::controllerExists($this->controller) ) {
				//Verify that a controller action was requested
				if ( $this->action != "" ) {
					//Display an error page if an invalid action was requested
					if ( !Route::controllerActionExists($this->controller, $this->action) ) {
						$this->controller = "home";
						$this->action = "error";
					}
				}
				//If no controller action was specified display the controller index page
				else {
					//Display controller index page if it exists
					if ( Route::controllerActionExists($this->controller, "index") ) {
						$this->action = "index";
					}
					//If there is no index page for the controller display an error page
					else {
						$this->controller = "home";
						$this->action = "error";
					}
				}
			}
			//Check if default controller has this action
			else if ( Route::controllerActionExists("home", $this->controller) ) {
				$this->action = $this->controller;
				$this->controller = "home";
			}
			//Display an error page if the requested controller does not exist
			else {
				$this->controller = "home";
				$this->action = "error";
			}
		}
		//Display the default page if no controller (and consequently no action) was specified
		else {
			$this->controller = "home";
			$this->action = "index";
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