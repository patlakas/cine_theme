<?php get_header(); ?>
<?php 
	$thisThursday = getlastthursdaydate();
	$thuBefore = getlastthursdaystamp();
?>
<?php if ( wp_is_mobile() ) $h1size = 2.0; else $h1size = 1.7; ?>
<?php if ( wp_is_mobile() ) $h2size = 1.7; else $h2size = 1.5; ?>
<?php if ( wp_is_mobile() ) $h3size = 1.5; else $h3size = 1.4; ?>
<?php if ( wp_is_mobile() ) $h4size = 1.3; else $h4size = 1.3; ?>
<div class="row" >
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- GET FIELDS -->
		<?php 
				$address= get_field('address');
				$address_map = get_field('address_map');
				$telephon = get_field('telephon');
				$website_url = get_field('website_url');
				$theater_type = get_field('theater_type');
				$no_of_theaters = get_field('no_of_theaters');
				$ticket = get_field('ticket');
				$ticket_min = get_field('ticket_min');
				$offers = get_field('offers');
				$facebook_page = get_field('facebook_page');				
				$prosvasi = get_field('prosvasi_metro');
				$leoforeio = get_field('leoforeio');
				$prosvasicomment = get_field('prosvasi-comment');
				$triad = get_field('3d');
				$psifiaki = get_field('psifiaki');

		?>
	<?php 
		$theaterID = get_the_ID();
		$userID = get_current_user_id();
		$userIP = $_SERVER['REMOTE_ADDR'];
		$timestamp = time();
	?>
<!----- The statistics keeping------>
		<?php
			global $wpdb;
			$query= "INSERT INTO `log_theater` VALUES('" . $timestamp . "', '" . $theaterID . "', '" . $userIP . "','" . $userID . "', '')"; //echo $query;
			$myrows = $wpdb->get_results($query);
			//var_dump($myrows[0]); 
			//echo $myrows[0]->v;
		?>
<!---------------------------------->
	<?php
		//echo "User= " . $userID . "<br>"; 
		//echo "Theater= " . $theaterID . "<br>"; 
	?>
	<!-- END GET FIELDS -->
	<div class="col-md-12 col-xs-12" style="padding-left:0px; padding-right:0px;">
		<div class="col-md-10 col-xs-10" style="margin-bottom:0px;" >
			<span><h2 style="display: inline;"><?php the_title();?></h2></span>  
			<span><h4 style="display: inline;">  ( Πόλη | Περιοχή: <?php the_terms( $post->ID, 'theater_city' ,  ' ' );?> | <?php the_terms( $post->ID, 'theater_perioxi' ,  ' ' ); ?>) </h4></span><br> Διεύθυνση: <?php echo $address;?>, Τηλέφωνο: <?php echo $telephon;?></span> | 
			<span><?php if (get_field('website_url')) { ?><a href="<?php echo get_field('website_url'); ?>"><i class="fa fa-television"></i> Website</a><?php }?> <?php if ( get_field('facebook_page')) { ?><a href="<?php echo get_field('facebook_page'); ?>"><i class="fa fa-facebook"></i> Facebook</a><?php }?></span>
		</div>
		<input id="theaterID" class="hide" value="<?php echo $theaterID; ?>"/>
		<input id="userID" class="hide" value="<?php echo $userID; ?>"/>
		<div id="thefavcinema" class="col-md-2 col-xs-2">
			<?php 
			if ($userID == 0) { ?>
				<button type="button " class="btn btn-danger" style="width:95%;" onclick="location.href='http://cinego.gr/login';">
					Σύνδεση για να το <br>βάλεις στα αγαπημένα
				</button>
			<?php }
			if ($userID != 0) { ?>
				<?php // XRISTIS ONLINE - 1. tsekare an exei idi sto wishlist
					$query = " SELECT COUNT(*) AS c FROM  `gogoCin_mine` WHERE postID ='" . $theaterID . "' AND attribute = 'favcinema' AND user = '" . $userID . "'"; 
					$myrows = $wpdb->get_results($query);
					if ( $myrows[0]->c == 0 ): //den tin exei sto wishlist o trexon xristis
				?>
						<button id="favcinema" type="button " class="btn btn-danger" style="width:95%;">
					  		<i class="fa fa-heart"></i> </span> Πρόσθεσέ το στα<br> αγαπημένα μου
						</button>
					<?php else: //tin exei idi sto wishlist?>
						<button type="button " class="btn btn-danger" style="width:95%;">
					  		<i class="fa fa-heart"></i> </span> Αγαπημένο <br> μου σινεμά
						</button>
					<?php endif; ?>
			<?php }?>
		</div>
	</div>
	<div class="col-md-12 col-xs-12" style="margin-top:-10px;" >
		<hr>
	</div>
	<div class="col-md-8 col-xs-12">			
		<div class="row">
			<div class="col-md-4 col-xs-12" style="margin-top:-10px;">
				
				<ul class="list-group" style="margin-top:10px;">	
				<li class="list-group-item"><strong>Τύπος: </strong>
					<?php if ($theater_type == "multi") echo "Multiplex";  ?>
					<?php if ($theater_type == "theater") echo "Αίθουσα";  ?>
					<?php if ($theater_type == "open") echo "Θερινό";  ?>
				</li>
				<?php if ($theater_type == "multi"): ?><li class="list-group-item"><strong>Αριθμός Αιθουσών: </strong><?php echo $no_of_theaters;  ?></li> <?php endif; ?>
				<?php if ($theater_type != "open"): ?><li class="list-group-item"><strong>3D: </strong><?php if ($triad == "Yes"){ ?><i class="fa fa-check"></i><?php }?></li> <?php endif; ?>
				<li class="list-group-item"><strong>Εισιτήριο: </strong><?php if (get_field('ticket')) { ?><?php echo $ticket;  ?> €<?php } else {?> - <?php }?></li>
				<li class="list-group-item"><strong>Μειωμένο: </strong><?php if (get_field('ticket_min')) {?><?php echo $ticket_min; ?> €<?php } else {?> - <?php } ?></li>
				<li class="list-group-item"><strong>Προσφορές: </strong><?php if (get_field('offers')) { echo get_field('offers'); }else { ?> - <?php }?></li>
				</ul>	
					


			</div>
			<div class="col-md-8 col-xs-12">
				<div id="fearturedimage"> 
					<?php if ( has_post_thumbnail() ) { 
						$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
						if ($url == '') $url = 'http://cinefreaks.gr/wp-content/uploads/2017/09/cinema.png';
						?>
						<img style="height:310px; width:100%;" src="<?php echo $url; ?>" class="img-responsive img-thumbnail">
					<?php } else {?>
						<img  src="<?php bloginfo('template_url'); ?>/img/cinema.png" class="img-responsive" >
					<?php } ?>
					<!---- the social buttons --->
					<span class='st_facebook_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
					<span st_via='cinefreaks' st_username='cinefreaks' class='st_twitter_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
					<span class='st_plusone_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
					<span class='st_fblike_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
					<!---- the social buttons end... --->

				</div>			

				
			</div>						
			
			<div class="col-md-12 col-xs-12
				<?php $thecont = get_the_content(); ?>
				<div class="col-md-12 col-xs-12">
				<h3><i class="fa fa-film"></i> Πρόγραμμα προβολών</h3><hr>

				<?php 
					$theaterID = get_the_ID();  
					$provolescinema = getScreeningsOfTheaterID($theaterID);
					if ($provolescinema) printScreeningsOfTheaterID($provolescinema);
					else { ?>
					<p>Δεν υπάρχουν προβολές ταινιών</p>
					<?php }?>
				<h3>Η άποψή σας</h3><hr>
				<?php disqus_embed('cinefreaks'); ?>	
				</div>
			</div>
							
			
	</div>	
	<div class="col-md-4 col-xs-12">
		<!---<h4 style="display:inline;"><small><?php _e('Βαθμολογία θεατών:');?></small></h4> 
		</strong> <?php if(function_exists('the_ratings')) { the_ratings(); } ?>--->
		<script>
			jQuery(function test($){
				$('#1').click(function () {
					var clickedID = jQuery(this).attr("id");
					alert(clickedID);		
				});
			});
		</script>
		<div class="col-md-12 col-xs-12" align="center">
				<?php //echo do_shortcode('[shareaholic app="share_buttons" id="21821887"]'); ?>
		</div>
		<?php include('gmap/gmap.php'); $markcount = 0; ?>
		<div class="acf-map" style="margin-top:-0px;">
			<div cinema="<?php echo get_the_title();?>" id="<?php echo $markcount++; ?>"  class="marker" data-lat="<?php echo $address_map['lat']; ?>" data-lng="<?php echo $address_map['lng']; ?>"></div>
		</div>
		<div class="col-md-12 ">
				<?php $check=0;?>
				<p><strong><i class="fa fa-info-circle"></i> Πρόσβαση: </strong><br>
				<?php if($prosvasi){ echo "<strong>Μετρό, Στάση:</strong> "; echo $prosvasi; echo "<br>"; $check=1;}
					if($leoforeio){ echo "<strong>Λεωφορείο:</strong>"; echo $leoforeio; echo "<br>"; $check=1;}
					if ($prosvasicomment) { echo " (" . $prosvasicomment . ")"; $check=1; }
					if ($check==0) { echo "Δεν υπάρχουν πληροφορίες για την πρόσβαση στον κινηματογράφο";}?>
					</p>
		
		</div>
		<h3>Δύο λόγια για το σινεμά</h3><hr>
		<span align="justify" style="padding-top:10px;"><?php echo $thecont; ?></span>
				
	</div>

	<?php endwhile; else: ?>	<p><?php _e('Oooops! This post does not exist!'); ?></p>	<?php endif; ?>
</div>
<?php get_footer(); ?>
