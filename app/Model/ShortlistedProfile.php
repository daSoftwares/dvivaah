<?php
App::uses('AppModel', 'Model');

class ShortlistedProfile extends AppModel {
	
	public $useTable = 'tbl_shortlisted_profile';
	public $name='ShortlistedProfile';
	
	public $belongsTo = array(
		'User' => array(
				'className' => 'User',
				'foreignKey' => 'profile_of'
			)
	);

}