<?php echo $this->element('search-section');?>
<section class="wrapper-max profile-wrapper add-background">    
  <div class="container">
     <div class="content-style">
     <?php echo $this->element('action-msg-div');?>
  <?php if(!empty($userDetails)){?>
   <?php $profile_pic = !empty($userDetails['profile_pic']) ? USER_PROFILE_HTTP_PATH.$userDetails['profile_pic'] : USER_DEMO_PIC;
   		  $full_pic = !empty($userDetails['full_pic']) ? USER_PROFILE_HTTP_PATH.$userDetails['full_pic'] : USER_DEMO_PIC;
   ?>
      <div class="my-profile-img-container">
        <div class="my-profile-img">
        	 <div class="my-image" data-toggle="modal" data-target=".zoom-profile-img">
             	 <img src="<?php echo $profile_pic ;?>">
              </div>
              
		  	<?php if($this->Session->read('id') === $userDetails['id']){?>
              <!--Upload Image -->
              <div class="edit-profile-picture">
                <span aria-hidden="true" class="glyphicon glyphicon-camera"></span>
                <div class="edit-pic-txt">Update Picture</div>
                <form id="picUpload" action="<?php echo PAGE_IMG_SAVE;?>" method="post" enctype="multipart/form-data">
                  <div class="image-upload-btn">
                    <input class="select-image" type="file" name="full_pic"  id="full_pic">
                    <input type="submit" class="hide" value="Upload">
                  </div>
                </form>
              </div>
          	<?php }?>
              
        </div>
      
        <?php if($this->Session->read('id') === $userDetails['id']){?>
        <a class="button button-primary edit-my-profile" href="<?php echo PAGE_EDIT_PROFILE.$userDetails['id'];?>"> <span  class="glyphicon glyphicon-pencil"></span><?php echo __('EDIT PROFILE');?></a>
        <?php }else{?>
        	  <a onclick="addToShortList();" class="button button-primary edit-my-profile"> <span  class="glyphicon glyphicon-star"></span> <?php echo __('ADD FAVOURITE');?></a>
            <a onclick="getContactInfo();" class="button button-primary edit-my-profile"> <span  class="glyphicon glyphicon-envelope"></span> <?php echo __('GET CONTACT DETAILS');?></a>
            <?php }?>
      </div>
      <!-- zoom-profile-img Modal -->
            <div class="modal fade zoom-profile-img" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-profile-img">
                <div class="modal-content">
                  <div class="modal-header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                    <h2 class="modal-title">Profile Picture</h2>
                  </div>
                  <div class="modal-body">
                    <img src="<?php echo $full_pic;?>">
                  </div>
                  <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                  </div>
                </div>

              </div>
            </div>

      <div class="my-profile-info-content">
        <div class="my-profile-info">
          <h3><?php echo __('Personal Information');?></h3>
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
                  <td><?php echo __('Name');?> :</td>
                  <td><span title="<?php echo $userDetails['full_name'];?>"><?php echo $userDetails['full_name'];?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Height');?> :</td>
                  <td><span title="<?php echo $userDetails['height'];?>"><?php echo $userDetails['height'];?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Date Of Birth');?> :</td>
                  <td><span title="<?php echo $userDetails['dob'];?>"><?php echo $userDetails['dob'];?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Current Age');?> :</td>
                  <td><span title="<?php echo $userMgmt->calculateActualAge($userDetails['dob']);?>"><?php echo $userMgmt->calculateActualAge($userDetails['dob']);?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Complexion');?> :</td>
                  <td><span title="<?php echo $userDetails['complextion'];?>"><?php echo $userDetails['complextion'];?></span></td>
                </tr>
                 <tr>
                  <td><?php echo __('Blood Group');?> :</td>
                  <td><span title="<?php echo $userDetails['blood_group'];?>"><?php echo $userDetails['blood_group'];?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Annual Income');?> :</td>
                  <td><span title="<?php echo $userDetails['annual_income'];?>"><?php echo $userDetails['annual_income'];?></span></td>
                <tr>
                  <td><?php echo __('Manglik');?> :</td>
                  <td><span title="<?php echo ($userDetails['is_manglik'] ? 'Yes' : 'No');?>"><?php echo ($userDetails['is_manglik'] ? 'Yes' : 'No');?></span></td>
                </tr>
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
                  <td><?php echo __('Subcaste');?> :</td>
                  <td><span title="<?php echo $userDetails['sub_cast'];?>"><?php echo $userDetails['sub_cast'];?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Education');?> :</td>
                  <td><span title="<?php echo $userDetails['education'];?>"><?php echo $userDetails['education'];?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Service');?> :</td>
                  <td><span title="<?php echo $userDetails['service'];?>"><?php echo $userDetails['service'];?></span></td>
                </tr>
                 <tr>
                  <td><?php echo __('Sun Shine (Ras)');?> :</td>
                  <td><span title="<?php echo $userDetails['sun_shine'];?>"><?php echo $userDetails['sun_shine'];?></span></td>
                </tr>
                 <tr>
                  <td><?php echo __('Nadi');?> :</td>
                  <td><span title="<?php echo $userDetails['nadi'];?>"><?php echo $userDetails['nadi'];?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Nakshatra');?> :</td>
                  <td><span title="<?php echo $userDetails['nakshatra'];?>"><?php echo $userDetails['nakshatra'];?></span></td>
                </tr>
                <tr>
                  <td><?php echo __('Marital Status');?> :</td>
                  <td><span title="<?php echo $userDetails['marital_status'];?>"><?php echo $userDetails['marital_status'];?></span></td>
                </tr>
               
              </tbody>
            </table>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="my-profile-info ">
            <h3><?php echo __('Family Information');?></h3>
            <div class="search-porfile-des">
              <table class="u-full-width">
                <thead>
                  <tr>
                    <th class="des-column"></th>
                    <th class="des-column"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr></tr>
                  <tr>
                    <td><?php echo __('Total Brothers');?> :</td>
                    <td><span title="<?php echo $userDetails['total_bro'];?> , Married: <?php echo $userDetails['married_bro'];?>"><?php echo $userDetails['total_bro'];?> , Married: <?php echo $userDetails['married_bro'];?></span></td>
                  </tr>
                  <tr>
                    <td><?php echo __('Native Place');?> :</td>
                    <td><span title="<?php echo $userDetails['native_place'];?>"><?php echo $userDetails['native_place'];?></span></td>
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
                    <td><?php echo __('Total Sisters');?> :</td>
                    <td><span title="<?php echo $userDetails['total_sis'];?> , Married: <?php echo $userDetails['married_sis'];?>"><?php echo $userDetails['total_sis'];?> , Married: <?php echo $userDetails['married_sis'];?></span></td>
                  </tr>
                  <tr>
                    <td><?php echo __('Residence');?> :</td>
                    <td><span title="<?php echo $userDetails['residence'];?>"><?php echo $userDetails['residence'];?></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="my-profile-info ">
            <h3><?php echo __('Expectations');?></h3>
            <div class="search-porfile-des">
              <table class="u-full-width">
                <thead>
                  <tr>
                    <th class="des-column"></th>
                    <th class="des-column"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr></tr>
                  <tr>
                    <td><?php echo __('Age Difference'); ?>:</td>
                    <td><span title="<?php echo $userDetails['exp_age_diff'];?>"><?php echo $userDetails['exp_age_diff'];?></span></td>
                  </tr>
                  <tr>
                    <td><?php echo __('Education');?> :</td>
                    <td><span title="<?php echo $userDetails['exp_education'];?>"><?php echo $userDetails['exp_education'];?></span></td>
                  </tr>
                  <tr>
                    <td><?php echo __('Prefered City');?> :</td>
                    <td><span title="<?php echo $userDetails['exp_pref_city'];?>"><?php echo $userDetails['exp_pref_city'];?></span></td>
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
                    <td><?php echo __('Annual Income');?> :</td>
                    <td><span title="<?php echo $userDetails['exp_annual_income'];?>"><?php echo $userDetails['exp_annual_income'];?></span></td>
                  </tr>
                  <tr>
                    <td><?php echo __('Occupation');?> :</td>
                    <td><span title="<?php echo $userDetails['exp_service'];?>"><?php echo $userDetails['exp_service'];?> </span></td>
                  </tr>
                   <tr>
                    <td><?php echo __('Other Expectation');?> :</td>
                    <td><span title="<?php echo $userDetails['exp_other'];?>"><?php echo $userDetails['exp_other'];?></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="clearfix"></div>
        </div>
      </div>
     
   
    <?php }?>
     <div class="clearfix"></div>
    
     </div>
  </div>
</section>
<?php echo $this->element('suggested-profiles-modal');?>
<script>
function addToShortList(){
$.blockUI({ message: '<h4><?php echo __('Just a moment...');?></h4>' });
    $.post('<?php echo PAGE_ADD_TO_SLIST.$userDetails['id'];?>', {}, function(data){
    	$.unblockUI();
        if(data == 1){
        var count = parseInt($('#shortListCount').html()) + 1;
        	$('#shortListCount').html(count);
            fnSuccessDiv('commonMsgDiv', 'commonMsgClass', 'commonMsgIcon', 'commonMsgText', '<?php echo __('Profile added to your list.');?>');
        }else{
        	fnErrorDiv('commonMsgDiv', 'commonMsgClass', 'commonMsgIcon', 'commonMsgText', data);
        }
    });
}

function getContactInfo(){
$.blockUI({ message: '<h4><?php echo __('Just a moment...');?></h4>' });
    $.post('<?php echo PAGE_GET_USER_CONTACT.$userDetails['id'];?>', {}, function(data){
    	$.unblockUI();
        if(data == 1){
              fnSuccessDiv('commonMsgDiv', 'commonMsgClass', 'commonMsgIcon', 'commonMsgText', '<?php echo __('Contact details has been sent successfully.');?>');
        }else{
        	fnErrorDiv('commonMsgDiv', 'commonMsgClass', 'commonMsgIcon', 'commonMsgText', data);
        }
    });
}

$(document).ready(function(){
	$('#full_pic').change(function() { 
    // select the form and submit
	$.blockUI({ message: '<h4><?php echo __('Just a moment...');?></h4>' });
    $('#picUpload').submit(); 
});
	
	window.setTimeout(function(){
			$('.suggested-profiles').modal('show');
		}, 5000)
	 
}); // ready function closed
</script>
