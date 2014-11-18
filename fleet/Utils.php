<?php

namespace Fleet;

class Utils {
	public static function addAppInfoTo($array) {
		$config = \Fleet\Config::getInstance();
		$array['app'] = $config['app'];
		return $array;
	}
}