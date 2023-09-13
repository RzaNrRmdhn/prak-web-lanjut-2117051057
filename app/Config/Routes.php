<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/profile/(:any)', 'Home::profile');
$routes->get('/profile/(:any)/(:any)/(:any)', 'Home::profile');