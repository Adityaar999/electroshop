<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']   = 'auth';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth']               = 'auth/index';
$route['auth/login']         = 'auth/login';
$route['auth/logout']        = 'auth/logout';

$route['shop']               = 'shop/index';
$route['shop/create']        = 'shop/create';
$route['shop/store']         = 'shop/store';
$route['shop/edit/(:num)']   = 'shop/edit/$1';
$route['shop/update/(:num)'] = 'shop/update/$1';
$route['shop/delete/(:num)'] = 'shop/delete/$1';
$route['shop/delete_all']    = 'shop/delete_all';
$route['shop/search']        = 'shop/search';
$route['shop/detail/(:num)'] = 'shop/detail/$1';

$route['katalog']            = 'shop/katalog';
$route['katalog/(:any)']     = 'shop/katalog/$1';

$route['shop/varian/(:num)']        = 'shop/varian/$1';
$route['shop/varian_store/(:num)']  = 'shop/varian_store/$1';
$route['shop/varian_edit/(:num)']   = 'shop/varian_edit/$1';
$route['shop/varian_update/(:num)'] = 'shop/varian_update/$1';
$route['shop/varian_delete/(:num)'] = 'shop/varian_delete/$1';