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
$routes->get('/', 'Home::index');
$routes->get('/Register', 'Home::Register');
$routes->get('/Login', 'Home::Login');
$routes->post('/uRegistration', 'Home::uRegister');
$routes->post('/uLogin', 'Home::uLogin');
$routes->get('/UHome', 'Home::UHome');
$routes->get('/Courses', 'InstructorC::viewCourses');
$routes->post('/addcourse', 'Home::addCourse');
$routes->post('/addModule', 'InstructorC::addModule');
$routes->post('/addModules', 'InstructorC::addModules');
$routes->get('/Logout', 'Home::logout');
$routes->post('/iupdate', 'Home::iupdate');
$routes->get('/iupdate', 'Home::iupdate');
$routes->post('/update', 'Home::update');
$routes->get('/isetting', 'InstructorC::isettings');
$routes->get('/EnrolledCourses', 'StudentC::enrolledCourses');
$routes->get('/Insights', 'InstructorC::Insights');

$routes->post('/updatePassword', 'Home::updatePassword');
$routes->get('/usersettings', 'Home::usersettings');
$routes->post('/courseViewLogout', 'Home::courseViewLogout');
$routes->post('/loginplz', 'Home::loginplz');
$routes->get('/home', 'Home::index');


$routes->post('/updateModuleStatus', 'StudentC::updateModuleStatus');
$routes->post('/openCourse', 'StudentC::openCourse');
$routes->post('/courseView', 'StudentC::courseView');
$routes->post('/cEnroll', 'StudentC::cEnroll');
$routes->get('/browsecourse', 'StudentC::browsecourse');

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
