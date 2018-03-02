<?php /*
	Template Name: Screenings Delete MINE
	*/
	?>
<?php get_header(); ?>
<?php 
			$thuBefore = getlastthursdaystamp();
			$thisThursday = getlastthursdaydate();
			$thisThursday = date('d-m-Y', strtotime("+". $i . " days", $thuBefore) ); 
			$thisThursday = $_GET["premiere"]; echo $thisThursday;

?>
		<?php 
			global $wpdb;
			$query = "SELECT COUNT(*) AS c FROM `provoles` AS p WHERE p.vdomada = '" . $thisThursday . "'"; 
			$results = $wpdb->get_results($query, OBJECT );
			$noaithouses = $results[0]->c;
		?>

		<?php 
			global $wpdb;
			$query = "SELECT COUNT(*) AS c FROM `provoles` AS p WHERE p.vdomada = '" . $thisThursday . "' AND p.user ='2'"; 
			$results = $wpdb->get_results($query, OBJECT );
			$giannis = $results[0]->c;
		?>
		<?php 
			global $wpdb;
			$query ="SELECT COUNT(*) AS c FROM `provoles` AS p WHERE p.vdomada = '" . $thisThursday . "' AND p.user ='4'"; 
			$results = $wpdb->get_results($query, OBJECT );
			$anestis = $results[0]->c;
		?>
		<?php 
			global $wpdb;
			$query = "SELECT COUNT(*) AS c FROM `provoles` AS p WHERE p.vdomada = '" . $thisThursday . "' AND p.user ='24'";  
			$results = $wpdb->get_results($query, OBJECT );
			$daphne = $results[0]->c;
		?>
			<h3> Περασμένες Προβολές: <?php echo $noaithouses; ?>, Γιάννης: <?php echo $giannis; ?>, Ανέστης: <?php echo $premiere; echo $anestis; ?>, Κωνσταντίνος: <?php echo $daphne; ?> </h3>
		

<div class="row" id="deletetext">

</div>

<div class="row">
	<div class="col-md-3 col-xs-12">
		<h3>Ταινία </h3>
	</div>
	<div class="col-md-2 col-xs-12">
		<h3>Κινηματογράφος</h3>
	</div>
	<div class="col-md-2 col-xs-12">
		<h3>Ποιος την Ανέβασε</h3>
	</div>
	<div class="col-md-1 col-xs-12">
		<h3>Edit link </h3>
	</div>
	<div class="col-md-4 col-xs-12">
		<h3>Προβολές </h3>
	</div>
	<div class="col-md-12 col-xs-12">
		<hr>
	</div>
</div>
<?php 
	$query = "SELECT * FROM `provoles` AS p WHERE p.vdomada = '" . $thisThursday . "'" . " ORDER BY ID DESC";  //echo $query;
	$myrows = $wpdb->get_results($query); 
	foreach ($myrows as $provoli) :?>
		<div class="row">
			<div class="col-md-3 col-xs-12">
				<?php 
					$movie = $provoli->movieID;	
					echo get_the_title( $movie ) ;
				?>	
				<?php 
					$triad = $provoli->triad; 
					$dubbed = $provoli->dubbed; 
					$atmos = $provoli->atmos; 
					$nyxtes = $provoli->nyxtes; 
				?>
				<?php if($triad == "1"): ?> 
					<img style="padding-top:0px; margin-top:-7px;" width="20px" src="http://cinego.gr/wp-content/uploads/2015/12/3d.jpg"/>
				<?php endif; ?>
				<?php if($dubbed == "1"): ?> 
					(Μεταγλ.)
				<?php endif; ?>
				<?php if($atmos == "1"): ?> 
					<img style="padding-top:0px; margin-top:-7px;" height="20px" src="http://cinego.gr/wp-content/uploads/2015/12/atmos.png"/>
				<?php endif; ?>
				<?php if($nyxtes == "1"): ?> 
					
					<img style="padding-top:0px; margin-top:-7px; height:20px;" src="http://cinego.gr/wp-content/uploads/2016/09/nyxtes.png"/>
				<?php endif; ?>

	 
			</div>
			<div class="col-md-2 col-xs-12">
				<?php 
					$theater = $provoli->theaterID; 
					echo get_the_title( $theater );
					$aithousano = $provoli->aithousa; 
					if ($aithousano) echo "(" . $aithousano . ")";
				?>
			</div>
			<div class="col-md-2 col-xs-12">
				<?php echo get_userdata($provoli->user)->display_name; ?>
			</div>
			<div class="col-md-1 col-xs-12">
				<div id="deletescr<?php echo $provoli->ID; ?>" name="<?php echo $provoli->ID; ?>"> Διέγραψε το <a href="http://cinefreaks.gr/edit-screenings-page/"> <?php echo $provoli->ID; ?></a> </div>
			</div>
			<div class="col-md-4 col-xs-12">
		<?php $everyday_screening = $provoli->kath; if($everyday_screening):?>
			Καθημερινά <?php echo $everyday_screening; ?>
		<?php else: ?>
	<?php if ($provoli->pem) :?><strong>Πέμπτη <?php echo date('d/m', $thuBefore); ?></strong>: <?php echo $provoli->pem; ?><br> <?php endif;?>
	<?php if ($provoli->par) :?><strong>Παρασκευή<?php echo date('d/m', strtotime("next friday", $thuBefore) ); ?></strong>: <?php echo $provoli->par; ?><br><?php endif;?>
	<?php if ($provoli->sav) :?><strong>Σάββατο <?php echo date('d/m', strtotime("next saturday", $thuBefore) ); ?></strong>: <?php echo $provoli->sav; ?><br><?php endif;?>
	<?php if ($provoli->kyr) :?><strong>Κυριακή <?php echo date('d/m', strtotime("next sunday", $thuBefore) ); ?></strong>: <?php echo $provoli->kyr; ?><br><?php endif;?>
	<?php if ($provoli->dey) :?><strong>Δευτέρα <?php echo date('d/m', strtotime("next monday", $thuBefore) ); ?></strong>: <?php echo $provoli->dey; ?><br><?php endif;?>
	<?php if ($provoli->tri) :?><strong>Τρίτη <?php echo date('d/m', strtotime("next tuesday", $thuBefore) ); ?></strong>: <?php echo $provoli->tri; ?><br><?php endif;?>
	<?php if ($provoli->tet) :?><strong>Τετάρτη <?php echo date('d/m', strtotime("next wednesday", $thuBefore) ); ?></strong>: <?php echo $provoli->tet; ?> <br><?php endif;?>
		<?php endif;?>

			</div>
			<div class="col-md-12 col-xs-12">
				<hr>
			</div>
		</div>
	<?php endforeach; ?>

<?php get_footer(); ?>
