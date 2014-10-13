<?php

namespace Fleet;

class TableLogin implements LoginImplementor {
	public function __construct($tableName, $idName, $passwordName) {
		$this->tableName = $tableName;
		$this->idName = $idName;
		$this->passwordName = $passwordName;
	}

	public function login($id, $password) {
		$db = \Fleet\DB::getInstance();
		$userData = $db->{$this->tableName}($this->idName." = ? and ".$this->passwordName." = MD5(?)", $id, $password)->fetch();
		if($userData == null) 
			return false;
		return $userData;
	}

	private $tableName;
	private $idName;
	private $passwordName;
}