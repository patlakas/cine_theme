<?php 

function printScreeningsOfMovieThess($movieID){
	//echo $movie;
?>
		<div class="panel panel-default" style="padding:5px;">
			<div class="panel-heading" style="padding:5px;">
				<strong><a href="<?php echo get_permalink($movieID); ?>">
					<?php  echo get_the_title( $movieID ); ?> 
				</a></strong>

			</div>
			<div class="panel-body" style="padding:6px;" >
				<div class="col-md-2 col-xs-12" style="padding:0px;"> 
					<a href="<?php echo get_permalink($movieID); ?>">
						<?php $poster=get_field('poster', $movieID); ?>
						<?php if( !empty($poster) ): ?>
						<?php $url = $poster['url'];?>
							<img src="<?php echo $url; ?>" >
						<?php else:  
							if ( has_post_thumbnail()) { the_post_thumbnail(); } 		
					 	endif; ?>
					</a>
				</div>
				<div class="col-md-10 col-xs-12" style="padding:5px;"> 	
					<?php 
						$content_post = get_post($movieID);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						$pieces = explode(" ", $content);
						$first_part = implode(" ", array_splice($pieces, 0, 40));
						echo $first_part; //echo "..."; 
					?>
					<a href="<?php echo get_permalink($movieID); ?>"> Περισσότερα</a>
					<br><br>
				</div>
			</div>
		</div>
<?php
	global $wpdb;
	$query = "SELECT *  FROM `provoles` AS p WHERE p.thess='1' AND p.movieID='" . $movieID ."' AND ( p.vdomada = '03-11-2016' OR p.vdomada = '10-11-2016')";
	//echo $query; 
	$results = $wpdb->get_results($query, OBJECT );
	foreach ($results as $screening) :
		$theaterID = $screening->theaterID;
		$vdomada = $screening->vdomada;
		$offset = 0;
		if ($screening->par != '') $offset = 1; 
		if ($screening->sav != '') $offset = 2; 
		if ($screening->kyr != '') $offset = 3; 
		if ($screening->dey != '') $offset = 4; 
		if ($screening->tri != '') $offset = 5; 
		if ($screening->tet != '') $offset = 6; 
		//echo $offset; 
		$vdomadastamp = strtotime($vdomada);
		$bingostamp = strtotime("+" . $offset . " day", $vdomadastamp);
		
	?>
		
		<h4> <? echo date('d / m / Y', $bingostamp);  ?></h3>
		Κινηματογράφος:<strong><a href="<?php echo get_permalink($theaterID); ?>">
		<?php  echo get_the_title( $theaterID ); ?> 
		</a></strong><br>
		Ώρα: 
		<strong> 
			<?php 
				if ($screening->pem != '') echo $screening->pem;
				if ($screening->par != '') echo $screening->par;
				if ($screening->sav != '') echo $screening->sav;
				if ($screening->kyr != '') echo $screening->kyr;
				if ($screening->deu != '') echo $screening->dey;
				if ($screening->tri != '') echo $screening->tri;
				if ($screening->tet != '') echo $screening->tet;
			?>
		</strong>
		<hr>
	<? endforeach;
}

function printScreeningsOfDayThess($timestamp) {
	$thisThursday = getlastthursdaydatefromtimestamp($timestamp);
	//echo $thisThursday;
	global $wpdb;
	$day = "";
	if( date('w', $timestamp) == '4') $day= "pem";
	if( date('w', $timestamp) == '5') $day= "par";
	if( date('w', $timestamp) == '6') $day= "sav";
	if( date('w', $timestamp) == '0') $day= "kyr"; 
	if( date('w', $timestamp) == '1') $day= "dey";
	if( date('w', $timestamp) == '2') $day= "tri";
	if( date('w', $timestamp) == '3') $day= "tet";
	$query = "SELECT *  FROM `provoles` AS p WHERE p.thess='1' AND p.vdomada = '" . $thisThursday . "' AND p." . $day . "!=''";
	//echo $query; 
	$results = $wpdb->get_results($query, OBJECT );
	foreach ($results as $movie) :
		$movieID = $movie->movieID;
		$theaterID = $movie->theaterID;
		?>
		<div class="panel panel-default" style="padding:5px;">
			<div class="panel-heading" style="padding:5px;">
				<strong><a href="<?php echo get_permalink($movieID); ?>">
					<?php  echo get_the_title( $movieID ); ?> 
				</a></strong>

			</div>
			<div class="panel-body" style="padding:6px;" >
				<div class="col-md-2 col-xs-12" style="padding:0px;"> 
					<a href="<?php echo get_permalink($movieID); ?>">
						<?php $poster=get_field('poster', $movieID); ?>
						<?php if( !empty($poster) ): ?>
						<?php $url = $poster['url'];?>
							<img src="<?php echo $url; ?>" >
						<?php else:  
							if ( has_post_thumbnail()) { the_post_thumbnail(); } 		
					 	endif; ?>
					</a>
				</div>
				<div class="col-md-10 col-xs-12" style="padding:5px;"> 	
					<?php 
						$content_post = get_post($movieID);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						$pieces = explode(" ", $content);
						$first_part = implode(" ", array_splice($pieces, 0, 40));
						echo $first_part; //echo "..."; 
					?>
					<a href="<?php echo get_permalink($movieID); ?>"> Περισσότερα</a>
					<br><br>
					Κινηματογράφος:<strong><a href="<?php echo get_permalink($theaterID); ?>">
					<?php  echo get_the_title( $theaterID ); ?> 
					</a></strong><br>
					Ώρα: 
					<strong> 
						<?php 
							if( date('w', $timestamp) == '4') echo $movie->pem;
							if( date('w', $timestamp) == '5') echo $movie->par;
							if( date('w', $timestamp) == '6') echo $movie->sav;
							if( date('w', $timestamp) == '0') echo $movie->kyr; 
							if( date('w', $timestamp) == '1') echo $movie->dey;
							if( date('w', $timestamp) == '2') echo $movie->tri;
							if( date('w', $timestamp) == '3') echo $movie->tet;
						?>
					</strong>
					
				</div>
			</div>
		</div>
	<? endforeach;

}





function printScreeningsOfMovieNyxtes($movieID){
	//echo $movie;
?>
		<div class="panel panel-default" style="padding:5px;">
			<div class="panel-heading" style="padding:5px;">
				<strong><a href="<?php echo get_permalink($movieID); ?>">
					<?php  echo get_the_title( $movieID ); ?> 
				</a></strong>

			</div>
			<div class="panel-body" style="padding:6px;" >
				<div class="col-md-2 col-xs-12" style="padding:0px;"> 
					<a href="<?php echo get_permalink($movieID); ?>">
						<?php $poster=get_field('poster', $movieID); ?>
						<?php if( !empty($poster) ): ?>
						<?php $url = $poster['url'];?>
							<img src="<?php echo $url; ?>" >
						<?php else:  
							if ( has_post_thumbnail()) { the_post_thumbnail(); } 		
					 	endif; ?>
					</a>
				</div>
				<div class="col-md-10 col-xs-12" style="padding:5px;"> 	
					<?php 
						$content_post = get_post($movieID);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						$pieces = explode(" ", $content);
						$first_part = implode(" ", array_splice($pieces, 0, 40));
						echo $first_part; //echo "..."; 
					?>
					<a href="<?php echo get_permalink($movieID); ?>"> Περισσότερα</a>
					<br><br>
				</div>
			</div>
		</div>
<?php
	global $wpdb;
	$query = "SELECT *  FROM `provoles` AS p WHERE p.thess='1' AND p.movieID='" . $movieID ."' AND ( p.vdomada = '03-11-2016' OR p.vdomada = '10-11-2016')";
	//echo $query; 
	$results = $wpdb->get_results($query, OBJECT );
	foreach ($results as $screening) :
		$theaterID = $screening->theaterID;
		$vdomada = $screening->vdomada;
		$offset = 0;
		if ($screening->par != '') $offset = 1; 
		if ($screening->sav != '') $offset = 2; 
		if ($screening->kyr != '') $offset = 3; 
		if ($screening->dey != '') $offset = 4; 
		if ($screening->tri != '') $offset = 5; 
		if ($screening->tet != '') $offset = 6; 
		//echo $offset; 
		$vdomadastamp = strtotime($vdomada);
		$bingostamp = strtotime("+" . $offset . " day", $vdomadastamp);
		
	?>
		
		<h4> <? echo date('d / m / Y', $bingostamp);  ?></h3>
		Κινηματογράφος:<strong><a href="<?php echo get_permalink($theaterID); ?>">
		<?php  echo get_the_title( $theaterID ); ?> 
		</a></strong><br>
		Ώρα: 
		<strong> 
			<?php 
				if ($screening->pem != '') echo $screening->pem;
				if ($screening->par != '') echo $screening->par;
				if ($screening->sav != '') echo $screening->sav;
				if ($screening->kyr != '') echo $screening->kyr;
				if ($screening->deu != '') echo $screening->dey;
				if ($screening->tri != '') echo $screening->tri;
				if ($screening->tet != '') echo $screening->tet;
			?>
		</strong>
		<hr>
	<? endforeach;
}

function printScreeningsOfDayNyxtes($timestamp) {
	$thisThursday = getlastthursdaydatefromtimestamp($timestamp);
	//echo $thisThursday;
	global $wpdb;
	$day = "";
	if( date('w', $timestamp) == '4') $day= "pem";
	if( date('w', $timestamp) == '5') $day= "par";
	if( date('w', $timestamp) == '6') $day= "sav";
	if( date('w', $timestamp) == '0') $day= "kyr"; 
	if( date('w', $timestamp) == '1') $day= "dey";
	if( date('w', $timestamp) == '2') $day= "tri";
	if( date('w', $timestamp) == '3') $day= "tet";
	$query = "SELECT *  FROM `provoles` AS p WHERE p.thess='1' AND p.vdomada = '" . $thisThursday . "' AND p." . $day . "!=''";
	//echo $query; 
	$results = $wpdb->get_results($query, OBJECT );
	foreach ($results as $movie) :
		$movieID = $movie->movieID;
		$theaterID = $movie->theaterID;
		?>
		<div class="panel panel-default" style="padding:5px;">
			<div class="panel-heading" style="padding:5px;">
				<strong><a href="<?php echo get_permalink($movieID); ?>">
					<?php  echo get_the_title( $movieID ); ?> 
				</a></strong>

			</div>
			<div class="panel-body" style="padding:6px;" >
				<div class="col-md-2 col-xs-12" style="padding:0px;"> 
					<a href="<?php echo get_permalink($movieID); ?>">
						<?php $poster=get_field('poster', $movieID); ?>
						<?php if( !empty($poster) ): ?>
						<?php $url = $poster['url'];?>
							<img src="<?php echo $url; ?>" >
						<?php else:  
							if ( has_post_thumbnail()) { the_post_thumbnail(); } 		
					 	endif; ?>
					</a>
				</div>
				<div class="col-md-10 col-xs-12" style="padding:5px;"> 	
					<?php 
						$content_post = get_post($movieID);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						$pieces = explode(" ", $content);
						$first_part = implode(" ", array_splice($pieces, 0, 40));
						echo $first_part; //echo "..."; 
					?>
					<a href="<?php echo get_permalink($movieID); ?>"> Περισσότερα</a>
					<br><br>
					Κινηματογράφος:<strong><a href="<?php echo get_permalink($theaterID); ?>">
					<?php  echo get_the_title( $theaterID ); ?> 
					</a></strong><br>
					Ώρα: 
					<strong> 
						<?php 
							if( date('w', $timestamp) == '4') echo $movie->pem;
							if( date('w', $timestamp) == '5') echo $movie->par;
							if( date('w', $timestamp) == '6') echo $movie->sav;
							if( date('w', $timestamp) == '0') echo $movie->kyr; 
							if( date('w', $timestamp) == '1') echo $movie->dey;
							if( date('w', $timestamp) == '2') echo $movie->tri;
							if( date('w', $timestamp) == '3') echo $movie->tet;
						?>
					</strong>
					
				</div>
			</div>
		</div>
	<? endforeach;

}

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
				<img style="padding-top:0px; margin-top:-7px;" width="20px" src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/3d.jpg"/>
			<?php endif; 
			// Dubbed
			$dubbed = $screening->dubbed;
			if($dubbed): ?> 
				(Μεταγλ.)
			<?php endif;
			// Atmos 
			$atmos = $screening->atmos;
			if($atmos): ?> 
				<img style="padding-top:0px; margin-top:-7px;" height="20px" src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/atmos.png"/>
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

function getScreeningsOfMovieIDPoliIDPerioxiID($movieID,$poliID,$perioxiID) {
	$thurs = getlastthursdaydate();
	$query = " 
		SELECT * 
		FROM  `provoles` 
		WHERE poli =  '" . $poliID . "'
		AND perioxi =  '". $perioxiID . "'
		AND vdomada =  '". $thurs . "'
		AND movieID = '" . $movieID . "'
	"; 
	//echo $query; 
	global $wpdb;
	$myrows = $wpdb->get_results($query);
	return $myrows;
}


function EliminateScreeningsPerioxi($screenings, $perioxi) {
	$count = 0;
	$screenings2 = array();
	foreach ($screenings as $screening) :
		$theater = $screening->theaterID;
		$perioxiii = wp_get_object_terms($theater,'theater_perioxi',string); $theperioxi = $perioxiii[0]->term_taxonomy_id;
		if ($theperioxi == $perioxi) :
			$screenings2[$count] = $screening; 
			$count++;
		endif;
	endforeach;
	return $screenings2;
}

function printScreeningsMovieIDPoliID($screenings, $eparxia) {
	$thuBefore = getlastthursdaystamp();
	$theater = 0;
	foreach ($screenings as $screening) :
		if (!$theater) $theaterprev = 0; else $theaterprev = $theater;
		$theater = $screening->theaterID;
	?>
	<?php if ( $theater != $theaterprev ):   ?> 
		<?php if ($theaterprev != 0): ?>
			<hr style="display: block; margin-top: 0.5em; margin-bottom: 0.5em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
		<?php endif; ?>		
			<?php if ($eparxia):	?>
				<h4 style="display:inline;">
				<?php 
					$cinpoli = wp_get_post_terms( $theater, 'theater_city'); echo "" . $cinpoli[0]->name . ""; //var_dump($cinpoli);
				?> 
				</h4><br>
			<?php endif; ?>	
			<h4 style="display:inline;"><strong><a href="<?php echo get_permalink($theater); ?>"> 
			<?php echo get_the_title( $theater ); ?> 
			</a></strong></h4> <br>
	<?php endif; ?>
			<?php
			$aithousano = $screening->aithousa; 
			if ( strlen($aithousano) > 0 ) 
			echo "<strong>• Αίθουσα " . $aithousano . "</strong>"; 
			// 3D
			$triad = $screening->triad;
			if($triad): ?> 
				<img style="padding-top:0px; margin-top:-7px;" width="20px" src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/3d.jpg"/>
			<?php endif; 
			// Dubbed
			$dubbed = $screening->dubbed;
			if($dubbed): ?> 
				(Μεταγλ.)
			<?php endif;
			// Atmos 
			$atmos = $screening->atmos;
			if($atmos): ?> 
				<img style="padding-top:0px; margin-top:-7px;" height="20px" src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/atmos.png"/>
			<?php endif; ?>	
			</h5>			
			<br>
			<?php $everyday_screening = $screening->kath; 
			if($everyday_screening):?>
				Καθημερινά <?php echo $everyday_screening; ?> <br>
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
	return; 
}// END printScreeningsMovieIDPoliID

function getScreeningsOfMovieIDEparxia($movieID) {
	$thurs = getlastthursdaydate();
	$query = " 
		SELECT * 
		FROM  `provoles` 
		WHERE poli !=  '17577' AND poli !=  '17594'
		AND vdomada =  '". $thurs . "'
		AND movieID = '" . $movieID . "'
	"; 
	//echo $query; 
	global $wpdb;
	$myrows = $wpdb->get_results($query);
	return $myrows;
}

function getNumberOfScreeningsForMovie($movieID, $poli) {
	$thurs = getlastthursdaydate();
	// default = poli = number
	$query = " 
		SELECT COUNT(*) as c
		FROM  `provoles` 
		WHERE poli = '" . $poli . "'
		AND vdomada =  '". $thurs . "'
		AND movieID = '" . $movieID . "'
	"; 
	if ($poli == "eparxia")
		$query = " 
			SELECT COUNT(*) as c
			FROM  `provoles` 
			WHERE poli !=  '17577' AND poli !=  '17594'
			AND vdomada =  '". $thurs . "'
			AND movieID = '" . $movieID . "'
		"; 
	if ($poli == "all")
		$query = " 
			SELECT COUNT(*) as c
			FROM  `provoles` 
			WHERE  vdomada =  '". $thurs . "'
			AND movieID = '" . $movieID . "'
		"; 

	//echo $query; 
	global $wpdb;
	$myrows = $wpdb->get_results($query);
	return $myrows[0]->c;;
}

?>
