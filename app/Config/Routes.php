<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\EtudiantController;

/**
 * @var RouteCollection $routes
 */

$routes->group("etudiants", function($routes){
    $routes->get("/", "EtudiantController::liste");
});