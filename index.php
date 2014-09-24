<?php
putenv("env=development");
require_once 'vendor/autoload.php';
use \Fleet\Utils as Utils;

$klein = new \Klein\Klein();
$config = \Fleet\Config::getInstance();
$db = \Fleet\DB::getInstance();
$template = \Fleet\Template::getInstance();
$klein->config = $config;
$klein->db = $db;
$klein->template = $template;

// route for /
$klein->respond('GET', '/', function ($request, $response, $service, $app) use ($klein) {
	$response->redirect("/hello/world");
});

foreach (glob("application/controllers/*.php") as $filename)
{
    include $filename;
}

$klein->dispatch();