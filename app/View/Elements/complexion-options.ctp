<?php $selected = isset($opt_value) ? $opt_value : '';
$complex = array("Gora" => __("Gora"), "Gavhal" => __("Gavhal"), "Savala" => __("Savala"));
?>
<option value="">-- <?php echo __("Select");?> --</option>
<?php foreach($complex as $key => $val){?>
<option  value="<?php echo $key;?>" <?php echo ($selected == $key ? 'selected' : '');?>>
	<?php echo $val;?>
</option>
<?php }?>