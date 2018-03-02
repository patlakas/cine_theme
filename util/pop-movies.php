<?php 
	//Count last week
	$lastweekstamp = strtotime("-1 week");
	//echo 'lastweekstamp: '. date('Y-m-d', $lastweekstamp) ."\n";
	//Query for most visited films last week
	$query = " 
		SELECT COUNT( * ) AS c, movieID AS m
		FROM  `log_movie` 
		WHERE TIMESTAMP > " . $lastweekstamp . "
		GROUP BY movieID
		ORDER BY COUNT( * ) DESC 
	"; 
	//echo $query; 
	$myrows = $wpdb->get_results($query);
	$count = 0;
	foreach ($myrows as $row) : 
		$movID = $row->m;
		$url = wp_get_attachment_url( get_post_thumbnail_id($movID) ); ?>
		<div class="col-md-2 col-sm-4 col-sm-6" style="margin-bottom:2em;">
			<?php if ( has_post_thumbnail() ) { 
				?>
<h4 style="font-size:<?php echo $h4size;?>em;">
				<a href="<?php echo get_permalink($movID); ?>"><div class="square-2" style="background-image: url('<?php echo $url;?>');margin-bottom:10px;" ></div></a>	
				<?php } ?>
				<strong><a href="<?php echo get_permalink($movID); ?>">
				<?php echo $count+1; ?> - <?php if(get_field('greek_title',$movID)) { ?>
				<?php echo get_field('greek_title',$movID);?>
				<?php } else {?>
				<?php echo get_field('original_title',$movID);?>
			<?php }?> 
				</a></strong>
</h4>
		</div>
		<?php if ( wp_is_mobile() ) {
			if ($count==2) { ?> <div class="clearfix visible-sm-block"></div><?php } } ?>
		<?php $count++; if ($count > 5) break;
	endforeach;?>