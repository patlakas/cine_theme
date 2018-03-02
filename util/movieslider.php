<style>
.carousel-control {
  padding-top:13%;
  width:3%;
}
</style>
<?php 
	$thisThursday = getlastthursdaydate(); //echo $thisThursday;
	$thuBefore = getlastthursdaystamp(); 
	$incinemas = incinemas(); 
?>


		<script>
		$(document).ready(function() {
			$('#myCarousel22').carousel({
			interval: 15000
			})
		    
		    $('#myCarousel22').on('slid.bs.carousel', function() {
		    	//alert("slid");
			});
		    
		    
		});
		</script>

		    <div class="col-md-4" style="margin-bottom:-0.5em; margin-left:-1em;">
				<img src="<?php bloginfo('template_url'); ?>/img/aithouses.png" class="img-responsive" scale="0">
		    </div>
		    <div class="col-md-4" >
		    </div>
		    <div class="col-md-4" style="margin-bottom:-1em; text-align:right;padding-top:20px;">
			<a class="" href="#myCarousel22" data-slide="prev" style="color:#D61F26; margin-right:10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
			<a class="" href="#myCarousel22" data-slide="next" style="color:#D61F26;"><i class="fa fa-arrow-right" aria-hidden="true"></i></i></a>
		    </div>

	
			<div class="col-md-12" style=" padding-top:0px; padding-bottom:0px;">
				<hr>
			<div>
			    <div id="myCarousel22" class="carousel slide">
				
				<!-- Carousel items -->
				<div class="carousel-inner">
				<?php
					$count = 0; 
					$starting=1;
					//var_dump($incinemas);
					foreach ($incinemas as $movie) :?>
						<?php $count++; if ($starting==1) { ?>
							<div class="item active">
							<div class="row" style="">
						<?php $starting=0;} elseif ($count==1) {?>
							<div class="item" >
							<div class="row" style="">
						<?php } ?>
						<div class="col-xs-2" style=" margin-left:0px;">
							<a href="<?php echo get_permalink($movie); ?>">
							<div style="padding-bottom:20px;">
								<?php 
				    				$poster=get_field('poster', $movie); 
									$posterurl = 'http://cinefreaks.gr/wp-content/uploads/2017/11/noposter-01.jpg';
									if( !empty($poster) ) $posterurl = $poster['url'];
								    if( !empty($posterurl) ): ?>
										<div id="post-img" class="poster" style="background-image: url('<?php echo $posterurl;?>');">
											<div class="bottom-div">
												<!--get ratings -->
													<?php 
														/*global $wpdb;
														$query = " SELECT AVG( rating_rating ) AS v, COUNT(*) AS c FROM  `db_cinefreaksGR_ratings` WHERE rating_postid ='" . $movie . "'"; 
														$myrows = $wpdb->get_results($query);*/
														//var_dump($myrows[0]); 
														//echo $myrows[0]->v;	?>
														<div id="ratings-gogo" class="post-ratings"> <?// echo $myrows[0]->v;?>
														<!---<?php $stars = floor($myrows[0]->v * 2) / 2;  //echo "aaaa  " . $s; // stroggilema sto plisiestero miso gia na mpoune asterakia ?>--->
														
														<?php
															$stars = get_field('stars', $movie); 
															for ($i = 1; $i <= $stars; $i++) {?>
															<img style="display:inline;" src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/rating_on.gif" width="20" >
														<?php } ?>
														<?php if ($stars == 0.5 | $stars == 1.5 | $stars == 2.5 | $stars == 3.5 | $stars == 4.5   ) : ?> 
															<img style="display:inline;" src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/rating_half.gif" width="20" >
														<?php endif; ?>
														<?php for ($i = 1; $i <= 5-$stars; $i++) {?>
															<img style="display:inline;" src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/rating_off.gif" width="20" >
														<?php } ?>
												<!-- end get ratings -->
												<!-- number of theaters -->
													<?php 
														$noaithouses = getNumberOfScreeningsForMovie($movie, "all") ; 
														$noaithousesATH = getNumberOfScreeningsForMovie($movie, 2) ; 
														$noaithousesTHE = getNumberOfScreeningsForMovie($movie, 30) ; 
														$noaithousesEPA = getNumberOfScreeningsForMovie($movie, "eparxia") ; 
													?>
													<p>Σε <strong><?php echo $noaithouses; //echo $query; ?></strong> αίθουσες</p>
												<!-- end number of theaters-->
											</div>
										</div>
									<?php else:  
										if ( has_post_thumbnail()) { the_post_thumbnail(); } 		
								endif; ?></a>
							</div>
							<div style="margin-top: 10px; margin-bottom: 10px; text-align:center; " >
								<a href="<?php echo get_permalink($movie); ?>" style="font-size: 1em;line-height: 1em; text-align: center; color: #000;">
								<?php if (get_field('greek_title', $movie) ) { echo get_field('greek_title', $movie); } else { echo get_field('original_title', $movie);} ?></a>
								
			
		</div>
							</div>
			
	</div>
		<?php if ($count==6) { ?>
		</div><!--/row-->
		</div><!--/item-->
		<?php $count=0; //reboot count
		}?>	
	<?php endforeach; ?>
	<?php if ($count!=0) { ?>
	</div><!--/row-->
	</div><!--/item-->
	<?php } ?>
				
				</div>
				<!--/carousel-inner--> 
			    </div>
			    <!--/myCarousel-->
			</div>
			<!--/well-->
		    






