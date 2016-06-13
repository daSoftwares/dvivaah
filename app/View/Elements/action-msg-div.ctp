<?php if(!empty($msgClass) && !empty($msgText)){?>
        <div class="<?php echo $msgClass;?>">
        	<?php $icon =  $msgClass == 'success-message-container' ? 'glyphicon-ok' : 'glyphicon-warning-sign';?>
          <span aria-hidden="true" class="glyphicon <?php echo $icon;?>"></span>
          <span><?php echo $msgText;?></span>
        </div>
<?php }elseif($msgText = $this->Session->flash()){?>
    <?php echo $msgText;?>
 
<?php	
}else{?>
<div id="commonMsgDiv" style="display:none;">
     <div id="commonMsgClass" class="">
          <span id="commonMsgIcon" aria-hidden="true" class="glyphicon "></span>
          <span id="commonMsgText"></span>
    </div>
</div>
<?php }?>