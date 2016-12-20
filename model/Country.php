<?php

class Country {
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
	}
}