<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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

// Route Front
$routes->get('/', 'FrontController::index');
$routes->get('/login', 'FrontController::login');
$routes->get('/register', 'FrontController::register');
$routes->post('/login', 'FrontController::loginProcess');
$routes->post('/register', 'FrontController::registerProcess');
$routes->get('/logout', 'FrontController::logout', ['filter' => 'authfront']);
$routes->get('/contact', 'FrontController::contact');
$routes->get('/about', 'FrontController::about');
$routes->get('/paket', 'FrontController::paket');
$routes->get('/booking/(:segment)', 'FrontController::bookingDetail/$1', ['filter' => 'authfront']);
$routes->get('/booking', 'FrontController::bookingList', ['filter' => 'authfront']);
$routes->post('/booking/save', 'FrontController::bookingSave', ['filter' => 'authfront']);
$routes->post('/booking/edit', 'FrontController::bookingEdit', ['filter' => 'authfront']);
$routes->post('/booking/delete', 'FrontController::bookingDelete', ['filter' => 'authfront']);
$routes->get('/booking/faktur/(:segment)', 'FrontController::faktur/$1', ['filter' => 'authfront']);
$routes->post('/pembayaran/save', 'FrontController::pembayaranSave', ['filter' => 'authfront']);
$routes->post('/pembayaran/cicilan', 'FrontController::pembayaranCicilan', ['filter' => 'authfront']);
$routes->get('/booking/document/(:segment)/(:segment)', 'FrontController::document/$1/$2', ['filter' => 'authfront']);
$routes->get('/booking/document/edit/(:segment)/(:segment)', 'FrontController::documentedit/$1/$2', ['filter' => 'authfront']);
$routes->post('/booking/document/save', 'FrontController::documentSave', ['filter' => 'authfront']);
$routes->post('/booking/document/edit', 'FrontController::documentEditProcess', ['filter' => 'authfront']);
$routes->post('/contact/save', 'FrontController::contactSave');
$routes->get('/payment', 'FrontController::paymentList', ['filter' => 'authfront']);

// Route Admin
$routes->get('/admin', 'HomeController::index', ['filter' => 'auth']);
// Login
$routes->get('/admin/login', 'LoginController::index');
$routes->post('/admin/login/ceklogin', 'LoginController::ceklogin');
$routes->get('/admin/logout', 'LoginController::logout', ['filter' => 'auth']);
// User
$routes->get('/admin/user', 'UserController::index', ['filter' => 'auth']);
$routes->post('/admin/user/save', 'UserController::save', ['filter' => 'auth']);
$routes->post('/admin/user/edit', 'UserController::edit', ['filter' => 'auth']);
$routes->post('/admin/user/delete', 'UserController::delete', ['filter' => 'auth']);
$routes->get('/admin/user/report', 'UserController::report', ['filter' => 'auth']);
// Peserta
$routes->get('/admin/peserta', 'PesertaController::index', ['filter' => 'auth']);
$routes->post('/admin/peserta/save', 'PesertaController::save', ['filter' => 'auth']);
$routes->post('/admin/peserta/edit', 'PesertaController::edit', ['filter' => 'auth']);
$routes->post('/admin/peserta/delete', 'PesertaController::delete', ['filter' => 'auth']);
$routes->post('/admin/peserta/reset', 'PesertaController::reset', ['filter' => 'auth']);
$routes->get('/admin/peserta/report', 'PesertaController::report', ['filter' => 'auth']);
// Fasilitas
$routes->get('/admin/fasilitas', 'FasilitasController::index', ['filter' => 'auth']);
$routes->post('/admin/fasilitas/save', 'FasilitasController::save', ['filter' => 'auth']);
$routes->post('/admin/fasilitas/edit', 'FasilitasController::edit', ['filter' => 'auth']);
$routes->get('/admin/fasilitas/report', 'FasilitasController::report', ['filter' => 'auth']);
// Persyaratan
$routes->get('/admin/persyaratan', 'PersyaratanController::index', ['filter' => 'auth']);
$routes->post('/admin/persyaratan/save', 'PersyaratanController::save', ['filter' => 'auth']);
$routes->post('/admin/persyaratan/edit', 'PersyaratanController::edit', ['filter' => 'auth']);
$routes->get('/admin/persyaratan/report', 'PersyaratanController::report', ['filter' => 'auth']);
// Contact
$routes->get('/admin/contact', 'ContactController::index', ['filter' => 'auth']);
$routes->post('/admin/contact/edit', 'ContactController::edit', ['filter' => 'auth']);
// Testimonial
$routes->get('/admin/testimonial', 'TestimonialController::index', ['filter' => 'auth']);
$routes->post('/admin/testimonial/save', 'TestimonialController::save', ['filter' => 'auth']);
$routes->post('/admin/testimonial/edit', 'TestimonialController::edit', ['filter' => 'auth']);
$routes->post('/admin/testimonial/delete', 'TestimonialController::delete', ['filter' => 'auth']);
// FAQ
$routes->get('/admin/faq', 'FaqController::index', ['filter' => 'auth']);
$routes->post('/admin/faq/save', 'FaqController::save', ['filter' => 'auth']);
$routes->post('/admin/faq/edit', 'FaqController::edit', ['filter' => 'auth']);
$routes->post('/admin/faq/delete', 'FaqController::delete', ['filter' => 'auth']);
// Paket
$routes->get('/admin/paket', 'PaketController::index', ['filter' => 'auth']);
$routes->get('/admin/paket/tambah', 'PaketController::tambah', ['filter' => 'auth']);
$routes->post('/admin/paket/save', 'PaketController::save', ['filter' => 'auth']);
$routes->post('/admin/paket/edit', 'PaketController::edit', ['filter' => 'auth']);
$routes->post('/admin/paket/delete', 'PaketController::delete', ['filter' => 'auth']);
$routes->get('/admin/paket/report', 'PaketController::report', ['filter' => 'auth']);
$routes->post('/admin/paket/detail-index/fasilitas', 'PaketController::detailindexfasilitas', ['filter' => 'auth']);
$routes->post('/admin/paket/detail-save/fasilitas', 'PaketController::detailsavefasilitas', ['filter' => 'auth']);
$routes->post('/admin/paket/detail-delete/fasilitas', 'PaketController::detaildeletefasilitas', ['filter' => 'auth']);
$routes->post('/admin/paket/detail-index/syarat', 'PaketController::detailindexsyarat', ['filter' => 'auth']);
$routes->post('/admin/paket/detail-save/syarat', 'PaketController::detailsavesyarat', ['filter' => 'auth']);
$routes->post('/admin/paket/detail-delete/syarat', 'PaketController::detaildeletesyarat', ['filter' => 'auth']);
// Pemesanan
$routes->get('/admin/booking', 'BookingController::index', ['filter' => 'auth']);
$routes->get('/admin/booking/faktur/(:segment)', 'BookingController::faktur/$1', ['filter' => 'auth']);
$routes->post('/admin/booking/status', 'BookingController::status', ['filter' => 'auth']);
$routes->get('/admin/booking/document/(:segment)/(:segment)', 'BookingController::document/$1/$2', ['filter' => 'auth']);
// Pembayaran
$routes->get('/admin/pembayaran', 'PembayaranController::index', ['filter' => 'auth']);
$routes->post('/admin/pembayaran/verifikasi', 'PembayaranController::verif', ['filter' => 'auth']);
$routes->post('/admin/pembayaran/verifikasi-cicilan', 'PembayaranController::verifCicilan', ['filter' => 'auth']);
// Report
$routes->get('/admin/report', 'ReportController::index', ['filter' => 'auth']);
$routes->get('/admin/report/booking/(:segment)/(:segment)', 'ReportController::reportBooking/$1/$2', ['filter' => 'auth']);
// Manifest
$routes->get('/admin/manifest', 'ManifestController::index', ['filter' => 'auth']);
$routes->get('/admin/manifest/(:segment)', 'ManifestController::indexParameter/$1', ['filter' => 'auth']);
$routes->get('/admin/manifest/booking-paket/(:segment)', 'ManifestController::reportBookingPaket/$1', ['filter' => 'auth']);
$routes->post('/admin/manifest/ubah-paket', 'ManifestController::ubahPaket', ['filter' => 'auth']);
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
