<?php get_header(); ?>
<div class="row" style="padding-top:10px;">
	<div class="col-md-8 col-xs-12" style="">  
		<?php if ( have_posts() ) : ?>		
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3 col-xs-3">
							<?php echo get_avatar( get_the_author_meta('email') , 150 ); ?>
						</div>
						<div class="col-md-9 col-xs-9">
							<center><strong> <?php the_author_posts_link();?></strong> <br>
							<?php the_author_meta( 'description' ); ?>	</center>		
						</div>
					</div>
				</div>
			</div>
		</div>		   
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
					<div class="col-md-4 col-sm-5" style="height:<?php echo $imgheight;?>px; overflow: hidden;">
						 <a href="<?php the_permalink(); ?>"><div class="col-md-12" style="height:150px; overflow: hidden; background-image: url('<?php echo wp_get_attachment_medium_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size: cover; background-position:center; background-repeat: no-repeat;"></div></a>
					</div>
					<div class="col-md-8 col-sm-7">
						<?php $catcount = 0; foreach((get_the_category()) as $cat) { $catcount++; } ?>		
							<?php $catcount2 = 0; foreach((get_the_category()) as $cat) { $catcount2++; ?>
							<strong>		
							<a href="<?php bloginfo('siteurl'); ?>/category/<?php echo $cat->slug;?>/"> <?php echo $cat->name;?></a>
							</strong>
							<?php if ($catcount2 != $catcount) echo ", "; ?>
							<?php }?>
							| <?php the_time('j-n-Y @ H:i') ?> 
						<p><?php the_excerpt("<strong>Περισσότερα...</strong>"); 
						$count++; ?>	</p>
					</div>
				</div>	
			</div>			
		</div>	
		<?php endwhile; // End Loop		
		else: ?>		
			<div class="alert alert-block">			
				<p>Δεν υπάρχουν δημοσιεύσεις...</p>	
			</div>
		<?php endif; ?>		
		<div class="row" align="center"> <h4><?php if ( function_exists('vb_pagination') ) { vb_pagination();} ?> </h4> </div>
	</div>
	<div class="col-md-4 col-xs-12"> 
		<?php include 'template-parts/side.php'; ?> 
	</div>
</div>












<?php get_footer(); ?>