<?php 
$currMonthData = $lastMonthData = $before60Data = array();
 $currMonth = date('m');
 $preMonth = date('m',  strtotime("-1 month", time()));
 $prePreMonth = date('m',  strtotime("-2 month", time()));
 foreach($userDetails as $key => $user){
	 	$dbMonth = date('m', strtotime($user->date_added));
		if($dbMonth == $currMonth){
			$currMonthData[] = $user;
		}elseif($dbMonth == $preMonth){
			$lastMonthData[] = $user;
		}elseif($dbMonth == $prePreMonth){
			$before60Data[] = $user;
		}
	}
?>
<section class="wrapper-max min-height view-history-wrapper add-background">    
      <div class="container">
        <div class="content-style">
          <h3><?php echo __('Current Month');?></h3>
           <?php if(!empty($currMonthData)){?>
		  <?php 
          $i = 0;
          foreach($currMonthData as $user){
			   if(in_array($user->img_status, array(STATUS_IMG_NOT_PRESENT, STATUS_IMG_SENT_FOR_APPROVAL, STATUS_IMG_REJECTED))){
			  $profile_pic = USER_DEMO_PIC;
			}else{
		 	  $profile_pic = !empty($user->profile_pic) ? USER_PROFILE_HTTP_PATH.$user->profile_pic : USER_DEMO_PIC;
			}
			  ?>
			  <?php if($i%2 == 0){?><div class="row"><?php }?>
                  <div class="columns six">
                  	<a href="<?php echo PAGE_VIEW_PROFILE.$user->id;?>" target="_blank">
                    <div class="view-history-content ">
                      <div class="selected-profile-img">
                        <img src="<?php echo $profile_pic;?>">
                      </div>
                      <span class="selected-profile-name"><?php echo $user->full_name;?></span>
                    </div>
                    </a>
                  </div>
                    <?php if($i%2 != 0){?></div><?php }?>
                  <?php   $i++; }?>
                  <?php if($i%2 != 0){?></div><?php }?>
               <?php 
			
			}else{?>
            <div class="row">
              <div class="error-message-container">
                <span aria-hidden="true" class="glyphicon glyphicon-warning-sign"></span>
                <span><?php echo __('Record Not found');?></span>
              </div>
          </div>
          <?php }?>
         
         
          <h3><?php echo __('Last Month');?></h3>
          <?php if(!empty($lastMonthData)){?>
		   <?php 
          $i = 0;
          foreach($lastMonthData as $user){
			   if(in_array($user->img_status, array(STATUS_IMG_NOT_PRESENT, STATUS_IMG_SENT_FOR_APPROVAL, STATUS_IMG_REJECTED))){
			  $profile_pic = USER_DEMO_PIC;
			}else{
		 	  $profile_pic = !empty($user->profile_pic) ? USER_PROFILE_HTTP_PATH.$user->profile_pic : USER_DEMO_PIC;
			}
			  ?>
			  <?php if($i%2 == 0){?><div class="row"><?php }?>
                  <div class="columns six">
                  	<a href="<?php echo PAGE_VIEW_PROFILE.$user->id;?>" target="_blank">
                    <div class="view-history-content ">
                      <div class="selected-profile-img">
                        <img src="<?php echo $profile_pic;?>">
                      </div>
                      <span class="selected-profile-name"><?php echo $user->full_name;?></span>
                    </div>
                    </a>
                  </div>
                    <?php if($i%2 != 0){?></div><?php }?>
                  <?php  $i++;
				   }?>
               <?php if($i%2 != 0){?></div><?php }?>
               <?php 
			}else{?>
             <div class="row">
              <div class="error-message-container">
                <span aria-hidden="true" class="glyphicon glyphicon-warning-sign"></span>
                <span><?php echo __('Record Not found');?></span>
              </div>
          </div>
          <?php }?>
            
          <h3><?php echo __('Before 60days');?></h3>
        <?php if(!empty($before60Data)){?>
		   <?php 
          $i = 0;
          foreach($before60Data as $user){
			   if(in_array($user->img_status, array(STATUS_IMG_NOT_PRESENT, STATUS_IMG_SENT_FOR_APPROVAL, STATUS_IMG_REJECTED))){
			  $profile_pic = USER_DEMO_PIC;
			}else{
		 	  $profile_pic = !empty($user->profile_pic) ? USER_PROFILE_HTTP_PATH.$user->profile_pic : USER_DEMO_PIC;
			}
			  ?>
			  <?php if($i%2 == 0){?><div class="row"><?php }?>
                  <div class="columns six">
                   <a href="<?php echo PAGE_VIEW_PROFILE.$user->id;?>" target="_blank">
                    <div class="view-history-content ">
                      <div class="selected-profile-img">
                        <img src="<?php echo $profile_pic;?>">
                      </div>
                      <span class="selected-profile-name"><?php echo $user->full_name;?></span>
                    </div>
                    </a>
                  </div>
                    <?php if($i%2 != 0){?></div><?php }?>
                  <?php  $i++;}?>
                  <?php if($i%2 != 0){?></div><?php }?>
               <?php 
			}else{?>
             <div class="row">
              <div class="error-message-container">
                <span aria-hidden="true" class="glyphicon glyphicon-warning-sign"></span>
                <span><?php echo __('Record Not found');?></span>
              </div>
          </div>
          <?php }?>
        </div>
      </div>
  </section>