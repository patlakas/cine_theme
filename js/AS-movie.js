jQuery(function($){
	$("#as-movie").keyup(function () {
		//alert("ααααααααααα");		
		//var clickedID = jQuery(this).attr("id");
		var text = $('#as-movie').attr("value");
		//alert(text);	
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action20',
			text: text
		}, function(data) {
			$('#as-movie-sel').html(data);
		});
		//$( "#moviesel" ).trigger( "change" );
	});
});


