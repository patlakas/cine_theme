<?php /*
	Template Name: Login/Register Page  
	*/
	?>
<?php get_header(); ?>

 

 <div class="row">

	<div class="col-md-8 col-md-offset-2 col-xs-12">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		

			<?php the_content(); ?>
			 <?php do_action( 'wordpress_social_login' ); ?> 



	<?php endwhile; else: ?>

		<p><?php _e('Oooops! This page does not exist!'); ?></p>

	<?php endif; ?>

	</div>

</div>

	  

<?php get_footer(); ?>