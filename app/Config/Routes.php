<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('/',  ['namespace' => '\App\Controllers\User'], static function ($routes) {
    $routes->get('', 'Home::index');
    $routes->get('pembayaran', 'Pesanan::pembayaran');
    $routes->get('booking', 'Pesanan::booking');
    $routes->get('pricelist', 'Pricelist::index');
    $routes->get('about', 'About::index');
    $routes->get('testimoni', 'Testimoni::index');
    $routes->get('contact', 'Contact::index');
    $routes->get('pilihwaktu', 'Pesanan::pilihwaktu');
});
$routes->group('/admin',  ['namespace' => '\App\Controllers\Admin'], static function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('admin', 'Admin::index');
    $routes->get('admin/new', 'Admin::new');
    $routes->get('admin/(:num)/edit', 'Admin::edit/$1');
    $routes->post('admin', 'Admin::create');
    $routes->post('admin/(:num)/update', 'Admin::update/$1');

 
});

service('auth')->routes($routes);

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
