<?php
require_once("/home/cabox/workspace/constants.php");
require_once(UTILITIES);

class Continent {
	//TODO: Fix this (they need to be public currently)
	protected $id;
	protected $name;
	
	public function getId() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;
		
		return validate();
	}
	
	//Handle validation
	function validate() {
		$errors = array();
		
		//Validation
		if ( strlen($this->name) < 2 ) {
			$errors[] = new ValidationError("name", "Name must be greater than 2 characters");
		}
		
		//More validation...
		
		//Handle any validation errors
		if ( count($errors) > 0 ) {
			//TODO: Return anything???
			return new ValidationResponse(1, $errors, "");
		}
		
		//TODO: What is "$this"?
		return new ValidationResponse(0, "SUCCESS: Continent created", $this);
	}
}