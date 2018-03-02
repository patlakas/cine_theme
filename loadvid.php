<?php $other = 0;
					$key = 'trailer';
					$themeta = get_post_meta($post->ID, $key, TRUE); 
					if($themeta != '') { $other=1;
				?>
				<?php //echo "<br>";?>
				<div class="col-md-12 col-sm-12 " align="center" style="height:42px; ">
					 <h3 style="color:#fff;"><a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_title( $post->ID ); ?></a></h3>
				</div>
				<div class="videoWrapper">
					<iframe height="250" src="//www.youtube.com/embed/<?php echo get_post_meta($post->ID, $key, true); ?>?rel=0" frameborder="3" allowfullscreen></iframe>
				</div>
				<?php } ?>
				<?php 
					$key = 'video';
					$themeta = get_post_meta($post->ID, $key, TRUE); 
					if($themeta != '') { $other=1;
				?>
				<?php //echo "<br>";?>
				<div class="col-md-12 col-sm-12 " align="center" style="height:42px;">
					 <h3 style="color:#fff;"><a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_title( $post->ID ); ?></a></h3>
				</div>

				<div class="videoWrapper">
					<iframe height="250" src="//www.youtube.com/embed/<?php echo get_post_meta($post->ID, $key, true); ?>?rel=0" frameborder="3" allowfullscreen></iframe>
				</div>
				<?php } ?>
				<?php 
					$key = 'webtv';
					$themeta = get_post_meta($post->ID, $key, TRUE); 
					if($themeta != '') { $other=1;
				?>
				<div class="col-md-12 col-sm-12 " align="center" style="height:42px;">
					 <h3 style="color:#fff;"><a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_title( $post->ID ); ?></a></h3>
				</div>


					<div class="videoWrapper">
						<?php 
							$key="webtv"; $vidurl = get_post_meta($post->ID, $key, true); 
						?> 
						<iframe style="margin-top:5;" src="//www.youtube.com/embed/<?php echo $vidurl; ?>" width="100%" frameborder="0" allowfullscreen></iframe>
					</div>
				<?php } ?>
				<?php if($other != 1) { ?>
				<?php //echo "<br>"; ?> 
				<div class="col-12" align="center" style="height:42px; ">
					 <h3 style="color:#fff;"><a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_title( $post->ID ); ?></a></h3>
				</div>


				<div class="videoWrapper">
				 <?php  $key="othervideo"; echo get_post_meta($post->ID, $key, true); ?>
				</div>
				<?php } ?>
				
			</div>
		


