function fnErrorDiv(msgDiv, msgClass, msgIcon, msgTextDiv, msgText){
	$('#'+msgDiv).show();
	$('#'+msgClass).removeClass('success-message-container').addClass('error-message-container');
	$('#'+msgIcon).removeClass('glyphicon-ok').addClass('glyphicon-warning-sign');
	$('#'+msgTextDiv).text(msgText);
}

function fnSuccessDiv(msgDiv, msgClass, msgIcon, msgTextDiv, msgText){
	$('#'+msgDiv).show();
	$('#'+msgClass).removeClass('error-message-container').addClass('success-message-container');
	$('#'+msgIcon).removeClass('glyphicon-warning-sign').addClass('glyphicon-ok');
	$('#'+msgTextDiv).text(msgText);	
}