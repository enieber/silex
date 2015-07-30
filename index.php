<?php

define('APP_ROOT',dirname(__DIR__));
chdir(APP_ROOT);

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

require 'vendor/autoload.php';

$app = new Application();

$app->before(function(Request $request){
	print '<p>antes das rotas</p>';
});
$app->get('users/', function(){
	return 'Digite o seu nome: <input type="text" name="nome">'.'<br>'.' <a href="name">entrar</a>';
});
$app->get('users/{name}', function($name){
    return '<p>Olá, ' . $name.' </p>';
});

$app->get('/', function(){
	return '<h1>Rotas Silex</h1><br><a href="users">Usuarios</a>';

})

->value('name', NULL)
->convert('name', function($name){return (string) $name;});
$app->run();
