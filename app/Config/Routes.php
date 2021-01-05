<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Shop\ProductController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Shop\ProductController::index', ['as' => 'shop_home']);
$routes->get('/cart', 'Shop\CartController::index',['as' => 'cart_page']);
$routes->get('/buy/(:num)', 'Shop\CartController::add/$1',['as' => 'product_buy']);
$routes->post('/cart/update', 'Shop\CartController::update',['as' => 'cart_update']);
$routes->get('/cart/remove/(:num)', 'Shop\CartController::remove/$1',['as' => 'cart_remove']);

$routes->match(['get', 'post'],'/checkout', 'Shop\PenjualanController::orderConfirm',['as' => 'cart_checkout']);
$routes->match(['get', 'post'],'/invoice', 'Shop\ProsesJualController::invoice',['as' => 'customer_invoice']);
$routes->get('/customer/form', 'Shop\PenjualanController::customerForm',['as' => 'customer_form']);

$routes->get('/admin', 'Admin\DashboardController::index', ['as' => 'admin_home']);
$routes->get('/admin/product', 'Admin\DashboardController::listProduct', ['as' => 'admin_product_list']);
$routes->get('/admin/product/create', 'Admin\DashboardController::createProduct', ['as' => 'admin_product_create']);
$routes->post('/admin/product', 'Shop\ProductController::store', ['as' => 'admin_product_store']);

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
