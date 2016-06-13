$(document).ready(function(){

	$('.date-of-birth').datepicker({
		viewMode:'years',
		format:'dd/mm/yyyy'		 
	});

	$('.time-of-birth').timepicker({
		defaultTime: false
	});
	
	$('.pay-chk').click(function(){
		var selected = $(this).val();

		if(selected == 'pay-by-cheque'){
			$('.'+ selected).show();
		} else{
			$('.pay-by-cheque').hide();
		}
	});

	$('.selected-amount').change(function(){
		var selectedValue = $(this).val();
		$('.amount-to-pay,.check-amount').val(selectedValue + ' Rs');
	});

	$('#input-daterange').datepicker({
    	format: "dd-M-yyyy",
    	endDate: "today"
	});
});