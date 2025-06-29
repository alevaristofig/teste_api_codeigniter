<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Api\UsuarioController;
use App\Controllers\Auth\LoginController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//service('auth')->routes($routes);

$routes->post('/usuarios/login','Auth\LoginController::login');

$routes->get('/usuarios','Api\UsuarioController::listar');
$routes->post('/usuarios','Api\UsuarioController::salvar');
$routes->delete('/usuarios/(.*)','Api\UsuarioController::apagar/$1');
$routes->put('/usuarios/(.*)','Api\UsuarioController::atualizar/$1');

//service('auth')->routes($routes);
