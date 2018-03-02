jQuery(function test($){
	$('div[id^=BSmovno]').click(function () {
		var clickedID = jQuery(this).attr("id");
		var movnid = $('#' + clickedID).attr("name");
		var thediv = "BSslidemov" + movnid; 
		$('#BStheselected').val(movnid);
    		//alert(thediv);		
		$("div[id^=BSslidemov]").hide();
		$("#" + thediv).removeClass('hide');
		$("div[id^=BSslidemov]").fadeOut(-10);
		$("#" + thediv).fadeIn(1100);
		$("div[id^=BSmovno]").fadeTo(100,0.4);
		$('#' + clickedID).fadeTo(100,1);
		window.clearInterval(xronos);
		xronos = setInterval(function thetime(){
		jQuery(function($){
				var selected = $('#BStheselected').attr("value");
				var sel = parseInt(selected)+1;
				if (sel > 4) sel = 1;
				//alert(sel);
				$('#BStheselected').val(sel);
				var thediv = "BSslidemov" + sel; 
				//alert(thediv);		
				$("div[id^=BSslidemov]").hide();
				$("#" + thediv).removeClass('hide');
				$("div[id^=BSslidemov]").fadeOut(-10);
				$("#" + thediv).fadeIn(1100);
				$("div[id^=BSmovno]").fadeTo(100,0.4);
				$("#BSmovno" + sel).fadeTo(100,1);

		});
		}, 10000);


	});
});

