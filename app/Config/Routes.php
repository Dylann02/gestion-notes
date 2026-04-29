<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/login', 'AuthController::index');


$routes->get('/', 'LivresController::index');

$routes->group('livres', function($routes) {
    
    // /livres
    $routes->get('/', 'LivresController::index');            
    
    //  /livre/voir/1
    $routes->get('voir/(:num)', 'LivresController::view/$1');  

    
    $routes->get('creer', 'LivresController::create');       
    $routes->post('stocker', 'LivresController::store');     

    // /livre/supprimer/1
    $routes->post('supprimer/(:num)', 'LivresController::delete/$1'); 
    
    //  Emprunts et Retours
    $routes->post('emprunter/(:num)', 'Emprunts::sortir/$1');
    $routes->post('rendre/(:num)', 'Emprunts::retour/$1');
});