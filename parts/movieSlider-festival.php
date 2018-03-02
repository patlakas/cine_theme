<style>
.carousel-control {
  padding-top:10%;
  width:5%;
}
</style>

<div class="row" style="">	
			<div class="col-md-8" style="">
				<strong> <h4 style=""><i class="fa fa-film"></i> | Οι ταινίες του φεστιβάλ </h4></strong>
				
			</div>
            <div class="col-md-4" style="margin-bottom:-1em; text-align:right;padding-top:20px;">
			<a class="" href="#myCarousel22" data-slide="prev" style="color:#D61F26; margin-right:10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
			<a class="" href="#myCarousel22" data-slide="next" style="color:#D61F26;"><i class="fa fa-arrow-right" aria-hidden="true"></i></i></a>
		    </div>
            <div class="col-md-12">
            <hr>
            </div>
		</div>
<div class="row">
	<div class="col-md-12" style="margin-bottom:20px; margin-top:10px;">
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
		    <div class="col-xs-12" style="padding-left:0px; padding-right:0px;">
			<div >
			    <div id="myCarousel22" class="carousel slide">
				
				<!-- Carousel items -->
				<div class="carousel-inner">
					<?php
							$args = array( 'post_type' => 'movie', 'posts_per_page' =>-1, 'tag'=>$festival_tag ); $count = 0;
							$loop2 = new WP_Query( $args );	
							$starting=1;
							while ( $loop2->have_posts() ) : $loop2->the_post(); 
						?>					
				    <!--/item-->
					<?php $count++; if ($starting==1) { ?>
						<div class="item active">
						<div class="row" style="">
						<?php $starting=0;} elseif ($count==1) {?>
							<div class="item" >
							<div class="row" style="">
						<?php } ?>
					    	<div class="col-xs-3" style=" margin-left:0px;">
							<a href="<?php echo get_permalink($movie); ?>">
							<div style="padding-bottom:20px;">
								<?php 
				    				$poster = get_field('poster', $movie); 
									if( !empty($poster) ) $posterurl = $poster['url'];
									if( class_exists( 'kdMultipleFeaturedImages' ) AND empty($posterurl) )
										$posterurl = kd_mfi_get_featured_image_url( 'featured-image-2', 'movie', 'medium' );
									if(empty($posterurl)) $posterurl = 'http://cinefreaks.gr/wp-content/uploads/2017/11/noposter-01.jpg';
								    if( !empty($posterurl) ): ?>
										<div id="post-img" class="poster" style="background-image: url('<?php echo $posterurl;?>');">
											<div class="bottom-div">
												<!--get ratings -->
													<?php $posterurl ='';
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
												
											</div>
										</div>
									<?php else:  
										if ( has_post_thumbnail()) { the_post_thumbnail(); } 		
								endif; ?></a>
							</div>
							<div style="margin-top: 10px; margin-bottom: 10px; text-align:center; " >
								<a href="<?php echo get_permalink($movie); ?>" style="font-size: 1em;line-height: 1em; text-align: center; color: #000;">
								<?php if (get_field('greek_title', $movie) ) { echo get_field('greek_title', $movie); } else { echo get_field('original_title', $movie);} ?>
								<?php if (!get_field('original_title', $movie)) the_title(); ?>
</a>
								
			
		</div>
							</div>
			
	</div>
						   <?php if ($count==4) { ?>
						</div><!--/row-->
						</div><!--/item-->
						<?php $count=0; //reboot count
						}?>
						<?php  endwhile; ?>	
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
		    </div>
	</div>
</div>