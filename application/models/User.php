<?php

namespace Models;

class User {

	public static function withID( $id ) {
    	$instance = new self();
    	$instance->loadByID( $id );
    	return $instance;
    }

    public static function withRow( array $row ) {
    	$instance = new self();
    	$instance->fill( $row );
    	return $instance;
    }

	public function getId() {
		return $this->id;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getFullname() {
		return $this->fullname;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function setFullname($fullname) {
		$this->fullname = $fullname;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function __toString() {
		return $this->id.": ".$this->fullname . " <".$this->email."> "."<".$this->password.">";
	}

	protected function loadByID( $id ) {
    	// do query
    	//$row = my_awesome_db_access_stuff( $id );
    	// call setters
    }

    protected function fill( array $row ) {
    	$this->id = $row['id'];
    	$this->fullname = $row['fullname'];
    	$this->email = $row['email'];
    	$this->password = $row['password'];
    }

	private $id;
	private $fullname;
	private $email;
	private $password;
}