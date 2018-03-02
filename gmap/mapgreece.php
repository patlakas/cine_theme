	<?php 
		$args = array(
		    'post_type' => array('movietheater'),
		    'posts_per_page' => -1,
		    'tax_query' => $taxquery
		);
		echo $tax_query;
		$markcount = 1;
		$loop2 = new WP_Query( $args );
		while ( $loop2->have_posts() ) : $loop2->the_post(); 
			$theater = get_the_ID();
			$theatertitle = get_the_title( $theater );
			$theater_type = get_field('theater_type');
			$address_map = get_field('address_map', $theater);
	?>		
	<?php $desprogramma = '<a href="' . get_permalink($theater) . '"> Δες το πρόγραμμα του </a>'; ?>
<div theatertype="<?php echo $theater_type; ?>" permalink="<?php echo get_permalink($theater); ?>" cinema="<?php echo $theatertitle; ?>" id="<?php echo $theater; ?>"  class="marker" lat="<?php echo $address_map['lat']; ?>" lng="<?php echo $address_map['lng']; ?>"></div>
	<?php endwhile; 
	// Here the markers are printed in the html document but not visible to user, but accesible from the javascript
	?>

	
    <script>
      function initMap() {
	var athensLL = {lat: 37.9822, lng: 23.7335};
	var icon1 = 'http://cinefreaks.gr/wp-content/themes/CINE2018/img/pin-red.png'; 
	var icon2 = 'http://cinefreaks.gr/wp-content/themes/CINE2018/img/pin-blue.png';
	var icon3 = 'http://cinefreaks.gr/wp-content/themes/CINE2018/img/pin-green.png';
	
        var map = new google.maps.Map(document.getElementById('mapgr'), {
          zoom: 6,
          center: athensLL
        });
	
	(function($) {
		$('.marker').each(function(i, obj) {
			var theaterid = obj.id;
			var markerlat = document.getElementById(theaterid).getAttribute("lat"); 
			var markerlng = document.getElementById(theaterid).getAttribute("lng"); 
			var theatertype = document.getElementById(theaterid).getAttribute("theatertype"); 
			var theaterlink = document.getElementById(theaterid).getAttribute("permalink");
			var latlng = new google.maps.LatLng(markerlat, markerlng);	
			var cinemaname = document.getElementById(theaterid).getAttribute("cinema");
			var theicon = '';
			if (theatertype == 'theater') theicon = icon1;
			if (theatertype == 'multi') theicon = icon2;
			if (theatertype == 'open') theicon = icon3;
			var infowincontent = '<strong>' + cinemaname + '</strong>' + '<br>' + 'Δες το <a href=" ' + theaterlink + '"> πρόγραμμα του κινηματογράφου στην σελίδα του </a>';
			var marker = new google.maps.Marker({
			  position: latlng,
			  map: map,
			  icon: theicon,
			});
			marker.addListener('click', function() {
		    		infowindow.open(map, marker);
		  	});

			var infowindow = new google.maps.InfoWindow({
			    content: infowincontent 
		  	});
			
		});

	})(jQuery);
	
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyXWRDCTLQdBLGyT_IhgF1-shhGR4hvDY&callback=initMap">
    </script>



