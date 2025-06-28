<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Api\UsuarioController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/usuarios','Api\UsuarioController::listar');
$routes->post('/usuarios','Api\UsuarioController::salvar');
