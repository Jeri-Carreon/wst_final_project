<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultController('Home');
$routes->get('/', 'Home::index');
//$routes->get('/home', 'Home::index');
$routes->get('/services', 'Services::index');
$routes->get('/shop', 'Shop::index');
$routes->get('/ourTeam', 'OurTeam::index');
