jQuery(function($){
	$("#as-theater").keyup(function () {
		//alert("ααααααααααα");		
		var clickedID = jQuery(this).attr("id");
		var text = $('#as-theater').attr("value");
		//alert(text);	
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action21',
			text: text
		}, function(data) {
			$('#as-theater-sel').html(data);
		});
		//$( "#moviesel" ).trigger( "change" );
	});
});


