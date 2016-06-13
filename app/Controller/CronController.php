<?php
App::uses('Controller', 'AppController');
App::uses('UserMgmt', 'Lib');

class CronController extends AppController {
	
	public $uses = array('User');
	
	public function beforeFilter(){
		parent::beforeFilter();
		Configure::write('Config.language', 'eng');
		$this->UserMgmt = new UserMgmt;
	    }
	
	public function beforeRender(){
		 	parent::beforeRender();
			$this->layout = null;
		 }
	
	public function index(){
		
	}

	public function sendAccExpiryAlert() {
		// lets first change the status of already expired accounts
		$query = "UPDATE tbl_user SET is_active = 0 WHERE allow_days - (to_days(NOW()) - to_days(date_created)) <= 0";
		$this->User->query($query);
		
		// collect user with less than 20 days validity
		$users20 = $this->UserMgmt->processSearchResults($this->User->find('all', array(
							'conditions' => array(
								'is_active' => 1, 
								'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 20,
								'allow_days - (to_days(NOW()) - to_days(date_created)) <=' => 20,
								),
							'fields' => array(
								'id', 
								'user_name', 
								'email', 
								'mob_no',
								'allow_days - (to_days(NOW()) - to_days(date_created)) as expiry',
								'date_created'
							)
						))
					);
				
		
		// collect user with less than 10 days validity
		$users10 = $this->UserMgmt->processSearchResults($this->User->find('all', array(
							'conditions' => array(
								'is_active' => 1, 
								'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 10,
								'allow_days - (to_days(NOW()) - to_days(date_created)) <=' => 10,
								),
							'fields' => array(
								'id', 
								'user_name', 
								'email', 
								'mob_no',
								'allow_days - (to_days(NOW()) - to_days(date_created)) as expiry', 
								'date_created'
							)
						))
					);
				
		// collect user with less than 3 days validity
		$users5 = $this->UserMgmt->processSearchResults($this->User->find('all', array(
							'conditions' => array(
								'is_active' => 1, 
								'allow_days - (to_days(NOW()) - to_days(date_created)) >=' => 5,
								'allow_days - (to_days(NOW()) - to_days(date_created)) <=' => 5,
								),
							'fields' => array(
								'id', 
								'user_name', 
								'email', 
								'mob_no',
								'allow_days - (to_days(NOW()) - to_days(date_created)) as expiry',
								'date_created'
							)
						))
					);
			$users = array_merge($users20, $users10, $users5);
			//debug($users);
			if(is_array($users) && count($users)){
				foreach($users as $user){
				// send alert email
				$user->date = 'next '.$user->expiry.' days';
				$this->UserMgmt->sendAccExpiryEmail((array)$user, $user->email);
			
				// send alert sms
				if(!empty($user->mob_no)){
					$this->Sms->send(SMS_TEMP_VALIDITY_REMINDER, 
						array('%username%' => $user->user_name, 
							  '%date%'  => $user->date),
						  $user->mob_no);
					}
				}
			}
			
			echo "Dhangar Vivaah Cron Run @ ".date('Y-M-d');
	}
}