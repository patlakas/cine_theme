jQuery(function test($){
	$('img[id^=rating_]').click(function () {
		//alert("AAAAAAAAAAAAAAAA");	
		var clickedID = jQuery(this).attr("id");
		var rating = $('#' + clickedID).attr("name");
		var userID = $('#userID').attr("value");
		var movieID =  $('#movieID').attr("value");
		//alert(rating);	
		//alert(userID);
		//alert(movieID);
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action10',
			count: 999,
			userID: userID,
			movieID: movieID,
			rating: rating
		}, function(data) {
			$('#justrated').html(data);
		});		

	});
});

