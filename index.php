<?php
putenv("env=development");
require_once 'vendor/autoload.php';
use \Fleet\Utils as Utils;

$klein = new \Klein\Klein();
$config = \Fleet\Config::getInstance();
$klein->config = $config;
$klein->respond('GET', '/', function () use ($klein) {

	$db = \Fleet\DB::getInstance();
	$post = $db->wp_posts[19];
    $template = \Fleet\Template::getInstance();
	echo $template->render('hello.twig', Utils::addAppInfoTo(array('content' => $post['post_content'])));
});

$klein->dispatch();