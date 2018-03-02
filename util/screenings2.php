<?php 

function getScreeningsOfTheaterID($theaterID) {
	$thurs = getlastthursdaydate();
	$query = " 
		SELECT * 
		FROM  `provoles` 
		WHERE theaterID =  '" . $theaterID . "'
		AND vdomada =  '". $thurs . "'
		ORDER BY movieID
	"; 
	//echo $query; 
	global $wpdb;
	$myrows = $wpdb->get_results($query);
	return $myrows;
}

function printScreeningsOfTheaterID($screenings) {
	$count = 0; $movIDprev = 0;
	$thuBefore = getlastthursdaystamp();
	foreach ($screenings as $screening) :
		$movie = $screening->movieID;
		if (!$count || ($movie != $movIDprev) ): // start new movie ?>
			<?php if ( $count != 0): ?> </div></div></div></div> <?php endif; ?>
			<div class="col-md-12 col-xs-12" style="padding-bottom:5px; padding-right:0px; padding-left:0px;">
				<div class="panel panel-default" style="padding:5px;">
					<div class="panel-heading" style="padding:5px;">
						<strong><a href="<?php echo get_permalink($movie); ?>">
							<?php  echo get_the_title( $movie ); ?> 
						</a></strong>
	
					</div>
					<div class="panel-body" style="padding:6px;" >
						<div class="col-md-3 col-xs-12" style="padding:0px;"> 
							<a href="<?php echo get_permalink($movie); ?>">
								<?php $poster=get_field('poster', $movie); ?>
								<?php if( !empty($poster) ): ?>
								<?php $url = $poster['url'];?>
									<img src="<?php echo $url; ?>" >
								<?php else:  
									if ( has_post_thumbnail()) { the_post_thumbnail(); } 		
							 	endif; ?>
							</a>
						</div>
						<div class="col-md-9 col-xs-12" style="padding:5px;"> 			
		<? endif; ?>
		<?php
			$movIDprev = $movie; $count++;
			// Aithousa
			$aithousano = $screening->aithousa; 
			if ( strlen($aithousano) > 0 ) 
			echo "<h5 display: inline;><strong>• Αίθουσα " . $aithousano . "</strong>"; 
			// 3D
			$triad = $screening->triad;
			if($triad): ?> 
				<img style="padding-top:0px; margin-top:-7px;" width="20px" src="http://cinego.gr/wp-content/uploads/2015/12/3d.jpg"/>
			<?php endif; 
			// Dubbed
			$dubbed = $screening->dubbed;
			if($dubbed): ?> 
				(Μεταγλ.)
			<?php endif;
			// Atmos 
			$atmos = $screening->atmos;
			if($atmos): ?> 
				<img style="padding-top:0px; margin-top:-7px;" height="20px" src="http://cinego.gr/wp-content/uploads/2015/12/atmos.png"/>
			<?php endif; ?>	
			</h5>			
			<?php $everyday_screening = $screening->kath; 
			if($everyday_screening):?>
				Καθημερινά <?php echo $everyday_screening; ?>
			<?php else: ?>		
<?php if ($screening->pem) :?>Πέμπτη <?php echo date('d/m', $thuBefore); ?>: <?php echo $screening->pem; ?><br> <?php endif;?>
<?php if ($screening->par) :?>Παρασκευή <?php echo date('d/m', strtotime("next friday", $thuBefore) ); ?>: <?php echo $screening->par; ?><br><?php endif;?>
<?php if ($screening->sav) :?>Σάββατο <?php echo date('d/m', strtotime("next saturday", $thuBefore) ); ?>: <?php echo $screening->sav; ?><br><?php endif;?>
<?php if ($screening->kyr) :?>Κυριακή <?php echo date('d/m', strtotime("next sunday", $thuBefore) ); ?>: <?php echo $screening->kyr; ?><br><?php endif;?>
<?php if ($screening->dey) :?>Δευτέρα <?php echo date('d/m', strtotime("next monday", $thuBefore) ); ?>: <?php echo $screening->dey; ?><br><?php endif;?>
<?php if ($screening->tri) :?>Τρίτη <?php echo date('d/m', strtotime("next tuesday", $thuBefore) ); ?>: <?php echo $screening->tri; ?><br><?php endif;?>
<?php if ($screening->tet) :?>Τετάρτη <?php echo date('d/m', strtotime("next wednesday", $thuBefore) ); ?>: <?php echo $screening->tet; ?> <br><?php endif;?>
		<?php endif;?>



	<?php endforeach; 
	echo "</div></div></div></div>";
		
	return; 
} // END printScreeningsOfTheaterID

?>
<!---
function getScreeningsOfMovieIDPoliID($movieID,$poliID) {
	$thurs = getlastthursdaydate();
	$query = " 
		SELECT * 
		FROM  `provoles` 
		WHERE poli =  '" . $poliID . "'
		AND vdomada =  '". $thurs . "'
		AND movieID = '" . $movieID . "'
	"; 
	//echo $query; 
	global $wpdb;
	$myrows = $wpdb->get_results($query);
	return $myrows;
}

function printScreeningsMovieIDPoliID($screenings) {
	$thuBefore = getlastthursdaystamp();
	foreach ($screenings as $screening) :
		$theater = $screening->theaterID;
	?>
	<h4 style="display:inline;"><strong><a href="<?php echo get_permalink($theater); ?>"> 
			<?php echo get_the_title( $theater ); ?> 
			</a></strong></h4> 
	<?php //endif; ?>
			<?php
			$aithousano = $screening->aithousa; 
			if ( strlen($aithousano) > 0 ) 
			echo "<h5 display: inline;><strong>• Αίθουσα " . $aithousano . "</strong>"; 
			// 3D
			$triad = $screening->triad;
			if($triad): ?> 
				<img style="padding-top:0px; margin-top:-7px;" width="20px" src="http://cinego.gr/wp-content/uploads/2015/12/3d.jpg"/>
			<?php endif; 
			// Dubbed
			$dubbed = $screening->dubbed;
			if($dubbed): ?> 
				(Μεταγλ.)
			<?php endif;
			// Atmos 
			$atmos = $screening->atmos;
			if($atmos): ?> 
				<img style="padding-top:0px; margin-top:-7px;" height="20px" src="http://cinego.gr/wp-content/uploads/2015/12/atmos.png"/>
			<?php endif; ?>	
			</h5>			
			<br>
			<?php $everyday_screening = $screening->kath; 
			if($everyday_screening):?>
				Καθημερινά <?php echo $everyday_screening; ?>
			<?php else: ?>		

<?php if ($screening->pem) :?>Πέμπτη <?php echo date('d/m', $thuBefore); ?>: <?php echo $screening->pem; ?><br> <?php endif;?>
<?php if ($screening->par) :?>Παρασκευή <?php echo date('d/m', strtotime("next friday", $thuBefore) ); ?>: <?php echo $screening->par; ?><br><?php endif;?>
<?php if ($screening->sav) :?>Σάββατο <?php echo date('d/m', strtotime("next saturday", $thuBefore) ); ?>: <?php echo $screening->sav; ?><br><?php endif;?>
<?php if ($screening->kyr) :?>Κυριακή <?php echo date('d/m', strtotime("next sunday", $thuBefore) ); ?>: <?php echo $screening->kyr; ?><br><?php endif;?>
<?php if ($screening->dey) :?>Δευτέρα <?php echo date('d/m', strtotime("next monday", $thuBefore) ); ?>: <?php echo $screening->dey; ?><br><?php endif;?>
<?php if ($screening->tri) :?>Τρίτη <?php echo date('d/m', strtotime("next tuesday", $thuBefore) ); ?>: <?php echo $screening->tri; ?><br><?php endif;?>
<?php if ($screening->tet) :?>Τετάρτη <?php echo date('d/m', strtotime("next wednesday", $thuBefore) ); ?>: <?php echo $screening->tet; ?> <br><?php endif;?>
			<?php endif;?>
	<?php endforeach; 
<?	return; 
}// END printScreeningsMovieIDPoliID


/*function getScreeningsOfMovieIDPoliID($movieID,$poliID) {
	return;
}


function getScreeningsOfPerioxiID($poliID) {
	return;
}

function getScreeningsOfPoliID($poliID) {
	return;
}
-->

