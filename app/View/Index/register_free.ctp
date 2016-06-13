<section class="wrapper-max registration-form">
<div class="container">
      <?php echo $this->element('add-banner');?>
          <div class="content-style">
          <h2><?php echo __('Registration Form');?></h2>
          <form id="signupForm" action="" method="post">
            <?php echo $this->element('action-msg-div');?>
            <div class="row">
              <div class="six columns">
                <label><?php echo __('Full Name');?></label>
                <input class="u-full-width" type="text" name="full_name">
              </div>
              <div class="six columns radio-container">
                <label><input type="radio" name="user_type" value="0"> <?php echo __('Bride (Vadhu)');?></label> 
                <label><input type="radio" name="user_type" value="1" checked="checked"> <?php echo __('Groom (Var)');?></label>
              </div>
            </div>
        
            <div class="row">
              <div class="six columns">
                <label><?php echo __('Date Of Birth');?> </label>
                <input class="date-of-birth" type="text" name="dob" id="dob" readonly="true">
                <span class="add-on"><i class="icon-calendar"></i></span>
              </div>
              <div class="six columns">
                <label><?php echo __('Marital Status');?></label>
                <select name="marital_status">
                     <?php echo $this->element('status-options');?>
                </select>
              </div>          
            </div>
        
            <div class="row">
              <div class="six columns">
                <label><?php echo __('Caste');?></label>
                <select readonly="readonly" name="cast"><option  value="Dhangar"><?php echo __('Dhangar');?></option></select>
              </div>
              <div class="six columns">
                <label><?php echo __('Subcaste');?></label>
                <select name="sub_cast">
                  <?php echo $this->element('subcaste-options');?>
                </select>
              </div>
            </div>
        
            <div class="row">
              <div class="six columns">  
                <label><?php echo __('E-mail');?></label>
                <input type="text" name="email"> 
              </div>
              <div class="six columns">
                <label><?php echo __('Username');?></label>
                <input type="text" name="user_name" id="user_name">
              </div>       
            </div>
        
            <div class="row">
              <div class="six columns">
                <label><?php echo __('Password');?></label>
                <input type="password" name="password" id="password">
              </div>
              <div class="six columns">
                  <label><?php echo __('Confirm Password');?></label>
                  <input type="password" name="confirm_password" id="confirm_password">
                </div>
            </div>
            
            <div class="row">
              <div class="six columns">
                <label><?php echo __('Mobile Number');?></label>
                <input type="text" name="mob_no" id="mob_no">
              </div>
              <div class="six columns">
                  <label><?php echo __('Alternate Mobile Number');?></label>
                  <input type="text" name="alter_mob_no" id="alter_mob_no">
                </div>
            </div>
            
            <div class="row">
                <div class="six columns">
              <label> <?php echo __('I have read and agree all terms and conditions.');?> &nbsp;<input type="checkbox" name="accept_terms" ></label>
                </div>
            </div>
            <div class="row"></div>
            <div class="row registration-form-btn">
              <input type="submit" value="<?php echo __('SUBMIT');?>" class="button button-primary">
            </div>
            
          </form>
      </div>
</div>