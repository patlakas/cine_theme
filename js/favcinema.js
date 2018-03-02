jQuery(function test($){
	$('#favcinema').click(function () {
		//alert("AAAAAAAAAAAAAAAA");	
		var clickedID = jQuery(this).attr("id");
		var userID = $('#userID').attr("value");
		var theaterID =  $('#theaterID').attr("value");
		//alert(userID);
		//alert(movieID);
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action12',
			count: 999,
			userID: userID,
			theaterID: theaterID
		}, function(data) {
			$('#thefavcinema').html(data);
		});		

	});
});

