<?php echo $this->element('search-section');?>
<section class="wrapper-max search-results add-background">    
  <div class="container">
  		 <div class="search-profile-container">
            <div class="<?php echo ($this->Paginator->counter('{:count}') > 0 ? 'success-message-container' : 'error-message-container');?>">
              <span aria-hidden="true" class="glyphicon glyphicon-search"></span>
              <span> <?php echo $this->Paginator->counter('{:count} '. __('Match Found!'));?></span>
            </div>
        </div>
   <?php if($this->Session->check('user_name') && count($users)){?>
        <?php foreach($users as $key => $obj){//debug($obj);?>
         <?php 
		 if(in_array($obj->img_status, array(STATUS_IMG_NOT_PRESENT, STATUS_IMG_SENT_FOR_APPROVAL, STATUS_IMG_REJECTED))){
			  $profile_pic = USER_DEMO_PIC;
			}else{
		 	  $profile_pic = !empty($obj->profile_pic) ? USER_PROFILE_HTTP_PATH.$obj->profile_pic : USER_DEMO_PIC;
			}
		 ?>
         
        <div class="search-profile-container">
          <div class="search-profile-img"><img src="<?php echo $profile_pic;?>"></div>
          <div class="search-porfile-des border">
            <table class="u-full-width">
              <thead>
                <tr>
                  <th class="des-column"></th>
                  <th class="des-column"></th>
                </tr>
              </thead>
              <tbody>
               <tr>
                  <td><?php echo __('Full Name');?> :</td>
                  <td><span title="<?php echo $obj->full_name;?>"><?php echo $obj->full_name;?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Age');?> :</td>
                  <td><span title="<?php echo $obj->age ;?>"><?php echo $obj->age ;?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Height');?> :</td>
                  <td><span title="<?php echo $obj->height ;?>"><?php echo $obj->height ;?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Subcast');?> :</td>
                  <td><span title="<?php echo $obj->sub_cast;?>"><?php echo $obj->sub_cast;?></span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="search-porfile-des">
            <table class="u-full-width">
              <thead>
                <tr>
                  <th class="des-column"></th>
                  <th class="des-column"></th>
                </tr>
              </thead>
              <tbody>
              <tr>
                  <td><?php echo __('Complextion');?> :</td>
                  <td><span title="<?php echo $obj->complextion ;?>"><?php echo $obj->complextion ;?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Service/Business');?> :</td>
                  <td><span title="<?php echo $obj->service ;?>"><?php echo $obj->service ;?></span></td>
                </tr>
               <tr>
                  <td><?php echo __('Education');?> :</td>
                  <td><span title="<?php echo $obj->education ;?>"><?php echo $obj->education ;?></span></td>
                </tr>
                 <tr>
                  <td><?php echo __('Residence');?> :</td>
                  <td><span title="<?php echo $obj->residence ;?>"><?php echo $obj->residence ;?></span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="clearfix"></div>
          <div class="view-full-prof-btn">
          <?php if(($this->Session->read('sub_id') > 1)){?>
          <a class="button button-primary" href="<?php echo PAGE_VIEW_PROFILE.$obj->id;?>" target="_blank">			  <?php }else{?>
           <a class="button button-primary" onclick="javascript:getErrorNotify(1);">		
          <?php }?>
          <?php echo __('VIEW FULL PROFILE');?></a>
          </div>
        </div>
        <?php } //foreach close?>

        <div class="pagination-container">
          <div class="pagi-align-center">
          <ul class="pagination">
            <?php 
            echo $this->Paginator->prev(__('«'), array('tag' => 'li', 'disabledTag' => 'a'));
            echo $this->Paginator->numbers(array('tag' => 'li','currentTag' => 'a', 'currentClass' => 'active', 'separator' => ''));
            echo $this->Paginator->next(__('»'), array('tag' => 'li', 'disabledTag' => 'a'));
            ?>
           </ul>
          </div>
        </div>

      <?php }elseif(!$this->Session->check('user_name')){?>
          <div class="clearfix"></div>
          <div class="subs-for-profile-btn"><a href="<?php echo PAGE_REGISTER ;?>" class="button button-primary">SUBSCRIBE TO SEE PROFILES</a></div>
    	 <?php }?>
 
  </div>
</section>