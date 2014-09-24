<?php

$klein->respond('GET', '/hello/[a:name]', function ($request, $response, $service, $app) use ($klein) {
	$name = $request->name;
	echo $klein->template->render('hello.twig', \Fleet\Utils::addAppInfoTo(array('name' => $name)));
});