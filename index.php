	<?php include('header.php'); ?>
	<?php // include('afieroma.php'); ?>
	<?php if ( wp_is_mobile() ) {
		//include('template-parts/the-sliders-device.php');
		
		include('template-parts/movieSlider-device.php');
	} //else { 
	?>
<?php if (! wp_is_mobile() ) { ?>
		<!--============= 1st ROW = Screening search + Slider =============-->
		<div class="row" style="padding:10px;">
			<div class="col-md-4 col-xs-12">
				<?php if ( wp_is_mobile() ) $h3size = 2; else $h3size = 1.5; ?> 
				<h4 style="font-size:<?php echo $h4size;?>em;"><?php _E('Πάμε Σινεμά?');?></h4>
				<hr>
				<div class="row" style="padding-left:1.7em;padding-right:1.7em;">
					<?php include('parts/form-screen-index.php'); ?>
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<?php include('parts/slider.php'); ?>
			</div>
		</div>
		<!--============= 2nd ROW = Movie Slider =============-->
		<div class="row" style="padding:10px;">
				<?php include('util/movieslider.php'); ?>
		</div>
<?php } ?>		
		<!--============= 3rd ROW = Dimofilesteres tainies =============-->
		<div class="row" style="padding:10px;">
			<div class="col-md-12">
				<h4 style="font-size:<?php echo $h4size;?>em;"><?php _E('TOP 6 - Δημοφιλέστερες ταινίες');?></h4>
				<hr>
			</div>
			<?php include ('util/pop-movies.php');?>
		</div>
		
		<!--============= MIDDLE ROW = Posts =============-->
		<div class="row" style="padding:10px;">
			<!-- LATEST POSTS -->
			<div class="col-md-8" style="border-right: dashed 1px #434343;">
				<?php include ('util/latest-posts.php');?>
			</div>
			<!-- SIDEBAR -->
			<div class="col-md-4">
				<?php include ('util/main-sidebar.php');?>
			</div>
		</div>

		<!--============= 4th ROW =  =============-->
			<?php include ('4row.php');?>
		<?php
		//include('template-parts/movieSlider.php');
		//include('template-parts/mainrow.php');
		//include('VideoPlayer.php');	
	?>

	<!--============= 5th ROW = TV Posts =============-->
		<div class="row" style="padding:10px;">
			<?php include ('util/tv-corner.php');?>
		</div>
	
	<?php get_footer(); ?>
<?php
//    background-image: url("http://cinefreaks.gr/wp-content/uploads/2017/03/CINEFREAKS1920X1080.jpg");
//    background-repeat: no-repeat;
//    background-attachment: fixed;
//    background-position: center top 2px;
?>