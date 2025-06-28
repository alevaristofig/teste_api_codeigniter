<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Api\UsuarioController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('/usuarios',UsuarioController::salvar);
