<h3>Όλες οι Προβολές σε <?php $city = get_term_by('id', $poli, 'theater_city'); echo $city->name; ?>
	<?php if ($poli == 17577 && $perioxi != 'all') { $neibour = get_term_by('id', $perioxi, 'theater_perioxi'); echo " (" . $neibour->name . ") "; } ?>
</h3><hr>
<?php 
	$given= time(); //echo 'Tora: '. date('Y-m-d', $given) ."\n"; echo "Σημερα ειναι: " . date('w', $given) . "<br>";
	if( date('w', $given) == '4' ) {  $thisThursday = date('d-m-Y', $given); $thuBefore = $given; }
	else {
		$thuBefore = strtotime("last thursday", $given); //echo 'Proigoumeni Pempti: '. date('Y-m-d', $thuBefore) ."\n";
		$thisThursday = date('d-m-Y', $thuBefore);
	}
?>
<?php 
// Dimiourgei to array incinemas me ta id olon ton tainions (monadika) - pou paizoun stin sigkekrimeni poli i perioxi
	$incinemastown = array();
	//echo "Poli = " .  $poli . "<br>"; echo "Perioxi = " .  $perioxi . "<br>";
	$args = array(
	    'meta_query' => array( array('key' => 'vdomada', 'value' => $thisThursday ) ),
	    'post_type' => array('screening'),
	    'orderby' => 'meta_value',
	    'meta_key' => 'movie',
	    'posts_per_page' => -1
	);

	$loop2 = new WP_Query( $args );
	while ( $loop2->have_posts() ) : $loop2->the_post(); 
		$thetheater = get_field('theater'); 
		$theater = (string)($thetheater[0]);
		if ($poli != 17577) { 
			//echo "MPIKA 1 <br>";
			$poliii = wp_get_object_terms($theater,'theater_city',string); 
			$thecity = $poliii[0]->term_taxonomy_id;
			if($thecity != $poli) continue; 
			//echo "Theater = " . $theater . "<br>";
		}
		else {
			//echo "MPIKA 2 <br>";
			$perioxiii = wp_get_object_terms($theater,'theater_perioxi',string); 
			$theperioxi = $perioxiii[0]->term_taxonomy_id;
			if($theperioxi != $perioxi) continue;
			//echo "Theater = " . $theater . "<br>";
		}
		$themov = get_field('movie'); 
		$movie = (string)($themov[0]);
		if (!in_array($movie, $incinemastown)) array_push($incinemastown,$movie);
	endwhile;  
	var_dump($incinemastown);
?>
<?php foreach ($incinemastown as $tainia) : ?>
	<div class="col-md-12" style="margin-left:0px; margin-right:0px;">
		<div class="panel panel-default" style="margin-left:-10px; margin-right:-10px; margin-bottom:15px; padding-left:5px; padding-right:5px;">
			<div class="panel-heading" style="padding:5px;">
				<h4 style="display:inline;"><strong><a href="<?php echo get_permalink($tainia); ?>"> 
					<?php echo get_field('original_title', $tainia);
					if (get_field('greek_title', $tainia) ) echo " (" . get_field('greek_title', $tainia) . ")"; ?>
				</a></strong></h4>
			</div>
			<div class="panel-body" style="padding:2px;">
				<div class="col-md-3 col-xs-12" style="padding:5px;"> 
					<a href="<?php echo get_permalink($tainia); ?>">
						<?php $poster=get_field('poster',$tainia); ?>

						<?php $url = $poster['url'];?>
						<img class="img-responsive img-thumbnail" src="<?php echo $url; ?>" >
					</a>
				</div>
				<div class="col-md-8 col-xs-12" style="padding:5px;"> 
					<div>
						<?php 
							$content_post = get_post($tainia);
							$content = $content_post->post_content;
							$content = apply_filters('the_content', $content);
							$content = str_replace(']]>', ']]&gt;', $content);
							$pieces = explode(" ", $content);
							$first_part = implode(" ", array_splice($pieces, 0, 60));
							echo $first_part; echo "..."; 
						?>
						<strong><a href="<?php echo get_permalink($tainia); ?>"> Δες τα πάντα για την ταινία </a></strong>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top:-10px; margin-bottom:0px;  padding-left:10px; padding-right:10px;">
				<hr>
			</div>
	
			<?php // Gia aytin tin tainia tora psakse na vreis ta screenings sti sigkekrimeni poli i perioxi ?>
			<?php 
				$movieID = $tainia;  //echo "movie = " . $movieID . "<br>"; 
				$len = strlen($movieID);
				$movieIDval = "a:1:{i:0;s:" . $len . ":\"" . $movieID ."\";}";
			?>
			<?php 
				$args = array(
					    'meta_query' => array( array('key' => 'movie', 'value' =>  array($movieIDval) ),  
						array('key' => 'vdomada', 'value' => $thisThursday ) ),
					    'post_type' => array('screening'),
					    'orderby' => 'meta_value',
					    'meta_key' => 'theater',
					    'posts_per_page' => -1
					); //var_dump($args);
				$loop3 = new WP_Query( $args );
				$count = 0;
				while ( $loop3->have_posts() ) : $loop3->the_post();  
					$thetheater = get_field('theater');
					if (!$theater) $theaterprev = 0; else $theaterprev = $theater;
					$theater = (string)($thetheater[0]); 
					$poliii = wp_get_object_terms($theater,'theater_city',string); $thecity = $poliii[0]->term_taxonomy_id;  
					$perioxiii = wp_get_object_terms($theater,'theater_perioxi',string); $theperioxi = $perioxiii[0]->term_taxonomy_id;
					if( ($thecity == $poli && $poli != 17577) || ( $theperioxi == $perioxi ) ):  $count++; ?>
			<div class="row" style="padding-bottom:5px;">
				<div class="row"> 
					<?php if ($count!=1) : ?>
					<div class="col-md-12 col-xs-12">
						<hr style="display: block; margin-top: 0.5em; margin-bottom: 0.5em; margin-left: 20px; margin-right: 20px; border-style: inset; border-width: 1px;">
					</div>	
					<?php endif; ?>
					<div class="col-md-4 col-xs-12" style="margin-right:-20px;"> 
						<div class="col-md-12 col-xs-12">
							<?php $url = wp_get_attachment_medium_url( get_post_thumbnail_id($theater) ); 
								if (!$url) $url = "http://cinego.gr/wp-content/themes/cinego/img/logo.png";  ?>
							<img src="<?php echo $url; ?>" class="img-responsive img-thumbnail" />
						</div>		
					</div>		
					<div class="col-md-8 col-xs-12"> 	
						<h4><strong><a href="<?php echo get_permalink($theater); ?>">
						<?php echo get_the_title( $theater ); ?> 
						</a></strong>

						<?php
							$aithousano = get_field('aithousano'); //echo strlen($aithousano) . "<br>";
							if ( strlen($aithousano) > 0 ) 
							echo "<h5 display: inline;><strong>• Αίθουσα " . $aithousano . "</strong>"; 
						?>
						<?php 
							$triad = get_field('3d'); //echo $triad;
							$original = get_field('original'); 
						?>
						<?php if($triad == "3D"): ?> 
							<img style="padding-top:0px; margin-top:-7px;" width="20px" src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/3d.jpg"/>
						<?php endif; ?>
						<?php if($original == "Dubbed"): ?> 
							(Μεταγλ.)
						<?php endif; ?>
						<?php if($original == "Atmos"): ?> 
							<img style="padding-top:0px; margin-top:-7px;" height="20px" src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/atmos.png"/>
						<?php endif; ?>
						</h4>	
						<?php $everyday_screening = get_field('everyday_screening'); if($everyday_screening):?>
							<!---<strong>Ώρες Προβολής</strong>:<br>---> Καθημερινά <?php $everyday_screening = get_field('everyday_screening');
							echo $everyday_screening; ?>
						<?php else: ?>
							<!---<strong>Ώρες Προβολής</strong>:<br>-->
	<?php if (get_field('screen_pem')) :?><strong>Πέμπτη <?php echo date('d/m', $thuBefore); ?></strong>: <?php echo get_field('screen_pem'); ?><br> <?php endif;?>
	<?php if (get_field('screen_par')) :?><strong>Παρασκευή <?php echo date('d/m', strtotime("next friday", $thuBefore) ); ?></strong>: <?php echo get_field('screen_par'); ?><br><?php endif;?>
	<?php if (get_field('screen_sav')) :?><strong>Σάββατο <?php echo date('d/m', strtotime("next saturday", $thuBefore) ); ?></strong>: <?php echo get_field('screen_sav'); ?><br><?php endif;?>
	<?php if (get_field('screen_kyr')) :?><strong>Κυριακή <?php echo date('d/m', strtotime("next sunday", $thuBefore) ); ?></strong>: <?php echo get_field('screen_kyr'); ?><br><?php endif;?>
	<?php if (get_field('screen_dey')) :?><strong>Δευτέρα <?php echo date('d/m', strtotime("next monday", $thuBefore) ); ?></strong>: <?php echo get_field('screen_dey'); ?><br><?php endif;?>
	<?php if (get_field('screen_tri')) :?><strong>Τρίτη <?php echo date('d/m', strtotime("next tuesday", $thuBefore) ); ?></strong>: <?php echo get_field('screen_tri'); ?><br><?php endif;?>
	<?php if (get_field('screen_tet')) :?><strong>Τετάρτη <?php echo date('d/m', strtotime("next wednesday", $thuBefore) ); ?></strong>: <?php echo get_field('screen_tet'); ?> <br><?php endif;?>
						<?php endif;?>
					</div>

		
				</div>

	
			</div>
<?php endif; ?>
				<?php endwhile; ?>

		</div>
	</div>
<?php endforeach; ?>