<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/debug', 'Home::debug');
$routes->match(['get'], 'admin', 'Admin::index', ['filter' => 'auth_filter']);
//$routes->group('admin', function ($routes) {
//    $routes->get('/', 'Admin\Admin::index');
//});
$routes->get('mqtt', 'Mqtt::index');
$routes->get('calendar', 'Calendar::index');
$routes->get('mqtt', 'Mqtt::index');
$routes->get('inventory', 'Inventory::index');
$routes->get('tags', 'Tags::index');

$routes->cli('cron', 'Cron::index');
$routes->get('admin', 'Admin::index');

$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('Calendar/load',   'App\Calendar::load');
    $routes->get('Calendar/insert', 'App\Calendar::insert');
    $routes->get('Calendar/update', 'App\Calendar::update');
    $routes->get('Calendar/delete', 'App\Calendar::delete');
});

$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('Inventory/insert', 'App\Inventory::insert');
    $routes->get('Inventory/delete', 'App\Inventory::delete');
});

$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    // Registration
    $routes->get('register', 'Auth\RegistrationController::register', ['as' => 'register']);
    $routes->post('register', 'Auth\RegistrationController::attemptRegister');

    // Activation
    $routes->get('activate-account', 'Auth\RegistrationController::activateAccount', ['as' => 'activate-account']);

    // Login/out
    $routes->get('login', 'Auth\LoginController::login', ['as' => 'login']);
    $routes->post('login', 'Auth\LoginController::attemptLogin');
    $routes->get('logout', 'Auth\LoginController::logout');

    // Forgotten password and reset
    $routes->get('forgot-password', 'Auth\PasswordController::forgotPassword', ['as' => 'forgot-password']);
    $routes->post('forgot-password', 'Auth\PasswordController::attemptForgotPassword');
    $routes->get('reset-password', 'Auth\PasswordController::resetPassword', ['as' => 'reset-password']);
    $routes->post('reset-password', 'Auth\PasswordController::attemptResetPassword');

    // Account settings
    $routes->get('account', 'Auth\AccountController::account', ['as' => 'account']);
    $routes->post('account', 'Auth\AccountController::updateAccount');
    $routes->post('change-email', 'Auth\AccountController::changeEmail');
    $routes->get('confirm-email', 'Auth\AccountController::confirmNewEmail');
    $routes->post('change-password', 'Auth\AccountController::changePassword');
    $routes->post('delete-account', 'Auth\AccountController::deleteAccount');

    // Update House
    $routes->post('update-house', 'Auth\AccountController::updateHouse');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
