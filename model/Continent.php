<?php
require_once("/home/cabox/workspace/constants.php");
require_once(UTILITIES);
require_once(DATABASE);

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
	public function validate() {
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
	
	
	//Data Access Layer functionality
	public static function createContinent($continent) {
		$conn = DB::connect();
		$sql = sprintf("INSERT INTO continents VALUES (default, '%s');", $continent->getName());

		if ( $conn->query($sql) != true ) {
			return $conn->error;
		}

		return true;
	}

	public static function readContinent($id) {
		$conn = DB::connect();
		$sql = "SELECT * FROM continents WHERE id=$id LIMIT 1;";
		$result = $conn->query($sql);

		$row = $result->fetch_assoc()[0];
		$continent = new Continent($row["id"], $row["name"]);
		return $continent;
	}

	public static function readContinents() {
		$conn = DB::connect();
		$sql = "SELECT * FROM continents ORDER BY id;";
		$result = $conn->query($sql);

		$continents = array();

		while ( $row = $result->fetch_assoc() ) {
			$continent = new Continent($row["id"], $row["name"]);
			$continents[] = $continent;
		}

		return $continents;
	}

	public static function updateContinent($continent) {
		$conn = DB::connect();
		$sql = "UPDATE continents SET name='{$continent->getName()}' WHERE id='{$continent->getId()}';";

		if ( $conn->query($sql) != true ) {
			return $conn->error;
		}

		return true;
	}

	public static function deleteContinent($id) {
		$conn = DB::connect();
		$sql = "DELETE FROM continents WHERE id='$id';";

		if ( $conn->query($sql) ) {
			return $conn->error;
		}

		return true;
	}
}