<section class="wrapper-max profile-wrapper add-background">    
  <div class="container">
     <div class="edit-profile-container">
     <?php echo $this->element('action-msg-div');?>
  <?php if(!empty($userDetails)){//debug($userDetails);?>
          <div>
        <h3><span aria-hidden="true" class="glyphicon glyphicon-plus"></span><?php echo __('Personal Information');?></h3>
        <div class="edit-profile-details active" id="tab1">
            <form  action="" method="post">
             
              <div class="row">
                <div class="six columns">
                  <label><?php echo __('First Name');?></label>
                  <input class="u-full-width" type="text" name="first_name" value="<?php echo $userDetails['first_name'];?>">
                </div>
                <div class="six columns">
                  <label><?php echo __('Full Name');?></label>
                  <input class="u-full-width" type="text" name="full_name" value="<?php echo $userDetails['full_name'];?>">
                </div>
              </div>

              <div class="row">
                <div class="six columns">
                  <label><?php echo __('Date Of Birth');?></label>
                  <input class="date-of-birth" type="text" name="dob" readonly="true" value="<?php echo $userDetails['dob'];?>">
                  <span class="add-on"><i class="icon-calendar"></i></span>
                </div>
                <div class="six columns">
                  <label><?php echo __('E-mail');?></label>
                  <input type="text" name="email" value="<?php echo $userDetails['email'];?>">
                </div>
              </div>
              <div class="row">
                <div class="six columns">
                  <label><?php echo __('Caste');?></label>
                  <select name="cast"><option value="Dhangar"><?php echo __('Dhangar');?></option></select>
                </div>
                <div class="six columns">
                  <label><?php echo __('Subcaste');?></label>
                  <select name="sub_cast">
                     <?php echo $this->element('subcaste-options', array('opt_value' => $userDetails['sub_cast']));?>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="six columns">
                  <label><?php echo __('Mobile Number');?></label>
                  <input type="text" name="mob_no"  value="<?php echo $userDetails['mob_no'];?>">
                </div>
                <div class="six columns">
                  <label><?php echo __('Alternate Mobile Number');?></label>
                  <input type="text" name="alter_mob_no"  value="<?php echo $userDetails['alter_mob_no'];?>">
                </div>
              </div>

              <div class="row">
                <div class="six columns">
                  <label><?php echo __('Telephone Number');?></label>
                  <input type="text" name="tel_no"  value="<?php echo $userDetails['tel_no'];?>">
                </div>
                <div class="six columns">
                  <label><?php echo __('Telephone Number');?></label>
                  <input type="text" name="tel_no"  value="<?php echo $userDetails['tel_no'];?>">
                </div>
              </div>

              <div class="row registration-form-btn">
                <input type="submit" class="button button-primary"  value="<?php echo __('SAVE');?>" />
              </div>
            <input type="hidden" name="which_tab" value="tab1" />
            </form>
        </div>
      </div>
      <!--Personal Details-->
      <div>
        <h3><span aria-hidden="true" class="glyphicon glyphicon-plus"></span><?php echo __('Personal Details');?></h3>
        <div class="edit-profile-details" id="tab2">
        <form  action="" method="post">
          <div class="row">
            <div class="six columns">
              <label><?php echo __('Birthplace');?></label>
              <input type="text" name="birth_place"  value="<?php echo $userDetails['birth_place'];?>">
            </div>
            <div class="six columns">
              <label><?php echo __('Time of Birth');?></label>
              <input class="time-of-birth" type="text" name="tob" readonly="true"  value="<?php echo $userDetails['tob'];?>">
            </div>
          </div>

          <div class="row">
            <div class="six columns">
              <label><?php echo __('Complexion');?></label>
              <select name="complextion">
                 <?php echo $this->element('complexion-options', array('opt_value' => $userDetails['complextion']));?>
              </select>
            </div>
            <div class="six columns">
              <label><?php echo __('Marriage-status');?></label>
              <select name="marital_status">
                 <?php echo $this->element('status-options', array('opt_value' => $userDetails['marital_status']));?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="six columns">
              <label><?php echo __('Height');?></label>
              <select name="height" id="heightFeet">
                <?php echo $this->element('height-options', array('opt_value' => $userDetails['height']));?>
              </select>
            </div>
            <div class="six columns">
              <label><?php echo __('Blood Group');?></label>
              <select name="blood_group">
                <?php echo $this->element('blood-options', array('opt_value' => $userDetails['blood_group']));?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="six columns">
              <label><?php echo __('Sun Shine (Ras)');?></label>
              <select name="sun_shine">
                 <?php echo $this->element('zodiac-options', array('opt_value' => $userDetails['sun_shine']));?>
              </select>
            </div>
            <div class="six columns">
              <label><?php echo __('Nakshatra');?></label>
              <input type="text" name="nakshatra"  value="<?php echo $userDetails['nakshatra'];?>"> 
            </div>
          </div>

          <div class="row">
            <div class="six columns">
              <label><?php echo __('Nadi');?></label>
              <select name="nadi">
                 <?php echo $this->element('nadi-options', array('opt_value' => $userDetails['nadi']));?>
              </select>
            </div>
            <div class="six columns radio-container">
              <label><input type="radio" <?php echo $userDetails['is_manglik'] == 1 ? 'checked' : '';?> name="is_manglik" value="1"> <?php echo __('Manglik-Yes');?></label>
              <label><input type="radio" <?php echo $userDetails['is_manglik'] == 0 ? 'checked' : '';?> name="is_manglik" value="0"> <?php echo __('Manglik-No');?></label>
            </div>
          </div>

          <div class="row">
            <div class="six columns radio-container">
              <label><input type="radio" <?php echo $userDetails['is_handicap'] == 1 ? 'checked' : '';?> name="is_handicap" value="1"> <?php echo __('Hadicapped -Yes');?></label>
              <label> <input type="radio" <?php echo $userDetails['is_handicap'] == 0 ? 'checked' : '';?> name="is_handicap" value="0"> <?php echo __('Hadicapped -No');?></label>
            </div>
            <div class="six columns">
              <label><?php echo __('If Yes, Details');?></label>
              <textarea name="handicap_detail"><?php echo $userDetails['handicap_detail'];?></textarea>
            </div>
          </div>

          <div class="row registration-form-btn">
            <input type="submit" class="button button-primary"  value="<?php echo __('SAVE');?>" />
          </div>
          <input type="hidden" name="which_tab" value="tab2" />
        </form>
        </div>
      </div>
      <!--Professional Indoemation-->
      <div>
        <h3><span aria-hidden="true" class="glyphicon glyphicon-plus"></span><?php echo __('Education & Profession Information');?></h3>
        <div class="edit-profile-details"  id="tab3">
        <form  action="" method="post">
          <div class="row">
            <div class="six columns">
              <label><?php echo __('Education');?></label>
              <select name="education" id="educationadditional">
                 <?php echo $this->element('education-options', array('opt_value' => $userDetails['education']));?>
              </select>
            </div>
            <div class="six columns">
              <label><?php echo __('Service/Business');?></label>
              <select name="service">
                 <?php echo $this->element('service-business-options', array('opt_value' => $userDetails['service']));?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="six columns">
              <label><?php echo __('Occupation');?></label>
              <select name="occupation">
               <?php echo $this->element('occupation-options', array('opt_value' => $userDetails['occupation']));?>
            </select>
            </div>
            <div class="six columns">
              <label><?php echo __('Annual Income');?></label>
              <input type="text" name="annual_income"  value="<?php echo $userDetails['annual_income'];?>">
            </div>
          </div>
          <div class="row registration-form-btn">
            <input type="submit" class="button button-primary"  value="<?php echo __('SAVE');?>" />
          </div>
          <input type="hidden" name="which_tab" value="tab3" />
          </form>
        </div>
      </div>
      <!--Family Information-->          
      <div>
        <h3><span aria-hidden="true" class="glyphicon glyphicon-plus"></span><?php echo __('Family Information');?></h3>
        <div class="edit-profile-details"  id="tab4">
        <form  action="" method="post">
          <div class="row">
            <div class="six columns">
              <label><?php echo __('Total Brothers');?></label>
              <select name="total_bro">
               <?php echo $this->element('siblings-options', array('siblings' => $userDetails['total_bro']));?>
              </select>
            </div>
            <div class="six columns">
              <label><?php echo __('Married Brothers');?></label>
              <select name="married_bro">
                <?php echo $this->element('siblings-options', array('siblings' => $userDetails['married_bro']));?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="six columns">
              <label><?php echo __('Total Sisters');?></label>
              <select name="total_sis">
                <?php echo $this->element('siblings-options', array('siblings' => $userDetails['total_sis']));?>
              </select>
            </div>
            <div class="six columns">
              <label><?php echo __('Married Sisters');?></label>
              <select name="married_sis">
                 <?php echo $this->element('siblings-options', array('siblings' => $userDetails['married_sis']));?>
              </select>
            </div>
          </div>
          <div class="row registration-form-btn">
            <input type="submit" class="button button-primary"  value="<?php echo __('SAVE');?>" />
          </div>
          <input type="hidden" name="which_tab" value="tab4" />
          </form>
        </div>
      </div>

      <!--Expectations Information--> 
      <div>
        <h3><span aria-hidden="true" class="glyphicon glyphicon-plus"></span><?php echo __('Expectations');?></h3>
        <div class="edit-profile-details"  id="tab5">
            <form  action="" method="post">
          <div class="row">
            <div class="six columns">
              <label><?php echo __('Education');?></label>
              <select name="exp_education" id="exp_education">
                 <?php echo $this->element('education-options', array('opt_value' => $userDetails['exp_education']));?>
              </select>
            </div>
            <div class="six columns">
              <label><?php echo __('Service/Business');?></label>
              <select name="exp_service">
                 <?php echo $this->element('service-business-options', array('opt_value' => $userDetails['exp_service']));?>
              </select>
            </div>
          </div>
          
          <div class="row">
            <div class="six columns">
              <label><?php echo __('Annual Income');?></label>
              <input type="text" name="exp_annual_income"  value="<?php echo $userDetails['exp_annual_income'];?>">
            </div>
            <div class="six columns">
              <label><?php echo __('Age Difference');?></label>
              <input type="text" name="exp_age_diff"  value="<?php echo $userDetails['exp_age_diff'];?>">
            </div>
          </div>

          <div class="row">
            <div class="six columns">
              <label><?php echo __('Prefered City');?></label>
              <input type="text" name="exp_pref_city"  value="<?php echo $userDetails['exp_pref_city'];?>">
            </div>
            <div class="six columns">
              <label><?php echo __('Other Expectation');?></label>
              <textarea name="exp_other"><?php echo $userDetails['exp_other'];?></textarea>
            </div>
          </div>

          <div class="row registration-form-btn">
            <input type="submit" class="button button-primary"  value="<?php echo __('SAVE');?>" />
          </div>
          <input type="hidden" name="which_tab" value="tab5" />
            </form>
        </div>
      </div>
   
    <?php }?>
    </div>
  </div>
</section>
<script>
<?php if($this->request->isPost() && isset($this->request->data['which_tab'])){?>
    $(document).ready(function(){$('#<?php echo $this->request->data['which_tab'];?>').show().addClass('active');}); 		
<?php }?>
</script>