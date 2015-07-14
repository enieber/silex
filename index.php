<?php

define('APP_ROOT',dirname(__DIR__));
chdir(APP_ROOT);

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

require 'vendor/autoload.php';

$app = new Application();

$app->before(function(Request $request){
	print 'antes das rotas';
});
$app->get('users/{name}', function($name){
    return 'Olá, ' . $name;
});

$app->get('/', function(){
	return "Hello Wolrd";
})

->value('name', NULL)
->convert('name', function($name){return (string) $name;});
$app->run();
