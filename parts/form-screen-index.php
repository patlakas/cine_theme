				<div class="form-group">
				<form class="form-inline" action="http://cinefreaks.gr/anazitisi-provolon/" method="get">
					<div class="row">
						<label  for="sel1">Πόλη:</label>
						<select class="form-control" id="polisel" name="polisel">
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
									$('#polisel').click(function () {
					
										var poli = $('#polisel').val();		
										//alert(poli);
										if (poli==17577) { $("#athlabel").removeClass('hide'); $("#athenssel").removeClass('hide'); $("#athlabel").fadeIn(500); $("#athenssel").fadeIn(500); }
										else  { $("#athlabel").fadeOut(500); $("#athenssel").fadeOut(500); }
									});
								});
						</script>
					</div>
					<div class="row" style="padding-top:30x;">
						<label id="athlabel" class="">Περιοχή:</label>
						<select class="form-control" id="athenssel" name="athenssel">
							<option value="all">Όλες οι Περιοχες </option>
							<?php	
								$cities = get_categories(array( 'taxonomy' => 'theater_perioxi')  );
								foreach ($cities as $city) {
									echo "<option value=\"" . $city->term_id . "\">" . $city->name .  "</option>";
								}
							?>
					  	</select>
					</div>
					<div class="row" style="padding-top:-15px;">
						<button style="" type="submit" class="btn btn-default">Αναζήτηση Προβολών</button>
					</div>
					</form>
				</div><!-- form group -->

<?php 
$thisThursday = getlastthursdaydate();
$thuBefore = getlastthursdaystamp();
?>
<?php for ($i=7; $i<10; $i=$i+7) { ?>		

			<?php 
				$thenext = date('d-m-Y', strtotime("+". $i . " days", $thuBefore) ); //echo $thenext . "<br>";
				$args = array(
				    'meta_query' => array ( array('key' => 'premiere', 'value' => $thenext) ),
				    'post_type' => array('movie'),
				    'posts_per_page' => -1
				);
			$loop3 = new WP_Query( $args );
			if ($loop3->have_posts() ) :  ?>
				<div class="panel panel-default" style="padding:0em; margin-left:-0.5em; margin-right:0.5em;">
					  <div class="panel-heading">
						<h3 style="font-size:<?php echo $h3sizel?>em;" class="panel-title">Προσεχώς(Πέμπτη <?php echo date('d/m', strtotime("+". $i . " days", $thuBefore) ); ?>)</h3>
					  </div>
					  <div class="panel-body">
						<?php while ( $loop3->have_posts() ) : $loop3->the_post();  
						?>
							- <a href="<?php echo get_permalink(); ?>"> 
							<?php if(get_field('greek_title')) { ?>
								<span><strong style="display: inline;"><?php echo get_field('greek_title');?></strong></span>
								(<?php echo get_field('original_title');?>)
							<?php } else {?>
							<strong><?php echo get_field('original_title');?></strong>
							<?php } ?></a><br>

						<?php endwhile; ?>
					  </div>
				</div>
			<?php endif; ?>
<?php } ?>
<a href="http://cinefreaks.gr/coming-soon/">Όλα τα προσεχώς</a>