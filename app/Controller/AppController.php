<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	 
	 public $components = array('RequestHandler', 'Session', 'Cookie', 'Sms');
	 
	  public function beforeFilter() {
			 
			// parent::beforeFilter();
			  
			if ($this->Cookie->check('Config.language')) {
				//debug($this->Session->read('Config.language'));
				Configure::write('Config.language', $this->Cookie->read('Config.language'));
			}
			$this->set('cookieHelper', $this->Cookie);
		}
		
	 public function beforeRender(){
		 	$this->set($this->setPageMeta());
		 	$this->layout = 'custom';
			//debug($this->Sms->send(SMS_TEMP_REGISTRATION,  array('%username%' => 'rohit', '%registeredEmail%'  => 'rohit@rohit.com'), '9823074560'));exit;
		 }
		 
	 protected function setPageMeta(){
		$pageMetaArray = array(
			'pageTitle' => 'Dhanghar Vivaah',
			'pageKeyword' => 'Dhanghar Vivaah',
			'pageDesc' => 'Dhanghar Vivaah'
		);
		
		$wholeMetaArray = Configure::read('metaTags');
		if(isset($wholeMetaArray[$this->request->controller][$this->request->action])){
			$pageMetaArray = $wholeMetaArray[$this->request->controller][$this->request->action];
		}
		
		return $pageMetaArray;
	}
	 
}
