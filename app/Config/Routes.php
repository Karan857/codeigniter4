<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// menu
$routes->get('/', 'Home::Index');
$routes->get('/shop', 'Shop::Index');

// home
$routes->get('/home', 'Home::Index');
$routes->get('/product', 'Home::Product');
$routes->get('product/(:num)', 'Home::Detail/$1');
$routes->post('product/reserve', 'Home::Reserve');
$routes->get('cart', 'Home::Cart');
$routes->get('product/(:num)/contact_1', 'Home::Contract_1/$1');
$routes->get('product/(:num)/contact_2', 'Home::Contract_2/$1');



$routes->get('/test', 'Home::Test');



//auth
$routes->get('/login', 'Login::Index');
$routes->post('/login/check', 'Login::Check');
$routes->get('/logout', 'Logout::Index');

//user
$routes->get('/user', 'User::Index');
$routes->get('/user/create', 'User::Create');
$routes->post('/user/create/submit', 'User::SubmitCreate');
$routes->get('/user/update/(:num)', 'User::Update/$1');
$routes->post('/user/update/submit', 'User::SubmitUpdate');
$routes->get('/user/delete/(:num)', 'User::Delete/$1');

// product
$routes->get('/admin/product', 'Product::Index');
$routes->get('/admin/product/create', 'Product::Create');
$routes->post('/admin/product/create/submit', 'Product::SubmitCreate');
$routes->get('/admin/product/update/(:num)', 'Product::Update/$1');
$routes->post('/admin/product/update/submit', 'Product::SubmitUpdate');
$routes->get('/admin/product/delete/(:num)', 'Product::Delete/$1');
