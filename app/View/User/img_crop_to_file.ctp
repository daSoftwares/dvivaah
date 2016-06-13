<section class="wrapper-max min-height view-history-wrapper add-background">    
  <div class="container">
    <div class="content-style">
        <div class="row">
          <?php echo $this->element('action-msg-div');?>
          <img src="<?php echo USER_PROFILE_HTTP_PATH.$user_img;?>" id="cropbox"/>
          <form action="<?php echo PAGE_IMG_CROP;?>" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
             <div class="clearfix"></div>
              <div class="view-full-prof-btn">
			<input type="submit" value="Crop Image" class="button button-info" />
            </div>
           </div>
		</form>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords,
	   bgColor:     'black',
	   bgOpacity:   .4,
	   aspectRatio: 16 / 16,
	   minSize: [200, 200],
	   maxSize: [400, 400],
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script>