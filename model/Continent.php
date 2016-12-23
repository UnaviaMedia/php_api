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
	}
	
	//Handle validation
	public function validate() {
		$errors = array();
		
		//Validation
		if ( strlen($this->name) == 0 ) {
			$errors[] = new ValidationError("name", "Name is required");
		}
		else if ( strlen($this->name) < 3 ) {
			$errors[] = new ValidationError("name", "Name must be greater than 3 characters");
		}
		
		//More validation...
		
		//Handle any validation errors
		if ( count($errors) > 0 ) {
			return new ValidationResponse(1, "Continent is invalid", $errors);
		}
		
		//Return the validated continent
		return new ValidationResponse(0, "Continent created ('{$this->name}')", $this);
	}
	
	
	//Data Access Layer functionality
	
	public static function create($continent) {
		$conn = DB::connect();
		$sql = sprintf("INSERT INTO continents VALUES (default, '%s');", $continent->name);

		//Handle query errors
		//	TODO: Add duplicate/existing record warning (or handle this in controller)
		if ( $conn->query($sql) != true || $conn->affected_rows == 0) {
			return new DatabaseResponse(1, "Adding continent failed ('{$continent->name}')", $conn->error);
		}

		//Return database response with the created continent
		return new DatabaseResponse(0, "Added continent ('{$continent->name}')", $continent);
	}

	public static function read($id) {
		$conn = DB::connect();
		$sql = "SELECT * FROM continents WHERE id=$id LIMIT 1;";
		
		//Handle query errors
		if ( !$result = $conn->query($sql) ) {
			return new DatabaseResponse(1, $conn->error);
		}
		
		//Handle empty result (warning)
		if ( $result->num_rows == 0 ) {
			return new DatabaseResponse(2, "No continent with id='$id' found");
		}

		//Create the continent object
		$row = $result->fetch_assoc();
		$continent = new Continent($row["id"], $row["name"]);
		
		//Return database response with the continent
		return new DatabaseResponse(0, "Continent retrieved ({$continent->name})", $continent);
	}

	public static function readAll() {
		$conn = DB::connect();
		$sql = "SELECT * FROM continents ORDER BY id;";
		
		//Handle query errors
		if ( !$result = $conn->query($sql) ) {
			return new DatabaseResponse(1, $conn->error);
		}
		
		//Handle empty result (warning)
		if ( $result->num_rows == 0 ) {
			return new DatabaseResponse(2, "No continents found");
		}

		$continents = array();

		//Create an array of continents
		while ( $row = $result->fetch_assoc() ) {
			$continent = new Continent($row["id"], $row["name"]);
			$continents[] = $continent;
		}
		
		//Return database response with the array of continents
		return new DatabaseResponse(0, "All continents retrieved", $continents);
	}

	public static function update($continent) {
		$conn = DB::connect();
		$sql = "UPDATE continents SET name='{$continent->name}' WHERE id='{$continent->id}';";
		
		//Handle query errors
		if ( $conn->query($sql) != true || $conn->affected_rows == 0) {
			return new DatabaseResponse(1, "Updating continent failed ('{$continent->name}')", $conn->error);
		}

		//Return database reponse with updated continent
		return new DatabaseResponse(0, "Continent updated ('{$continent->name}')", $continent);
	}

	public static function delete($id) {
		$conn = DB::connect();
		$sql = "DELETE FROM continents WHERE id='$id';";
		
		//DEBUG: Get the continent for debugging purposes
		$continentResult = Continent::read($id);
		$continent = $continentResult->data;
		
		//Handle trying to delete a non-existent continent
		if ( $continentResult->status != 0 ) {
			return new DatabaseResponse(1, "Continent not found for deletion ('$id')");
		}

		//Handle query errors
		if ( $conn->query($sql) != true || $conn->affected_rows == 0 ) {
			return new DatabaseResponse(1, "Deleting continent failed ('{$continent->name}')", $conn->error);
		}

		//Return database response with deleted continent
		return new DatabaseResponse(0, "Deleted continent ('{$continent->name}')", $continent);
	}
}
