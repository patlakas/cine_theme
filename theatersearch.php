	<?php /*
	Template Name: Theater Search  
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
			//echo "POLISEL=" . $thepolisel;
			//echo "ATHENSSEL=" . $theathenssel;
		?>
		<!---<?php 
			$given= time(); //echo 'Tora: '. date('Y-m-d', $given) ."\n"; echo "Σημερα ειναι: " . date('w', $given) . "<br>";
			if( date('w', $given) == '4' ) {  $thisThursday = date('d-m-Y', $given); $thuBefore = $given; }
			else {
				$thuBefore = strtotime("last thursday", $given); //echo 'Proigoumeni Pempti: '. date('Y-m-d', $thuBefore) ."\n";
				$thisThursday = date('d-m-Y', $thuBefore);
			}
		?>-->
		<!---<div class="col-md-12 col-xs-12" >
			Πάμε Σινεμά? 
		</div>---> 

		<div class="col-md-5 col-xs-12" >

			<?php	
				//$cities = get_categories(array( 'taxonomy' => 'theater_city')  ); var_dump($terms);
				//wp_dropdown_categories( array( 'taxonomy' => 'theater_city') );
			?>


				<h3>Όλες οι αίθουσες σε:</h3><hr>	
				 
				<div class="row">
					<div class="col-md-6 col-xs-12" style="padding-top:5px;">
						<div class="form-group">
						  <select class="form-control" id="poliseleuro">
						  <?php	
							$cities = get_categories(array( 'taxonomy' => 'theater_city')  );
				 			foreach ($cities as $city) {
								echo "<option value=\"" . $city->term_id . "\"";
								if ($city->term_id == 17577) echo "selected"; // epilegmeni i athina
								echo ">" . $city->name .  "</option>";
							}
						  ?>
						  </select>

						  <script>
							jQuery(function($){
								$('#poliseleuro').click(function () {
						
									var poli = $('#poliseleuro').val();		
									//alert(poli);
									if (poli==17577) {  $("#athensseleuro").removeClass('hide'); $("#athensseleuro").fadeIn(500); }
									else  { $("#athensseleuro").fadeOut(500); }
								});
							});
						  </script>

						  <select class="form-control" id="athensseleuro">
							<option value="all"> Όλες οι Περιοχες </option>
						  <?php	
							$cities = get_categories(array( 'taxonomy' => 'theater_perioxi')  );
				 			foreach ($cities as $city) {
								echo "<option value=\"" . $city->term_id . "\">" . $city->name .  "</option>";
							}
						  ?>
						  </select>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<button id="pamereeuro" class="btn btn-danger"> Πήγαινέ με! </button>
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
							    'posts_per_page' => 400,
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
				<h3>Όλες οι αίθουσες σε...</h3><hr>
				Διάλεξε Πόλη/Περιοχή για να δεις τους κινηματογράφους
			</div>
		</div>
	</div>
	<?php get_footer(); ?>