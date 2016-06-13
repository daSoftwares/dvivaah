<?php echo $this->element('admin-navbar');?>

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
	Registration Form
</h1>
<ol class="breadcrumb">
	<li>
		<i class="fa fa-fw fa-users"></i>  <a href="index.html">Dashboard</a>
	</li>
	<li class="active">
		<i class="fa fa-edit"></i>  New User Registration Form 
	</li>
</ol>
	<?php echo $this->element('action-msg-div');?>
</div>
</div>
<!-- /.row -->
<form method="post" id="signupForm">
<div class="row">
<div class="col-lg-6 ">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				<label>First Name</label>
				<input class="form-control"  type="text" name="first_name" required>
			</div>
			<div class="form-group">
				<label>Full Name</label>
				<input class="form-control"  type="text" name="full_name" required>
			</div>
			<div class="form-group">
				<label>Date Of Birth</label>
				<input class="date-of-birth form-control" required type="text" name="dob"  id="dob"  readonly="true">
			</div>
			<div class="form-group">
				<label>E-mail</label>
				<input class="form-control" required type="text" name="email">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input class="form-control" required type="text" name="user_name">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input class="form-control" required type="password" name="password">
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input class="form-control" required type="password" name="confirm_password">
			</div>
		</div>
	</div>
</div>
<div class="col-lg-6 ">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				<label><input type="radio" name="user_type" value="0"> <?php echo __('Bride (Vadhu)');?></label> 
                <label><input type="radio" name="user_type" value="1" checked="checked"> <?php echo __('Groom (Var)');?></label>
			</div>
			<div class="form-group">
				<label>Caste</label>
				<select class="form-control" disabled="true"><option value="Dhangar"><?php echo __('Dhangar');?></option></select>
			</div>
			<div class="form-group">
				<label>Subcaste</label>
					<select class="form-control" required>
					   <?php echo $this->element('subcaste-options');?>
					</select>
			</div>
			<div class="form-group">
				<label>Mobile Number</label>
				<input class="form-control" required type="text" name="mob_no">
			</div>
			<div class="form-group">
				<label>Alternate Mobile Number</label>
				<input class="form-control" type="text" name="alter_mob_no">
			</div>
			<div class="form-group">
				<label>Telephone Number</label>
				<input class="form-control" type="text" name="tel_no">
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
	<h3 class="page-header">Personal Details</h3>
</div>
<div class="col-lg-6 ">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				<label>Birthplace</label>
				<input class="form-control" required type="text" name="birth_place">
			</div>
			<div class="form-group">
				<label>Complexion</label>
				<select class="form-control" name="complextion" required>
				   <?php echo $this->element('complexion-options');?>
				</select>
			</div>
			<div class="form-group">
				<label>Height</label>
				<select class="form-control" name="heightFeet" id="heightFeet" required>
				  <?php echo $this->element('height-options');?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Sun Shine (Ras)</label>
				<select class="form-control" name="sun_shine" required>
				   <?php echo $this->element('zodiac-options');?>
				</select>
			</div>
			<div class="form-group">
				<label>Nadi</label>
				<select class="form-control" name="nadi" required>
				  <?php echo $this->element('nadi-options');?>
				</select>
			</div>
			<div class="form-group">
				   <label><input type="radio"name="is_manglik" value="1"> <?php echo __('Manglik-Yes');?></label>
              <label><input type="radio" name="is_manglik" value="0"> <?php echo __('Manglik-No');?></label>
			</div>
		   
		</div>
	</div>
</div>

<div class="col-lg-6 ">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				<label>Time of Birth</label>
				<input class="time-of-birth form-control" required class="time-of-birth" type="text" id="tob" name="tob" readonly="true">
			</div>
			<div class="form-group">
				<label>Marriage-status</label>
				<select class="form-control" name="marital_status" required>
				  <?php echo $this->element('status-options');?>
				</select>
			</div>                                    
			<div class="form-group">
				<label>Blood Group</label>
				<select class="form-control" name="blood_group" required>
                	 <?php echo $this->element('blood-options');?>
                </select>
			</div>
			<div class="form-group">
				<label>Nakshatra</label>
				<input class="form-control" type="text" name="nakshatra"> 
			</div>
			 <div class="form-group">
				 <label><input type="radio" name="is_handicap" value="1"> <?php echo __('Hadicapped -Yes');?></label>
              <label> <input type="radio" name="is_handicap" value="0"> <?php echo __('Hadicapped -No');?></label>
			</div>
			<div class="form-group">
				<label>If Yes, Details</label>
				<textarea  class="form-control" name="handicap_detail"></textarea>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.row --> 
<div class="row">
<div class="col-lg-12">
	<h3 class="page-header">Education & Profession Information</h3>
</div>
<div class="col-lg-6 ">
	<div class="panel panel-default">
		<div class="panel-body">
			 <div class="form-group">
				<label>Education</label>
				<select class="form-control" name="education" id="educationadditional" required>
				 <?php echo $this->element('education-options');?>
				</select>
			 </div>
			 <div class="form-group">
				<label>Occupation</label>
				<select class="form-control" name="occupation" required>
				 <?php echo $this->element('occupation-options');?>
			  </select>
			 </div>
		</div>
	</div>
</div>

<div class="col-lg-6 ">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				<label>Service/Business</label>
				<select class="form-control" name="service" required>
				  <?php echo $this->element('service-business-options');?>
				</select>
			</div>
			<div class="form-group">
				<label>Annual Income</label>
				<input  class="form-control" type="text" name="annual_income" required>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
	<h3 class="page-header">Family Information</h3>
</div>
<div class="col-lg-6 ">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				<label>Total Brothers</label>
				<select class="form-control" name="total_bro" >
				  <?php echo $this->element('siblings-options');?>
				</select>
			</div>
			<div class="form-group">
				<label>Total Sisters</label>
				<select class="form-control" name="total_sis">
				  <?php echo $this->element('siblings-options');?>
				</select>
			</div>
		</div>
	</div>
</div>

<div class="col-lg-6 ">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				 <label>Married Brothers</label>
				<select class="form-control" name="married_bro">
				  <?php echo $this->element('siblings-options');?>
				</select>
			</div>
			<div class="form-group">
				<label>Married Sisters</label>
				<select class="form-control" name="married_sis">
				 <?php echo $this->element('siblings-options');?>
				</select>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
	<h3 class="page-header">Expectations</h3>
</div>
<div class="col-lg-6 ">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				<label>Education</label>
				<select class="form-control" name="exp_education" id="exp_education" required>
                 <?php echo $this->element('education-options');?>
              </select>
			</div>
			<div class="form-group">
				<label>Annual Income</label>
				<input class="form-control" type="text" name="exp_annual_income">
			</div>
			<div class="form-group">
				<label>Prefered City</label>
				<input class="form-control" type="text" name="exp_pref_city" required>
			</div>
		</div>
	</div>
</div>

<div class="col-lg-6 ">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				<label>Service/Business </label>
				<select class="form-control" name="exp_service" required>
                 <?php echo $this->element('service-business-options');?>
              </select>
			</div>
			<div class="form-group">
				<label>Age Difference</label>
				<input class="form-control" type="text" name="exp_age_diff">
			</div>
			<div class="form-group">
				<label>Other Expectations</label>
				<textarea class="form-control" name="exp_other"></textarea>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Package</h3>
    </div>
    <div class="col-lg-6 ">
        <div class="panel panel-default">
          <div class="panel-body">
              <div class="form-group">
                <label>Select Package</label>
                <select class="selected-amount form-control" required>
                  <option>--Select Package--</option>
                  <option value="300" selected>3 Months (300 Rs)</option>
                  <option value="500">6 Months (500 Rs)</option>
                  <option value="800">12 Months (800 Rs)</option>
                </select>
              </div>
              <div class="form-group">
                <label>Amount to pay</label>
                <input readonly  class="form-control amount-to-pay" value="300">
              </div>
          </div>
        </div>
    </div>

    <div class="col-lg-6 ">
    </div>
</div>

<!-- /.row -->                       
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label><input type="checkbox" required name="Terms and Conditions"> I accept all <a href="#.">Terms & Conditions</a></label>
                </div>
                <div class="form-group">
                    <label><input class="pay-chk"  required type="radio" value="pay-cash" name="pay-mode"> I wish to Pay Cash</label>
                </div>
                <div class="form-group">
                    <label><input class="pay-chk"  required type="radio" value="pay-online" name="pay-mode"> I wish to Pay Online</label>
                </div>
                <div class="form-group">
                    <label><input class="pay-chk" checked="checked" required type="radio" value="pay-by-cheque" name="pay-mode"> I wish to Pay By Cheque</label>
                </div>
                <div class="pay-by-cheque">
                    <div class="form-group">                                        
                      <label>Bank Name</label>
                      <input type="text">
                    </div>
                    <div class="form-group">
                      <label>Cheque Number</label>
                      <input type="text">
                    </div>
                  </div>
                   <div class="form-group">
                    <label><input class="pay-chk" required type="radio" value="register-free" name="pay-mode"> Register User For Free(Special Customer)</label>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- /.row -->
</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<script>
$().ready(function() {
	$("#signupForm").validate({
	  submitHandler: function(form) {
		// do other things for a valid form
		form.submit();
	  }
	});
});


</script>