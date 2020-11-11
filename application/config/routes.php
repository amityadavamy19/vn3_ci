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
$route['admin'] = 'admin/login';
$route['default_controller'] = "home";
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;


/*********** USER DEFINED ROUTES *******************/

$route['admin/loginMe'] = 'admin/login/loginMe';
$route['admin/dashboard'] = 'admin/user';
$route['admin/logout'] = 'admin/user/logout';
$route['admin/userListing'] = 'admin/user/userListing';
$route['admin/userListing/(:num)'] = "admin/user/userListing/$1";
$route['admin/addNew'] = "admin/user/addNew";
$route['admin/addNewUser'] = "admin/user/addNewUser";
$route['admin/editOld'] = "admin/user/editOld";
$route['admin/editOld/(:num)'] = "admin/user/editOld/$1";
$route['admin/editUser'] = "admin/user/editUser";
$route['admin/deleteUser'] = "admin/user/deleteUser";
$route['admin/profile'] = "admin/user/profile";
$route['admin/profile/(:any)'] = "admin/user/profile/$1";
$route['admin/profileUpdate'] = "admin/user/profileUpdate";
$route['admin/profileUpdate/(:any)'] = "admin/user/profileUpdate/$1";

$route['admin/loadChangePass'] = "admin/user/loadChangePass";
$route['admin/changePassword'] = "admin/user/changePassword";
$route['admin/changePassword/(:any)'] = "admin/user/changePassword/$1";
$route['admin/pageNotFound'] = "admin/user/pageNotFound";
$route['admin/checkEmailExists'] = "admin/user/checkEmailExists";
$route['admin/login-history'] = "admin/user/loginHistoy";
$route['admin/login-history/(:num)'] = "admin/user/loginHistoy/$1";
$route['admin/login-history/(:num)/(:num)'] = "admin/user/loginHistoy/$1/$2";

$route['admin/forgotPassword'] = "admin/login/forgotPassword";
$route['admin/resetPasswordUser'] = "admin/login/resetPasswordUser";
$route['admin/resetPasswordConfirmUser'] = "admin/login/resetPasswordConfirmUser";
$route['admin/resetPasswordConfirmUser/(:any)'] = "admin/login/resetPasswordConfirmUser/$1";
$route['admin/resetPasswordConfirmUser/(:any)/(:any)'] = "admin/login/resetPasswordConfirmUser/$1/$2";
$route['admin/createPasswordUser'] = "admin/login/createPasswordUser";
//gallery
$route['admin/galleryListing'] = "admin/gallery/galleryListing";
$route['admin/gallery/addNew'] = "admin/gallery/addNew";

//Flower
$route['admin/flowerListing'] = "admin/flower/flowerListing";
$route['admin/flower/addNew'] = "admin/flower/addNew";

//Services
$route['admin/serviceListing'] = "admin/service/serviceListing";
$route['admin/service/addNew'] = "admin/service/addNew";


//Orders
$route['admin/orders'] = "admin/reports";
$route['admin/orders/addorder'] = "admin/reports/addOrder";
$route['admin/orders/assign/(:num)'] = "admin/reports/assignOrder/$1";
$route['admin/awb/track'] = "admin/reports/track";
$route['admin/pincode/view'] = "admin/reports/viewPincode";
$route['admin/pincode/add'] = "admin/reports/addPincode";
$route['admin/pincode/edit/(:num)'] = "admin/reports/pincodeEdit/$1";

$route['admin/courier/add'] = "admin/reports/addCourier";
$route['admin/courier/view'] = "admin/reports/viewCourier";




$route['admin/courier/courierEdit/(:num)'] = "admin/reports/courierEdit/$1";
$route['admin/courier/addQuote/(:num)'] = "admin/reports/addQuote/$1";
$route['admin/courier/viewQuote/(:num)'] = "admin/reports/viewQuote/$1";
$route['admin/otype/view'] = "admin/reports/viewOrdType";
$route['admin/otype/add']= "admin/reports/addOtype";
$route['admin/otype/edit/(:num)']= "admin/reports/editOtype/$1";

$route['admin/cargo/add'] = "admin/reports/addCargo";
$route['admin/cargo/view'] = "admin/reports/viewCargo";
$route['admin/api/add'] = "admin/reports/editApi";
$route['admin/api/view'] = "admin/reports/viewApi";
$route['admin/userslist/view'] = "admin/reports/userView";




/***** Vendor User Frontend ******/

$route['vendor/dashboard'] = "vendor/vendor";
//Login
$route['vendor/login'] = "vendor/auth";
$route['vendor/signup'] = "vendor/auth/signup";
//profile
$route['vendor/profile'] = "vendor/vendor/profile";
//Track
$route['vendor/track'] = "vendor/vendor/track";
//Contact
$route['vendor/pincodes'] = "vendor/vendor/pincodes";
$route['vendor/pincode/add'] = "vendor/vendor/addPincode";
$route['vendor/pincode/edit/(:num)'] = "vendor/vendor/edit/$1";
$route['vendor/rider/assign/(:any)'] = "vendor/vendor/assign/$1";
$route['vendor/riderOrders/(:num)'] = "vendor/vendor/riderOrders/$1";


$route['vendor/couriers'] = "vendor/vendor/couriers";
$route['vendor/courier/assignPincode/(:num)'] = "vendor/vendor/assignPincode/$1";

$route['vendor/orders'] = "vendor/vendor/orders";
$route['vendor/newOrder'] = "vendor/vendor/newOrder";
$route['vendor/invoices'] = "vendor/vendor/invoices";
$route['vendor/terms'] = "vendor/vendor/terms";
$route['vendor/about'] = "vendor/vendor/about";
$route['vendor/inter'] = "vendor/vendor/inter";
$route['vendor/account'] = "vendor/vendor/account";
$route['vendor/account/(:num)'] = "vendor/vendor/account/$1";
$route['vendor/riders'] = "vendor/vendor/riders";
$route['vendor/riders/(:num)'] = "vendor/vendor/riders/$1";
$route['vendor/clients'] = "vendor/vendor/clients";
$route['vendor/clients/(:num)'] = "vendor/vendor/clients/$1";
$route['vendor/earning'] = "vendor/vendor/earning";
$route['vendor/quote'] = "vendor/vendor/quote";
$route['vendor/quote/(:num)'] = "vendor/vendor/quote/$1";


/***** Payment Routes ******/
$route['payment'] = "Payment";
$route['corporate/payment'] = "Payment";
$route['corporate/verify'] = "Verify";
$route['verify'] = "Verify";




/***** Corporate User Frontend ******/
$route['corporate/dashboard'] = "corporate/corporate";
//Login
$route['corporate/login'] = "corporate/auth";
$route['corporate/signup'] = "corporate/auth/signup";
//profile
$route['corporate/profile'] = "corporate/corporate/profile";
//Track
$route['corporate/track'] = "corporate/corporate/track";
//Contact
$route['corporate/orders'] = "corporate/corporate/orders";
$route['corporate/newOrder'] = "corporate/corporate/newOrder";
$route['corporate/invoices'] = "corporate/corporate/invoices";
/***** User Frontend ******/


$route['dashboard'] = "home";
//Login
$route['login'] = "login";
$route['signup'] = "login/signup";

//profile
$route['profile'] = "home/profile";
//Track
$route['track'] = "home/track";
//Contact
$route['orders'] = "home/orders";
$route['newOrder'] = "home/newOrder";
$route['home/getOid/(:num)'] = "home/getOid/$1";
$route['corporate/corporate/getOid/(:num)'] = "corporate/corporate/getOid/$1";






$route['admin/about/editAboutus'] = "admin/about/edit";
$route['admin/about/editAbout'] = "admin/about/editAbout";


$route['admin/contact/editContactus'] = "admin/contact/edit";
$route['admin/contact/editContact'] = "admin/contact/editContact";




/* End of file routes.php */
/* Location: ./application/config/routes.php */
