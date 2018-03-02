<?php get_header(); ?>
<?php if ( wp_is_mobile() ) $h1size = 2.0; else $h1size = 1.7; ?>
<?php if ( wp_is_mobile() ) $h2size = 1.7; else $h2size = 1.5; ?>
<?php if ( wp_is_mobile() ) $h3size = 1.5; else $h3size = 1.4; ?>
<?php if ( wp_is_mobile() ) $h4size = 1.3; else $h4size = 1.3; ?>
<?php if ( wp_is_mobile() ) $psize = 1.2; else $psize = 0.4; ?>
<?php 
    $premiere = get_field('premiere');
    $duration = get_field('duration');
	$premieretime = $timestamp = strtotime($premiere); 
	$thisThursday = getlastthursdaydate();

?>
		<?php 
			$movieID = get_the_ID();
			$len = strlen($movieID);  //echo "len= " . $len;
			$userID = get_current_user_id();
			if ($userID == 2) echo $movieID;
			$userIP = $_SERVER['REMOTE_ADDR'];
			$timestamp = time();
		?>
		<!-- The statistics keeping -->
		<?php
			global $wpdb;
			$query= "INSERT INTO `log_movie` VALUES('" . $timestamp . "', '" . $movieID . "', '" . $userIP . "','" . $userID . "', '')"; //echo $query;
			$myrows = $wpdb->get_results($query);
			//var_dump($myrows[0]); 
			//echo $myrows[0]->v;
		?>

<div class="row" style="">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
	<div class="col-md-12">
	<div class="row">
		<div class="col-md-10 col-xs-12" style="padding-top:1em;" >		
            <?php if(!get_field('original_title')) { ?>
    		<h2 style="font-size:<?php echo $h2size;?>em;"><?php the_title(); ?></h2>	
            <?php } else { ?>
    		    <?php if(get_field('greek_title')) { ?>
	    			<span><h2 style="display: inline; font-size:<?php echo $h2size;?>em;"><?php echo get_field        ('greek_title');?></h2></span>
				    <span><h3 style="display: inline; font-size:<?php echo $h3size;?>em;"><small>(<?php echo get_field('original_title');?>)</small></h3></span>
			    <?php } else {?>
			        <h2 style="display: inline; font-size:<?php echo $h2size;?>em;"><?php echo get_field('original_title');?></h2>
			    <?php }?><br>
			<?php } ?>
		
		</div>
		<input id="movieID" class="hide" value="<?php echo $movieID; ?>"/>
		<input id="userID" class="hide" value="<?php echo $userID; ?>"/>
		<div class="col-md-2 col-xs-12" id="thewishlist" style="padding:0.2em; ">
			<?php 
			if ($userID == 0) { ?>
				<button type="button " class="btn btn-danger" style="width:90%;" onclick="location.href='http://cinefreaks.gr/login';">
					</i> Σύνδεση για να την<br> βάλεις στο wishlist
				</button>
			<?php }
			//echo "User= " . $userID . "<br>"; 
			//echo "Movie= " . $movieID . "<br>"; 
			if ($userID != 0) { ?>
				<?php // XRISTIS ONLINE - 1. tsekare an exei idi sto wishlist
					$query = " SELECT COUNT(*) AS c FROM  `gogoCin_mine` WHERE postID ='" . $movieID . "' AND attribute = 'wishlist' AND user = '" . $userID . "'"; 
					$myrows = $wpdb->get_results($query);
					if ( $myrows[0]->c == 0 ): //den tin exei sto wishlist o trexon xristis
				?>
						<button id="wishlist" type="button " class="btn btn-danger" style="width:90%;">
					  		<p font-size:<?php echo $psize;?>em;"><i class="fa fa-bookmark"></i></span> Πρόσθεσέ την <br>στην Wishlist μου</p>
						</button>
					<?php else: //tin exei idi sto wishlist?>
						<button type="button" class="btn btn-danger" style="width:90%;" >
					  		<i class="fa fa-bookmark"></i></span> <p>Η ταινία είναι <br>στην Wishlist μου <p>
						</button>
					<?php endif; ?>
			<?php }?> 
		</div>	
	</div>	
	</div>	
	<div class="col-md-9 col-xs-12">			
		<!-- POSTER AND TRAILER -->
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<!-- TRAILER -->
				<? gettrailer(); ?>
				<!-- TRAILER -->
			</div>
		</div>
		<!-- END POSTER AND TRAILER -->
		<div class="row">						
		<div class="col-md-4 col-xs-12">

		<table class="table table-hover">
			<tr>
				<td><strong><p font-size:<?php echo $psize;?>em;">Είδος:</p></strong></td>
				<td><p font-size:<?php echo $psize;?>em;"><?php the_terms( $post->ID, 'movie_genre' ,  ' ' );  ?></p></td>
			</tr>
			<tr>
				<td><strong>Έτος παραγωγής:</strong></td>
				<td><?php  the_terms( $post->ID, 'movie_year' ,  ' ' );  ?></td>
			</tr>
			<?php if ($duration){	?>
			<tr>
				<td style="font-weight:bold;">Διάρκεια:</td>
				<td><?php  echo $duration;  ?></td>
			</tr>
			<?php } ?>
			<?php 	$country = get_field('country'); if ($country){	?>
			<tr>
				<td>Χώρα:</td>
				<td><?php  for ($i=0; $i< count($country); $i++){
			                        if ($i != 0 ) echo ", "; 
			                        echo $country[$i];  
				            }
			         ?>
			    </td>
			</tr>
			<?php }?>
			<tr>
				<td>Σκηνοθεσία:</td>
				<td><?php  the_terms( $post->ID, 'movie_director' ,  ' ' );  ?></td>
			</tr>
			<tr>
				<td>Σενάριο:</td>
				<td><?php  the_terms( $post->ID, 'movie_writer' ,  ' ' );  ?></td>
			</tr>
			<tr>
				<td>Ηθοποιοί:</td>
				<td><?php  the_terms( $post->ID, 'movie_cast' ,  ' ' );  ?></td>
			</tr>
			<?php if ($premiere){	?>
			<tr>
				<td>Πρεμιέρα:</td>
				<td><?php  echo $premiere;  ?></td>
			</tr>
			<?php } ?>

		</table>
		
		</div><!-- inside 4 -->						
		<div class="col-md-8 col-xs-12"><!--inside 8 -->
			<span class='st_facebook_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<span st_via='cinefreaks' st_username='cinefreaks' class='st_twitter_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<span class='st_plusone_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<span class='st_fblike_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<!-- MAIN CONTENT -->
			<br>
			Γράφει: 
			<?php if (function_exists('coauthors_posts_links') ){ $author = coauthors_posts_links( null, null, null, null, false ); } ?> 
			<?php echo $author ?><br>
			<?php $stars = get_field('stars'); if ($stars) { ?>
				Βαθμολογία Cinefreaks: 
				<?php 
				for ($i = 1; $i <= $stars; $i++) {?>
    				<img style="display:inline; width:20px; height:20px;" src="<?php bloginfo('template_url'); ?>/img/rating_on.gif" class="img-responsive" >
				<?php } ?>
				<?php if ($stars == 0.5 | $stars == 1.5 | $stars == 2.5 | $stars == 3.5 | $stars == 4.5   ) : ?> 
					<img style="display:inline; width:20px; height:20px;" src="<?php bloginfo('template_url'); ?>/img/rating_half.gif" class="img-responsive" >
				<?php endif; ?>
				<?php for ($i = 1; $i <= 5-$stars; $i++) {?>
    				<img style="display:inline; width:20px; height:20px;" src="<?php bloginfo('template_url'); ?>/img/rating_off.gif" class="img-responsive" >
				<?php } ?>
			<?php } ?><br>
			<?php the_content(); ?>
			<!-- END MAIN CONTENT -->
			<!--</div>-->	
			<span class='st_facebook_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<span st_via='cinefreaks' st_username='cinefreaks' class='st_twitter_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<span class='st_plusone_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			<span class='st_fblike_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>			
		</div><!--inside 8 -->			
		</div><!-- main content 9 -->		
		<?php disqus_embed('cinefreaks'); ?>	
	</div>	
	<!--SIDEBAR-->
	<div class="col-md-3 col-xs-12">
		<?php 
		// To programma tou cinema apo to cinego
		$thismovieID = $post->ID; 
		//$cinegolink = "http://cinego.gr/test.php?media=cinefreaks&movie=" . $thismovieID; 
		//echo $cinegolink;
		?>
		<!-- POSTER -->
		<?php 
			if( class_exists( 'kdMultipleFeaturedImages' ) )
				$posterurl = kd_mfi_get_featured_image_url( 'featured-image-2', 'movie', 'full' );
			if (!$posterurl){
				    $poster=get_field('poster'); 
					if( !empty($poster) ) $posterurl = $poster['url'];
			}
		?>
		<?php if ($posterurl){ ?>
			<img width="100%" src="<?php echo $posterurl; ?>" />
			<?php			 }
			else {
			    if ( has_post_thumbnail() && ! $isposter && !empty($poster) ) { the_post_thumbnail(); } 
			}
		?>
		<!-- POSTER -->
		<!-- CINEMAS BEGIN -->
		<?php $type = wp_get_post_terms( get_the_ID() , "movie_type");  if ($type[0]->slug == "intheaters"): ?>
		<br>
		<?php endif; ?>
		
		<h4 style="font-size:<?php echo $h4size;?>em;"><strong>Βαθμολογία Χρηστών</strong></h4>
		<hr>
		<td><?php if(function_exists('the_ratings')) { the_ratings(); } ?></td>
		<h4 style="font-size:<?php echo $h4size;?>em;"><strong>Προβολές</strong></h4>
		<hr>
		<?php include('parts/movie-screenings.php'); ?>
		<!-- CINEMAS END -->
		<!--<?php $type = wp_get_post_terms( get_the_ID() , "movie_type");  if ($type[0]->slug == "intheaters"): ?>
		<div class="col-md-12" style="background-color:#205b79; height:30px; overflow: hidden;padding:5px;">
		<strong> <h4 style="font-size:<?php echo $h4size;?>em;color:#fff; display:inline;"><i class="fa fa-film"></i> | Που παίζεται</h4></strong> 
		</div>
		<div class="col-md-12" style="margin-bottom:5px; background-color: #dddddd; height:3px; overflow: hidden;">
		</div>

		<iframe src="http://cinego.gr/test.php?media=cinefreaks&movie=<?php echo $thismovieID; ?>" width="100%" height="25em !important" frameborder="0"></iframe>
		<p align="right"> powered by <a href="http://cinego.gr"><img src="http://cinego.gr/wp-content/themes/CinegoNEWtesting/img/LOGO.png" style="height:40px" /></a></p>
		-->
		<?php 
		//$cinefreaks = "cinefreaks";
		//$thefuckID = getcinegoIDfor($thismovieID,$cinefreaks);
		//echo $thefuckID;
		?>
		<?php endif; ?>
		<br>
		<!---
		<div style="padding-left:20px;"> <center><iframe id="lkws_57206ce2a28b8" name="lkws_57206ce2a28b8" src="http://go.linkwi.se/delivery/ih.php?cn=311-19&amp;an=CD2406&amp;target=_blank&amp;" style="width:300px;height:600px" scrolling="no" frameborder="0"></iframe></center>
		</div>
		--->
		<!---	<br>
			<div class="col-12">	
				<div class="panel panel-default">
				<div class="panel-body">
					<h4 align="center">Άλλες ταινίες: </h4>
						<?php $args = array( 'post_type' => 'movie', 'posts_per_page' => 6, 'orderby' => 'rand' );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div class="col-md-6 col-xs-12">
						<div style="height:55px; overflow: hidden;"> 
						<a href="<?php the_permalink(); ?>"><?php // THUMBNAIL
							if ( has_post_thumbnail() ) { the_post_thumbnail("medium"); } 	?></a>
						</div> 
						<div style="height:57px; overflow: hidden;"> 
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						</div>
					</div>	
						<?php endwhile; ?>
				</div>
				</div>				
			</div>--->

	</div>	
	<?php endwhile; else: ?>	<p><?php _e('Oooops! This post does not exist!'); ?></p>	<?php endif; ?>
</div>
<?php get_footer(); ?>