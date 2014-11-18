<?php

namespace Fleet;

class Template {

	public static function getInstance() {
		if($TWIG == null) {
			$dir = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'views';
			$loader = new \Twig_Loader_Filesystem($dir);
			$TWIG = new \Twig_Environment($loader, array(
				#'cache' => '/path/to/compilation_cache',
				'cache'=>false
			));
		}
		return $TWIG;
	}

	private static $TWIG;
}