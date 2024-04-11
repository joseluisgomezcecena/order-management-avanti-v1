<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//auth routes.
$route['register'] = 'auth/register';
$route['login'] = 'auth/login';

//clients routes.
$route['clients'] = 'clients/index';
$route['clients/create'] = 'clients/create';
$route['clients/update/(:any)'] = 'clients/update/$1';
$route['clients/delete/(:any)'] = 'clients/delete/$1';
$route['clients/(:any)'] = 'clients/show/$1';

//operations routes.
$route['operations'] = 'operations/index';
$route['operations/create'] = 'operations/create';
$route['operations/update/(:any)'] = 'operations/update/$1';
$route['operations/delete/(:any)'] = 'operations/delete/$1';
$route['operations/(:any)'] = 'operations/show/$1';
$route['operations/customfields/(:any)'] = 'operations/customfields/$1';
    

//projects routes.
$route['projects'] = 'projects/index';
$route['projects/create'] = 'projects/create';
$route['projects/update/(:any)'] = 'projects/update/$1';
$route['projects/delete/(:any)'] = 'projects/delete/$1';
//$route['projects/(:any)'] = 'projects/show/$1';
$route['projects/(:any)/operations'] = 'projects/operations/$1';
$route['projects/update_order'] = 'projects/update_order';


//workorders routes.
$route['workorders'] = 'workorders/index';
$route['workorders/update/(:any)'] = 'workorders/update/$1';
$route['workorders/print/(:any)'] = 'workorders/print/$1';


//users routes.
$route['users'] = 'users/index';
$route['users/create'] = 'users/create';
$route['users/update/(:any)'] = 'users/update/$1';
$route['users/delete/(:any)'] = 'users/delete/$1';


//reports routes.
$route['reports'] = 'reports/index';

//default routes.
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
