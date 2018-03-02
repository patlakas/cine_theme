<div class="row" style="">
<div class="col-md-8 col-xs-12">  	      
	<?php if ( have_posts() ) : ?>	
				<h2><?php printf( __( '%s'), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h2>
		<hr>		 

		<?php while ( have_posts() ) : the_post(); ?>			
			<div class="row" style="margin-top:5px;margin-bottom:5px;">										
			<div class="col-md-12" style="margin-right:10px;">
				<div class="row" style="margin-bottom:5px; margin-top:10px;">
					<div class="col-md-12 col-sm-12" align="left"> 
						<h4><strong><a href="<?php the_permalink(); ?>"><?php the_title();  ?></strong></h4></a>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="">				
				<div class="row"  style="padding-bottom:10px; padding-top:10px;">
					<div class="col-md-4 col-sm-12" style="height:150px; overflow: hidden;">
						 <a href="<?php the_permalink(); ?>"><div class="col-md-12" style="height:150px; overflow: hidden; background-image: url('<?php echo wp_get_attachment_medium_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size: cover; background-position:center; background-repeat: no-repeat;"></div></a>
					</div>
					<div class="col-md-8 col-sm-12">
							<?php if (get_post_type( $post ) == "post") : ?>
							<?php $catcount = 0; foreach((get_the_category()) as $cat) { $catcount++; } ?>		
							<?php $catcount2 = 0; foreach((get_the_category()) as $cat) { $catcount2++; ?>
							<strong>		
							<a href="<?php bloginfo('siteurl'); ?>/category/<?php echo $cat->slug;?>/"> <?php echo $cat->name;?></a>
							</strong>
							<?php if ($catcount2 != $catcount) echo ", "; ?>
							<?php }?>
					<?php endif ?>	
					<?php if (get_post_type( $post ) == "shortfilm") : ?>	
						<strong> <a href="http://cinefreaks.gr/shortfilm/">Μικρού Μήκους </a></strong>
					<?php endif ?>
					<?php if (get_post_type( $post ) == "movie") : ?>	
						<strong> <?php the_terms( $post->ID, 'movie_type' ); ?></strong>
					<?php endif ?>
						| <?php the_time('j-n-Y @ H:i') ?> 

						<p><?php the_excerpt("<strong>Περισσότερα...</strong>"); 
						$count++; ?>	</p>
					</div>
				</div>	
			</div>			
		</div>	
		<?php endwhile; // End Loop		
			else: ?>		<div class="alert alert-block">			
				<p>Δεν υπάρχουν δημοσιεύσεις...</p>		
			<?php endif; ?>		
	<div class="row" align="center"> <h3><?php if ( function_exists('vb_pagination') ) { vb_pagination();} ?> </h3> </div>
	
</div>
<div  class="col-md-4 col-xs-12"> 
<?php include 'side.php'; ?>
<?php include 'dontmiss.php'; ?>
</div>
</div>