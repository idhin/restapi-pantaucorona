<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ================ Route API ================
$route['api/positif']['GET']          = 'Pantaucorona/positif';
$route['api/meninggal']['GET']          = 'Pantaucorona/meninggal';
$route['api/sembuh']['GET']          = 'Pantaucorona/sembuh';
$route['api/global']['GET']          = 'Pantaucorona/dunia';
$route['api/indonesia']['GET']          = 'Pantaucorona/indonesia';
$route['api/indonesia/provinsi']['GET']          = 'Pantaucorona/provinsi';
$route['api/hariini']['GET']          = 'Pantaucorona/hariini';


$route['api/user/(:num)']['GET']    = 'UserController/get/$1';
$route['api/register']['POST']          = 'UserController/register';
$route['api/user/(:num)']['PUT']    = 'UserController/update/$1';
$route['api/user/(:num)']['DELETE'] = 'UserController/delete/$1';
$route['api/login']       = 'UserController/login';
$route['api/check_token'] ['GET'] = 'UserController/check_token';


$route['api/events']['GET']          = 'EventController/get_all';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
