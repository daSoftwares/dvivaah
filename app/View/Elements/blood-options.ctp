<?php  $selected = isset($opt_value) ? $opt_value : '';
$bgroup = array("A +ve", "B +ve", "AB +v", "O +ve", "A -ve", "AB -ve", "O -ve");
?>
<option value="">-- <?php echo __("Select");?> --</option>
<?php foreach($bgroup as $val){?>
<option <?php echo ($selected == $val ? 'selected' : '');?> value="<?php echo $val;?>">
	<?php echo $val;?>
</option>
<?php }?>