<?php
App::uses('Controller', 'AppController');
App::uses('UserMgmt', 'Lib');

class IndexController extends AppController {
	
	public $components = array(
		'Search.Prg',
		'Paginator'
	);
	
	public $uses = array('User', 'ShortlistedProfile', 'Subscription');
	
	public function beforeFilter(){
		parent::beforeFilter();
		//echo Configure::read('Config.language');exit;
		$this->UserMgmt = new UserMgmt;
		
		$totalShortListCount = 0;
		if($this->Session->check('id')){
			$totalShortListCount =  $this->ShortlistedProfile->find('count', array(
							'conditions' => array('add_by' => $this->Session->read('id')),
							'recursive' => -1)
							);
		}
		$this->set(compact('totalShortListCount'));
	}
	
	public function index(){
			//echo $this->UserMgmt->calculateAge('01/22/1987');exit;
		}
		
	public function registerFree(){
		$msgClass = $msgText = NULL;
		//	debug($this->request->data);
		if($this->request->isPost()){
			
		// Lets register user as free
		$subs = $this->Subscription->findBySubId(1, array('sub_id', 'sub_name', 'sub_amount','allow_days', 'allow_profile'));
		$data = array_merge($this->request->data, $subs['Subscription']);
		$data = $this->UserMgmt->processUserInfo($data);
		$data['user_registered_on'] = date('Y-m-d H:i:s');
		//print_r($data);exit;
		$this->User->create();
		$this->User->set($data);
		
		if($this->User->validates()){
				$this->User->save();
			
				try{
					$msgClass = MSG_SUCCESS;
				    $msgText = __('Registration Successfull.');
				
					// now send registration mail
					$msgText .= '<br><br>'.$this->UserMgmt->sendWelcomeEmail($data);
					
					// now send registration sms
					// if Mobile field is empty no SMS will sent
					if(!empty($data['mob_no'])){
						$this->Sms->send(SMS_TEMP_REGISTRATION, 
							array('%username%' =>  $data['user_name'], 
								  '%registeredEmail%'  => $data['email']),
							  $data['mob_no']);
					}
				}catch(Exception $e){
					$msgClass = MSG_ERROR;
					$msgText = $e->getMessage();
				}
				
			}else{
				$msgClass = MSG_ERROR;
				$msgText = $this->UserMgmt->formatizeValidationData($this->User->validationErrors);
			}
		}
		$this->set(compact('msgClass', 'msgText'));
	}
		
	public function verify($code = 'igu64g98vbdl9ljlbvaq', $email = 'example@example.com') {
		$msgClass = $msgText = NULL;
		// verify code is valid for user or not
		//debug($this->User->findByEmailAndVerificationCode($email, $code, array('id')));
		$this->User->recursive = -1;
		if($data = $this->User->findByEmailAndVerificationCode($email, $code, array('id'))){
			
			$data = $data['User'];
			
			$this->User->id = $data['id'];
			$this->User->set(array(
						'verification_code' => '', 
						'is_email_verified'=> 1, 
						'is_active' => 1,
						'date_updated' => date('Y-m-d H:i:s')
					));
			$this->User->save();
			$msgClass = MSG_SUCCESS;
			$msgText = __('You have verified successfully, Please login to access your account.');
		}else{
			$msgClass = MSG_ERROR;
			$msgText = __('Verification fails, invalid code or email.');
		}
		
		$this->set(compact('msgClass', 'msgText'));
	}
	
	public function forgotPassword($email = 'example@example.com'){
		
		$flag = 0;
		
		$this->autoRender = false;
		$this->layout = 'ajax';
		
		if($this->request->isPost() && $this->request->isAjax()){	
		
			try{
			//$this->render('forgot_password', null, null);
			$this->User->recursive = -1;
			if($data = $this->User->findByEmailAndIsEmailVerifiedAndIsActive($email, 1, 1, array('id', 'user_name', 'email', 'mob_no'))){
				$data = $data['User'];
				$data['password'] = rand();
				
				$this->User->id = $data['id'];
				$this->User->set(array(
						'password' => $data['password'], 
						//'date_updated' => CakeTime::toServer(time())
					));
				$this->User->save();
				
				$this->UserMgmt->sendEmailForgotPassword($data);
				
				// Mobile field is empty no SMS will sent
				if(!empty($data['mob_no'])){
					$this->Sms->send(SMS_TEMP_CHANGE_PASSWORD, 
						array('%username%' =>  $data['user_name'], 
							  '%tempPassword%'  => $data['password']),
						  $data['mob_no']);
				}
				$flag = 1;
				
				}else{
					$flag = __('Invalid Email id.');
				}
			}catch(Exception $e){
				$flag = $e->getMessage();
			}
		 }
		 echo $flag;
	}
	
	public function login(){
		$flag = __('Invalid Login details or Account is Inactive.');
		$this->autoRender = false;
		$this->layout = 'ajax';
		
		try{
		if($this->request->isPost() && $this->request->isAjax()){	
			//$this->render('forgot_password', null, null);
			$email = $this->request->data['email'];
			$password = $this->request->data['password'];
			$this->User->recursive = -1;
			if($data = $this->User->find('first', array(
				'conditions' => array(
					'OR' => array('user_name' => $email, 'email' => $email),
					'AND' => array('password'=> $password, 'is_email_verified' => 1, 'is_active' => 1)
				)
			
			, 'fields' => array('id', 'user_name', 'email', 'sub_id', 'allow_days', 'allow_profile', 'date_created')))){
			
			$expiry = $this->UserMgmt->calculateExpiry($data['User']['allow_days'], $data['User']['date_created']);
				if($expiry > 0){
					$this->Session->write($data['User']);
					$this->Session->write('expiry', $expiry);
					//echo $this->Session->read('expiry');exit;
					$flag = 1;
					}
				}
			 }
		 
		 }catch(Exception $e){
			$flag = $e->getMessage();
		 }
		 
		 echo $flag;
	}
	
	public function toMarathi(){
		$this->autoRender = false;
		 $this->Cookie->write('Config.language', 'mar');
		 $this->redirect(Configure::read('App.fullBaseUrl'));
	}
	
	public function toEnglish(){
		$this->autoRender = false;
		$this->Cookie->write('Config.language', 'eng');
		$this->redirect(Configure::read('App.fullBaseUrl'));
	}
	
	public function search(){
		
		$user_id = $this->Session->check('id') ? $this->Session->read('id') : 0;
		
		$this->Prg->commonProcess();
		
		$this->Paginator->settings['limit'] = RECORD_PER_PAGE;
		
		$this->Paginator->settings['fields'] = array('id','full_name', 'img_status', 'profile_pic', 'complextion','age', 'height','sub_cast','education','service','annual_income','residence');
		
		$parsedParam  = $this->Prg->parsedParams();
		//$impParam = array('is_active' => 1);
		$parsedParam['is_active'] = 1;
		$parsedParam['is_email_verified'] = 1;
		$parsedParam['accept_terms'] = 1;
		
		
		$this->Paginator->settings['conditions'] = array_merge($this->User->parseCriteria($parsedParam), array('User.id !=' => $user_id));
		//debug($this->Paginator->settings['conditions']);exit;
		$this->set('users', ($this->UserMgmt->processSearchResults($this->Paginator->paginate())));
	}
	
	public function logout(){
		$this->Session->destroy();
		$this->Cookie->delete('alreadySuggested');
		$this->redirect(Configure::read('App.fullBaseUrl'));	
	}
	
	public function aboutUs(){
	
	}
	
	public function subscription(){
	
	}
	
	public function termsAndCondition(){
	
	}
	
	public function contactUs(){
	
	}
}
