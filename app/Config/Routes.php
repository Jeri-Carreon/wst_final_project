<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// REGISTRATION & LOGIN
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('register', 'RegisterForm::index');
$routes->post('register', 'RegisterForm::submit');

$routes->get('login', 'Login::index');
$routes->post('login/submit', 'Login::submit');
$routes->get('logout', 'Login::logout');




$routes->get('register-success', 'Auth::registerSuccess');


$routes->setDefaultController('Home'); // InfinityFree Route for it to work
$routes->setDefaultMethod('index');
//$routes->get('/home', 'Home::index');



$routes->get('/services', 'Services::index');
$routes->get('/services', 'Services::index');
$routes->get('/shop', 'Shop::index');
$routes->get('/ourTeam', 'OurTeam::index');
$routes->get('/faq', 'Faq::index');
$routes->get('/aboutUs', 'AboutUs::index');
$routes->get('/contactUs', 'ContactUs::index');