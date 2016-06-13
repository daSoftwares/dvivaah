<script>
<?php if(!$this->Session->check('id')){?>
	<?php if($this->action == 'registerFree'){?>
	$().ready(function() {
		// validate the comment form when it is submitted
	
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			full_name: "required",
			dob: "required",
			sub_cast: "required",
			user_name: {
				required: true,
				minlength: 5
			},
			password: {
				required: true,
				minlength: 6
			},
			confirm_password: {
				required: true,
				minlength: 6,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
			mob_no: {
				required: true,
				minlength: 10
			},
			alter_mob_no: {
				minlength: 10,
			},
			accept_terms: "required"
		},
		messages: {
			full_name: "<?php echo __('Please enter full name.');?>",
			user_name: {
				required: "<?php echo __('Please enter user name.');?>",
				minlength: "<?php echo __('Your user name must consist of at least 6 characters.');?>"
			},
			sub_cast: '<?php echo __('Please choose subcaste.');?>',
			password: {
				required: "<?php echo __('Please provide a password.');?>",
				minlength: "<?php echo __('Your password must be at least 6 characters long.');?>"
			},
			confirm_password: {
				required: "<?php echo __('Please provide a password.');?>",
				minlength: "<?php echo __('Your password must be at least 6 characters long.');?>",
				equalTo: "<?php echo __('The passwords you entered do not match.');?>"
			},
			email: "<?php echo __('Please enter a valid email address.');?>",
			mob_no: "<?php echo __('Please enter valid 10 digit mobile number.');?>",
			alter_mob_no: "<?php echo __('Please enter valid 10 digit alternet mobile number.');?>",
			accept_terms: "<?php echo __('Please accept our policy.');?>"
		}
	});
});
	<?php }?>


$().ready(function() {
	// validate the comment form when it is submitted
	
	// validate signup form on keyup and submit
	$("#loginForm").validate({
		rules: {
			login_email: {
				required: true,
				minlength: 5
			},
			login_password: {
				required: true,
				minlength: 6
			}
		},
		messages: {
			login_email: {
				required: "<?php echo __('Please enter user name or email id.');?>",
			},
			login_password: {
				required: "<?php echo __('Please provide a password.');?>",
				minlength: "<?php echo __('Your password must be at least 6 characters long.');?>"
			}
		},
		 submitHandler: function(form) {
			//alert('here');
			$('#loginBtnSubmit').val('<?php echo __('Working...');?>').attr('disabled', 'disabled');
			$.post('<?php echo PAGE_LOGIN;?>',
					{email: $('#login_email').val(), password: $('#login_password').val()},
					function(data){
						if(data == 1){
							
							window.location.href = '<?php echo PAGE_VIEW_PROFILE;?>';
								
						}else{
							fnErrorDiv('loginMsgDiv', 'loginMsgClass', 'loginMsgIcon', 'loginMsgText', data);
						}
						//alert(data);
					$('#loginBtnSubmit').val('<?php echo __('SUBMIT');?>').removeAttr('disabled');
				});
				
		}
	});
	});
	

$().ready(function() {
// validate the comment form when it is submitted

	// validate signup form on keyup and submit
	$("#forgotForm").validate({
		rules: {
			frg_email: {
				required: true,
				email: true
			}
		},
		messages: {
			frg_email: "<?php echo __('Please enter a valid email address.');?>",
		},
		 submitHandler: function(form) {
			//alert('here');
			$('#forgotBtnSubmit').val('<?php echo __('Working...');?>').attr('disabled', 'disabled');
			$.post('<?php echo PAGE_FORGOTPASSWORD;?>/'+($('#frg_email').val()),
					{},
					function(data){
						if(data == 1){
							
							fnSuccessDiv('forgotMsgDiv', 'forgotMsgClass','forgotMsgIcon', 'forgotMsgText', '<?php echo __('Password on email Sent Succesfully');?>');			
						}else{
							fnErrorDiv('forgotMsgDiv', 'forgotMsgClass', 'forgotMsgIcon', 'forgotMsgText', data);
						}
						//alert(data);
					$('#forgotBtnSubmit').val('<?php echo __('SUBMIT');?>').removeAttr('disabled');
				});
				
		}
	});
});
<?php }?>
</script>