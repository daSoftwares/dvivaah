<?php
App::uses('Controller', 'AppController');
App::uses('UserMgmt', 'Lib');

class AdminController  extends AppController {
	
	public $uses = array('Admin','User', 'ShortlistedProfile', 'UserProfileHistory', 'Subscription', 'UserPayment');
	public $helpers = array('Html');
	
	public $components = array('Paginator');

	public function beforeFilter(){
		parent::beforeFilter();
		Configure::write('Config.language', 'eng');
		$this->UserMgmt = new UserMgmt;
	    }
	
	public function beforeRender(){
		 	parent::beforeRender();
			$this->layout = 'admin';
			
			if(!in_array($this->action, array('index', 'forgotPassword'))){
				if(!$this->Session->check('admin')){
					$this->Session->setFlash(__('Please login to perfom any action.'));
					$this->redirect(Configure::read('App.fullBaseUrl').'admin/index.html');
				}
			}
		 }
	public function index(){
		
		if($this->Session->check('admin')){
			$this->redirect(Configure::read('App.fullBaseUrl').'admin/dashboard.html');
		}
		
		$msgClass = $msgText = NULL;
		
			if($this->request->isPost()){	
				try{
					$msgClass = MSG_ERROR;
					$msgText = __('Invalid Login details or Account is Inactive.');
				
				//$this->render('forgot_password', null, null);
				$email = $this->request->data['email'];
				$password = $this->request->data['password'];
				
				if($data = $this->Admin->find('first', array(
					'conditions' => array(
						'OR' => array('user_name' => $email, 'email' => $email),
						'AND' => array('password'=> $password, 'is_active' => 1)
							)
						)
					)
				){
					$this->Session->write('admin', (object)$data['Admin']);
					$this->redirect(HTTP_PATH.'admin/dashboard.html');	
				}
			 }catch(Exception $e){
					$msgClass = MSG_ERROR;
					$msgText = $e->getMessage();
		 	}
		 }
		 $this->set(compact('msgClass', 'msgText'));	
	}

	public function forgotPassword() {

	}
	
	public function dashboard() {
		//debug($this->Session->read('admin')->role);exit;
		$this->set('totalUser', $this->User->find('count'));
		
		$this->set('totalActiveUser', $this->User->find('count', array(
							'conditions' => array('is_active' => 1,
							'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 0,
							)
						)
					)
				);
				
		$this->set('totalActiveMUser', $this->User->find('count', array(
							'conditions' => array('is_active' => 1, 'user_type' => 1,
							'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 0,
							)
						)
					)
				);
				
		$this->set('totalActiveFUser', $this->User->find('count', array(
							'conditions' => array('is_active' => 1, 'user_type' => 0,
							'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 0,
							)
						)
					)
				);
				
		$this->set('totalPaidUser', $this->User->find('count', array(
							'conditions' => array('is_active' => 1, 'sub_id >' => 1,
							'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 0,
							)
						)
					)
				);
				
		$this->set('less30VUser', $this->User->find('count', array(
							'conditions' => array(
								'is_active' => 1, 
								'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 0,
								'allow_days - (to_days(NOW()) - to_days(date_created)) <=' => 30,
								)
						)
					)
				);
				
		$this->set('onlineUser', $this->User->find('count', array(
							'conditions' => array(
								'registered_source' => 'online'
								)
						)
					)
				);
				
		$this->set('manualUser', $this->User->find('count', array(
							'conditions' => array(
								'registered_source' => 'admin'
								)
						)
					)
				);
				
		$this->set('revenueMonthly', $this->UserMgmt->processSearchResults($this->UserPayment->find('all', array(
							'fields' => array('SUM(sub_amount) AS monthly'),
							'conditions' => array(
									'date_created BETWEEN ? AND ?' =>  array(date('Y-m-01') ,  date('Y-m-t'					))
							)								
						)
					)
				));
		
		$this->set('revenueYearly',  $this->UserMgmt->processSearchResults($this->UserPayment->find('all', array(
							'fields' => array('SUM(sub_amount) AS yearly'),
							'conditions' => array(
									'date_created BETWEEN ? AND ?' =>  array(date('Y-01-01') ,  date('Y-m-t'					))
							)								
						)
					)
				));
	}
	
	public function registerAUser() {
		$msgClass = $msgText = NULL;
		
			if($this->request->isPost()){
				if(isset($this->request->data['dob'])){
					$this->request->data['age'] = $this->UserMgmt->calculateAge($this->request->data['dob']);
				}
				$this->User->set($this->request->data);
				//debug($this->User->validates());exit;
				if($this->User->validates()){
					//$this->User->read(null, $user_id);
					$this->User->id =  $user_id;
					$this->User->set($this->request->data);
					$this->User->save();
					$this->User->clear();
					//debug($this->request->data);	
					$msgClass = MSG_SUCCESS;
					$msgText = __('User Added Succesfully.');
				}else{
					$msgClass = MSG_ERROR;
					$msgText = $this->UserMgmt->formatizeValidationData($this->User->validationErrors);
				}
		
		}
		$this->set(compact('msgClass', 'msgText'));		
	}
	
	public function users() {
		$this->Paginator->settings['limit'] = RECORD_PER_PAGE;
		
		$this->Paginator->settings['fields'] = array('id','full_name', 'email', 'user_name','sub_name','user_registered_on','registered_source','date_created','user_type', 'is_active');
		
		if(isset($this->request->query['user'])){
			$userCond = $this->request->query['user'];
			switch($userCond){
					case 'active_users':
						$this->Paginator->settings['conditions'] = array(
						'is_active' => 1,
						'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 0,
						);
						
					break;
					
					case 'paid_users':
						$this->Paginator->settings['conditions'] = array(
							'is_active' => 1, 
							'sub_id >' => 1,
							'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 0,
							);
					break;
					
					case 'female_users': 
						$this->Paginator->settings['conditions'] = array(
							'is_active' => 1, 
							'user_type' => 0,
							'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 0,
							);
					break;
					
					case 'male_users':
						$this->Paginator->settings['conditions'] = array(
							'is_active' => 1, 
							'user_type' => 1,
							'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 0,
							);
					break;
					
					case 'online_users':
						$this->Paginator->settings['conditions'] = array('registered_source' => 'online');
					break;
					
					case 'admins_users':
						$this->Paginator->settings['conditions'] = array('registered_source' => 'admin');
					break;
					
					case 'less30_users':
						$this->Paginator->settings['conditions'] = array('is_active' => 1,	'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 0,
								'allow_days - (to_days(NOW()) - to_days(date_created)) <=' => 30,
								);
					break;
					
					case 'inactive_users':
						$this->Paginator->settings['conditions'] = array('is_active' => 0);
					break;
				
					default: 
					break;
				}
				
		}elseif(isset($this->request->query['term'])){
			$search_term = $this->request->query['term'];
			
			$this->Paginator->settings['conditions'] = array('OR' => array(
					'id' => $search_term,
					'full_name LIKE' => '%'.$search_term.'%',
					'email' => $search_term,
					'user_name' => $search_term,
				)
			);
		}
		
		$this->set('users', ($this->UserMgmt->processSearchResults($this->Paginator->paginate('User'))));
	}
	
	
	public function revenue(){
		$data = array('total' => 0, 'cheque' => 0, 'online' => 0, 'cash'=> 0);
		if($this->request->isPost()){
				$start = date('Y-m-d', strtotime($this->request->data['start']));
				$end = date('Y-m-d', strtotime($this->request->data['end']));
				
				$payment = $this->UserPayment->find('all', 
						array(
							'fields' => array('sub_amount','payment_mode'),
							'conditions' => 
											array(
											'date_created >=' => $start,
											'date_created <=' => $end
											)));
				
				$payment = $this->UserMgmt->processSearchResults($payment);
				foreach($payment as $key => $obj){
					$data['total'] += $obj->sub_amount;
					if($obj->payment_mode == 'pay-by-cheque'){
						$data['cheque'] += $obj->sub_amount;
					}elseif($obj->payment_mode == 'pay-by-online'){
						$data['online'] += $obj->sub_amount;
					}elseif($obj->payment_mode == 'pay-by-cash'){
						$data['cash'] += $obj->sub_amount;
					}
				}//debug($data);exit;
			}
		$this->set(compact('data'));		
	}
	
	public function approveProfileImage(){
		
		if($this->request->isAjax()){
			$this->layout = null;
			$this->autoRender = false;
			$id = $this->request->data['id'];
			$status = ($this->request->data['status'] == 'yes') ? STATUS_IMG_APPROVED : STATUS_IMG_REJECTED;
			$this->User->id = $id;
			$this->User->set('img_status', $status);
			$this->User->save();
			echo 'Action taken succesfully.';
		}else{
		$this->Paginator->settings['limit'] = RECORD_PER_PAGE;
		$this->Paginator->settings['fields'] = array('id','full_name', 'email', 'user_name','sub_name', 'full_pic', 'mob_no');
		
		$this->Paginator->settings['conditions'] = array('img_status' => STATUS_IMG_SENT_FOR_APPROVAL,'is_active' => 1);
		
		$this->set('users', ($this->UserMgmt->processSearchResults($this->Paginator->paginate('User'))));
		}
	}
	
	public function logout(){
		$this->Session->destroy();
		$this->redirect(Configure::read('App.fullBaseUrl').'admin/index.html');	
	}
	
	public function updateUserSetting($user_id = 0){
		if($this->request->isAjax()){
			 if(count($this->request->data)){
				
			}	
			
			$user =  $this->User->findById($user_id, array('first_name', 'email', 'user_name', 'mob_no', 'date_created'));
				//debug($user);
			$this->set('user', $this->UserMgmt->processSearchResults($user));	
		}
		$this->render('updateUserSetting', "ajax");
	}
}
