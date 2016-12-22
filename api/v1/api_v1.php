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
}
