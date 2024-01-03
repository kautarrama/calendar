<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'ProjectsController::index');
$routes->get('projects/new', 'ProjectsController::new');
$routes->post('projects/create', 'ProjectsController::create/');
$routes->get('projects/edit/(:num)', 'ProjectsController::edit/$1');
$routes->put('projects/update/(:num)', 'ProjectsController::update/$1');
