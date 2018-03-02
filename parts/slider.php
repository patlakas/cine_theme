				<!----- MEGALES PHOTOS SLIDER ----> 
				<div id="themovie" class="row" style="padding-left:10px;   height:25em; overflow: hidden;">
					<input id="BStheselected" class="hide" value="1"/>
					<?php  
					    $args = array(
					    'meta_query' => array( array('key' => 'Slider', 'value' => 'Yes' ) ),
					    'post_type' => array('post', 'shortfilm', 'movie', 'tvseries'),
					    'posts_per_page' => 6
					    );
					    $loop = new WP_Query( $args ); $i = 1;
					    while ( $loop->have_posts() ) : $loop->the_post(); 
					?>
					<?php if ($i == 1): ?> <div id="BSslidemov<?php echo $i;?>"  >
					<?php else: ?> <div id="BSslidemov<?php echo $i;?>" class="hide " >
					<?php endif; ?>
					<div class="row" style=" background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size: 100% ; background-repeat: no-repeat;">
						<a style="display:block; color:#fff; " href="<?php the_permalink(); ?>">
						<!--- <div class="span10" style="height:360px; overflow: hidden;" >  --->
						<a href="<?php the_permalink(); ?>"><?php  $i++;   // THUMBNAIL
				  		if ( has_post_thumbnail() ) { ?> </a><a href="<?php the_permalink(); ?>">
						<?php  //the_post_thumbnail('large'); 
						}  ?> 
							<div style="height:17em; overflow: hidden;">
							</div>
							<div style="height:5em; background-color:rgba(5, 18, 29, 0.7); margin-right:1em; margin-left:2em; ">
								<div style="padding:1em;">										
									<center><h4><strong><span style="color:#fff;"><a style="color:#fff;" href="<?php the_permalink(); ?>"><?php the_title();  ?></span></h4></strong></a> </center> 
								</div>
							</div>
							<div style="height:3em; overflow: hidden;">
						    </div>
						</a>
					</div>
				</div>
				<?php if ($i > 6){ break; }  ?>
 				<?php endwhile; ?>
                </div>
				<!----- END OF BIG SLIDER PHOTOS ---> 
				<!----- SMALL PHOTOS SLIDER ----> 
				<div class="row" style="margin-top:5px; margin-bottom:15px; padding-left:0px; padding-right:0px; " >
					<?php
					$i = 0;
					$count = 0;
					$args = array(
					    'meta_query' => array( array('key' => 'Slider', 'value' => 'Yes' ) ),
					    'post_type' => array('post', 'shortfilm', 'movie', 'tvseries'),
					    'posts_per_page' => 6
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					$value = get_field( "Slider" ); if ($value == "Yes") { ?> 
					<?php if ($i == 0): ?> <div class="col-md-2 col-xs-2"> <div class="row" id="BSmovno<?php $count++; echo $count;?>" name="<?php echo $count; ?>" style="padding-right:3px; padding-left:0px; height:5.5em; overflow: hidden; background-image: url('<?php echo wp_get_attachment_medium_url( get_post_thumbnail_id($post->ID) ); ?>');  background-size: 98% 100%; background-repeat: no-repeat;">
					<?php else: ?> <div class="col-md-2 col-xs-2"> <div class="row" id="BSmovno<?php $count++; echo $count;?>" name="<?php echo $count; ?>" style="padding-right:3px; padding-left:0px;  height:5.5em; overflow: hidden; opacity: 0.50; background-image: url('<?php echo wp_get_attachment_medium_url( get_post_thumbnail_id($post->ID) ); ?>'); background-size: 98% 100%; background-repeat: no-repeat;">
					<?php endif; ?>
				  		<?php  $i++; ?>
						<!---<div style="height:60px; overflow: hidden;"> </div> 		
						<div style="height:40px; overflow: hidden; background-size: 100% 100%;background-color:rgba(5, 18, 29, 0.7); "> <center><strong> <p style="color:#fff;"> <?php the_title(); ?> </p> </strong></center> </div> --->
				  	</div></div> <!--- both from the if ---> 
				  	<?php if ($i > 5){ break; }  ?>
				 	<?php } endwhile; ?> 
				
				</div>
					<!----- END OF SMALL SLIDER PHOTOS ---> 