<?php 
$education = array(
	"Bachelors - Engineering / Computers / Others" => array(
	 		"BCA", "Aeronautical Engineering", "B Arch", "B Plan", "BE", "B Tech", "Other Bachelor Degree", "BSc IT / Computer Science"
	 	), 
	"Masters - Engineering / Computers / Others" => array(
	 		"MS (Engg).", "M Arc", "MCA", "PGDCA", "ME", "M Tech", "MSc IT / Computer Science"
	 	), 
	"Bachelors - Arts / Science / Commerce / Others" => array(
	 		"B Phil", "BCom", "BSc", "BA", "B Ed", "Aviation Degree", "BFA", "BLIS", "BSW", "BMM (MASS MEDIA)", "BFT", "Other Bachelor Degree"
	 	), 
	"Masters - Arts / Science / Commerce / Others" => array(
	 		"M Phil", "M Com", "M Sc", "MA", "M E", "MLIS", "MSW", "Other Master Degree"
	 	), 
	"Bachelors - Management / Others" => array(
	 		"BHM", "BBA", "BFM (Financial Management)", "Other Bachelor Degree in Management" 
		), 
	"Masters - Management / Others" => array(
	 		"MHM", "MBA", "PGDM", "MHRM (Human Resource Management)", "MFM (Financial Management)", "Other Master Degree  in Management"
	 	), 
	"Bachelors - Medicine - General / Dental / Surgeon / Others" => array(
	 		"MBBS", "BDS", "BPT", "BHMS", "BAMS", "B Pharm", "BSMS", "BUMS", "Other Bachelor Degree in Medicine"
	 	), 
	"Masters - Medicine - General / Dental / Surgeon / Others" => array(
	 		"MD / MS (Medical)", "MDS", "MVSc", "MPT", "Other Master Degree in Medicine"
	 	), 
	"Bachelors - Legal / Others" => array(
	 		"BGL", "BL", "LLB", "Other Bachelor Degree in Legal"
	 	),
	"Masters - Legal / Others" => array(
	 		"ML", "LLM", "Other Master Degree in  Legal"
	 	), 
	"Finance - ICWAI / CA / CS/ CFA / Others"  => array(
	 		"CA", "ICWA", "CS", "CFA (Chartered Financial Analyst)", "Other Degree in Finance"
	 	), 
	"Service - IAS / IAS / IRS / IES / IFS / Others"  => array(
	 		"IAS", "IAS", "IRS", "IES", "IFS", "Other Degree in Service"
	 	), 
	"PhD"  => array(
	 		"Ph D"
	 	), 
	"Diploma / Others"  => array(
	 		"Trade School", "Diploma", "Polytechnic"
	 	),
	"Higher Secondary / Secondary" => array(
	 		"High School"
	 	)
	 );
?>
<option value="">-- <?php echo __("Select");?> --</option>
<?php 
$selected = isset($opt_value) ? $opt_value : '';
	foreach($education as $key => $edu){?>
    	<optgroup label="<?php echo $key;?>">
		<?php
        foreach($edu as $val){?>
             <option <?php echo ($selected == $val ? 'selected' : '');?>  value="<?php echo $val;?>"><?php echo $val;?></option>
        <?php
            }?>	
        </optgroup>
       <?php
        }
?>
<?php /*
<optgroup label="Bachelors - Engineering / Computers / Others">
    <option value="BCA">BCA</option>
    <option value="Aeronautical Engineering">Aeronautical Engineering</option>
    <option value="B Arch">B Arch</option>
    <option value="B Plan">B Plan</option>
    <option value="BE">BE</option>
    <option value="B Tech">B Tech</option>
    <option value="Other Bachelor Degree">Other Bachelor Degree</option>
    <option value="BSc IT / Computer Science">BSc IT / Computer Science</option>
</optgroup>
*/?>



