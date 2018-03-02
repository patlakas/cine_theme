jQuery(function test($){
	$('div[id^=movno]').click(function () {
		var clickedID = jQuery(this).attr("id");
		var movnid = $('#' + clickedID).attr("name");
		var thediv = "slidemov" + movnid; 
		$('#theselected').val(movnid);
    		//alert(thediv);		
		$("div[id^=slidemov]").hide();
		$("#" + thediv).removeClass('hide');
		$("div[id^=slidemov]").fadeOut(-10);
		$("#" + thediv).fadeIn(1100);
	});
});

var interval = setInterval(test, 2000);
