<?php 
$user_id = $this->Session->read('id');
$hrefUrl = (!empty($user_id)) ? PAGE_USER_SUBS : "javascript:alert('".(__('Please login to upgrade.'))."');";
?>
<section class="wrapper-max subscription-page">
    <div class="container">
      <?php echo $this->element('add-banner');?>
      <div class="content-style">
        <h2><?php echo __('Subscription');?></h2>
        
        <div class="row">
	<div class="four columns three-months">
	  <div class="subscription-months">
		<p>3 <?php echo __('Months');?></p>
	  </div>
	  <span class="rupee"><sub>&#x20B9;</sub>300</span>
	  <p><?php echo __('Get four profile contact details each month');?></p>
	  <p><a class="subscription-more-details" href="#."><?php echo __('Read More');?></a></p>
      <?php $amt = !empty($user_id) ? "/".$user_id."/300.html" : "";?>
	  <a class="button button-primary" href="<?php echo $hrefUrl.$amt;?>"><?php echo __('SUBSCRIBE NOW');?></a>
	</div>
	<div class="four columns six-months">
	   <div class="subscription-months">
		<p>6 <?php echo __('Months');?></p>
	  </div>
	  <span class="rupee"><sub>&#x20B9;</sub>500</span>
	  <p><?php echo __('Get four profile contact details each month');?></p>
	  <p><a class="subscription-more-details" href="#."><?php echo __('Read More');?></a></p>
      <?php $amt = !empty($user_id) ? "/".$user_id."/500.html" : "";?>
	  <a class="button button-primary" href="<?php echo $hrefUrl.$amt;?>"><?php echo __('SUBSCRIBE NOW');?></a>
	</div>

	<div class="four columns thelve-months">
	   <div class="subscription-months">
		<p>1 <?php echo __('Year');?></p>
	  </div>
	  <span class="rupee"><sub>&#x20B9;</sub>800</span>
	  <p><?php echo __('Get four profile contact details each month');?></p>
	  <p><a class="subscription-more-details" href="#."><?php echo __('Read More');?></a></p>
      <?php $amt = !empty($user_id) ? "/".$user_id."/800.html" : "";?>
	  <a class="button button-primary" href="<?php echo $hrefUrl.$amt;?>"><?php echo __('SUBSCRIBE NOW');?></a>
	</div>

  </div>
        
        <h3><?php echo __('Facilities after Subscription');?></h3>
        <?php if(Configure::read('Config.language') == 'mar'){?>
        <ul class="unorder-list">
          <li>वापरकर्ता पूर्ण शोध प्रोफाइल तपशील पाहू शकतात!</li>
          <li>वापरकर्ता आवडते वधू किंवा वर प्रोफाइल जोडू शकतात जेणेकरून ते तुम्हाला नंतर पाहता येईल <span class="highlight-txt">(जास्तीत जास्त १० तपशील)</span>.</li>
          <li>वापरकर्ता "स्टार "चिन्हावर  क्लिक करून आपल्याला आवडलेले  प्रोफाइल सूची पाहू शकतील, ते "स्टार" चिन्ह वरच्या डाव्या कोपर्यात आहे!</li>
          <li>वापरकर्ता "संपर्क माहितीसाठी" या बटणावर क्लिक करून वधू किंवा वरची माहिती आपल्या रजिस्टर मेल आयडी वर मिळवु शकतील. "संपर्क माहितीसाठी" हे बटण प्रोफाइल तपशील या पृष्ठावर आहे!<span class="highlight-txt">(जास्तीत जास्त १० तपशील प्रति / महिना) </span>.</li>
          <li>वापरकर्ता "आजपर्यंत निवडलेले प्रोफाइल" या पर्यायावर क्लिक करून निवडलेले प्रोफाइल तपशील पाहू शकतील. "आजपर्यंत निवडलेले प्रोफाइल" हा पर्याय "माझे प्रोफाइल" या पर्याया अंतर्गत आहे!</li>
          <li><span class="highlight-txt">टीप: वरील सुविधांचा लाभ घेण्यासाठी वापरकर्ता त्याच्या खात्यात लॉग-इन असणे आवश्यक आहे, वापरकर्ता धनगर विवाह सेवेचा गैरवापर करताणा आढळल्यास त्यावर कठोर कारवाई करण्यात येइल. त्या वापरकर्ताचे खाते निलंबित करण्याचा अधिकार धनगर विवाह कडे आहे!</span></li>
        </ul>
        <?php }else{?>
        <ul class="unorder-list">
          <li>User can view complete details of searched Profile.</li>
          <li>User can add Bride (Vadhu) / Groom (Var) profile to Favorite so that it could be viewed later <span class="highlight-txt">(Maximun 10)</span>.</li>
          <li>User can see list of profiles added to Favorite by clicking on the "Star" Icon which is there on top left cornet.</li>
          <li>User can get Bride (Vadhu) / Groom (Var) Contact Details on there registered Email ID by clicking "Get Contact Details" button which is there on profile details page <span class="highlight-txt">(Maximum 10 Details Per/Month)</span>.</li>
          <li>User can see selected profile details by clicking on "Selected Profile History" option under "My Profile".</li>
          <li><span class="highlight-txt">Note: User must be logged-In to his account to take advantage of the above Facilities, If user found misusing the services of Dhangar Vivaah, A strict action would be taken agents a user. Dhangar Vivaah has the right to suspend your profile</span></li>
        </ul>
        <?php }?>
      </div>
    </div>
  </section>