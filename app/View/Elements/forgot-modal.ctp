<?php if(!$this->Session->check('id')){?>
<!-- Forgot Password -->
<div class="modal fade forgot-pass-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog forgot-pass-container">
	<div class="modal-content">
	  <div class="forgot-pass-content">
		<div class="modal-header">
		  <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
		  <h2 class="modal-title"><?php echo __('Forgot Password');?></h2>
		</div>
		  <form id="forgotForm" action="" method="post">
          
            <div id="forgotMsgDiv" style="display:none;">
                 <div id="forgotMsgClass" class="">
                      <span id="forgotMsgIcon" aria-hidden="true" class="glyphicon "></span>
                      <span id="forgotMsgText"></span>
                </div>
            </div>
            
			<label><?php echo __("E-mail");?></label>
			<input type="text" name="frg_email" id="frg_email">
			<input type="submit" value="<?php echo __("SUBMIT");?>" class="button button-primary" id="forgotBtnSubmit">
		  </form>
	  </div>
	</div>
  </div>
</div>
<?php }?>