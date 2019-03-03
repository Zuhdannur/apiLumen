<?php

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
    return $router->app->version();
});

/**
 * Routes for resource siswa-controller
 */

/**
 * Routes for resource siswa
 */
$router->get('siswa', 'SiswasController@all');
$router->post('/siswa', 'SiswasController@add');
$router->post('/siswa/{id}', 'SiswasController@put');
$router->delete('siswa/{id}', 'SiswasController@remove');

/**
 * Routes for resource kelas
 */


$router->get('kelas', 'KelasController@all');
$router->post('kelas', 'KelasController@add');
$router->post('kelas/{id}', 'KelasController@put');
$router->delete('kelas/{id}', 'KelasController@remove');
