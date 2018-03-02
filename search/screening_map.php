<?php include('gmap/gmap.php'); $markcount = 0; ?>	
				<div class="acf-map" style="margin-top:-0px;">
											
					<?php 
						$args = array(
						    'post_type' => array('screening'),
						    'posts_per_page' => 400
						);
						$loop2 = new WP_Query( $args );
						while ( $loop2->have_posts() ) : $loop2->the_post(); 
							$thetheater = get_field('theater'); //echo $thetheater;
							$theater = (string)($thetheater[0]);
							$theatertitle = get_the_title( $theater );
							$address_map = get_field('address_map', $theater);
					?>
<div cinema="<?php echo $theatertitle;?>" id="<?php echo $theater; ?>"  class="marker" data-lat="<?php echo $address_map['lat']; ?>" data-lng="<?php echo $address_map['lng']; ?>"></div>
					<?php endwhile; ?>
				</div>
