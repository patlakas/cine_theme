<div class="row" style="min-height:500px;">
<div class="col-md-8 col-xs-12">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>	
			<?php
				$address = get_field('address');
				$telephone = get_field('telephone');
				$website_url = get_field('website_url');
				$facebook_page = get_field('facebook_page');
			?>
			<div class="row">
			<div class="col-md-4 col-xs-12" style="margin-right:-20px;"> 
			<div class="col-md-12 col-xs-12">
				<?php $url = wp_get_attachment_medium_url( get_post_thumbnail_id($theater) ); 
					if (!$url) $url = "http://cinego.gr/wp-content/uploads/2017/02/default-01.jpg";  ?>
				<img src="<?php echo $url; ?>" class="img-responsive img-thumbnail" />
			</div>	
			<div class="col-md-12 col-xs-12">	
				<div class="col-md-6 col-xs-12">
					<div class="row" align="center"> 
					Βαθμολογία 
					</div>
				</div>	
				<div class="col-md-6 col-xs-12" style="border-left: thick #ffffff;">
					<div class="row" align="center"> 
					Εισιτήριο <i class="icon-large icon-euro"></i>
					</div>
				</div>	
			</div>		
		</div>
		<div class="col-md-8 col-xs-12"> 				
			<h4 style="display:inline;"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h4>
			<p>Πόλη | Περιοχή: <?php the_terms( $post->ID, 'theater_city' ,  ' ' );?> | <?php the_terms( $post->ID, 'theater_perioxi' ,  ' ' ); ?></p>
			<p><?php echo $address;?> | <?php echo $telephone; ?></p>
			<p><?php if (get_field('website_url')) { ?><a href="<?php echo get_field('website_url'); ?>"><i class="fa fa-television"></i> Website</a><?php }?> <?php if ( get_field('facebook_page')) { ?><a href="<?php echo get_field('facebook_page'); ?>"><i class="fa fa-facebook"></i> Facebook</a><?php }?></p>
			
		</div>
		<div class="col-md-12">
			<hr>
		</div>
</div><!-- inside row -->
		<?php endwhile; ?>
   <?php endif;?>

</div><!-- md-8 -->
<div class="col-md-4 col-xs-12"> 
	<?php include('theside.php');?>
</div>
</div>