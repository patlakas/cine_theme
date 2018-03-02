jQuery(function($){
	$("#bo-submit").click(function () {
		//alert("OUAOY");
		var movie = $('#as-movie-selector option:selected').val();
		if (movie == undefined) { alert("Επελεξε ταινία ρε βλάχο!"); return; }
		var weekath = $('#this-week-ath').val();
		var totalath = $('#total-ath').val();
		var weekell = $('#this-week-ell').val();
		var totalell = $('#total-ell').val();
		var date = $('#as-vdomada').val();
		var company = $('#company').val();
		
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_actionbox',
			movie: movie,
			weekath: weekath, 
			totalath: totalath,  
			weekell: weekell, 
			totalell: totalell,
			date: date,
			company: company	
		}, function(data) {
			$('#bo-submitted').html(data);
		});
		$('#this-week-ath').val('');
		$('#total-ath').val('');
		$('#this-week-ell').val('');
		$('#total-ell').val('');
		//$( "#moviesel" ).trigger( "change" );*/
	});
});


