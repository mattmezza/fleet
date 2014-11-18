<?php

namespace Fleet;

class Config {

	public static function getInstance() {
		if($INSTANCE == null)
			$INSTANCE = new Config();
		return $INSTANCE->getConfig();
	}

	private function __construct() {
		$this->parser = new \IniParser('app.ini');
		$this->config = $this->parser->parse();
	}

	private function getConfig() {
		$env = getenv("env");
		if(!isset($this->config[$env]))
			return $this->config['development'];
		return $this->config[$env];
	}

	private $INSTANCE;
	private $config;
	private $parser;
}