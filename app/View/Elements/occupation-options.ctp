<?php
$occupation = array(
	"-- ADMIN --" => array(
	 		"Manager", "Supervisor", "Officer", "Administrative Professional", "Executive", "Clerk", "Human Resources Professional"
	 	), 
	"-- AGRICULTURE --" => array(
	 		"Agriculture &amp; Farming Professional"
	 	), 
	"-- AIRLINE --" => array(
	 		"Pilot", "Air Hostess", "Airline Professional"
	 	), 
	"-- ARCHITECT &amp; DESIGN --" => array(
	 		"Architect", "Interior Designer"
	 	), 
	"-- BANKING &amp; FINANCE --" => array(
	 		"Chartered Accountant", "Company Secretary", "Accounts / Finance Professional", "Banking Service Professionat" , "Auditor", "Financial Analyst / Planning", "Financial Accountant"
		), 
	"-- BEAUTY &amp; FASHION --" => array(
	 		"Fashion Designer", "Beautician"
	 	), 
	"-- CIVIL SERVICES --" => array(
	 		"Civil Services (IAS/IPS/IRS/IES/IFS)"
	 	), 
	"-- DEFENCE --" => array(
	 		"Army", "Navy", "Airforce"
	 	), 
	"-- EDUCATION --" => array(
	 		"Professor / Lecturer", "Teaching / Academician", "Education Professional"
	 	),
	"-- HOSPITALITY --" => array(
	 		"Hotel / Hospitality Professional"
	 	), 
	"-- IT &amp; ENGINEERING --"  => array(
	 		"Software Professional", "Hardware Professional", "Engineer - Non IT", "Designer"
	 	), 
	"-- LEGAL --"  => array(
	 		"Lawyer &amp; Legal Professional"
	 	), 
	"-- LAW ENFORCEMENT  --"  => array(
	 		"Law Enforcement Officer"
	 	), 
	"-- MEDICAL --" => array(
	 		"Doctor", "Health Care Professional", "Paramedical Professional","Nurse"
	 	), 
	"-- MARKETING &amp; SALES --"  => array(
	 		"Marketing Professional", "Sales Professional"
	 	), 
	"-- MEDIA &amp; ENTERTAINMENT --"  => array(
	 		"Journalist", "Media Professional", "Entertainment Professional", "Event Management Professional", "Advertising / PR Professional", "Designer"
	 	),
	"-- MERCHANT NAVY --" => array(
	 		"Mariner / Merchant Navy"
	 	),
	"-- SCIENTIST --"  => array(
	 		"Scientist / Researcher"
	 	),
	"-- TOP MANAGEMENT --"  => array(
	 		"CXO / President, Director, Chairman", "Business Analyst"
	 	),
	"-- OTHERS --"  => array(
	 		"Consultant", "Customer Care Professional", "Social Worker", "Sportsman", "Technician", "Arts &amp; Craftsman", "Student", "Librarian"
	 	)
	 );
?>
<option value="">-- <?php echo __("Select");?> --</option>
<?php 
 $selected = isset($opt_value) ? $opt_value : '';
	foreach($occupation as $key => $job){?>
    	<optgroup label="<?php echo $key;?>">
		<?php
        foreach($job as $val){?>
             <option <?php echo ($selected == $val ? 'selected' : '');?>  value="<?php echo $val;?>"><?php echo $val;?></option>
        <?php
            }?>	
        </optgroup>
       <?php
        }
?>
