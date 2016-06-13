<?php $selected = isset($opt_value) ? $opt_value : '';
$service = array(__("Government"), __("Defence"), __("Private"), __("Business"), __("Self Employed"), __("Not Working"));
?>
<option value="">-- <?php echo __("Select");?> --</option>
<?php foreach($service as $val){?>
<option <?php echo ($selected == $val ? 'selected' : '');?> value="<?php echo $val;?>">
	<?php echo $val;?>
</option>
<?php }?>