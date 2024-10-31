<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->group('home', function ($routes) {
    $routes->match(['get', 'post'], '/', 'Home::index');
    $routes->match(['get', 'post'], 'esPrimo/(:segment)', 'Home::esPrimo/$1');
    $routes->match(['get', 'post'], 'esPrimo', 'Home::esPrimo');
    $routes->match(['get', 'post'], 'esPrimoCheck/(:segment)', 'Home::esPrimoCheck/$1');
    $routes->match(['get', 'post'], 'piramides', 'Home::piramide');
    $routes->match(['get', 'post'], 'imprimirPiramide/(:segment)', 'Home::imprimirPiramide/$1');
    // $routes->match(['get', 'post'], 'multiplespiramides', 'Home::multiplesPiramides');
    $routes->match(['get', 'post'], 'temperatura', 'Home::temperatura');
    $routes->match(['get', 'post'], 'reverso', 'Home::reverso');
    $routes->match(['get', 'post'], 'resultado', 'Home::resultado');
    $routes->match(['get', 'post'], 'edad', 'Home::edad');
    $routes->match(['get', 'post'], 'calcular', 'Home::calcular');
    $routes->match(['get', 'post'], 'fibonacci', 'Home::fibonacci');
});


$routes->group('clases', function ($routes) {
    $routes->match(['get', 'post'], 'circulo', 'Clases::circulo');
});


$routes->group('letras', function ($routes) {
    $routes->match(['get', 'post'], 'abecedario', 'Letras::abecedario');
});
