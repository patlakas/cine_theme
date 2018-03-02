jQuery(function($){
	$('#prevmovie').click(function () {
		var selected = $('#theselected').attr("value");
		var sel = parseInt(selected)-1;
		if (sel < 1) sel = 12;
		//alert(sel);
		$('#theselected').val(sel);
		var thediv = "slidemov" + sel; 
		//alert(thediv);		
		$("div[id^=slidemov]").hide();
		$("#" + thediv).removeClass('hide');
		$("div[id^=slidemov]").fadeOut(-10);
		$("#" + thediv).fadeIn(1100);

	});
});

jQuery(function($){
	$('#nextmovie').click(function () {
		var selected = $('#theselected').attr("value");
		var sel = parseInt(selected)+1;
		if (sel > 12) sel = 1;
		//alert(sel);
		$('#theselected').val(sel);
		var thediv = "slidemov" + sel; 
		//alert(thediv);		
		$("div[id^=slidemov]").hide();
		$("#" + thediv).removeClass('hide');
		$("div[id^=slidemov]").fadeOut(-10);
		$("#" + thediv).fadeIn(1100);

	});
});

//window.setInterval(function(){
//jQuery(function($){
//		var selected = $('#theselected').attr("value");
//		var sel = parseInt(selected)+1;
//		if (sel > 12) sel = 1;
		//alert(sel);
//		$('#theselected').val(sel);
//		var thediv = "slidemov" + sel; 
		//alert(thediv);		
//		$("div[id^=slidemov]").hide();
//		$("#" + thediv).removeClass('hide');
//		$("div[id^=slidemov]").fadeOut(-10);
//		$("#" + thediv).fadeIn(1100);
//
//});
//}, 5000);


