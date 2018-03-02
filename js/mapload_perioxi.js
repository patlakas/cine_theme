jQuery(function($){
	$("#athenssel").change(function () {
		//alert("ααααααααααα");		
		var clickedID = jQuery(this).attr("id");
		var perioxi = $('#' + clickedID).attr("value");	
		var poli = $('#polisel').attr("value");
		//alert(perioxi);	
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action6',
			count: 999,
			perioxi: perioxi,
			poli: poli
		}, function(data) {
			$('#searchmap').html(data);
		});
		$( "#moviesel" ).trigger( "change" );
	});
});


