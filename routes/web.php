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

use App\Models\Contact;

// REST API
$router->get('/', 'ContactController@showAll');

$router->get('/test', 'ContactController@test');

$router->get('/orderedby/{by}', ['as' => 'ordered', 'uses' => 'ContactController@showOrdered']); 

$router->post('/order', 'ContactController@ordered');

$router->post('/contact', 'ContactController@addContact');

$router->delete('contact/{id}', ['uses' => 'ContactController@deleteContact']);