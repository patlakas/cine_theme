/*jQuery(function($){
	$('div[id^=VDmovno]').click(function () {
		var clickedID = jQuery(this).attr("id");
		var movnid = $('#' + clickedID).attr("name");
		var thediv = "VDslidemov" + movnid; 
		$('#VStheselected').val(movnid);
    		alert(thediv);		
		$("div[id^=VDslidemov]").hide();
		$("#" + thediv).removeClass('hide');
		$("div[id^=VDslidemov]").fadeOut(-10);
		$("#" + thediv).fadeIn(1100);
		//$("div[id^=VDmovno]").fadeTo(100,0.4);
		$('#' + clickedID).fadeTo(100,1);
	});
});
*/
jQuery(function($){
	$('div[id^=VDmovno]').click(function () {
		//alert("ααααααααααα");		
		var clickedID = jQuery(this).attr("id");
		var movnid = $('#' + clickedID).attr("name");		
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action5',
			count: 999,
			movID: movnid
		}, function(data) {
			$('#videocontainer').html(data);
		});
	});
});
