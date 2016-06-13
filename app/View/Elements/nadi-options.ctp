<?php $selected = isset($opt_value) ? $opt_value : '';
$nadi = array("Aadya" => __("Aadya"), "Madhya" => __("Madhya"), "Antya" => __("Antya"));
?>
<option value="">-- <?php echo __("Select");?> --</option>
<?php foreach($nadi as $key => $val){?>
<option <?php echo ($selected == $key ? 'selected' : '');?> value="<?php echo $key;?>">
	<?php echo $val;?>
</option>
<?php }?>
