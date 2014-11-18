<?php

namespace Fleet;

class DB {

	public static function getInstance() {
		if($INSTANCE == null) {
			$config = \Fleet\Config::getInstance();
			if(!isset($config->db->type) || !isset($config->db->host) || !isset($config->db->user) || !isset($config->db->name))
				return null;
			$type = $config->db->type;
			$host = $config->db->host;
			$user = $config->db->user;
			$pass = $config->db->pass;
			$name = $config->db->name;
			try {
				$pdo = new \PDO("$type:dbname=$name;host=$host", $user, $pass);
				$INSTANCE = new \NotOrm($pdo);
			} catch (PDOException $e) {
				echo 'Connection failed: ' . $e->getMessage();
			}
		}
		return $INSTANCE;
			
	}

	private static $INSTANCE;
}