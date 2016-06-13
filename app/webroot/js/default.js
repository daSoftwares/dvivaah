$(document).ready(function(){

	$('.forgot-pass-link').click(function(){
		$('.login-modal').modal('toggle');
	});

	$('.date-of-birth').datepicker({
		viewMode:'years',
		format:'dd/mm/yyyy'		 
	});

	$('.time-of-birth').timepicker({
		defaultTime: false
	});

	/*****************Advance Search*************************/
	
	$(document).on('click','.slide-search-btn, .advance-search-btn', function(){
		$('.advance-search-profile').toggle("slow");
		$('.glyphicon-menu-down').toggle();
		$('.glyphicon-menu-up').toggle();
	});

	/***************Mobile Nav***************************/
	
	// $(document).on('click','.mobile-nav-container > .glyphicon', function(){
	// 	$('.mobile-nav').slideToggle('slow');

	// });

	$('.mobile-nav-container').hover(function(){
		$('.mobile-nav').addClass('show');		
	}, function() {
		$('.mobile-nav').removeClass('show');
	});
	
	/***************My Account***************************/
	
	$('.user').hover(function(){
		$('.actions-list').addClass('show');		
	}, function() {
		$('.actions-list').removeClass('show');
	});

	/**********Edit Profile******************/
	$('.edit-profile-details').slideUp("slow");
	$(document).on('click','.edit-profile-container h3', function(){
		var container = $(this).parent().find('.edit-profile-details');
		$('.glyphicon').removeClass('glyphicon-minus').addClass('glyphicon-plus');
		$('.edit-profile-details').slideUp(1000).removeClass('active');	
		$(container).slideDown(1000).addClass('active');
		$(this).find('.glyphicon').removeClass('glyphicon-plus').addClass('glyphicon-minus');
	})

	/*********Pay-By-Cheque**************/
	$('.pay-chk').click(function(){
		var selected = $(this).val(),
			selectedAmount = '';
		if(selected == 'pay-by-cheque'){
			$('.'+ selected).show();
			// $('.check-amount').val()= selectedAmount;
		} else{
			$('.pay-by-cheque').hide();
		}
	});

	/*$(window).load(function(){
		window.setTimeout(function(){
            $('.suggested-profiles').modal('show');
        }, 500)
        
    });*/

});