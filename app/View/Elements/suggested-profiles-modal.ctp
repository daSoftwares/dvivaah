<div class="modal fade suggested-profiles" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Suggested Profiles</h4>
    </div>
    <div class="modal-body">
      <?php if(!empty($suggestedProfile)){
		     foreach($suggestedProfile as $key => $obj){
		     		$profile_pic = !empty($obj->profile_pic) ? USER_PROFILE_HTTP_PATH.$obj->profile_pic : USER_DEMO_PIC;?>
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
                <tr>
                  <td><?php echo __('Education');?> :</td>
                  <td><span title="<?php echo $obj->education ;?>"><?php echo $obj->education ;?></span></td>
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
               <?php /*  <tr>
                  <td><?php echo __('Annual Income');?> :</td>
                  <td><?php echo $obj->annual_income;?></td>
                </tr>
				*/ ?>
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
      <?php }
	  }else{?>
          <div class="row">
              <div class="error-message-container">
                <span aria-hidden="true" class="glyphicon glyphicon-warning-sign"></span>
                <span><?php echo __('Record Not found');?></span>
              </div>
          </div>
      <?php }?>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>