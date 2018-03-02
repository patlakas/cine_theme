jQuery(function($){
	$("#moviesel").change(function () {
		//alert("reeeeeeeeeeeeeeeeeeeeee");		
		var clickedID = jQuery(this).attr("id");
		var tainia = $('#' + clickedID).attr("value"); 	
		var poli = $('#polisel').attr("value"); 
		var perioxi = $('#athenssel').attr("value");
		var lesseuro = $('#lesseuro').attr("value");
		var incinemas = $('#incinemas').attr("value");
		//alert(tainia);	
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action7',
			count: 999,
			tainia: tainia,
			poli: poli,
			perioxi: perioxi,
			lesseuro: lesseuro,
			incinemas: incinemas
		}, function(data) {
			$('#searchresults').html(data);
		});
	});
});


jQuery(function($){
	$('div[id^=mov]').click(function () {		
		var clickedID = jQuery(this).attr("themov");
		//alert(clickedID);
		$('#moviesel').val(clickedID).change();
		var tainia = $('#moviesel').attr("value"); 
		var poli = $('#polisel').attr("value"); 
		var perioxi = $('#athenssel').attr("value");
		var lesseuro = $('#lesseuro').attr("value");
		var incinemas = $('#incinemas').attr("value");
		//alert(tainia);	
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action7',
			count: 999,
			tainia: tainia,
			poli: poli,
			perioxi: perioxi,
			lesseuro: lesseuro,
			incinemas: incinemas
		}, function(data) {
			$('#searchresults').html(data);
		});
	});
});


