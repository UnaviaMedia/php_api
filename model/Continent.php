<?php
require_once("/home/cabox/workspace/constants.php");
require_once(UTILITIES);
require_once(DATABASE);

class Continent {
	public $id;
	public $name;
	
	function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;
		
		return $this->validate();
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
			//TODO: Return any data???
			return new ValidationResponse(1, $errors, "");
		}
		
		//TODO: What is "$this"? Is the the object that the function is called on (not static method)?
		return new ValidationResponse(0, "SUCCESS: Continent created", $this);
	}
	
	
	//Data Access Layer functionality
	/*public static function create($continent) {
		$conn = DB::connect();
		$sql = sprintf("INSERT INTO continents VALUES (default, '%s');", $continent->getName());

		if ( $conn->query($sql) != true ) {
			return $conn->error;
		}

		return true;
	}*/

	/*public static function read($id) {
		$conn = DB::connect();
		$sql = "SELECT * FROM continents WHERE id=$id LIMIT 1;";
		$result = $conn->query($sql);

		$row = $result->fetch_assoc()[0];
		$continent = new Continent($row["id"], $row["name"]);
		return $continent;
	}*/

	public static function readAll() {
		$conn = DB::connect();
		$sql = "SELECT * FROM continents ORDER BY id;";
		
		//Handle query errors
		if ( !$result = $conn->query($sql) ) {
			return new DatabaseResponse(1, $conn->error);
		}

		$continents = array();

		//Create an array of continents
		while ( $row = $result->fetch_assoc() ) {
			$continent = new Continent($row["id"], $row["name"]);
			$continents[] = $continent;
		}
		
		//Return a database response with the array of continents
		return new DatabaseResponse(0, "Continents retrieved", $continents);
	}

	/*public static function update($continent) {
		$conn = DB::connect();
		$sql = "UPDATE continents SET name='{$continent->getName()}' WHERE id='{$continent->getId()}';";

		if ( $conn->query($sql) != true ) {
			return $conn->error;
		}

		return true;
	}*/

	/*public static function delete($id) {
		$conn = DB::connect();
		$sql = "DELETE FROM continents WHERE id='$id';";

		if ( $conn->query($sql) ) {
			return $conn->error;
		}

		return true;
	}*/
}
