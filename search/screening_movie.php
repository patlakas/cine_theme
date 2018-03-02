<?php 
	//echo $poli . '<br>';
	//echo $perioxi . '<br>';
	//echo $tainia . '<br>';
	//echo $lesseuro . '<br>';
	$today = time(); //echo "<br>"; echo $today;
	if( date('w', $today) == '4' ) {  $thisThursday = date('d-m-Y', $today); $thuBefore = $today; }
	else {
		$thuBefore = strtotime("last thursday", $today); //echo 'Proigoumeni Pempti: '. date('Y-m-d', $thuBefore) ."\n";
		$thisThursday = date('d-m-Y', $thuBefore);
	}
	$premiere = get_field('premiere',$tainia); //echo $premiere;
	$premieretime = $timestamp = strtotime($premiere);
	$len = strlen($tainia);
	$week = intval( abs($premieretime - $today)/60/60/24/7 ) + 1; //echo "weeks=" . $week;

?>


<!--- <h3>
	<?php if ($tainia != 'all') {
			echo 'Προβολές του'; ?>
			<a href="<?php echo get_permalink($tainia); ?>"> 
			<?php echo get_field('original_title', $tainia);
			if (get_field('greek_title', $tainia) ) echo " (" . get_field('greek_title', $tainia) . ")"; ?>
			</a>
	<?php } ?>
	<?php if ($tainia == 'all') echo 'Όλες οι ταινίες '; ?>
	σε <?php $city = get_term_by('id', $poli, 'theater_city'); echo $city->name; ?>
	<?php if ($poli == 17577 && $perioxi != 'all') { $neibour = get_term_by('id', $perioxi, 'theater_perioxi'); echo " (" . $neibour->name . ") "; } ?>
</h3><hr> ---> 

<?php // ifs gia oles tis periptoseis

// periptosi 1 - Athina - Oles oi tainies - Oles oi perioxes - DEFAULT
if ($poli == '2' && $tainia == 'all' && $perioxi == 'all'){ 
		include('all-films.php'); 
}

// periptosi 2 - Sygkekrimeni tainia
if ($tainia != 'all') { // ta vasika tis tainias ?>
	<div class="row" style = "padding-top:1em; padding-botton:0.1em; padding-left:1.5em;">
		<div class="panel panel-default" style="margin-left:-10px; margin-right:-10px; margin-bottom:15px; padding-left:5px; padding-right:5px;padding-top:0.5em;">
			<div class="panel-heading" style="padding:5px;">
				<h4 style="display:inline;"><strong><a href="<?php echo get_permalink($tainia); ?>"> 
					<?php echo get_field('original_title', $tainia);
					if (get_field('greek_title', $tainia) ) echo " (" . get_field('greek_title', $tainia) . ")"; ?>
				</a></strong></h4>
			</div>
			<div class="panel-body" style="padding:0.1em;">
				<div class="col-md-3 col-xs-12"> 
					<a href="<?php echo get_permalink($tainia); ?>">
						<?php $poster=get_field('poster',$tainia); ?>

						<?php $url = $poster['url'];?>
						<img src="<?php echo $url; ?>" >
					</a>
					<?php 
						global $wpdb;
						$noaithouses = getNumberOfScreeningsForMovie($tainia, "all") ; 
						$noaithousesATH = getNumberOfScreeningsForMovie($tainia, 2) ; 
						$noaithousesTHE = getNumberOfScreeningsForMovie($tainia, 30) ; 
						$noaithousesEPA = getNumberOfScreeningsForMovie($tainia, "eparxia") ; 
						//$query = "SELECT COUNT(*) AS c FROM  `gogoCin_postmeta` AS movie, `gogoCin_postmeta` AS date WHERE movie.meta_key = 'movie' AND movie.meta_value='a:1:{i:0;s:" . $len . ":\"" . $tainia . "\";}' AND date.meta_key = 'vdomada' AND date.meta_value = '" . $thisThursday . "' AND movie.post_id = date.post_id ";
						//$results = $wpdb->get_results($query, OBJECT );
						//$noaithouses = $results[0]->c;
					?>
					
					
				</div>
				<div class="col-md-9 col-xs-12"> 
					<div align="justify" >
						<?php 
							$content_post = get_post($tainia);
							$content = $content_post->post_content;
							$content = apply_filters('the_content', $content);
							$content = str_replace(']]>', ']]&gt;', $content);
							$pieces = explode(" ", $content);
							$first_part = implode(" ", array_splice($pieces, 0, 110));
							echo $first_part; //echo "..."; 
						?>
						<!---<strong><a href="<?php echo get_permalink($tainia); ?>"> Δες τα πάντα για την ταινία </a></strong>--->
					</div>
				</div>
				<div class="col-md-12 col-xs-12" style="padding:0px;"> 
					<div class="col-md-7 col-xs-12"> 
						<h4>Σε <strong><?php echo $noaithouses; ?></strong> αίθουσες (σε όλη την χώρα)</h4>
					</div>
					<div class="col-md-5 col-xs-12" align="right"> 
						<h4><strong><?php echo $week; ?>η </strong> βδομάδα προβολής</h4>
					</div>
				</div>
			</div>
		</div>

	</div>
	<h3>Προβολές για το <?php echo get_field('original_title', $tainia);
			if (get_field('greek_title', $tainia) ) echo " (" . get_field('greek_title', $tainia) . ")"; ?> σε  
			<?php $city = get_term_by('id', $poli, 'theater_city'); echo $city->name; ?>
			<?php if ($poli == 17577 && $perioxi != 'all') { $neibour = get_term_by('id', $perioxi, 'theater_perioxi'); echo " (" . $neibour->name . ") "; } ?>
	</h3><hr>

	<?php
		include ('movie-poli.php');

}
?>
<?php
// periptosi 3 - Oles oi tainies se poli ektos athinas ---- periptosi 4 - Oles oi tainies se Perioxi tis Athinas
if ($tainia == 'all')// && ($perioxi != 'all' || $poli != '17577' ) ) 
		include('all-movies-district-2.php')

// 

?>
