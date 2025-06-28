<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Api\UsuarioController;
//use App\Controllers\UsuarioController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//$routes->get('/usuarios','Api\UsuarioController::index');

$routes->post('/usuarios','Api\UsuarioController::salvar');
