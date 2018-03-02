	<?php if ( have_posts() ) : ?>		
	<div class="row">
		<h2><?php printf( __( '%s'), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h2>
		<hr>		 
	</div>
		<?php while ( have_posts() ) : the_post(); ?>			
			<div class="row" style="margin-top:15px;margin-bottom:15px;">
			<div class="col-sm-12" style="height:400px; overflow: hidden;">
				 <a href="<?php the_permalink(); ?>"><div class="col-md-12" style="height:400px; overflow: hidden; background-image: url('<?php echo wp_get_attachment_medium_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size: cover; background-position:center; background-repeat: no-repeat;"></div></a>
			</div>
			<div class="col-sm-12" align="left" style="margin-top:20px;"> 
				<h1 style="font-size:1.8em;"><strong><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></strong></h1>
			</div>
			<div class="col-sm-12" style="margin-top:10px;">
				<p style="font-size:1.2em;"><?php the_excerpt("<strong>Περισσότερα...</strong>"); 
				$count++; ?>	</p>
			</div>				
			<?php if ($count<8) { ?> 
				<div class="col-md-12" style="margin-bottom:-10px; margin-top:5px; margin-right:-10px; background-color: #dddddd; height:2px; overflow: hidden;"> 
				</div>
			<?php } ?> 			
		</div>
		<?php endwhile; // End Loop		
			else: ?>		<div class="alert alert-block">			
				<p>Δεν υπάρχουν δημοσιεύσεις...</p>		
			<?php endif; ?>		
	<div class="row" align="center"> <h2><?php if ( function_exists('vb_pagination') ) { vb_pagination();} ?> </h2> </div>