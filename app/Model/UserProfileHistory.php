<?php
App::uses('AppModel', 'Model');

class UserProfileHistory extends AppModel {
	
	public $useTable = 'tbl_user_profile_history';
	public $name='UserProfileHistory';
	
	
	public $belongsTo = array(
		'User' => array(
				'className' => 'User',
				'foreignKey' => 'profile_of'
			)
	);
}