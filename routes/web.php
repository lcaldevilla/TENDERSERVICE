<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version(); // indica la versiona ctual
});

$router->get('/tenders', 'TenderController@store'); // se encarga de parsear el fichero atom

$router->post('/parsers', 'ParserController@store'); // crea un nuevo concurso