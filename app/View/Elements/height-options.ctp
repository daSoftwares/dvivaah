<?php  $selected = isset($opt_value) ? $opt_value : '';?>
<option value="">--- Feet/Inches ---</option>
<?php 
	for($i = 4; $i<=7; $i++){
		$val = $i.' feet';?>
    	<option  value="<?php echo $val;?>" <?php echo ($selected == $val ? 'selected' : '');?>>
			<?php echo $val;?>
		</option>
	<?php
    for($j=1; $j<=11; $j++){
		$val = $i.' feet '.$j.' inche';
		?>
    	<option  value="<?php echo $val;?>" <?php echo ($selected == $val ? 'selected' : '');?>>
	<?php echo $val;?>
</option>
	<?php
		}		
	}
?>