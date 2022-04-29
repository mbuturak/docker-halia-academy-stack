<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//CMS Routes
$route['cms'] = 'Dashboard';
$route['cms-login'] = 'DashboardUser/loginForm';

//Manage Home
$route['manage-home'] = 'DashboardHome';
$route['manage-home-save/(:any)'] = 'DashboardHome/saveHeroDetails/$1';
$route['edit-home/(:any)'] = 'DashboardHome/editHeroItem/$1';
$route['new-hero'] = 'DashboardHome/newHero';
$route['new-features'] = 'DashboardHome/newFeatures';
$route['edit-features/(:any)'] = 'DashboardHome/editFeaturesItem/$1';

//Manage Contact
$route['manage-contact'] = 'DashboardContact';

//Manage About
$route['manage-about'] = "DashboardAbout";

//Manage Menu
$route['manage-menu'] = 'DashboardMenu';
$route['edit-menu/(:any)'] = 'DashboardMenu/editMenuForm/$1';
$route['new-menu'] = 'DashboardMenu/newMenuForm';

//Manage Partners
$route['manage-partners'] = 'DashboardPartners';
$route['edit-partners/(:any)'] = 'DashboardPartners/editPartnersForm/$1';
$route['new-partners'] = 'DashboardPartners/newPartnersForm';

//Manage Copyrights
$route['manage-copyrights'] = 'DashboardCopyrights';
$route['edit-copyrights/(:any)'] = 'DashboardCopyrights/editCopyrightsForm/$1';
$route['new-copyrights'] = 'DashboardCopyrights/newCopyrightsForm';

//Manage Settings
$route['manage-settings'] = 'DashboardSettings';

//Manage Comments
$route['manage-comment'] = 'DashboardComment';
$route['new-comment'] = 'DashboardComment/newCommentForm';
$route['edit-comment/(:any)'] = 'DashboardComment/editComment/$1';

//Manage Keywords
$route['manage-keywords'] = 'DashboradKeywords';
$route['new-keywords'] = 'DashboradKeywords/newKeywords';
$route['edit-keywords/(:any)'] = 'DashboradKeywords/editKeywordForm/$1';

//Manage Product
$route['manage-hardware'] = 'DashboardHardware';
$route['new-hardware'] = 'DashboardHardware/newHardware';
$route['edit-hardware/(:any)'] = 'DashboardHardware/editHardwareForm/$1';

//Pages
$route['welcome'] = 'Home';
$route['details/(:any)'] = 'Pages/pageDetails/$1';
$route['features/(:any)'] = 'Pages/featuresDetails/$1';
$route['contact'] = 'Contact';
$route['who-us'] = 'About';
$route['shop/'] = 'Shop';
$route['shop/(:any)'] = 'Shop/getProduct/$1';
$route['product-details/(:any)'] = 'Shop/getProductDetails/$1';
