<?php $selected = isset($opt_value) ? $opt_value : '';
$subcast = array( "Khutekar" => __("Khutekar"), "Hatkar" => __("Hatkar"), "Khatik" => __("Khatik"), "Sengar" => __("Sengar"), "Dange" => __("Dange"), "Ahir" =>  __("Ahir"), "Zende" => __("Zende"), "Mendhe" => __("Mendhe"), "Kurbar" =>  __("Kurbar"), 
				"Hulwan" =>  __("Hulwan"), "Kanade" => __("Kanade"), "Gadari" => __("Gadari"), "Gawli" => __("Gawli"), "Shegar" => __("Shegar"), "Pal" => __("Pal"), "Gadariya" => __("Gadariya"));
?>
<option value="">-- <?php echo __("Select");?> --</option>
<?php foreach($subcast as $key => $val){?>
<option <?php echo ($selected == $key ? 'selected' : '');?> value="<?php echo $key;?>">
	<?php echo $val;?>
</option>
<?php }?>
