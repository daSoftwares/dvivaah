<?php
App::uses('AppModel', 'Model');

class User extends AppModel {
	
	public $useTable = 'tbl_user';
	public $name='User';
	
	public $actsAs = array(
		'Search.Searchable'
	);

/*
	//public $hasOne = 'UserDetails';
	public $hasOne = array(
        'UserDetails' => array(
            'className' => 'UserDetails',
			'foreignKey' => 'user_id',
            //'conditions' => array('User.id' => 'user_id'),
            'dependent' => true
        )
    );
	*/
	
	 public $presetVars = array(
        
	);
	public $filterArgs = array(
		'user_type' => array(
			'type' => 'value',
			'field' => 'user_type'
		),
		'education' => array(
			'type' => 'like',
			'field' => 'education'
		),
		'sub_cast' => array(
			'type' => 'like',
			'field' => 'sub_cast'
		),
		'native_place' => array(
			'type' => 'like',
			'field' => 'native_place'
		),
		'residence' => array(
			'type' => 'like',
			'field' => 'residence'
		),
        'age' => array(
            'type' => 'expression',
            'method' => 'ageRange',
			'field' => 'age BETWEEN ? AND ?'
        ),
		'is_active' => array(
            'type' => 'value'
        ),
		'is_email_verified' => array(
            'type' => 'value'
        ),
		'accept_terms' => array(
            'type' => 'value'
        ),
		
	);
	
	function __construct() {
	parent::__construct();
	
	$this->validate = array(
	 		'full_name' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please enter your full name.')
							 ), 
				'between' => array( 
								'rule' => array('between', 6, 30), 
								'message' => __('Full name must be between 6 to 30 characters.')
									),
					),
			'dob' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								//'rule' => 'date',
								'message' => __('Please enter a valid date of birth.'),
								//'allowEmpty' => false
							 ), 
					),
			'email' => array(
						'required' => array( 
								'rule' => 'email',
								'message' => __('Please Enter Valid Email-id.'),
							 ), 
				
					),
			'accept_terms' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please Accept terms.')
							 ), 
					),
			'sub_cast' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please select Sub-Caste.')
						 ), 
					),
			'user_name' => array(
				'required' => array(
								'rule' => 'notEmpty',
								'message' => __('Please enter user name.')
									),
				'between' => array( 
								'rule' => array('between', 6, 30), 
								'message' => __('User name must be between 6 to 30 characters.')
									),
			'isUnique' => array(
							'rule' => 'isUnique',
							'message' => __('User Name is already in use, Choose another.'),
							'on' => 'create',
							),
				),
			'curr_password' => array(
				'between' => array(
					'rule'      => array('between', 6, 30),
					'message'   => __('Current password must be between 6 and 30 characters.'),
				),
			),
			'password' => array(
				'between' => array(
					'rule'      => array('between', 6, 30),
					'message'   => __('Your password must be between 6 and 30 characters.'),
				),
			),
			'confirm_password' => array(
				'between' => array(
					'rule'      => array('between', 6, 30),
					'message'   => __('Confirm password must be between 6 and 30 characters.'),
				),
				'compare'    => array(
					'rule'      => array('match_passwords'),
					'message' => __('The passwords you entered do not match.'),
				)
			),
			
			/*
			*	Extension of validate variable for edit profile.
			*/
			
			'first_name' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please enter your first name.')
							 ), 
				'between' => array( 
								'rule' => array('between', 3, 30), 
								'message' => __('First name must be between 3 to 30 characters.')
							),
			),
			'mob_no' => array( 
				'required' => array( 
								'rule' => array('between',10, 10), 
								'message' => __('Please enter valid 10 digit mobile number.')
							 ), 
			),
			'alter_mob_no' => array( 
				'alter_mob_no' => array( 
								'rule' => array('between',10, 10), 
								'message' => __('Please enter valid 10 digit alternet mobile number.'),
								'allowEmpty' => true
							 ), 
			),
			'tel_no' => array( 
				'tel_no' => array( 
								'rule' => array('between',10, 12),  
								'message' => __('Please enter valid 10 digit alternet mobile number.'),
								'allowEmpty' => true
							 ), 
			),
			
			'birth_place' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please enter your Birth Place.')
							 ), 
				'between' => array( 
								'rule' => array('between', 3, 30), 
								'message' => __('Birth Place must be between 3 to 30 characters.')
							),
			),
			'tob' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please enter your Birth Time.')
							 ), 
			),
			'complextion' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please select your Complexion.')
							 ), 
			),
			'marital_status' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please select your Marital Status.')
							 ), 
			),
			'height' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please select your height.')
							 ), 
			),
			'blood_group' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please select your blood group.')
							 ), 
			),
			'sun_shine' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please select your sun shine.')
							 ), 
			),
			'nakshatra' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please enter your nakshatra.')
							 ), 
			),
			'nadi' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please select your nadi.')
							 ), 
			),
			'education' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please select your education.')
							 ), 
			),
			'service' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please select your service type.')
							 ), 
			),
			'occupation' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please select your occupation.')
							 ), 
			),
			'annual_income' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please enter your annual income.')
							 ), 
			),
			'total_bro' => array( 
				'total_bro' => array( 
								'rule' => 'match_siblings',
								'message' => __('Married brother cannot be greater than total brother.'),
								'allowEmpty' => true
							 ), 
			),
			'married_bro' => array( 
				'married_bro' => array( 
								'rule' => 'notEmpty',
								'message' => __('Married brothers cannot be greater than total brothers.'),
								'allowEmpty' => true
							 ), 
			),
			'total_sis' => array( 
				'total_sis' => array( 
								'rule' => 'match_siblings',
								'message' => __('Married sisters cannot be greater than total sisters'),
								'allowEmpty' => true
							 ), 
			),
			'married_sis' => array( 
				'married_sis' => array( 
								'rule' => 'notEmpty',
								'message' => __('Married sisters cannot be greater than total sisters.'),
								'allowEmpty' => true
							 ), 
			),
			
			
			'exp_education' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please enter your expected education.')
							 ), 
			),
			'exp_service' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please enter your expected service type.')
							 ), 
			),
			'exp_age_diff' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please enter your expected age difference.')
							 ), 
			),
			'exp_annual_income' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please enter your expected annual income.')
							 ), 
			),
			'exp_pref_city' => array( 
				'required' => array( 
								'rule' => 'notEmpty',
								'message' => __('Please enter your expected preffered city.')
							 ), 
			),
		); 
		
		
	}
	
	public function match_passwords() {
		//debug($this->data);
		return $this->data[$this->alias]['password'] === $this->data[$this->alias]['confirm_password'];
	}
	
	 public function ageRange($data = array()) {//debug($data);
            return $data['age'];
     }
	 
	 public function match_siblings(){
		// echo $this->data[$this->alias]['married_bro'];exit;
			 return ($this->data[$this->alias]['married_bro'] <= $this->data[$this->alias]['total_bro']) ? true : false;
	}
}
