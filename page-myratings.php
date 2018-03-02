<?php /*
	Template Name: My ratings Page
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
				 <h3>Οι Βαθμολογίες ταινιών μου</h3>
				 <hr>
				 <table class="table table-striped table-bordered">
  					<?php
                        // counters
                        $totalrating=0;
                        $numberofratings=0;
                        $fives=0;
                        $fours=0;
                        $threes=0;
                        $twos=0;
                        $ones=0;
                        //end counters 
						$query = " SELECT rating_postid AS p, rating_rating as v FROM  `db_cinefreaksGR_ratings` WHERE rating_userid = '" . $userID . "' ORDER BY rating_id desc";
						$myrows = $wpdb->get_results($query); 
						foreach ($myrows as $movie) : ?>
                        <?php 
                            //change counters
                            $totalrating=$totalrating+$movie->v;
                            $numberofratings++;
                            if ($movie->v==5) {$fives++;}
                            if ($movie->v==4) {$fours++;}
                            if ($movie->v==3) {$threes++;}
                            if ($movie->v==2) {$twos++;}
                            if ($movie->v==1) {$ones++;}
                            //end change counters
                        ?>
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
			</div><!-- end inside 6 -->
		</div><!-- end inside row -->
		<!-- end movie ratings -->
	 </div><!-- end 7 -->
	 <div class="col-md-5 col-sm-12">
	 	<!-- favorite cinemas -->
			<h3>Στατιστικά βαθμολογιών</h3>
            <hr>
            <?php 
                $avg=$totalrating/$numberofratings; 
                if ($avg>=4) {
                    echo 'Α εσύ είσαι πολύ γενναιόδωρος/η!';
                } elseif ($avg>=3) {
                    echo 'Γενικά δίνεις καλές βαθμολογίες!';
                } elseif ($avg>=2) {
                    echo 'Eίσαι μάλλον αυστηρός/ή κριτής!';
                } else {
                    echo 'E είσαι μεγάλο φτυάρι!';
                }
            ?>			
			<table class="table table-striped table-bordered">
				<tr>
					<th>
						Μέσος όρος βαθμολογίας:
					</th>
                    <th>
                        <?php echo $avg; ?>
                    </th>
				<tr>
                <tr>
					<th>
						'5 αστέρια':
					</th>
                    <th>
                        <?php echo $fives; ?>
                    </th>
				<tr>
                <tr>
					<th>
						'4 αστέρια':
					</th>
                    <th>
                        <?php echo $fours; ?>
                    </th>
				<tr>
                <tr>
					<th>
						'3 αστέρια':
					</th>
                    <th>
                        <?php echo $threes; ?>
                    </th>
				<tr>
                <tr>
					<th>
						'2 αστέρια':
					</th>
                    <th>
                        <?php echo $twos; ?>
                    </th>
				<tr>
                <tr>
					<th>
						'1 αστέρι':
					</th>
                    <th>
                        <?php echo $ones; ?>
                    </th>
				<tr>
			
			</table>
			
	 </div>

 </div>
 <?php get_footer(); ?>