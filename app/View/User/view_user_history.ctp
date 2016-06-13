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
          foreach($currMonthData as $user){?>
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
          foreach($lastMonthData as $user){?>
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
          foreach($before60Data as $user){?>
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