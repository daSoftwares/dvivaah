<section class="wrapper-max min-height view-history-wrapper add-background">    
  <div class="container">
    <div class="content-style">
      <h3><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Shortlisted Profiles</h3>
      <?php if(!empty($userDetails)){?>
      <?php 
	  $i = 0;
	  foreach($userDetails as $user){?>
      <?php if($i%2 == 0){?><div class="row"><?php }?>
          <div class="columns six">
            <div class="view-history-content ">
              <div class="selected-profile-img">
                <img src="<?php echo USER_DEMO_PIC;?>">
              </div>
              <span class="selected-profile-name"><a href="<?php echo PAGE_VIEW_PROFILE.$user->id;?>" target="_blank"><?php echo $user->full_name;?></a></span>
            </div>
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