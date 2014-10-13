<?php

namespace Fleet;

class Login {

	public function __construct($implementor) {
		$this->implementor = $implementor;
	}

	public function login($id, $password) {
		$userData = $implementor->login($id, $password);
		return !($userData==false);
	}

	protected $implementor;
}