 <?php get_header(); ?> 
<?php if ( wp_is_mobile() ) $h1size = 2.0; else $h1size = 1.7; ?>
<?php if ( wp_is_mobile() ) $h2size = 1.7; else $h2size = 1.5; ?>
<?php if ( wp_is_mobile() ) $h3size = 1.5; else $h3size = 1.4; ?>
<?php if ( wp_is_mobile() ) $h4size = 1.3; else $h4size = 1.3; ?>
<div class="row" style="padding:10px;">
	<div class="col-md-8 col-xs-12" style="margin-top:10px;border-right-style: solid;border-right-width:1.5px;border-right-color:#AF1E30;">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2 style="font-size:<?php echo $h2size;?>em;"><?php the_title(); ?></h2>
			<?php 
				$id = get_the_ID();
				$key = 'webtv'; 
				$vid =0;
				$themeta = get_post_meta($post->ID, $key, TRUE); 
				if($themeta != '') { $vid = 1; //echo "mplaaaaaaaaaa " . $vid;
			?>
			<div class="videoWrapper">
				<?php 
					$key="webtv"; $vidurl = get_post_meta($post->ID, $key, true); 
					$youtubeID = $vidurl;
				?> 
				<iframe style="margin-top:5px;" src="//www.youtube.com/embed/<?php echo $youtubeID; ?>" frameborder="0" allowfullscreen></iframe>
			</div>
			<?php } ?>
			<!---video--->
			<?php if ($vid == 0):?>
				<center><?php // THUMBNAIL
			 		if ( has_post_thumbnail() ) {
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
					<img width="100%" src="<?php echo $url; ?>" class="thumbnail img-responsive"/> 
					<?php } ?>	
				</center>
			<?php endif; ?>

			<?php if ( function_exists( 'coauthors_posts_links' ) ) {
        		$author = coauthors_posts_links( null, null, null, null, false ); } ?>

		<p style="margin-top:10px;"><?php the_category(', '); ?> | <?php the_time('j-n-Y') ?> | <?php echo $author;  ?></p>
			<span class='st_facebook_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<span st_via='cinefreaks' st_username='cinefreaks' class='st_twitter_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<span class='st_plusone_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<span class='st_fblike_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>		
		<div style="align:justify;"><?php the_content(); ?></div>
			<span class='st_facebook_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<span st_via='cinefreaks' st_username='cinefreaks' class='st_twitter_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<span class='st_plusone_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<span class='st_fblike_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>		
                <?php if (has_tag('tiff56')) { ?>
		<hr><p><em>To Cinefreaks.gr σας μεταφέρει όλα όσα συμβαίνουν στο <strong>56ο Φεστιβάλ Κινηματογράφου Θεσσαλονίκης</strong> με την υποστήριξη της <a href="https://www.facebook.com/FischerBeerGreece/"><strong>Fischer</strong></a>, χορηγού των <strong>Βραβείων Κοινού</strong> του φεστιβάλ.</em></p>
		<hr>
		<?php }?>
<?php if (has_tag('tdf18')) { ?>
		<hr><p><em>To Cinefreaks.gr σας μεταφέρει όλα όσα συμβαίνουν στο <strong>18ο Φεστιβάλ Ντοκιμαντέρ Θεσσαλονίκης</strong> με την υποστήριξη της <a href="https://www.facebook.com/FischerBeerGreece/"><strong>Fischer</strong></a>, χορηγού των <strong>Βραβείων Κοινού</strong> του φεστιβάλ.</em></p>
		<hr>
		<?php }?>
<?php if (has_tag('fff17')) { ?>
		<hr><p><em>To Cinefreaks.gr σας μεταφέρει όλα όσα συμβαίνουν στο <strong>17ο Φεστιβάλ Γαλλόφωνου Κινηματογράφου</strong> με την υποστήριξη της <a href="https://www.facebook.com/FischerBeerGreece/"><strong>Fischer</strong></a>, χορηγού των <strong>Βραβείων Κοινού</strong> του φεστιβάλ.</em></p>
		<hr>
		<?php }?>		
		<?php $post_tags = wp_get_post_tags($post->ID);
			if(!empty($post_tags)) { ?>
<div style="margin-top:20px;">
				<i class="fa fa-tags" style="color:#2c4a63;"></i><strong><?php the_tags( ' Διαβάστε περισσότερα για: ', ', ', '<br />' ); ?></strong> 
</div>
		<?php } ?>

		<?php include 'template-parts/social-share.php'; ?>			
		<div style="margin-top:20px;">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Responsive Ad -->
		
		<ins class="adsbygoogle"
			 style="display:block"
			 data-ad-client="ca-pub-5350109138535147"
			 data-ad-slot="1003403253"
			 data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		
		
		</div>
	<?php disqus_embed('cinefreaks'); ?>
	<?php endwhile; else: ?>
	<div class="alert alert-block">
		<p><?php _e('Oooops! This post does not exist!'); ?></p>
	</div>
	<?php endif; ?>	
	</div>  
 <div class="col-md-4 col-xs-12">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- Responsive Ad -->
	<ins class="adsbygoogle"
	     style="display:block"
	     data-ad-client="ca-pub-5350109138535147"
	     data-ad-slot="1003403253"
	     data-ad-format="auto"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>


	<br>
	<?php $thecat = wp_get_post_categories( $post->ID ); //echo $thecat[0]; //echo $post->ID; ?>
		<div class="row" style="padding:10px;">	

			<h4 style="font-size:<?php echo $h4size;?>em;"><?php _E('Διαβάστε επίσης');?></h4>
			<hr>			
		</div>
	 <?php $args = array( 'post_type' => 'post', 'posts_per_page' => 8, 'post__not_in' => array($id), );
				$loop = new WP_Query( $args );
				$count=1;
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
					 <div class="row"  style="padding:10px;margin-bottom:5px;">
					 <?php if ($count==1) : ?>
							<a href="<?php the_permalink(); ?>">
								<?php $url = wp_get_attachment_medium_url( get_post_thumbnail_id($post->ID) ); ?>
								<img width="100%" height="6em" src="<?php echo $url; ?>" class="img-responsive"/>
							</a>
							<h5 style="font-size:<?php echo $h4size;?>em; padding-top:1em;"><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5>
					 	<?php $count++; else :?>
					   		<div class="col-md-3 col-xs-3" style="padding:0px;">
								<?php $url = wp_get_attachment_medium_url( get_post_thumbnail_id($post->ID) ); ?>
								<a href="<?php the_permalink(); ?>"><img width="100%" height="6em" src="<?php echo $url; ?>" class="img-responsive"/></a>
							</div>	
							<div class="col-md-9 col-xs-9">
								<h5 style="font-size:<?php echo $h4size;?>em;"><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5>
							</div>
						<?php endif; ?>
					</div>
				  	<div class="row" style="padding:10px;"> <hr> </div>
		<?php endwhile; ?>
	<?php //include 'template-parts/side.php'; ?>	
<div style="padding-left:30px;"> 
	<center><iframe id="lkws_57206ce2a28b8" name="lkws_57206ce2a28b8" src="http://go.linkwi.se/delivery/ih.php?cn=311-19&amp;an=CD2406&amp;target=_blank&amp;" style="width:300px;height:600px" scrolling="no" frameborder="0"></iframe></center>
</div>
  </div>
</div>  
	  <?php get_footer(); ?>