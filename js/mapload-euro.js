jQuery(function($){
	$("#poliseleuro").change(function () {
		//alert("ααααααααααα");		
		var clickedID = jQuery(this).attr("id");
		var poli = $('#' + clickedID).attr("value");	
		//alert(poli);	
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action5',
			count: 999,
			poli: poli
		}, function(data) {
			$('#searchmap').html(data);
		});
		//$( "#moviesel" ).trigger( "change" );
		$('#athensseleuro').val("all").change();
	});
});


