<?php
App::uses('SimpleImage', 'Lib');
class ProcessMgmt {
	
	public function formatizeValidationData($errorArray = array()) {
    $formatedData = array(__('Error!'), '<br />');
        $i = 1;
        foreach ($errorArray as $arrayOne) {
            foreach ($arrayOne as $arrayTwo) {
                $formatedData[] = $i . ') ' . $arrayTwo . '<br />';
                $i++;
            }
        }
        $formatedData = implode('', $formatedData);
        return $formatedData;
    }
	
	public function uploadProfileImage($image) {
		$image = (object)$image;
		$imgName = time() . $image->name;
        $sm = new SimpleImage($image->tmp_name);
      	$sm->resizeToWidth(700);
        $sm->save(USER_PROFILE_ROOT_PATH . $imgName);
 		return $imgName;

    }
	
	public function cropProfileImage($cords, $image) {
		$cords = (object)$cords;
		$imgName = 'crop_'.rand() . $image;
        $sm = new SimpleImage(USER_PROFILE_ROOT_PATH.$image);
      	//$sm->resizeToWidth(700);
        $sm->cut($cords->x, $cords->y, $cords->w, $cords->h);
		$sm->save(USER_PROFILE_ROOT_PATH . $imgName);
 		return $imgName;

    }
	
}