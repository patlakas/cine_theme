<?php get_header(); ?>
<div class="row" style="padding-top:20px; padding-left:20px; padding-right:15px; ">
<div class="col-md-12">	
		<?php $theTAG = single_cat_title( '', false ); ?>
		<h3>Όλες οι δημοσιεύσεις για το #<?php echo $theTAG; ?></h3> 
		<hr>
</div>
<div class="col-md-8 col-xs-12 ">
 <?php $args = array( 'post_type' => array('post','movie'), 'tag' => $theTAG, 'posts_per_page' =>80 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="row" style="margin-top:5px;margin-bottom:5px;">										
			<div class="col-md-12" style="margin-right:10px;">
				<div class="row" style="margin-bottom:5; margin-top:5;">
					<div class="col-md-12 col-sm-12" align="left"> 
						<h4><strong><a href="<?php the_permalink(); ?>"><?php the_title();  ?></strong></h4></a>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="">				
				<div class="row"  style="padding-bottom:10px; padding-top:10px;">
					<div class="col-md-4 col-sm-12" style="height:110px; overflow: hidden;">
						 <a href="<?php the_permalink(); ?>"><div class="col-md-12" style="height:125px; overflow: hidden; background-image: url('<?php echo wp_get_attachment_medium_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size: 100% 100%; background-repeat: no-repeat;"></div></a>
					</div>
					<div class="col-md-8 col-sm-12">
						<?php the_excerpt("<strong>Περισσότερα...</strong>"); 
						$count++; ?>	
					</div>
				</div>	
			</div>
			<?php if ($count<50) { ?> 
				<div class="col-md-12" style="margin-bottom:-10px; margin-top:5px; margin-right:-10px; background-color: #dddddd; height:2px; overflow: hidden;"> 
				</div>
			<?php } ?> 
			<?php if ($count== 50) { ?> 
				<div class="col-md-12" align="center"  style="margin-top:15px;">
					<h4><a href="http://cinefreaks.gr/category/ola/" class="btn btn-cine"> Δείτε περισσότερα άρθρα </a> </h4>
				</div>
			<?php } ?> 
		</div>
			<?php endwhile; ?>
</div>

<div class="col-md-4 col-xs-12 " style="padding-right:25px;"> 
	<?php include 'template-parts/side.php'; ?>	
</div>

</div>
<?php get_footer(); ?>