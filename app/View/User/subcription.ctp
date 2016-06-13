<section class="wrapper-max min-height my-subscription-wrapper add-background">    
      <div class="container">
        <div class="content-style">
        <?php echo $this->element('action-msg-div');?>
          <h3><?php echo __('My Subscription');?></h3>
          <div class="my-subscribe-account">
              <table class="u-full-width">
                  <thead>
                    <tr>
                      <th class="des-column"></th>
                      <th class="des-column"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo __('Customer ID');?> :</td>
                      <td><?php echo $subInfo[0]->id;?></td>
                    </tr>
                    <tr>
                      <td><?php echo __('Subscription Date');?> :</td>
                      <td><?php echo  CakeTime::nice($subInfo[0]->date_created);?></td>
                    </tr>
                    <tr>
                      <td><?php echo __('Package');?></td>
                      <td><?php echo $subInfo[0]->sub_name;?></td>
                    </tr>
                    <tr>
                      <td><?php echo __('Account Expiry Date');?>:</td>
                      <td><?php 
					  	$expiry = ($userMgmt->calculateExpiry($subInfo[0]->allow_days, $subInfo[0]->date_created));
						 $days = '+'.$expiry.' days';
					  echo CakeTime::nice(CakeTime::toServer(strtotime($days)));?></td>
                    </tr>
                    <tr>
                      <td><?php echo __('Account Expires in');?> :</td>
                      <td>Next <?php  echo $expiry;?> days</td>
                    </tr>
                     <tr>
                      <td><?php echo __('Amount Paid');?></td>
                      <td>Rs. <?php echo $subInfo[0]->sub_amount;?></td>
                    </tr>
                  </tbody>
                </table>
          </div>
          <?php if(($this->Session->read('sub_id') == 1) || ($this->Session->read('expiry')<= 10)){?>
          <h3><?php echo __('Upgrade Subscribe Now');?></h3>
          <form id="subsForm" action="<?php echo PAGE_USER_UPGRADE_SUBS;?>" method="post">
          <div class="subscribe-now">
            <div class="row">
              <select name="sub_type" class="selected-amount" onchange="$('#sub_amount').val($(this).val())">
                <option value="">--<?php echo __('Select Package');?>--</option>
                <?php foreach($subOptions as $sub){
					if($sub->sub_id > 1){?>
                	<option value="<?php echo $sub->sub_amount;?>"><?php echo $sub->sub_name;?> (<?php echo $sub->sub_amount;?> Rs)</option>
                <?php }
				}?>
              </select>
            </div>
            <div class="row">
              <label><input class="pay-chk" type="radio" value="pay-by-online" name="payment_mode"> <?php echo __('Pay Online');?></label>
              <label><input class="pay-chk" type="radio" value="pay-by-cheque" name="payment_mode"> <?php echo __('Pay By Cheque');?></label>
              <div class="pay-by-cheque">
                <label><?php echo __('Bank Name');?></label>
                <input type="text" name="bank_name">
                <label><?php echo __('Cheque Number');?></label>
                <input type="text" name="cq_num">
                <label><?php echo __('Cheque Amount');?></label>
                <input class="check-amount" type="text" id="sub_amount" name="sub_amount" readonly>
              </div>
            </div>
            <div class="row">
                <label><?php echo __('I accept all <a href="#.">Terms & Conditions</a>');?>  <input type="checkbox" name="accept_terms"></label>                
            </div>
            <div class="row registration-form-btn">
              <input type="submit" class="button button-primary" value="<?php echo __('SUBMIT');?>">
            </div>
          </div>
          </form>
          <?php }?>
        </div>
      </div>
  </section>
 
 <?php if(($this->Session->read('sub_id') == 1) || ($this->Session->read('expiry')<= 10)){?>
   <script>
$().ready(function() {
		// validate the comment form when it is submitted

	// validate signup form on keyup and submit
	$("#subsForm").validate({
		rules: {
			sub_type: "required",
			bank_name: "required",
			cq_num: "required",
			accept_terms: "required"
		},
		messages: {
			sub_type: "<?php echo __('Please select subsciption package.');?>",
			bank_name: "<?php echo __('Please enter bank name.');?>",
			cq_num: "<?php echo __('Please enter cheque number.');?>",
			accept_terms: "<?php echo __('Please accept our policy.');?>"
		}
	});
});

</script>
<?php }?>