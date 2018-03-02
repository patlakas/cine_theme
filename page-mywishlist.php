<?php /*
	Template Name: My Wishlist Page
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
	 	<div class="row">
			<div class="col-md-12">
			<!-- wishlist -->
			<h3>Η Wishlist μου</h3>
			<hr>
			<table class="table table-striped table-bordered">
				<?php 
				$query = " SELECT * FROM  `gogoCin_mine` WHERE attribute = 'wishlist' AND user = '" . $userID . "' ORDER BY ID desc";
				$myrows = $wpdb->get_results($query); 
				foreach ($myrows as $movie) :?>
					<tr>
						<th>
							<?php $movieID = $movie->postID; //echo $movieID;?>
							<?php $theID = $movie->ID; //echo $movieID;?>
							
                            <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                    <!-- POSTER -->
                                    <a href="<?php echo get_permalink($movieID); ?>">
                                        <?php $poster=get_field('poster', $movieID); ?>
                                        <?php if( !empty($poster) ): ?>
                                        <?php $url = $poster['url'];?>
                                            <img src="<?php echo $url; ?>" >
                                        <?php else:  
                                            if ( has_post_thumbnail()) { the_post_thumbnail(); } 		
                                        endif; ?>
                                    </a>
							        <!-- END POSTER -->
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-10">
                                    <!-- title -->
                                        <a href="<?php echo get_permalink($movieID); ?>"> <?php //echo $movieID; ?>
							<h3><?php if(get_field('greek_title',$movieID)) { ?>
								<?php echo get_field('greek_title', $movieID);?>
								(<?php echo get_field('original_title', $movieID);?>)
							<?php } else {?>
							<?php echo get_field('original_title',$movieID );?>
							<?php }?>
							</h3>
                            </a>
                                    <!-- end title -->
                                    <!-- info -->
                                        <?php 
                                            $noaithouses = getNumberOfScreeningsForMovie($movieID, "all") ; 
                                            $noaithousesATH = getNumberOfScreeningsForMovie($movieID, 2) ; 
                                            $noaithousesTHE = getNumberOfScreeningsForMovie($movieID, 30) ; 
                                            $noaithousesEPA = getNumberOfScreeningsForMovie($movieID, "eparxia") ; 
                                        ?>
		
		
                                        <?php 
                                            //echo $today; echo "<br>"; echo $premieretime;
                                        if ($today >= $premieretime): if ($noaithouses > 0): ?>
                                           <strong>Προβάλλεται σε <?php echo $noaithouses; ?> αίθουσες</strong> 
                                        <?php else: ?>
                                            <strong>Η ταινία δεν παίζεται πλέον στις αίθουσες </strong>
                                        <?php endif; else: ?>	
                                            <strong>Υπομονή! Η ταινία έρχεται στις αίθουσες στις <?php echo get_field('premiere'); ?> </strong>
                                        <?php endif; ?>
                                    <!-- end info -->
                                 </div>
                            </div>  
                            <div id="deletewish<?php echo $movie->ID; ?>" name="<?php echo $movie->ID; ?>"> <a href=""><i class="fa fa-trash-o" style="float:right;" aria-hidden="true"></i></a></div>
						</th>
					<tr>
				<!-- DELETE FROM `gogoCin_mine` WHERE user ='4' AND attribute='wishlist' AND vathmos='0' -->
				<?php endforeach;?>
			</table>
			<!-- end wishlist -->	
			</div><!-- end inside 6 -->
		</div><!-- end inside row -->
		<!-- end movie ratings -->
	 </div><!-- end 7 -->
	 <div class="col-md-5 col-sm-12">
	 	<!-- get favorite cinema -->
		 	<h3>Στην πόλη σου... <small><a href="#" data-toggle="tooltip" title="Με βάση το που βρίσκονται τα αγαπημένα σου σινεμά">[Πληροφορίες]</a></small></h3>
			<hr>
			<p>Οι αγαπημένοι σας κινηματογράφοι βρίσκονται σε:</p>
			<?php 
			$cincount = 0;
			$query = " SELECT * FROM  `gogoCin_mine` WHERE attribute = 'favcinema' AND user = '" . $userID . "'";
			$myrows = $wpdb->get_results($query); 
			foreach ($myrows as $theater) : $cincount++; ?>
				<?php $theaterID = $theater->postID; //echo $theaterID;?>
				<?php $theID = $theater->ID;?>
				<?php the_terms( $theaterID, 'theater_city' ,  ' ' );?>
			<?php endforeach;?>
		 <!-- end favorite cinema -->
	 </div>

 </div>
 <?php get_footer(); ?>