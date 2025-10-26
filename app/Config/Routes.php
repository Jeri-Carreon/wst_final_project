<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultController('Home'); // InfinityFree Route for it to work
$routes->get('/', 'Home::index');
//$routes->get('/home', 'Home::index');
$routes->get('/services', 'Services::index');
$routes->get('/shop', 'Shop::index');
$routes->get('/ourTeam', 'OurTeam::index');
$routes->get('/faq', 'Faq::index');
$routes->get('/aboutUs', 'AboutUs::index');
$routes->get('/contactUs', 'ContactUs::index');