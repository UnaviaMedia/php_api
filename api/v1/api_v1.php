<?php
require_once("/home/cabox/workspace/constants.php");
require_once(API_BASE . "/v1/api_base.php");

class API_V1 extends API {
	//protected $User;

	public function __construct($request, $origin) {
		parent::__construct($request);

		//Set API version
		$this->version = "v1";

		/*// Abstracted out for example
		$APIKey = new Models\APIKey();
		$User = new Models\User();

		if (!array_key_exists('apiKey', $this->request)) {
			throw new Exception('No API Key provided');
		} else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) {
			throw new Exception('Invalid API Key');
		} else if (array_key_exists('token', $this->request) &&
			 !$User->get('token', $this->request['token'])) {

			throw new Exception('Invalid User Token');
		}

		$this->User = $User;*/
	}
	
	/*protected function countries() {
		require_once(DAL . "/dal_countries.php");

		switch($this->method) {
			case "GET":
				switch($this->verb) {
					case "list":
						$countries = readCountries();
						return $countries;
						break;
					default:
						$id = $_GET["id"];
						$country = readCountry($id);
						return $country;
						break;
				}
				break;
			case "POST":
				$name = $_GET["name"];
				$country = new Country("", $name);
				$result = createCountry($country);
				return $result;
				break;
			case "PUT":
				$id = $_POST["id"];
				$name = $_POST["name"];
				$country = new Country($id, $name);
				$result = updateCountry($country);
				return $result;
				break;
			case "DELETE":
				$id = $_POST["id"];
				
				$result = deleteCountry($id);
				return $result;
				break;
			default:
				break;
		}
	}*/

	//Endpoint method
	protected function example() {
		switch($this->method) {
			//Handle GET request method
			case "GET":
				return "GET successful";
				break;
			//All other request methods are not supported
			case "POST":
			case "PUT":
			case "DELETE":
			default:
				return "Unsupported request type";
				break;
		}
	}
}
