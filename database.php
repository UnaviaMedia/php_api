<?php
require_once("/home/cabox/workspace/constants.php");

//Database constants
define("DB_HOST", "localhost");
define("DB_USER", "admin");
define("DB_PASSWORD", "password");
define("DB_NAME", "php_api");

class DB {
	/**
	 * Retrieve a database connection
	 *
	 * @return	Connection to the database
	 */
	static function connect() {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if ($conn->connect_error) {
			die("ERROR: Connection Error -> " . $conn->connect_error);
		}
		return $conn;
	}
}