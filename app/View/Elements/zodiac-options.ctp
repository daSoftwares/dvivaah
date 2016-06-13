<?php  $selected = isset($opt_value) ? $opt_value : '';
$subcast = array("Aries(Mesh)" => __("Aries(Mesh)"), "Taurus(Vrushabh)" => __("Taurus(Vrushabh)"), "Gemini(Mithun)" => __("Gemini(Mithun)"), "Cancer(Kark)" => __("Cancer(Kark)"), "Leo(Sinha)" => __("Leo(Sinha)"), "Virgo(Kanya)" => __("Virgo(Kanya)"), "Libra(Tula)" => __("Libra(Tula)"), "Scorpio(Vrishchik)" => __("Scorpio(Vrishchik)"), "Sagittarius(Dhanu)" => __("Sagittarius(Dhanu)"), "Capricorn(Makar)" => __("Capricorn(Makar)"), "Aquarius(Kumbha)" => __("Aquarius(Kumbha)"),"Pisces(Meen)" => __("Pisces(Meen)"));
?>
<option value="">-- <?php echo __("Select");?> --</option>
<?php foreach($subcast as $key => $val){?>
<option <?php echo ($selected == $key ? 'selected' : '');?> value="<?php echo $key;?>">
	<?php echo $val;?>
</option>
<?php }?>
