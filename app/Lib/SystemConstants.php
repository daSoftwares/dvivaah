<?php
/**
 * Site wide  configurations
 */

define('HTTP_PATH', Router::fullbaseUrl());
define('USER_PROFILE_FOLDER', 'img/userImages/');
define('USER_DEMO_PIC', HTTP_PATH.'img/default-profile-img.jpg');
define('SITE_LOGO', HTTP_PATH.'img/logo.png');

define('USER_PROFILE_ROOT_PATH', WWW_ROOT.USER_PROFILE_FOLDER);
define('USER_PROFILE_HTTP_PATH', HTTP_PATH.USER_PROFILE_FOLDER);

define('WEBSITE_NAME', 'Dhnagar Vivah');
define('WEBSITE_SUBTITLE', 'Find your soul mate at right place...');
define('WEBSITE_AUTHOR', 'Rohit Shrivastava rohit.shrivastava22@gmail.com');

// SMTP details
define('SMTP_CONF', 'site_smtp');

// MSG Class

define('MSG_ERROR', 'error-message-container'); 
define('MSG_SUCCESS', 'success-message-container');

// define website urls
define('PAGE_EXTN', '.html');
define('PAGE_HOME', HTTP_PATH);
define('PAGE_REGISTER', HTTP_PATH.'registerFree'.PAGE_EXTN);
define('PAGE_CONTACT', HTTP_PATH.'contactUs'.PAGE_EXTN);
define('PAGE_LOGIN', HTTP_PATH.'login'.PAGE_EXTN);
define('PAGE_LOGOUT', HTTP_PATH.'logout'.PAGE_EXTN);
define('PAGE_TO_MAR', HTTP_PATH.'toMarathi'.PAGE_EXTN);
define('PAGE_TO_ENG', HTTP_PATH.'toEnglish'.PAGE_EXTN);
define('PAGE_SEARCH_PROFILE', HTTP_PATH.'search');
define('PAGE_FORGOTPASSWORD', HTTP_PATH.'forgotPassword');

// Static Pages
define('PAGE_ABOUT_US', HTTP_PATH.'aboutUs'.PAGE_EXTN);
define('PAGE_SUBSCRIPTION', HTTP_PATH.'subscription'.PAGE_EXTN);
define('PAGE_TERMS', HTTP_PATH.'terms'.PAGE_EXTN);
define('PAGE_CONTACT_US', HTTP_PATH.'contactUs'.PAGE_EXTN);


define('PAGE_VIEW_PROFILE', HTTP_PATH.'profile/');
define('PAGE_EDIT_PROFILE', HTTP_PATH.'editProfile/');
define('PAGE_USER_HISTORY', HTTP_PATH.'viewHistory');
define('PAGE_USER_SLIST', HTTP_PATH.'userShortList');
define('PAGE_USER_SUBS', HTTP_PATH.'userSubscription');
define('PAGE_USER_UPGRADE_SUBS', HTTP_PATH.'upgradeSubcription');

define('PAGE_IMG_CROP', HTTP_PATH.'imgCropToFile');
define('PAGE_IMG_SAVE', HTTP_PATH.'imgSaveToFile');

define('PAGE_ADD_TO_SLIST', HTTP_PATH.'addToShortList/');
define('PAGE_GET_USER_CONTACT', HTTP_PATH.'getContactDetails/');
define('PAGE_CHANGE_PASSWD', HTTP_PATH.'changePassword/');
/**
 * Define site wide contants
 */
define('RECORD_PER_PAGE', 5);


define('SMS_TEMP_PROFILE', 'profile_details');
define('SMS_TEMP_PAYMENT', 'payment');
define('SMS_TEMP_VALIDITY_REMINDER', 'account_v_reminder');
define('SMS_TEMP_CHANGE_PASSWORD', 'change_password');
define('SMS_TEMP_REGISTRATION', 'registration');

// user image status
define('STATUS_IMG_NOT_PRESENT', '0');
define('IMG_SENT_NOT_PRESENT',  HTTP_PATH.'img/img-not-available.jpg');

define('STATUS_IMG_SENT_FOR_APPROVAL', '1');
define('IMG_SENT_FOR_APPROVAL',  HTTP_PATH.'img/img-sent-for-approval.jpg');

define('STATUS_IMG_REJECTED', '2');
define('IMG_REJECTED',  HTTP_PATH.'img/img-not-approved.jpg');

define('STATUS_IMG_APPROVED', '3');