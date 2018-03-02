<?php /*
	Template Name: Map Greece
	*/
	?>
<?php get_header(); ?>
<div class="row" style="padding:1.5em;" >
	<?php include ('gmap/mapgreece.php');?>
	<div class="col-md-8 col-xs-12">
		<div class="row" style="padding-bottom:15px;">
			<h2> Ο κινηματογραφικός χάρτης της Ελλάδας </h2>
		</div>
		<img src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/pin-red.png" /> = Κινηματογράφος
		<img src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/pin-blue.png" /> = Multiplex 
		<img src="http://cinefreaks.gr/wp-content/themes/CINE2018/img/pin-green.png" /> = Θερινό 
		<div class="row" id="mapgr">
		</div>
	</div>
	<div class="col-md-4 col-xs-12">
		<?php //echo  get_template_directory_uri() . '/theside.php'; 
			include('theside.php');
		?> 
	</div>
</div>

<?php get_footer(); ?>
