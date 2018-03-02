jQuery(function($){
	$("#pamereeuro").click(function () {
		//alert("ααααααααααα");		
		var clickedID = jQuery(this).attr("id");
		var perioxi = $('#athensseleuro').attr("value");	
		var poli = $('#poliseleuro').attr("value");
		//alert(poli);	
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action8',
			count: 999,
			perioxi: perioxi,
			poli: poli
		}, function(data) {
			$('#searchresults').html(data);
		});
	});
});


