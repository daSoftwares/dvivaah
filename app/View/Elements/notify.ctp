<?php if($this->Session->check('id')){?>  
<!--Notify User-->
<script type="text/javascript">
var notification_html = [];
<?php if($this->Session->read('sub_id') == 1){?>
	notification_html[1] = '<div class="activity-item"> <div class="activity"> YOU ARE NOT A PAID SUBSCRIBED USER PLEASE <a href="<?php echo PAGE_USER_SUBS;?>">CLICK HERE</a> TO SUBSCRIBE AND GET MORE FEATURES.</div> </div>';
<?php }?> 
<?php if($this->Session->read('expiry')<= 10){?>
    notification_html[2] = '<div class="activity-item"> <div class="activity"> YOU ACCOUNT IS ABOUT TO EXPIRE IN <?php echo $this->Session->read('expiry');?> DAYS. PLEASE <a href="<?php echo PAGE_USER_SUBS;?>">CLICK HERE</a> TO INCRESE ACCOUNT VALIDITY</div> </div>';
<?php }?> 
$(document).ready(function(){
	  <?php if($this->Session->read('sub_id') == 1){?>
      	getErrorNotify(1);
	  <?php }?> 
	  <?php if($this->Session->read('expiry')<= 10){?>
      	getErrorNotify(1);
	<?php }?> 
});
function getErrorNotify(num = 0){
	generate('error', notification_html[num]);
}
</script>
<?php }?>