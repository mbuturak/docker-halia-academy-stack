<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

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

//Manage Apply
$route['manage-apply'] = "DashboardApply";

//Manage Training
$route['manage-training'] = "DashboardTraining";
$route['new-training'] = "DashboardTraining/newTrainingForm";
$route['edit-training/(:any)'] = "DashboardTraining/editTraining/$1";

//Manage Achievements
$route['manage-achievements'] = "DashboardAchievements";
$route['new-achievements'] = "DashboardAchievements/newAchievementsForm";
$route['edit-achievements/(:any)'] = "DashboardAchievements/editAchievementsForm/$1";

//Manage Tutor
$route['manage-tutor'] = "DashboardTutor";
$route['new-tutor'] = "DashboardTutor/newTutorForm";
$route['edit-tutor/(:any)'] = "DashboardTutor/editTutor/$1";

//Manage Copyrights
$route['manage-copyrights'] = 'DashboardCopyrights';
$route['edit-copyrights/(:any)'] = 'DashboardCopyrights/editCopyrightsForm/$1';
$route['new-copyrights'] = 'DashboardCopyrights/newCopyrightsForm';

//Manage Menu
$route['manage-menu'] = 'DashboardMenu';
$route['edit-menu/(:any)'] = 'DashboardMenu/editMenuForm/$1';
$route['new-menu'] = 'DashboardMenu/newMenuForm';


//Manage Blog
$route['manage-blog'] = "DashboardBlog";
$route['new-blog'] = "DashboardBlog/newBlogForm";
$route['edit-blog/(:any)'] = "DashboardBlog/editBlogForm/$1";

//Manage Keywords
$route['manage-keywords'] = 'DashboradKeywords';
$route['new-keywords'] = 'DashboradKeywords/newKeywords';
$route['edit-keywords/(:any)'] = 'DashboradKeywords/editKeywordForm/$1';

//Manage Comments
$route['manage-comment'] = 'DashboardComment';
$route['new-comment'] = 'DashboardComment/newCommentForm';
$route['edit-comment/(:any)'] = 'DashboardComment/editComment/$1';

//Pages
$route['welcome'] = 'Home';
$route['training-calendar'] = 'Trainings/pageDetails';
$route['course/(:any)'] = 'Trainings/trainingDetails/$1';
$route['tutors'] = 'Tutors/pageDetails';
$route['tutor-info/(:any)'] = 'Tutors/tutorDetails/$1';
$route['blog'] = 'Blog/pageDetails';
$route['blog-details/(:any)'] = 'Blog/blogDetails/$1';
