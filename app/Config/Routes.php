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
    $routes->get('pembayaran/(:num)', 'Pesanan::pembayaran/$1', ['filter' => 'session']);
    $routes->get('booking', 'Pesanan::booking', ['filter' => 'session']);
    $routes->post('booking', 'Pesanan::create_booking', ['filter' => 'session']);
    $routes->get('booking/(:num)/testimoni', 'Testimoni::boking_testimoni_new/$1');
    $routes->post('booking/(:num)/testimoni', 'Testimoni::boking_testimoni_create/$1');

    $routes->get('pricelist', 'Pricelist::index');
    $routes->get('about', 'About::index');
    $routes->get('testimoni', 'Testimoni::index');
    $routes->get('contact', 'Contact::index');
    $routes->get('pilihwaktu', 'Pesanan::pilihwaktu', ['filter' => 'session']);
    $routes->get('transaksi', 'Pesanan::index', ['filter' => 'session']);
    $routes->post('transaksi/(:num)/batal', 'Pesanan::batal_transaksi/$1', ['filter' => 'session']);
    $routes->get('transaksi/(:num)/pembayaran', 'Pesanan::pembayaran/$1', ['filter' => 'session']);
    $routes->post('transaksi/(:num)/pembayaran', 'Pesanan::bayar_transaksi/$1', ['filter' => 'session']);


    $routes->post('tabel/transaksi', 'Pesanan::tabel_transaksi', ['filter' => 'session']);
    $routes->get('portofolio', 'Portofolio::index');
});
$routes->group('/admin',  ['namespace' => '\App\Controllers\Admin',  'filter' => 'group:admin'], static function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('admin', 'Admin::index');
    $routes->get('user', 'Admin::user');
    $routes->get('admin/new', 'Admin::new');
    $routes->get('admin/(:num)/edit', 'Admin::edit/$1');
    $routes->post('admin', 'Admin::create');
    $routes->post('admin/(:num)/update', 'Admin::update/$1');

    $routes->get('portofolio', 'Portofolio::index');
    $routes->get('portofolio/new', 'Portofolio::new');
    $routes->post('portofolio', 'Portofolio::create');
    $routes->post('portofolio/(:num)/update', 'Portofolio::update/$1');
    $routes->delete('portofolio/(:num)', 'Portofolio::delete/$1');
    $routes->get('portofolio/(:num)/edit', 'Portofolio::edit/$1');

    $routes->get('booking', 'Pesanan::booking');
    $routes->post('booking/(:num)/setuju', 'Pesanan::booking_setuju/$1');
    $routes->post('booking/(:num)/batal', 'Pesanan::booking_batal/$1');

    $routes->get('pembayaran', 'Pesanan::pembayaran');
    $routes->get('testimoni', 'Testimoni::index');
    $routes->get('testimoni/(:num)/comment', 'Testimoni::comment/$1');
    $routes->post('testimoni/(:num)/comment', 'Testimoni::create_comment/$1');

    $routes->get('paket', 'Paket::index');
    $routes->get('paket/new', 'Paket::new');
    $routes->post('paket', 'Paket::create');
    $routes->get('paket/(:num)/edit', 'Paket::edit/$1');
    $routes->post('paket/(:num)/update', 'Paket::update/$1');
    $routes->delete('paket/(:num)', 'Paket::delete/$1');

    $routes->post('tabel/portofolio', 'Portofolio::tabel');
    $routes->post('tabel/paket', 'Paket::tabel');
    $routes->post('tabel/testimoni', 'Testimoni::tabel');
    $routes->post('tabel/booking', 'Pesanan::tabel_booking');
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
