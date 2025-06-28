<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Api\UsuarioController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//$routes->resource('usuarios', ['controller' => 'Api\UsuarioController']);
$routes->get('/usuarios','Api\UsuarioController::listar');
$routes->post('/usuarios','Api\UsuarioController::salvar');
$routes->delete('/usuarios/(.*)','Api\UsuarioController::apagar/$1');
