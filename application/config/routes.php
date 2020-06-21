<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/* Admin Settings */

$route['4dm1n'] = 'adminpanel/login'; // Login
$route['4dm1n/dashboard'] = 'adminpanel/dashboard'; // Dashboard

// Kategori
$route['4dm1n/kategori/(:num)'] = 'adminpanel/dashboard/kategori/$1';
$route['4dm1n/kategori'] = 'adminpanel/dashboard/kategori';
$route['4dm1n/addKategori'] = 'adminpanel/dashboard/tbhKategori';

// Product
$route['4dm1n/product'] = 'adminpanel/dashboard/product_list';

//Settings
$route['4dm1n/hapus'] = 'adminpanel/dashboard/hps';
$route['4dm1n/edit'] = 'adminpanel/dashboard/edit';

/* EnD */ 


/*! Member Settings */

$route['member'] = 'member/member'; // Login
$route['logout'] = 'homepage/logout'; // Logout

// Porduct Setting

$route['product'] = 'myproduct/myproduct';
$route['product/add'] = 'addproduct/product';
$route['Products'] = 'homepage/Products';

// $route['myaccount/(:any)'] = 'myaccount/$1';

$route['default_controller'] = 'homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// $modules_path = APPPATH.'modules/';     
// $modules = scandir($modules_path);

// foreach($modules as $module)
// {
//     if($module === '.' || $module === '..') continue;
//     if(is_dir($modules_path) . '/' . $module)
//     {
//         $routes_path = $modules_path . $module . '/config/routes.php';
//         if(file_exists($routes_path))
//         {
//             require($routes_path);
//         }
//         else
//         {
//             continue;
//         }
//     }
// }