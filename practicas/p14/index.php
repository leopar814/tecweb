<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require 'vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/tecweb/practicas/p14');

// EJEMPLO 1: Hola Mundo
$app->get('/', function ($request, $response, $args) {
    $response->write("Hola, Mundo!");
    return $response;
});

// EJEMPLO 2: Saludo con parámetro
$app->get('/hola[/{nombre}]', function ($request, $response, $args) {
    $response->write("Hola, " . ($args['nombre']));
    return $response;
});

// EJEMPLO 3: Manejo de POST
$app->post("/pruebapost", function($request, $response, $args) {
    $reqPost = $request->getParsedBody();
    $val1 = $reqPost['val1'];
    $val2 = $reqPost['val2'];

    $response->write("Valores: " . $val1 . " " . $val2); 
    
    return $response;
});

// EJEMPLO 4: Respuesta JSON
$app->get("/testjson", function($request, $response, $args) {
    $data[0] ["nombre"] = "Leonardo";
    $data[0] ["apellido"] = "Avalos";
    $data[1] ["nombre"] = "Juan";
    $data[1] ["apellido"] = "Cielo";
    $data[2] ["nombre"] = "Berenice";
    $data[2] ["apellido"] = "Castellanos";
    $data[3] ["nombre"] = "Angel";
    $data[3] ["apellido"] = "Carrillo";

    $response->write(json_encode($data, JSON_PRETTY_PRINT));
    return $response;
});

$app->run();
?>