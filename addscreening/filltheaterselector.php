<?php 
	$query = "SELECT * FROM `db_cinefreaksGR_posts` WHERE post_type= 'movietheater' AND post_title LIKE '%" . $text . "%'";
	//echo "query = " . $query . "<br>";
?>
<select id="as-theater-selector" name="selectionField" multiple="yes" style="width:100%; height: 200px;" > 
	<?php 
		global $wpdb;
		$myrows = $wpdb->get_results($query); 
		foreach ($myrows as $theater) :?>
			<?php $theaterID = $theater->ID; $theatername = $theater->post_title; //echo $movieID;?>
			<?php $poli = wp_get_object_terms($theaterID,'theater_city'); $thecity = $poli[0]->term_id;  ?>
			<?php $perioxi = wp_get_object_terms($theaterID,'theater_perioxi'); $theperioxi = $perioxi[0]->term_id;  ?> 
			<option value="<?php echo $theaterID; ?>" poli="<?php echo $thecity; ?>" perioxi="<?php echo $theperioxi; ?>">
				<?php echo $theatername; ?>
				<?php echo " " . $theaterID; ?> 
			</option>
		<?php endforeach;
	?>
</select>
