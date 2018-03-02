 <?php get_header(); ?>
<div class="row" style="padding-top:10px; padding-left:20px; padding-right:15px; ">
	<div class="col-12">
	<div class="col-md-8 col-xs-12">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!--<div class='shareaholic-canvas' data-app='share_buttons' data-app-id='412900'></div>-->
	<?php // If video exists
		$key = 'video';
		$themeta = get_post_meta($post->ID, $key, TRUE);
		if($themeta != '') { ?>
		<div class="videoWrapper">
		<iframe height=auto src="//www.youtube.com/embed/<?php $key="video"; echo get_post_meta($post->ID, $key, true); ?>?rel=0" frameborder="3" allowfullscreen></iframe>
		</div><br>
	<?php } ?>
<span class='st_facebook_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
<span st_via='cinefreaks' st_username='cinefreaks' class='st_twitter_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
<span class='st_plusone_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
<span class='st_fblike_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
	
	<?php the_content(); ?>
	<?php disqus_embed('cinefreaks'); ?>
	
	<?php endwhile; else: ?>
		<p><?php _e('Oooops! This post does not exist!'); ?></p>
	<?php endif; ?>
	</div>
  
 <div class="col-md-4 col-xs-12"> 
 	<div class="panel panel-default">
	<div class="panel-body">
		<center><?php // THUMBNAIL
		 if ( has_post_thumbnail() ) { the_post_thumbnail("medium"); } 		
		?> 
		<center><div class="col-md-12 col-xs-12"><h3><?php the_title(); ?></h3>
		<?php the_time('j-n-Y') ?> | <?php the_author_posts_link(); ?></center>
	</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-xs-12"><?php include 'moreshorts.php'; ?></div>	
	</div> 
	<?php //include 'cineside.php'; ?>	
	</div>

</div>	
</div>  
	

<?php get_footer(); ?>
