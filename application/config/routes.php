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
$route['timkiem'] = 'timkiem';
if(_ngonngu == 1){
$route['en/timkiem'] = 'timkiem';
}

$route['cart/add/(:num)'] = 'cart/add/$1';
if(_ngonngu == 1){
$route['en/cart/add/(:num)'] = 'cart/add/$1';
}

$route['cart/del/(:num)'] = 'cart/del/$1';
if(_ngonngu == 1){
$route['en/cart/del/(:num)'] = 'cart/del/$1';
}

$route['cart/del'] = 'cart/del';
if(_ngonngu == 1){
$route['en/cart/del'] = 'cart/del';
}

$route['cart/update'] = 'cart/update';
if(_ngonngu == 1){
$route['en/cart/update'] = 'cart/update';
}

$route['order/checkout'] = 'order/checkout';
if(_ngonngu == 1){
$route['en/order/checkout'] = 'order/checkout';
}

$route['order/cartdone'] = 'order/cartdone';
if(_ngonngu == 1){
$route['en/order/cartdone'] = 'order/cartdone';
}
$route['cart'] = 'cart';
if(_ngonngu == 1){
$route['en/cart'] = 'cart';
}
$route['lien-he'] = 'lienhe';
if(_ngonngu == 1){
$route['en/contact'] = 'lienhe';
}
$route['dang-ky'] = 'dangky';
if(_ngonngu == 1){
$route['en/registration'] = 'dangky';
}

$route['san-pham/(:num)'] = 'sanpham/index/$1';
$route['san-pham'] = 'sanpham';
if(_ngonngu == 1){
$route['en/product/(:num)'] = 'sanpham/index/$1';
$route['en/product'] = 'sanpham';
}

/* Bai viet */
$route['(:any)-tt(:num)/(:num)'] = 'tintuc/catalog/$2/$3'; //PHAN TRANG 
if(_ngonngu == 1){
$route['en/(:any)-tt(:num)/(:num)'] = 'tintuc/catalog/$2/$3'; //PHAN TRANG 
}

$route['(:any)-tt(:num)'] = 'tintuc/catalog/$2';
if(_ngonngu == 1){
$route['en/(:any)-tt(:num)'] = 'tintuc/catalog/$2';
}

$route['(:any)-t(:num)'] = 'tintuc/view/$2';
if(_ngonngu == 1){
$route['en/(:any)-t(:num)'] = 'tintuc/view/$2';
}

/* Sản phẩm */
$route['(:any)-c(:num)/(:num)'] = 'product/catalog/$2/$3'; //PHAN TRANG 
if(_ngonngu == 1){
$route['en/(:any)-c(:num)/(:num)'] = 'product/catalog/$2/$3'; //PHAN TRANG 
}

$route['(:any)-c(:num)'] = 'product/catalog/$2';
if(_ngonngu == 1){
	$route['en/(:any)-c(:num)'] = 'product/catalog/$2';
}
$route['(:any)-sp(:num)'] = 'product/view/$2';
if(_ngonngu == 1){
$route['en/(:any)-sp(:num)'] = 'product/view/$2';
}

/* Defaul page: error, home */
$route['default_controller'] = 'home';
if(_ngonngu == 1){
$route['^en$'] = $route['default_controller'];
}
$route['404_override'] = 'error';
$route['translate_uri_dashes'] = FALSE;
