<?php include( get_template_directory() . '/gmap/gmap.php'); $markcount = 0; 
								$ipoli = get_term( $perioxi, 'theater_perioxi' );
								$slug = $ipoli->slug; //echo $slug;
								$args = array(
								    'post_type' => array('movietheater'),
								    'posts_per_page' => 400,
								    'tax_query' => array(
										array(
											'taxonomy' => 'theater_perioxi',
											'field' => 'slug',
											'terms' => $slug
										)
								     )
								);
							
?>
					<div class="acf-map" style="margin-top:-0px;">
											
						<?php 
							$loop2 = new WP_Query( $args );
							while ( $loop2->have_posts() ) : $loop2->the_post(); 
								$theater = get_the_ID();
								$theatertitle = get_the_title( $theater );
								$address_map = get_field('address_map', $theater);
						?>
	<div cinema="<?php echo $theatertitle;?>" id="<?php echo $theater; ?>"  class="marker" data-lat="<?php echo $address_map['lat']; ?>" data-lng="<?php echo $address_map['lng']; ?>"></div>
						<?php endwhile; ?>
					</div>