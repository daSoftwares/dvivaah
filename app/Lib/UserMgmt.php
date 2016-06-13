<?php
App::uses('CakeTime', 'Utility');
App::uses('Security', 'Utility');
App::uses('ProcessMgmt', 'Lib');
App::uses('CakeEmail', 'Network/Email');
class UserMgmt extends ProcessMgmt{
	
	
	public function calculateAge($dob = ''){
		$date1 = CakeTime::toServer(strtotime(str_replace('/','-',$dob)));
		$date2 = CakeTime::toServer(time());
		
		$diff = abs(strtotime($date2) - strtotime($date1));
		
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		return (int)$years;
		//return printf("%d years, %d months, %d days\n", $years, $months, $days);	
	}
	
	public function calculateActualAge($dob = ''){
		//debug(strtotime(str_replace('/','-',$dob)));
		$date1 = CakeTime::toServer(strtotime(str_replace('/','-',$dob)));
		$date2 = CakeTime::toServer(time());
		
		$diff = abs(strtotime($date2) - strtotime($date1));
		
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		//return $years;
		 printf("%d years, %d months, %d days\n", $years, $months, $days);	
	}
	
	public function processUserInfo($data = array()){
		
		// set values
		$data['age'] = $this->calculateAge($data['dob']);
		$data['date_created'] = $data['date_updated'] = CakeTime::toServer(time());
		
		// generate a verification code,with combination of email and random string
		$data['verification_code'] = $this->getSecureCode($data['email']);
		
		return $data;	
	}
	
	public function calculateExpiry($allowed_days = 30, $date = ''){
		
		$date1 = CakeTime::toServer(strtotime($date));
		$date2 = CakeTime::toServer(time());
		
		$diff = abs(strtotime($date2) - strtotime($date1));
		
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		return ($allowed_days - $days);
		//printf("%d years, %d months, %d days\n", $years, $months, $days);	
	}
	
	public function getSecureCode($email = ''){
		return $rand_str =  md5(rand().$email);
	}
	
	
	public function getVerificationURL($code = 'igu64g98vbdl9ljlbvaq', $email = 'example@example.com'){
		return Configure::read('App.fullBaseUrl').'verify/'.$code.'/'.$email;
	}
	
	public function sendWelcomeEmail($data = array()){
		
		$verify_url = $this->getVerificationURL($data['verification_code'], $data['email']);
		
		$email = new CakeEmail(SMTP_CONF);
        $email->to($data['email']);
        $email->emailFormat('html');
        $email->template('welcome_email', 'default')->viewVars( array('verification_url' => $verify_url, 'user_name' => $data['user_name']));
        $email->subject('Registration Successful with Dhangar Vivaah.');
        //$email->replyTo('the_mail_you_want_to_receive_replies@yourdomain.com');
        //$email->from ('your_user@gmail.com');
        $status = __('Verification mail sending fail, Please contact site administrator.');
		if($email->send())			
			$status = __('Verification mail send sucessfully. Please check your mail inbox.');
			
			
       return $status;
	}
	
	public function sendEmailForgotPassword($data = array()){
			
			$email = new CakeEmail(SMTP_CONF);
			
			$email->to($data['email']);
			$email->emailFormat('html');
			$email->template('forgot_password_email', 'default')->viewVars( $data);
			$email->subject('Requested password for Dhangar Vivaah.');
			//print_r(compact($data) );exit;
			 $status = __('Password sending fail, Please contact site administrator.');
			
			if($email->send())			
				$status = __('Password has been sent sucessfully. Please check your mail inbox.');
			}
			
	public function processSearchResults($data = array()){
		$result = $res = array();
		$i = 0;
		foreach($data as $key => $value){
			foreach($value as $ikey => $ivalue){
				if(is_array($value[$ikey])){
					$res = array_merge($res, $value[$ikey]);
				}else{
					$res = array_merge($res, $value);
					break;
				}
			}
				
			$result[] =(object) $res;
			$res = array();
		}
		
		return $result;
	}
	
	public function sendProfileDetailsOnEmail($data = array(), $sendTo = 0){
			
			$sendData = $this->processForProfileReq($data, $sendTo);
			
			$email = new CakeEmail(SMTP_CONF);
			$email->to($sendData['to_email']);
			//print_r($sendData);exit;
			$email->emailFormat('html');
			$email->template('profile_info_on_email', 'default')->viewVars( $sendData);
			$email->subject('Requested User Profile via Dhangar Vivaah.');
			//print_r(compact($data) );exit;
			 $status = __('Profile on email sending fail, Please contact site administrator.');
			
			if($email->send())			
				$status = __('Profile on email has been sent sucessfully. Please check your mail inbox.');
			
			return $status;
			}
			
	public function sendProfileDetailsOnMobile($data = array(), $sendTo = 0){
			$sendData = $this->processForProfileReq($data, $sendTo);
		}
		
		public function processForProfileReq($data = array(), $sendTo = 0){
			$sendData = array();
				foreach($data as $info){
				if($info->id == $sendTo){
					$sendData['to_email'] = $info->email;
					$sendData['user_name'] = $info->user_name;
				}else{
					$sendData['full_name'] = $info->full_name;
					$sendData['user_email'] = $info->email;
					$sendData['user_mob'] = $info->mob_no;
					$sendData['user_tel'] = $info->tel_no;
					$sendData['user_alt_mob'] = $info->alter_mob_no;
				}				
			}
			return $sendData;
		}
	
	public function processForSubs($data = array(), $expired_after_days = 0){
			$data['date_created'] = CakeTime::toServer(time());
			$data['allow_days'] = (int)($expired_after_days + $data['allow_days']);
			$data['is_sub_on'] = 1;
			return $data;
		}
}