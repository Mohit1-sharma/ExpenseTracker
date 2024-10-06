<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
 $routes->get('/', 'Home::index');
 $routes->get('/home/index', 'Home::index');
 $routes->get('/home/register','Home::register');
 $routes->post('/home/store', 'Home::store');
 $routes->get('/home/login','Home::index');
 $routes->get('/register','Home::register');
 $routes->get('/login','Home::index');
 $routes->post('/home/login', 'Home::login');
 $routes->get('home/logout', 'Home::logout');
 $routes->get('/home/dashboard', 'Home::dashboard'); 
 $routes->get('/home/addExpense','Home::addData');
 $routes->post('/home/addExpense','Home::Expenseadd');
 $routes->get('/home/expense_list','Home::expenselist');
 $routes->get('/home/expenseList', 'Home::expenseList');
$routes->get('/home/editExpense/(:num)', 'Home::editExpense/$1');
$routes->post('/home/updateExpense/(:num)', 'Home::updateExpense/$1');
$routes->get('/home/deleteExpense/(:num)', 'Home::deleteExpense/$1');

$routes->get('/home/profile', 'Home::profile');
 
 


// $routes->get('/', 'Home::index'); // Home page or login page
// $routes->get('home/register', 'Home::register'); // Registration page
// $routes->post('home/store', 'Home::store'); // Store user data to the database
// $routes->post('home/login', 'Home::login'); // Handle login functionality