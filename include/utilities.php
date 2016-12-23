<?php
require_once("/home/cabox/workspace/constants.php");
require_once(RESPONSE_CLASSES);

/**
 * @brief	Class to handle model validation errors
 */
class ValidationError {
	public $fieldName;
	public $message;
	
	function __construct($fieldName, $message) {
		$this->fieldName = $fieldName;
		$this->message = $message;
	}
}

/**
 * @brief	Whether a value is a positive integer
 * @param	$value	Integer to check
 * @return	Whether the value is a positive integer
 */
function isPositiveInt($value) {
	if ( is_numeric($value) && ((string)(int)$value === (string)$value) && (int)$value >= 0 ) {
		return true;
	}

	return false;
}
