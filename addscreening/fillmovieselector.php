<?php 
	$query = "SELECT * FROM `db_cinefreaksGR_posts` WHERE post_type= 'movie' AND post_title LIKE '%" . $text . "%'";
	//echo "query = " . $query . "<br>";
?>
<select id="as-movie-selector" name="selectionField" multiple="yes" style="width:100%; height: 200px;" > 
	<?php 
		global $wpdb;
		$myrows = $wpdb->get_results($query); 
		foreach ($myrows as $movie) :?>
			<?php $movieID = $movie->ID; //echo $movieID;?>
			<option value="<?php echo $movieID; ?>" >
				<?php if(get_field('greek_title',$movieID)) { ?>
					<span> <?php echo get_field('greek_title', $movieID);?></span></strong>
					<span> (<?php echo get_field('original_title', $movieID);?>)</span>
				<?php } else {?>
				<strong><?php echo get_field('original_title',$movieID );?></strong>
				<?php } ?>
				<?php echo " " . $movieID; ?>
			</option>

		<?php endforeach;
	?>
</select>



