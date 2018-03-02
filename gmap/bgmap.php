<?php $theater = get_the_ID(); ?>		
    <script>
      function initMap() {
        var markerlat = document.getElementsByClassName("marker")[0].getAttribute("lat");
        var markerlng = document.getElementsByClassName("marker")[0].getAttribute("lng");
        //alert(markerlng);
	    var center = {lat: parseInt(markerlat) , lng: parseInt(markerlng) };
	    
        var maparos = new google.maps.Map(document.getElementById('maptheater'), {
          zoom: 9,
          center: center
        });
	
	(function($) {
		$('.marker').each(function(i, obj) {
			var theaterid = obj.id;
			//alert(theaterid);
			var markerlat = document.getElementById(theaterid).getAttribute("lat"); 
			var markerlng = document.getElementById(theaterid).getAttribute("lng"); 
			var latlng = new google.maps.LatLng(markerlat, markerlng);	
			var theicon = 'http://cinego.gr/wp-content/themes/Cinego2016-a/img/pin-red.png'; 
			var marker = new google.maps.Marker({
			  position: latlng,
			  map: maparos,
			  icon: theicon,
			});

		});
		

	})(jQuery);
	
      }
    </script>
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyXWRDCTLQdBLGyT_IhgF1-shhGR4hvDY&callback=initMap">
    </script>



