<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'index', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/registerFree', array('controller' => 'index', 'action' => 'registerFree'));
	Router::connect('/contactUs', array('controller' => 'index', 'action' => 'contactUs'));
	Router::connect('/toMarathi', array('controller' => 'index', 'action' => 'toMarathi'));
	Router::connect('/toEnglish', array('controller' => 'index', 'action' => 'toEnglish'));
	Router::connect('/login', array('controller' => 'index', 'action' => 'login'));
	Router::connect('/forgotPassword/*', array('controller' => 'index', 'action' => 'forgotPassword'));
	Router::connect('/logout', array('controller' => 'index', 'action' => 'logout'));
	Router::connect('/search/*', array('controller' => 'index', 'action' => 'search'));
	Router::connect('/verify/*', array('controller' => 'index', 'action' => 'verify'));
	Router::connect('/aboutUs', array('controller' => 'index', 'action' => 'aboutUs'));
	Router::connect('/subscription', array('controller' => 'index', 'action' => 'subscription'));
	Router::connect('/terms', array('controller' => 'index', 'action' => 'termsAndCondition'));
	Router::connect('/contactUs', array('controller' => 'index', 'action' => 'contactUs'));
	
	
	Router::connect('/profile/*', array('controller' => 'user', 'action' => 'profile'));
	Router::connect('/editProfile/*', array('controller' => 'user', 'action' => 'editProfile'));
	Router::connect('/viewHistory/*', array('controller' => 'user', 'action' => 'viewUserHistory'));
	Router::connect('/userShortList/*', array('controller' => 'user', 'action' => 'userShortList'));
	Router::connect('/addToShortList/*', array('controller' => 'user', 'action' => 'addToShortList'));
	Router::connect('/getContactDetails/*', array('controller' => 'user', 'action' => 'getContactDetails'));
	Router::connect('/subcription/*', array('controller' => 'user', 'action' => 'subcription'));
	Router::connect('/upgradeSubcription/*', array('controller' => 'user', 'action' => 'upgradeSubcription'));
	Router::connect('/imgCropToFile', array('controller' => 'user', 'action' => 'imgCropToFile'));
	Router::connect('/imgSaveToFile', array('controller' => 'user', 'action' => 'imgSaveToFile'));
	Router::connect('/changePassword', array('controller' => 'user', 'action' => 'changePasswd'));
	
	Router::parseExtensions('html');
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
// http://login.smsgatewayhub.com/smsapi/pushsms.aspx?user=tusharughade&pwd=197571&to=7709655275&sid=WEBSMS&msg=dear%20rohit,%20you%20have%20registered%20succesfully.&fl=0