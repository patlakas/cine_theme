 <?php get_header(); ?>
 
<div class="row" style="padding-top:10px; padding-left:20px; padding-right:15px; ">
	<div class="col-md-8 col-xs-12">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>

	<?php endwhile; else: ?>
		<p><?php _e('Oooops! This page does not exist!'); ?></p>
	<?php endif; ?>
	</div>
  
 <div class="col-md-4 col-xs-12">
	<?php include 'theside.php'; ?>
  </div>
</div>
	  
<?php get_footer(); ?>
