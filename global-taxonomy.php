<?php if ( wp_is_mobile() ) {
		include('parts/global-taxonomy-loop-device.php');
		
	} else {
		include('parts/global-taxonomy-loop.php');
	}?>