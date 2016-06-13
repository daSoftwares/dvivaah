<section class="wrapper-max min-height view-history-wrapper add-background">    
  <div class="container">
    <div class="content-style">
      <h3><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Shortlisted Profiles</h3>
      <?php if(!empty($userDetails)){?>
      <?php 
	  $i = 0;
	  foreach($userDetails as $user){
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
       	<?php }else{?>
            <div class="row">
              <div class="error-message-container">
                <span aria-hidden="true" class="glyphicon glyphicon-warning-sign"></span>
                <span><?php echo __('Record Not found');?></span>
              </div>
          </div>
          <?php }?>
    <?php echo $this->element('action-msg-div');?>
    </div>
  </div>
</section>