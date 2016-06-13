<?php 
$selected = isset($siblings) ? $siblings : '';
for($i = 0; $i <=5; $i++){?>
    <option <?php echo ($selected == $i ? 'selected' : '');?> value="<?php echo $i;?>"><?php echo $i;?></option>
<?php }?>