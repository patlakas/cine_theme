<?php get_header(); ?> 
<div class="row" style="padding-top:10px; padding-left:20px; padding-right:15px; ">
	<div class="col-md-8 col-xs-12">
		<div class="row">		
			<?php $i = 0; ?>
			<?php if ( have_posts() ) : ?>		
			<?php while ( have_posts() ) : the_post(); ?>
		  		<div class="col-md-4 col-xs-12">
					<div class="panel panel-default">
					<div class="panel-body">				 
						<a href="<?php the_permalink(); ?>"> 
						<?php // THUMBNAIL			 	
						if ( has_post_thumbnail() ) { the_post_thumbnail(array(200,200)); $i++;} 							?></a>
						<center><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></strong></a></center>
					</div>
					</div>	
		  		</div>		
			<?php if ($i > 2){ $i = 0; echo "</div><div class=\"row\">"; }  ?>
			<?php endwhile; ?>		
		</div>		
		<?php global $wp_query;	        
		if ( isset( $wp_query->max_num_pages ) && $wp_query->max_num_pages > 1 ) { 
		?>	            
		<nav id="<?php echo $nav_id; ?>">        
		<?php };    
		endif; ?>
		<center><h3><?php if ( function_exists('vb_pagination') ) {	vb_pagination();}?></h3>
	</div>
	<div class="col-md-4 col-xs-12"><?php include 'cineside.php'; ?></div>
</div>
<?php get_footer(); ?>
