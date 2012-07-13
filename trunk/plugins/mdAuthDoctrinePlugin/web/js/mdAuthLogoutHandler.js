// evalua las respuestas ajax de JQuery y si no esta logueado hace reload

$(function() {
	$(document).ajaxComplete(function(request, response){
		var json = jQuery.parseJSON(response.responseText);
		if(json.logout)
			document.location.reload();
	});
});
