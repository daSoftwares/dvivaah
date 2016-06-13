<?php  $selected = isset($opt_value) ? $opt_value : '';
$status = array("Unmarried" => __("Unmarried"), "Widow/Widower" => __("Widow/Widower"), "Divorcee" => __("Divorcee"));
echo $selected;
?>
<?php foreach($status as $key => $val){?>
<option  value="<?php echo $key;?>" <?php echo ($selected == $key ? 'selected' : '');?>>
	<?php echo $val;?>
</option>
<?php }?>