<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/part/buatpart/(:num)', 'Part::buatpart/$1');
$routes->get('/customer/save', 'Customer::save');
$routes->get('/part/(:num)', 'Part::detailpart/$1');
$routes->get('/part/savepart', 'Part::savepart');
$routes->get('customer/savecust', 'Customer::savecust');
$routes->get('/buatpo', 'Customer::buatpo');
$routes->get('/purchasing', 'Purchasing::index');
$routes->get('/pocust', 'Customer::po');
$routes->get('/halamanutama', 'Customer::page');
$routes->get('/', 'Home::indexlogin');
$routes->get('/home/login', 'Home::login');
$routes->get('/home/logout','Home::logout');
$routes->get('/wh', 'Warehouse::index');
$routes->get('/warehouse/confirm', 'Warehouse::confirm');
$routes->get('/warehouse/shearing', 'Warehouse::shearing');
$routes->get('/warehouse/cutsize', 'Warehouse::cutsize');
$routes->get('production', 'Production::index');
$routes->get('/purchasing/kedatangan', 'Purchasing::kedatangan');
$routes->get('/buatsup', 'Purchasing::buatsup');
$routes->get('/buatposup', 'Purchasing::buatposup');
$routes->post('/part/delete', 'Part::deletepart');
$routes->get('/purchasing/savesup', 'Purchasing::savesup');
$routes->get('purchasing/saveposup', 'Purchasing::saveposup');
$routes->get('/cust', 'Customer::index');
$routes->get('/mrp', 'Customer::mrp');
$routes->get('/cetaklaporan/(:any)/(:any)', 'Home::cetaklaporan/$1/$2');
$routes->get('/laporanproduksi/(:any)', 'Home::laporanproduksi/$1');
$routes->get('/customer', 'Customer::cust');
$routes->get('/(:num)', 'Customer::detail/$1');
$routes->get('/home/cetakmrp','Home::cetakmrp');
$routes->get('/part/saveeditpart', 'Part::saveeditpart');
$routes->get('/home/cetakrekapcust/(:num)', 'Home::cetakrekapcust/$1');
$routes->get('/buatcust', 'Customer::buat');
$routes->get('/home/cetakrekapsup/', 'Home::cetakrekapsup');
$routes->get('/production/input1', 'Production::input1');
$routes->get('/production/input2', 'Production::input2');
$routes->get('/production/input3', 'Production::input3');
$routes->get('/production/input4', 'Production::input4');
$routes->get('/production/input5', 'Production::input5');
$routes->get('/production/input6', 'Production::input6');
$routes->get('/production/input7', 'Production::input7');
$routes->get('/production/inputspot', 'Production::inputspot');
$routes->get('/production/saveassy', 'Production::saveassy');
$routes->get('/production/inputassy', 'Production::inputassy');
$routes->get('/delivery', 'Delivery::index');
$routes->get('/delivery/saveschedule', 'Delivery::saveschedule');
$routes->get('/production/savescheduleproduksi', 'Production::savescheduleproduksi');
$routes->get('/customer/saverevisi', 'Customer::saverevisi');
$routes->get('/purchasing/saverevisi', 'Purchasing::saverevisi');
$routes->get('/cetakwip/(:num)', 'Home::cetakwip/$1');
$routes->get('/delivery/finishpart', 'Delivery::finishpart');
$routes->get('/delivery/assyweld', 'Delivery::assyweld');
$routes->get('/warehousefg', 'Warehousefg::index');

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
