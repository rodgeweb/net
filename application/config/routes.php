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

// Job Posting
$route['job'] = 'job/index';
$route['job/add-job'] = 'job/add_job';
$route['job/update-job/(:any)'] = 'job/update_job/$';
$route['job/delete/(:any)'] = 'job/update_job_status/$';
$route['job/view-job/(:any)'] = 'job/view_job/$';

// Company
$route['company'] = 'company/view';
$route['company/add-company'] = 'company/add_company';
$route['company/update-company/(:any)'] = 'company/update_company/$';
$route['company/disable-company/(:any)'] = 'company/update_company_status/$';
$route['company/view/(:any)'] = 'company/view_specific_company/$';

// User
$route['users/update-profile'] = 'users/update_profile';

// For CMS Routes. Any url that it recieves will redirect to pages controller adn its method.
// $route['(:any)'] =  'pages/view/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
