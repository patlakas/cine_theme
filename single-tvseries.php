<?php get_header(); ?>
<div class="row" style="padding-top:10px; padding-left:30px; padding-right:15px; ">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="col-md-12 col-xs-12">
	<h2><?php the_title(); ?></h2>
	<br>
	</div>
	
	<div class="col-md-8 col-xs-12">
	<?php // If trailer exists
		$key = 'trailer';
		$themeta = get_post_meta($post->ID, $key, TRUE);
		if($themeta != '') { ?>
		<div class="videoWrapper">
			<iframe height=auto src="//www.youtube.com/embed/<?php $key="trailer"; echo get_post_meta($post->ID, $key, true); ?>?rel=0" frameborder="3" allowfullscreen></iframe>
		</div><br>
		<?php } ?>


	<div class="row" style="margin-top:10px;">
		<div class="col-md-4 col-xs-12">
			<ul class="list-group">	
			<li class="list-group-item"><strong>Είδος: </strong><?php  the_terms( $post->ID, 'tvseries_genre' ,  ' ' );  ?></li>
			<li class="list-group-item"><strong>Δημιουργός/οί: </strong><?php  the_terms( $post->ID, 'tvseries_creators' ,  ' ' );  ?></li>
			<li class="list-group-item"><strong>Παίζουν: </strong><?php  the_terms( $post->ID, 'tvseries_cast' ,  ' ' );  ?></li>
			</ul>
		</div>
		<div class="col-md-8 col-xs-12">
			<?php the_content(); ?>
			<?php disqus_embed('cinefreaks'); ?>
		</div>
	</div>
	</div>
	<div class="col-md-4 col-xs-12">
	<div class="row">	
		<div class="panel panel-default">
			<div class="panel-body">
				<center> <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?><br>
				 <?php the_time('j-n-Y') ?> | <?php the_author_posts_link(); ?> </center>
			</div>
		</div>
		<?php include 'moreseries.php'; ?>
		<?php include 'cineside.php'; ?>
	</div>
	</div>
</div>
	
<?php endwhile; else: ?>
		<p><?php _e('Oooops! This post does not exist!'); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
