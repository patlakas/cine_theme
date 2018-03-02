jQuery(function($){
	$('#BSprev').click(function () {
		var selected = $('#BStheselected').attr("value");
		var sel = parseInt(selected)-1;
		if (sel < 1) sel = 4;
		alert(sel);
		$('#BStheselected').val(sel);
		var thediv = "BSslidemov" + sel; 
		alert(thediv);		
		$("div[id^=BSslidemov]").hide();
		$("#" + thediv).removeClass('hide');
		$("div[id^=BSslidemov]").fadeOut(-10);
		$("#" + thediv).fadeIn(1100);

	});
});

jQuery(function($){
	$('#BSnext').click(function () {
		var selected = $('#BStheselected').attr("value");
		var sel = parseInt(selected)+1;
		if (sel > 4) sel = 1;
		alert(sel);
		$('#BStheselected').val(sel);
		var thediv = "BSslidemov" + sel; 
		alert(thediv);		
		$("div[id^=BSslidemov]").hide();
		$("#" + thediv).removeClass('hide');
		$("div[id^=BSslidemov]").fadeOut(-10);
		$("#" + thediv).fadeIn(1100);

	});
});

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


