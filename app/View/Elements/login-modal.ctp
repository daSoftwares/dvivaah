<?php if(!$this->Session->check('id')){?>
<!-- Login Modal -->
<div class="modal fade login-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog login-container">
	<div class="modal-content">
	  <div class="login-content">
		<div class="modal-header">
		  <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
		  <h2 class="modal-title"><?php echo __('Login Form');?></h2>
		</div>
		  <form id="loginForm" action="" method="post" >
			
			 <div id="loginMsgDiv" style="display:none;">
                 <div id="loginMsgClass" class="">
                      <span id="loginMsgIcon" aria-hidden="true" class="glyphicon "></span>
                      <span id="loginMsgText"></span>
                </div>
            </div>
            
			<label><?php echo __("Username");?></label>
			<input type="text" name="login_email"  id="login_email">
			<label><?php echo __("Password");?></label>
			<input type="password" name="login_password" id="login_password">
			 <input type="submit" value="<?php echo __("SUBMIT");?>" class="button button-primary" id="loginBtnSubmit">
			<a class="forgot-pass-link u-pull-right" data-toggle="modal" data-target=".forgot-pass-modal" ><?php echo __("Forgot Password");?></a>
		  </form>
	  </div>
	</div>
  </div>
</div>
<?php }?>