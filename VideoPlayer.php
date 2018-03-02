<div class="row" >
<!--TRAILER SECTION -->		
		<div class="col-md-12" style="">	
			<div class="col-md-12" style="background-color:#205b79; height:30px; padding:5px;">
				<strong> <h4 style="color:#fff;"> <i class="fa fa-film"></i> | Video Player </h4></strong>  </p>
			</div>
			<div class="col-md-12" style="margin-bottom:5px; background-color: #dddddd; height:3px; overflow: hidden;">
			</div>
		</div>
		<div class="col-md-4 col-xs-12" >
			<div class="row" style="margin-bottom:-4px;" align="center" > <strong> Επιλέξτε βίντεο:</strong> </div>			
			<div class="col-12" style="margin-top:1px;">
				<!---<div class="col-md-4 col-xs-4" style="padding:4px;">
					<div class="row" align="center"> <strong> CinefreakShow</strong> </div>			
					<?php $i=0;
					$args = array(  'category__in' => array( 6770 ), 'posts_per_page' => 4);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					?>
						<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
						<div class="col-12" style="margin-bottom:4px; height:106px; overflow: hidden; background-size:100%;  background-image:url(<?php echo $thumb[0];?>);" id="VDmovno<?php $i++; echo $i;?>" name="<?php the_ID(); ?>" >
							<div style="height:68px; overflow: hidden;"> </div> 		
							<div style="height:40px; overflow: hidden; background-color:rgba(0,0,0,0.5); "> <center> <?php echo"<span style=\"color:#fff;\">"; the_title(); echo "</span>"; ?></div>
						</div>
			       		<?php endwhile; ?>
				</div>--->
				<div class="col-md-6 col-xs-6" style="padding:4px;">
					<div class="row" align="center"> <strong> Trailers</strong> </div>			
					<?php 
					$args = array( 'post_type' => 'movie', 'movie_type'=>'trailer' , 'posts_per_page' => 4 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					?>
						<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
						<div class="col-12" style="margin-bottom:4px; height:106px; overflow: hidden; background-size:100%; background-image:url(<?php echo $thumb[0];?>);" id="VDmovno<?php $i++; echo $i;?>" name="<?php the_ID(); ?>" >
							<div style="height:68px; overflow: hidden;"> </div> 		
							<div style="height:40px; overflow: hidden; background-color:rgba(0,0,0,0.5); "> <center> <?php echo"<span style=\"color:#fff;\">"; the_title(); echo "</span>"; ?></div>
						</div>
			       		<?php endwhile; ?>
				</div>
				<div class="col-md-6 col-xs-6" style="padding:4px;">
					<div class="row" align="center"> <strong> Shorts</strong> </div>			
					<?php //$i=1;
					$args = array( 'post_type' => 'shortfilm', 'posts_per_page' => 4 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
						<div class="col-12" style="margin-bottom:4px; height:106px; overflow: hidden; background-size:100%;  background-image:url(<?php echo $thumb[0];?>);" id="VDmovno<?php $i++; echo $i;?>" name="<?php the_ID(); ?>" >
							<div style="height:68px; overflow: hidden;"> </div> 		
							<div style="height:40px; overflow: hidden; background-color:rgba(0,0,0,0.5); "> <center> <?php echo"<span style=\"color:#fff;\">"; the_title(); echo "</span>"; ?></div>
						</div>
			       		<?php endwhile; ?>
				</div>
			</div>
		</div>
		<div class="col-md-8 col-xs-12" id="videocontainer" style=" padding-right:33px;">
	<?php $i=1;
		$args = array(  'post_type' => 'movie', 'movie_type'=>'trailer', 'posts_per_page' => 1);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="col-12" align="center" style=" height:42px; overflow: hidden;">
				 <h3 style="color:#fff;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>
			<?php if ($i == 1): ?> <div id="VDslidemov<?php echo $i;?>"  >
			<?php else: ?> <div id="VDslidemov<?php echo $i;?>" class="hide" >
			<?php endif; ?>
			<?php $i++; ?>			
			<?php 
				$key = 'othervideo';
				$themeta = get_post_meta($post->ID, $key, TRUE);
				if($themeta != '') { ?> 
				<div class="videoWrapper">
				<?php  echo get_post_meta($post->ID, $key, true); ?>
				</div><br>
				<?php } ?>
				<?php 
					$key = 'trailer';
					$themeta = get_post_meta($post->ID, $key, TRUE); 
					if($themeta != '') { 
				?>

				<div class="videoWrapper">
					<iframe height="250" src="//www.youtube.com/embed/<?php $key="trailer"; echo get_post_meta($post->ID, $key, true); ?>?rel=0" frameborder="3" allowfullscreen></iframe>
				</div>		<?php } ?>	
				<?php 
					$key = 'webtv';
					$themeta = get_post_meta($post->ID, $key, TRUE); 
					if($themeta != '') { 
				?>
					<div class="videoWrapper">
						<?php 
							$key="webtv"; $vidurl = get_post_meta($post->ID, $key, true); 
						?> 
						<iframe style="margin-top:5;" src="//www.youtube.com/embed/<?php echo $vidurl; ?>" width="100%" frameborder="0" allowfullscreen></iframe>
					</div>
				<?php } ?>

			</div>
		

		<?php endwhile; ?>
		</div> <!--- video-container --->
</div>
