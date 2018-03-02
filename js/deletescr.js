jQuery(function test($){
	$('div[id^=deletescr]').click(function () {
		//alert("AAAAAAAAAAAAAAAA");	
		var clickedID = jQuery(this).attr("name");
		//alert(clickedID);
		//alert(movieID);
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action25',
			count: 999,
			clickedID: clickedID
		}, function(data) {
			$('#deletetext').html(data);
		});		

	});
});

