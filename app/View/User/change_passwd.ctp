<section class="wrapper-max min-height change-password-wrapper add-background">    
      <div class="container">
        <div class="content-style">
          <h3><?php echo __('Change Password');?></h3>
           <?php echo $this->element('action-msg-div');?>
          <div class="change-my-password">
          	<form action="" method="post">
              <label><?php echo __('Current Password');?></label>
              <input type="password" name="curr_password">
              <label><?php echo __('New Password');?></label>
              <input type="password" name="password">
              <label><?php echo __('Confirm Password');?></label>
              <input type="password" name="confirm_password">
              <div class="row registration-form-btn">
                <input type="submit" class="button button-primary" value="<?php echo __('SUBMIT');?>">
              </div>
              </form>
          </div>
        </div>
      </div>
  </section>