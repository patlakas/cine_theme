jQuery(function($){
	$("#as-submit").click(function () {
		var movie = $('#as-movie-selector option:selected').val();
		var cinema = $('#as-theater-selector option:selected').val();
		var poli = $('#as-theater-selector option:selected').attr("poli");
		var perioxi = $('#as-theater-selector option:selected').attr("perioxi");
		//alert(perioxi);
		if (movie == undefined) { alert("Επελεξε ταινία ρε βλάχο!"); return; }
		if (cinema == undefined) { alert("Επελεξε κινηματογραφο ρε βλάχο!"); return; }
		var date = $('#as-vdomada').val();
		var aithousa = $('#as-aithousa').val();
		var dubbed; if (document.getElementById('as-dubbed').checked) dubbed = 1; else dubbed = 0;
		var triad; if (document.getElementById('as-3d').checked) triad = 1; else triad = 0;
		var atmos; if (document.getElementById('as-atmos').checked) atmos = 1; else atmos = 0;
		//Festival
		var nyxtes; if (document.getElementById('as-nyxtes').checked) nyxtes = 1; else nyxtes = 0;
		var thess; if (document.getElementById('as-thess').checked) thess = 1; else thess = 0;
		//program
		var kath = $('#as-program-kath').val();
		var pem = $('#as-program-pem').val();
		var par = $('#as-program-par').val();
		var sav = $('#as-program-sav').val();
		var kyr = $('#as-program-kyr').val();
		var dey = $('#as-program-dey').val();
		var tri = $('#as-program-tri').val();
		var tet = $('#as-program-tet').val();
		var user = $('#as-user').val();
		
		$.post(ajax_object.ajaxurl, {
			action: 'ajax_action22',
			movie: movie,
			cinema: cinema,
			poli: poli,
			perioxi: perioxi,
			date: date,
			aithousa: aithousa,
			dubbed: dubbed,
			triad: triad,
			atmos: atmos,
			nyxtes: nyxtes,
			thess: thess,
			kath: kath,
			pem: pem,
			par: par,
			sav: sav,
			kyr: kyr,
			dey: dey, 
			tri: tri,
			tet: tet,
			user: user
		}, function(data) {
			$('#as-submitted').html(data);
		});
		$('#as-program-kath').val('');
		$('#as-program-pem').val('');
		$('#as-program-par').val('');
		$('#as-program-sav').val('');
		$('#as-program-kyr').val('');
		$('#as-program-dey').val('');
		$('#as-program-tri').val('');
		$('#as-program-tet').val('');
		//$( "#moviesel" ).trigger( "change" );
	});
});


