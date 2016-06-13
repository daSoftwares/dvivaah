<?php
App::uses('AppModel', 'Model');

class CustomSession extends AppModel {
	
	public $useTable = 'tbl_sessions';
	public $name='CustomSession';
}
