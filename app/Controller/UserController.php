<?php
App::uses('Controller', 'AppController');
App::uses('UserMgmt', 'Lib');

class UserController  extends AppController {
	
	public $uses = array('User', 'ShortlistedProfile', 'UserProfileHistory', 'Subscription', 'UserPayment');
	public $helpers = array('Html');

	public function beforeFilter(){
		parent::beforeFilter();
		
		// redirect if user is not logged in
		if (!$this->Session->check('user_name')) {
				$this->Session->setFlash(__('Please login to perfom any action.'));
				$this->redirect(Configure::read('App.fullBaseUrl'));
			}
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
			$this->set('userMgmt', $this->UserMgmt);
	    }
	
	public function index(){
		
		}
		
	public function profile($user_id = 0){
		$msgClass = $msgText = NULL;
		$userDetails = $suggestedProfile = array();
		
		if($user_id == 0 || ($user_id == $this->Session->read('id'))){
			$user_id = $this->Session->read('id');
			$user_info = $this->User->read(null, $user_id);
			$userDetails = $user_info['User'];
		}
		elseif($this->Session->read('allow_profile') > 0){
			if($user_info = $this->User->read(null, $user_id)){
				$userDetails = $user_info['User'];
			}else{
				$msgClass = MSG_ERROR;
				$msgText = __('No Record Found!');	
			}
		}else{
			$msgClass = MSG_ERROR;
			$msgText = __('YOU ARE NOT A PAID SUBSCRIBED USER PLEASE <a href="'.PAGE_USER_SUBS.'">CLICK HERE</a> TO SUBSCRIBE AND GET MORE FEATURES.');	
		}
		//debug($userDetails);
		
		if(!empty($userDetails)){
				$this->User->clear();
				
				$suggestedProfile = $this->UserMgmt->processSearchResults($this->User->find('all', array(
						'conditions' => array(
							'user_type' => !($userDetails['user_type']),
							'OR' => array(
									'education' => $userDetails['exp_education'],
									'service' =>  $userDetails['exp_service'],
								),
							'is_active' => 1,
							'is_email_verified' => 1,
							'accept_terms' => 1
							),
						'fields' => array('id','full_name', 'profile_pic', 'complextion','age', 'height','sub_cast','education','service','annual_income','residence'),
						'limit' => 3
					)
				));
				
			}
		
		$this->set(compact('userDetails','msgClass', 'msgText', 'suggestedProfile'));				
		
	}
	
	
	public function editProfile($user_id = 0){
		$msgClass = $msgText = NULL;
		
		$userDetails = array();
		
		if($user_id === $this->Session->read('id')){
			
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
					$msgText = __('Data Updated Succesfully.');
				}else{
					$msgClass = MSG_ERROR;
					$msgText = $this->UserMgmt->formatizeValidationData($this->User->validationErrors);
				}
			}
			
			$user_info = $this->User->findById($user_id);
			$userDetails = $user_info['User'];
		}else{
			$msgClass = MSG_ERROR;
			$msgText = __('You are not allowed to access this page.');	
		}
		
		//debug($userDetails);
		$this->set(compact('userDetails','msgClass', 'msgText'));				
		
	}
	
	public function viewUserHistory($user_id = 0){
		$msgClass = $msgText = NULL;
		$userDetails = array();
		
		if($user_id == 0 || ($user_id == $this->Session->read('id'))){
			$user_id = $this->Session->read('id');
			
			//SELECT * FROM wp_posts WHERE datediff(now(),post_date)> 0 && datediff(now(),post_date) < 90
			$userDetails = $this->UserProfileHistory->find('all', 
					array(
						'fields' => array('User.id', 'User.full_name', 'date_added'), 
						'conditions' =>  array(
										'add_by' => $user_id,
										'datediff(now(), date_added) > ' => 0,
										'datediff(now(), date_added) < ' => 90,
						
						), 
						'order' => array('date_added' => 'desc'),
					)
							
			);
			$userDetails = $this->UserMgmt-> processSearchResults($userDetails);
		}else{
			$msgClass = MSG_ERROR;
			$msgText = __('You are not allowed to access this page.');	
		}
		$this->set(compact('userDetails','msgClass', 'msgText'));	
	}
	
	public function userShortList($user_id = 0){
		$msgClass = $msgText = NULL;
		$userDetails = array();
		
		if($user_id == 0 || ($user_id == $this->Session->read('id'))){
			$user_id = $this->Session->read('id');
			$userDetails = $this->ShortlistedProfile->findAllByAddBy(
									$user_id,  
									array('User.id', 'User.full_name'), 
									array('date_added' => 'desc'),
									20 // limit 
							);
			$userDetails = $this->UserMgmt-> processSearchResults($userDetails);
		}else{
			$msgClass = MSG_ERROR;
			$msgText = __('You are not allowed to access this page.');	
		}
		$this->set(compact('userDetails','msgClass', 'msgText'));	
	}	
	
	public function addToShortList($profile_of = 0){
		$msgClass = $msgText = NULL;
		$userDetails = array();
		
		$this->autoRender = false;
		$this->layout = 'ajax';
		
		$user_id = $this->Session->read('id');
		$this->ShortlistedProfile->recursive = -1;
		
		if(!$this->ShortlistedProfile->findByAddByAndProfileOf($user_id, $profile_of)){
		$totalRecords = $this->ShortlistedProfile->findAllByAddBy($user_id);
		$totalRecords = $this->UserMgmt->processSearchResults($totalRecords);
		
		//sleep(10);
		if(count($totalRecords) < 20){
			// check if user already added this profile
			$flag = true;
			foreach($totalRecords as $record){
				if($record->profile_of == $profile_of){
					$flag = false;
					break;
				}
			}
			
			// if true, add to db else give warning msg
			if($flag){
				$this->ShortlistedProfile->create();
				$this->ShortlistedProfile->save(array('add_by' => $user_id, 
													  'profile_of' => $profile_of,
													  'date_added' => CakeTime::toServer(time())	
													  	));
				echo 1;
			}else{
				echo __('You have shortlisted maximum alloted profiles, Please remove earlier to short list more.');	
			}
					
		}
		}else{
			echo __('This Profile already present in your list.');	
		}
		//echo ($totalRecords);
	}
	
	public function getContactDetails($profile_of = 0){
		$msgClass = $msgText = NULL;
		$userDetails = array();
		
		$this->autoRender = false;
		$this->layout = 'ajax';
		
		$user_id = $this->Session->read('id');
		$this->UserProfileHistory->recursive = -1;
		
		if(!$this->UserProfileHistory->findByAddByAndProfileOf($user_id, $profile_of)){
		
		$totalRecords = $this->UserProfileHistory->find('all', 
			array('conditions' => array(
										'add_by' => $user_id,
										'date_added BETWEEN ? AND ?' =>  array(date('Y-m-01') ,  date('Y-m-t'					))
										)
			
			)
		);
		$totalRecords = $this->UserMgmt->processSearchResults($totalRecords);
		
		if(count($totalRecords) < $this->Session->read('allow_profile')){
			// check if user already added this profile
			$flag = true;
			foreach($totalRecords as $record){
				if($record->profile_of == $profile_of){
					$flag = false;
					break;
				}
			}
			//print_r($totalRecords);
			// if true, add to db else give warning msg
			if($flag){
				
				$this->UserProfileHistory->create();
				$this->UserProfileHistory->save(array('add_by' => $user_id, 
													  'profile_of' => $profile_of,
													  'date_added' => CakeTime::toServer(time())	
				
													  	));
				// send contat details on email and mobile
				$details = $this->User->find('all', array(
						'conditions' => array('id IN' => array($user_id, $profile_of)),
						'fields' => array('id', 'user_name','full_name' ,'email', 'mob_no','alter_mob_no', 'tel_no')));
				$details =  $this->UserMgmt->processSearchResults($details);
				//print_r($details);
				try{
				$this->UserMgmt->sendProfileDetailsOnEmail($details, $user_id);
				
				
				// Mobile field is empty no SMS will sent
				if(!empty($data['mob_no'])){
					$this->Sms->send(SMS_TEMP_PROFILE, 
						array('%username%' =>  $data['user_name'], 
							  '%registeredEmail%'  => $data['email']),
						  $data['mob_no']);
					}
					echo 1;
				}catch(Exception $e){
					echo $e->getMessage();
				}
				
				
			}else{
				echo __('You have already contacted maximum allowed profiles this month.');	
			}
					
		}
		}else{
			
			echo __('You have already recieved contact information of this profile.');	
		}
	}
	
	public function subcription($user_id = 0) {
		$subInfo = array();
		$msgClass = $msgText = NULL;
		
		if($user_id == 0 || ($user_id == $this->Session->read('id'))){
			$user_id = $this->Session->read('id');
			$subInfo = $this->User->findById($user_id, array('id', 'sub_name', 'sub_amount','allow_days', 'date_created'));
		$subInfo =  $this->UserMgmt->processSearchResults($subInfo);
		}
		$subOptions = $this->UserMgmt->processSearchResults($this->Subscription->findAllByIsActive(1, array('sub_id', 'sub_name', 'sub_amount')));
		$this->set(compact('subInfo', 'subOptions'));
	}
	
	public function upgradeSubcription($user_id = 0) {
		if($this->request->isPost()){
	
		if($user_id == 0){
			$user_id = $this->Session->read('id');
		}
		
		$this->request->data['user_id'] = $user_id;
		$this->request->data['date_created'] = CakeTime::toServer(time());
		
		if($this->data['payment_mode'] == 'pay-by-online'){
			
		}elseif($this->data['payment_mode'] == 'pay-by-cheque'){
			
			$this->UserPayment->create();
			$this->UserPayment->save($this->data);
		}
			
		$subInfo = $this->Subscription->findBySubAmountAndIsActive($this->data['sub_amount'], 1, array('sub_id', 'sub_amount', 'allow_days', 'allow_profile', 'sub_name'));
		
		// subs info for user table
		$subInfo = $this->UserMgmt->processForSubs($subInfo['Subscription'], $this->Session->read('expiry'));
		$this->User->id = $user_id;
		$this->User->set($subInfo);
		$this->User->save();
		
		$this->Session->write($subInfo);
		$this->Session->write('expiry', $subInfo['allow_days']);
		
		$this->Session->setFlash(__('You are now a paid subscribed user.'));	
		$this->redirect(PAGE_USER_SUBS);
		}
		//$this->render('subcription');
	}
	
	public function imgSaveToFile($user_id = 0){
		
		$msgClass = MSG_ERROR;
		$msgText = __('You are not allowed to access this page.');	
			
		if($this->request->isPost()){
			
			if(isset($this->request->params['form']['full_pic'])){
				
				$user_id = $this->Session->read('id');
				
				$imgName = $this->UserMgmt->uploadProfileImage($this->request->params['form']['full_pic']);
				$this->User->id = $user_id;
				$this->User->set('full_pic', $imgName);
				$this->User->save();
			
			}
			// redirect after successfull upload
			$this->redirect(PAGE_IMG_CROP);
		}
		$this->set(compact('msgClass', 'msgText'));	
	}
	
	public function imgCropToFile($user_id = 0){
		$msgClass = $msgText = $user_img =  NULL;
			$user_id = $this->Session->read('id');
			$user_img = $this->User->findById($user_id, array('full_pic'));
			$user_img = $user_img['User']['full_pic'];
			
			if($this->request->isPost()){
				//debug($this->data);
				$imgName = $this->UserMgmt->cropProfileImage($this->data, $user_img);
				//debug($imgName);
				$this->User->id = $user_id;
				$this->User->set('profile_pic', $imgName);
				$this->User->save();
				$this->redirect(PAGE_VIEW_PROFILE);
				
			}
			
			
			if(!empty($user_img)){
				$msgClass = MSG_SUCCESS;
				$msgText = __('Please crop / rotate / resize image as per your need.');
				
			}else{
				$msgClass = MSG_ERROR;
				$msgText = __('You are not allowed to access this page.');	
			}
		$this->set(compact('msgClass', 'msgText', 'user_img'));	
	}
	
	public function changePasswd(){
		$msgClass = $msgText = NULL;
		
		$user_id = $this->Session->read('id');
		if($this->request->isPost()){
			
			$this->User->set($this->data);
			
			if($this->User->validates()){
			
			// lets see if current password is correct
			if($this->User->find('count', array('conditions' => array('id' => $user_id, 'password' => $this->data['curr_password'])))){
				$this->User->clear();

				$this->User->id = $user_id;
				$this->User->set($this->data);
				$this->User->save();
				
				$msgClass = MSG_SUCCESS;
				$msgText = __('Password Changed Successfully.');
			}else{
				$msgClass = MSG_ERROR;
				$msgText = __('Please enter correct current password.');
			}
			
			}else{
				$msgClass = MSG_ERROR;
				$msgText = $this->UserMgmt->formatizeValidationData($this->User->validationErrors);
			}
		}
		$this->set(compact('msgClass', 'msgText'));
			
	}
	
	
}
