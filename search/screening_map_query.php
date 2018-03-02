<?php include( get_template_directory() . '/gmap/gmap.php'); $markcount = 0; //echo "aaaa  " . $poli; ?>	
					<div class="acf-map" style="margin-top:-0px;">
											
						<?php 
							$ipoli = get_term( $poli, 'theater_city' );
							$slug = $ipoli->slug;
							$args = array(
							    'post_type' => array('movietheater'),
							    'posts_per_page' => 400,
							    'tax_query' => array(
									array(
										'taxonomy' => 'theater_city',
										'field' => 'slug',
										'terms' => $slug
									)
							     )
							);
							$loop2 = new WP_Query( $args );
							while ( $loop2->have_posts() ) : $loop2->the_post(); 
								$theater = get_the_ID();
								$theatertitle = get_the_title( $theater );
								$address_map = get_field('address_map', $theater);
						?>
	<div cinema="<?php echo $theatertitle;?>" id="<?php echo $theater; ?>"  class="marker" data-lat="<?php echo $address_map['lat']; ?>" data-lng="<?php echo $address_map['lng']; ?>"></div>
						<?php endwhile; ?>
					</div>