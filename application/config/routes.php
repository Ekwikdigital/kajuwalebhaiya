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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['product-detail/(:any)']='Product/product_detail/$1';
$route['register']='home/register';
$route['login']='home/login';
$route['account']='home/account';
$route['edit-password']='home/change_password';
$route['homes']='home/home';
$route['products/(:any)']='home/all_products/$1';
$route['allproduct/(:any)']='Product/sub_products/$1';
$route['forgotten'] = 'home/forgot';
$route['reset-password/(:any)'] = 'home/reset_password/$1';
$route['shopping-cart'] = 'cart/cart_list';
$route['about-us'] = 'home/about';
$route['privacy-policy'] = 'home/privacy';
$route['terms-condition'] = 'home/termscondition';
$route['product/(:any)'] = 'Product/product/$1';
$route['checkout'] = 'Cart/checkout';
$route['confirm-order'] = 'Cart/confirm_order';
$route['thank-you'] = 'Cart/thank_you';
$route['manage-address'] = 'home/manage_address';
$route['my-orders'] = 'home/my_orders';
$route['download_invoice'] = 'home/download_invoice';
$route['invoice/(:any)'] = 'home/invoice/$1';
$route['search'] = 'home/search';
$route['filter'] = 'home/filter';
$route['deal-of-the-week/(:any)'] = 'home/deal/$1';
$route['quickcheckout'] = 'cart/quickcheckout';
$route['order-confirm'] = 'Cart/orderconfirmation';
$route['thankyou'] = 'Cart/thanks';
$route['update-address'] = 'cart/updateaddress';
$route['address-update'] = 'cart/addressupdate';



//----------------------start admin--------------
$route['admin']='Admin/Admin_login/index';  
$route['dashboard']='Admin/Admin/Admin_dashboard'; 
$route['Admin_logout']='Admin/Admin/logout'; 
$route['profile']='Admin/Admin/profile'; 
$route['change-password']='Admin/Admin/change_password'; 
$route['categories']='Admin/Admin/categories';
$route['add_category']='Admin/Category/add_category';
$route['edit_category/(:any)']='Admin/Category/edit_category/$1';
$route['sub-categories']='Admin/Category/sub_category';
$route['add-sub-category']='Admin/Category/add_subcategory';
$route['products']='Admin/Product/index';
$route['add_product']='Admin/Product/add_product';
$route['edit_product/(:any)']='Admin/Product/edit_product/$1';
$route['pack-of-two']='Admin/Packed/index';
$route['add-pack-two']='Admin/Packed/add_product';
$route['edit-pack-two/(:any)']='Admin/Packed/edit_product/$1';
$route['deal_of_day']='Admin/Product/deal_of_day';
$route['add-deal']='Admin/Product/add_deal';
$route['customers'] = 'Admin/Admin/customers';
$route['orders'] = 'Admin/Admin/orders';
$route['transactions'] = 'Admin/Admin/transactions';
$route['edit-sub-category/(:any)']='Admin/Category/edit_subcategory/$1';
$route['reviews']='Admin/Admin/reviews';
