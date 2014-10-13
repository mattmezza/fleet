<?php

namespace Fleet;
use \Fleet\Login;

class LoginJSON extends Login {

	public function login($id, $password) {
		$userData = $this->implementor->login($id, $password);
		if($userData==false)
			return array("error"=>true, "msg"=>"wrong id or password");
		else
			return array("success"=>true, "userdata"=>$userData);
	}

}