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


$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
