<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Api\UsuarioController;
use App\Controllers\Auth\LoginController;

/**
 * @var RouteCollection $routes
 */

$routes->post('usuarios/login','Auth\LoginController::login');
$routes->post('usuarios','Api\UsuarioController::salvar');

$routes->group('api', ['filter' => 'jwtFilter'], static function($routes) {
    $routes->get('usuarios', 'Api\UsuarioController::listar');  
    $routes->get('usuarios/(.*)','Api\UsuarioController::buscar/$1');     
    $routes->delete('usuarios/(.*)','Api\UsuarioController::apagar/$1');
    $routes->put('usuarios/(.*)','Api\UsuarioController::atualizar/$1');
    $routes->get('usuarios/logout','Auth\LoginController::logout');
});

