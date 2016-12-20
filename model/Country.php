<?php

class Country {
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
	}
}