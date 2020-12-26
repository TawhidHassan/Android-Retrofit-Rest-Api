<?php
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';
require '../includes/DbConnect.php';
$app = AppFactory::create();

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
	$response->getBody()->write("Hello, $name");
	
	$db=new DbConnect;
	if($db->connect()!=null){
		echo 'connection successfull';
	}
    return $response;
});

$app->run();