<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// login routes
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/login/logout', 'Login::logout');

// dashboard routes
$routes->get('/dashboard', 'Dashboard::index');

// register routes
$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');

// enrollment routes
$routes->get('/enrollment', 'Enrollment::index');
$routes->post('/enrollment/updateStatus/(:num)', 'Enrollment::updateStatus/$1');

// Student Routes
$routes->get('/student', 'Student::index');                    // List all students
$routes->get('/student/edit/(:num)', 'Student::edit/$1');      // Show edit form
$routes->post('/student/update/(:num)', 'Student::update/$1'); // Handle update
$routes->get('/student/delete/(:num)', 'Student::delete/$1');  // Delete student


//report routes
$routes->get('/report', 'Report::index');
