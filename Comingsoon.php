<?php /*
	Template Name: Prosexos
	*/
	?>
<?php get_header(); ?>
<div class="row" style="padding:1.5em;">
	<div class="col-md-8 col-xs-12">
		<div class="row" style="padding-bottom:15px;">
			<h2 style="display:inline;"> Προσεχώς στις αίθουσες </h2>
			<hr>
			<br>		
		<?php 
			include('parts/comingsoon.php');
		?> 
		</div>
	</div>
	<div class="col-md-4 col-xs-12">
		<h3> Το στατιστικό:<br> <strong><?php echo $comingsoon; ?></strong> ταινίες προσεχώς </h3>
		<h3>Πολυαναμενόμενες ταινίες: </h3>
		<div class="row" style="padding-bottom:15px; padding-left:10px;">
			
			<?php 
			$args = array(
			    'meta_query' => array( array('key' => 'must', 'value' => 'Yes' ) ),
			    'post_type' => array('movie'),
			    'posts_per_page' => 15
			    );
			$loop = new WP_Query( $args );
			$count =1;
			 if ( $loop->have_posts() ) : ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php // THUMBNAIL
						if ( has_post_thumbnail() ) {
						$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
				<?php } ?>

				<a href="<?php the_permalink(); ?>">
					<div class="col-md-12" style="margin:10px; padding:10px;background-image: url(<?php echo $url; ?>); background-position:center;background-size:cover;background-repeat:no-repeat;height:200px;overflow:hidden; margin-bottom:0px; ">						<div style="padding-top:105px;padding-left:10px;">
							<h3 style="color:#fff;text-shadow: 2px 2px #000;vertical-align:bottom;"><?php echo get_field('original_title');?></h3>
						</div>
					</div>
				
				</a>
				
				
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
		
	</div>
</div>
<?php get_footer(); ?>
