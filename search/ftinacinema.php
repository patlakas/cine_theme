	<?php 
		//echo $poli . '<br>';
		//echo $perioxi . '<br>';
	?>
	<h3>Όλες οι αίθουσες σε <?php $city = get_term_by('id', $poli, 'theater_city'); echo $city->name; ?>
		<?php if ($poli == 17577 && $perioxi != 'all') { $neibour = get_term_by('id', $perioxi, 'theater_perioxi'); echo " (" . $neibour->name . ") "; } ?>
	</h3><hr>
	<?php 
		$ipoli = get_term( $poli, 'theater_city' );
		$slug = $ipoli->slug;
		$tax_query = array(
				array(
					'taxonomy' => 'theater_city',
					'field' => 'slug',
					'terms' => $slug
				)
		    	     );
		if ($poli == 17577 && $perioxi != 'all'){
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
		//var_dump($tax_query); 
		$args = array(
		    'meta_query' => array(),
		    'post_type' => array('movietheater'),
		    'orderby'  => array( 'meta_value_num' => 'ASC' ),
	    	    'meta_key'  => 'ticket',
		    'tax_query' => $tax_query,
		    'posts_per_page' => 30
		);
	
		$loop2 = new WP_Query( $args );
		while ( $loop2->have_posts() ) : $loop2->the_post(); 
			$ticket = get_field('ticket');
			$ticket_min = get_field('ticket_min');
			$offers = get_field('offers'); ?>
			<div class="col-md-12 col-xs-12" style="margin-left:-15px; margin-right:-15px;">
				<div class="panel panel-default" style="margin-left:0px; margin-right:-20px;">
					<div class="panel-heading" style="padding:5px;">
						<a href="<?php echo get_permalink($movie); ?>"> <h4 style="display:inline;"><?php the_title();?></h4> </a>
					</div>
					<div class="panel-body" style="padding:5px;">
						<div class="col-md-3 col-xs-12" style="padding:5px;">
							<?php if ( has_post_thumbnail() ) { 
								$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<img src="<?php echo $url; ?>" class="img-responsive img-thumbnail">
							<?php } else {?>
								<img  src="<?php bloginfo('template_url'); ?>/img/noimage.jpg" class="img-responsive" >
							<?php } ?>
						</div>						
						<div class="col-md-9 col-xs-12" style="padding:5px;">
							Εισιτήριο: <strong><?php echo $ticket; ?> <br>		</strong>
							Μειωμένο:  <strong><?php echo $ticket_min; ?> <br>	</strong>
							Προσφορές: <strong><?php echo $offers; ?> 		</strong>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile;  

	?>