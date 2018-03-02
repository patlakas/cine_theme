	<?php /*
	Template Name: Screening Search  
	*/
	?>
	<?php get_header(); ?>

	<div class="row" style=" padding-left:20px; padding-right:20px; ">
		
		<?php //$ip = $_SERVER['REMOTE_ADDR'];
		//$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
		//echo "{$details->city}, {$details->country} <br>";
		?>


		<?php 
			$thepolisel = $_GET['polisel']; if (!$thepolisel) $thepolisel = 17577; 
			$theathenssel = $_GET['athenssel']; if (!$theathenssel) $theathenssel = "all";
			$moviesel = $_GET['moviesel']; $themoviesel = 1; if (!$moviesel) $themoviesel = 0; 
			//echo "POLISEL=" . $thepolisel;
			//echo "ATHENSSEL=" . $theathenssel;
			//echo "MOVIESEL=" . $moviesel; echo "THEMOVIESEL=" . $themoviesel;
		?>
		<?php 
			$thisThursday = getlastthursdaydate();
		?>
		<!---<div class="col-md-12 col-xs-12" >
			Πάμε Σινεμά? 
		</div>---> 

		<div class="col-md-5 col-xs-12" >

			<?php	
				//$cities = get_categories(array( 'taxonomy' => 'theater_city')  ); var_dump($terms);
				//wp_dropdown_categories( array( 'taxonomy' => 'theater_city') );
			?>

			<h3>Πάμε Σινεμά ?</h3><hr>
			<div class="row" >	
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					  <label for="sel1">Διάλεξε ταινία:</label>
					  <select class="form-control" id="moviesel">
					  	<option value="all"> Όλες οι ταινίες </option>
					  <?php	
						$incinemas = incinemas(); 
						foreach ($incinemas as $movie) { //echo $movie; 
							echo "<option value=\"" . $movie . "\"";
							if ($movie == $moviesel) echo "selected";
							echo " >";
							echo get_field('original_title', $movie);
							if (get_field('greek_title', $movie) ) echo " (" . get_field('greek_title', $movie) . ")</option>";
						}
						
					  ?>
					  </select>
					  
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					  <label for="sel1">Διάλεξε πόλη:</label>
					  <select class="form-control" id="polisel">
					  <?php	
						$cities = get_categories(array( 'taxonomy' => 'theater_city')  );
			 			foreach ($cities as $city) {
							echo "<option value=\"" . $city->term_id . "\"";
							if ($city->term_id == $thepolisel) echo "selected"; // epilegmeni i athina i apo kentriki
							echo ">" . $city->name .  "</option>";
						}
					  ?>
					  </select>

					  <script>
						jQuery(function($){
							$('#polisel').click(function () {
						
								var poli = $('#polisel').val();		
								//alert(poli);
								if (poli==17577) { $("#athlabel").removeClass('hide'); $("#athenssel").removeClass('hide'); $("#athlabel").fadeIn(500); $("#athenssel").fadeIn(500); }
								else  { $("#athlabel").fadeOut(500); $("#athenssel").fadeOut(500); }
							});
						});
					  </script>

					  <br><label id="athlabel" class="">Διάλεξε Περιοχή:</label>
					  <select class="form-control" id="athenssel">
						<option value="all"> Όλες οι Περιοχες </option>
					  <?php	
						$cities = get_categories(array( 'taxonomy' => 'theater_perioxi')  );
			 			foreach ($cities as $city) {
							echo "<option value=\"" . $city->term_id . "\"";
							if ($city->term_id == $theathenssel) echo "selected";
							echo ">" . $city->name .  "</option>";
						}
					  ?>
					  </select>
					</div>
				</div>
			</div>

				

			<h3>Για να μην χαθείς</h3><hr>
				 
				<div id="searchmap">
					<?php $tax_query = ""; ?>
					<?php 
						$poli = $thepolisel;  
						$perioxi = $theathenssel; 
						$tax_query = "";
						if (!$theathenssel || $theathenssel!="all"){
							$ipoli = get_term( $poli, 'theater_city' );
							$slug = $ipoli->slug;
							$tax_query =  array(
										array(
											'taxonomy' => 'theater_city',
											'field' => 'slug',
											'terms' => $slug
										)
								      );
						}
						if ($theathenssel && $theathenssel!="all"){
							$ipoli = get_term( $perioxi, 'theater_perioxi' );
							$slug = $ipoli->slug;
							$tax_query = array(
										array(
											'taxonomy' => 'theater_perioxi',
											'field' => 'slug',
											'terms' => $slug
										)
								     );
						}
						//print_r($tax_query);
					?>
					<?php include('gmap/gmap.php'); $markcount = 0; ?>	
					<div class="acf-map" style="margin-top:-0px;">
											
						<?php 
							$args = array(
							    'post_type' => array('movietheater'),
							    'posts_per_page' => 500,
							    'tax_query' => $taxquery
							);
							$loop2 = new WP_Query( $args );
							while ( $loop2->have_posts() ) : $loop2->the_post(); 
								$theater = get_the_ID();
								$theatertitle = get_the_title( $theater );
								$address_map = get_field('address_map', $theater);
						?>		
						<?php $desprogramma = '<a href="' . get_permalink($theater) . '"> Δες το πρόγραμμα του </a>'; ?>
	<div cinema="<?php echo $theatertitle; ?>" id="<?php echo $theater; ?>"  class="marker" data-lat="<?php echo $address_map['lat']; ?>" data-lng="<?php echo $address_map['lng']; ?>"></div>
						<?php endwhile; ?>
					</div>
				</div>		
		</div>	
		<div class="col-md-7 col-xs-12" >

			<div id="searchresults" class="row" style="padding-right:20px;">
				<?php 
					if (!$thepolisel || ($thepolisel==17577 && $theathenssel=="all") && ($themoviesel == 0))
						include('search/all-films.php'); 
					if ($thepolisel && ( ($thepolisel==17577 && $theathenssel!="all") || ($thepolisel !=17577)  )  ){
						$poli = $thepolisel; //echo $poli;
						$perioxi = $theathenssel; //echo $perioxi;
						//include('search/all-movies-district.php');
						include('search/all-movies-district-2.php');
					}
					if ($themoviesel != 0){
						//echo $moviesel;
						$poli = 17577; $perioxi = "all"; $tainia = $moviesel;
						include('search/screening_movie.php');
					}
				?>
				
			</div>
		</div>
	</div>
	<?php get_footer(); ?>
