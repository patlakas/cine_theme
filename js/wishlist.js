jQuery(function test($){
	$('#wishlist').click(function () {
		//alert("AAAAAAAAAAAAAAAA");	
		var clickedID = jQuery(this).attr("id");
		var userID = $('#userID').attr("value");
		var movieID =  $('#movieID').attr("value");
		//alert(userID);
		//alert(movieID);
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action11',
			count: 999,
			userID: userID,
			movieID: movieID,
		}, function(data) {
			$('#thewishlist').html(data);
		});		

	});
});

