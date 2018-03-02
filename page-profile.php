<?php /*
	Template Name: Profile Page
	*/
	$userID = get_current_user_id();
	global $wpdb;
	?>
 <?php get_header(); ?>
<?php 
	$given= time(); //echo 'Tora: '. date('Y-m-d', $given) ."\n"; echo "Σημερα ειναι: " . date('w', $given) . "<br>";
	if( date('w', $given) == '4' ) {  $thisThursday = date('d-m-Y', $given); $thuBefore = $given; }
	else {
		$thuBefore = strtotime("last thursday", $given); //echo 'Proigoumeni Pempti: '. date('Y-m-d', $thuBefore) ."\n";
		$thisThursday = date('d-m-Y', $thuBefore);
	}
?>
 <div class="row" style="padding-top:10px;">
 	<div class="col-md-7 col-sm-12">
	 	
		<!-- profil -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
				the_content(); 
			endwhile; else: 
				 _e('Oooops! This page does not exist!'); 
			 endif; ?>
			 <?php //echo get_current_user_id(); ?>
		<!-- end profil -->
		<!-- movie ratings -->
		<div class="row">
			<div class="col-md-12">
				 <h3>Οι Βαθμολογίες ταινιών μου</h3>
				 <hr>
				 <table class="table table-striped table-bordered">
  					<?php 
						//$query = " SELECT postID AS p, vathmos as v FROM  `gogoCin_mine` WHERE attribute = 'ratingmovie' AND user = '" . $userID . "' ORDER BY ID desc LIMIT 10";
						$query = " SELECT rating_postid AS p, rating_rating as v FROM  `db_cinefreaksGR_ratings` WHERE rating_userid = '" . $userID . "' ORDER BY rating_id desc LIMIT 10";
						$myrows = $wpdb->get_results($query); 
						foreach ($myrows as $movie) : ?>
						<tr>
							<th style="width:75%;">
								<?php $movieID = $movie->p; //echo $movieID;?>
								<i class="fa fa-arrow-circle-right"></i> <a href="<?php echo get_permalink($movieID); ?>">
								            <?php if(!get_field('original_title',$movieID)) { ?>
    		<?php echo get_the_title($movieID); ?>	
            <?php } else { ?>
    		    <?php if(get_field('greek_title',$movieID)) { ?>
	    			<span><p style="display: inline;"><?php echo get_field('greek_title',$movieID);?></p></span>
				    <span><p style="display: inline;"><small>(<?php echo get_field('original_title',$movieID);?>)</small></p></span>
			    <?php } else {?>
			        <p style="display: inline;"><?php echo get_field('original_title',$movieID);?></p>
			    <?php }?><br>
			<?php } ?>
								</a> 
							</th>
							<th style="width:25%;">
								<?php for ($i = 1; $i <= $movie->v; $i++) {?>
									<img style="display:inline; width:20px; height:20px;" src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/rating_on.gif" class="img-responsive" >
								<?php } ?>
								<?php for ($i = 1; $i <= 5-$movie->v; $i++) {?>
									<img style="display:inline; width:20px; height:20px;" src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/rating_off.gif" class="img-responsive" >
								<?php } ?>
							</th>
						</tr>
					<?php endforeach;?>	
				 </table><!--end table movie ratings -->
				<div style="text-align:center;padding-top:10px;padding-bottom:10px;">
					<a href="<?php bloginfo('siteurl'); ?>/my-ratings" class="btn btn-default">Όλες οι βαθμολογίες</a>
				</div>
			</div><!-- end inside 6 -->
			<div class="col-md-12">
			<!-- wishlist -->
			<h3>Η Wishlist μου</h3>
			<hr>
			<table class="table table-striped table-bordered">
				<?php 
				$query = " SELECT * FROM  `gogoCin_mine` WHERE attribute = 'wishlist' AND user = '" . $userID . "' ORDER BY ID desc LIMIT 10";
				$myrows = $wpdb->get_results($query); 
				foreach ($myrows as $movie) :?>
					<tr>
						<th>
							<?php $movieID = $movie->postID; //echo $movieID;?>
							<?php $theID = $movie->ID; //echo $movieID;?>
							<i class="fa fa-arrow-circle-right"></i> <a href="<?php echo get_permalink($movieID); ?>"> <?php //echo $movieID; ?>
							<?php if(get_field('greek_title',$movieID)) { ?>
								<?php echo get_field('greek_title', $movieID);?>
								(<?php echo get_field('original_title', $movieID);?>)
							<?php } else {?>
							<?php echo get_field('original_title',$movieID );?>
							<?php }?>
							</a>  <div id="deletewish<?php echo $movie->ID; ?>" name="<?php echo $movie->ID; ?>"> <a href=""><i class="fa fa-trash-o" style="float:right;" aria-hidden="true"></i></a></div>
						</th>
					<tr>
				<!-- DELETE FROM `gogoCin_mine` WHERE user ='4' AND attribute='wishlist' AND vathmos='0' -->
				<?php endforeach;?>
			</table>
			<!-- end wishlist -->	
			<div style="text-align:center;padding-top:10px;padding-bottom:10px;">
					<a href="<?php bloginfo('siteurl'); ?>/my-wishlist" class="btn btn-default">Ολόκληρο το wishlist</a>
				</div>
			</div><!-- end inside 6 -->
		</div><!-- end inside row -->
		<!-- end movie ratings -->
	 </div><!-- end 7 -->
	 <div class="col-md-5 col-sm-12">
	 	<!-- favorite cinemas -->
			<h3>Οι αγαπημένοι μου κινηματογράφοι</h3>
			<hr>
			<table class="table table-striped table-bordered">
			<?php 
			$cincount = 0;
			$query = " SELECT * FROM  `gogoCin_mine` WHERE attribute = 'favcinema' AND user = '" . $userID . "'";
			$myrows = $wpdb->get_results($query); 
			foreach ($myrows as $theater) : $cincount++; ?>
				<?php $theaterID = $theater->postID; //echo $theaterID;?>
				<?php $theID = $theater->ID;?>
				<tr>
					<th>
						<a href="<?php echo get_permalink($theaterID); ?>">
						 <?php echo get_the_title( $theaterID);?>
						</a>  <div id="deletewish<?php echo $theater->ID; ?>" name="<?php echo $theater->ID; ?>"> <a href=""><i class="fa fa-trash-o" style="float:right;" aria-hidden="true"></i></a></div> 
					</th>
				<tr>
			<?php endforeach;?>
			</table>
			<p><?php if ($cincount == 0) echo "Πρόσθεσε κάποιον κινηματογράφο στους αγαπημένους σου, για να βλέπεις εδώ το πρόγραμμά του"; ?></p>
		<!-- end favorite cinemas -->
		<!-- favorite cinemas program -->
		<h3>Πρόγραμμα αγαπημένων κινηματογράφων</h3>
		<hr>
		<p><small>Κάντε κλικ στο όνομα του κινηματογράφου για να αποκαλυφθεί</small></p>
		<table class="table table-striped table-bordered">
			<?php $cincount2 = 0;
			foreach ($myrows as $theater) : $cincount2++; ?>
			<tr>
				<th>
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $cincount2;?>" aria-expanded="true" aria-controls="collapse<?php echo $cincount2;?>">
				<?php $theaterID = $theater->postID; //echo $theaterID;?>
				<h4 style="display:inline;"><?php echo get_the_title( $theaterID);?></h4>
				</a>
				<div id="collapse<?php echo $cincount2;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $cincount2;?>" style="padding-top:10px;">
				<?php 
					$theaterIDval1 = "a:1:{i:0;s:2:\"" . $theaterID ."\";}"; //echo $theaterIDval;  
					$theaterIDval2 = "a:1:{i:0;s:3:\"" . $theaterID ."\";}";
					$theaterIDval3 = "a:1:{i:0;s:4:\"" . $theaterID ."\";}"; ?>
					<?php 
					$provolescinema = getScreeningsOfTheaterID($theaterID);
					if ($provolescinema) printScreeningsOfTheaterID($provolescinema);
					else { ?>
					<p>Δεν υπάρχουν προβολές ταινιών</p>
					<?php 
					}?>
				</div>
				</th>
			</tr>
			<?php endforeach;?>
		</table>	
		<!-- end favorite cinemas program -->
	 </div>

 </div>
 <?php get_footer(); ?>