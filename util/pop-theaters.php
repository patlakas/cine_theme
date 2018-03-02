<table class="table table-striped table-bordered">
  			<tr>
				<th>#</th>
				<th>Κινηματογράφος</th> 
				
  			</tr>
<?php 
	//Count last week
	$lastweekstamp = strtotime("-1 week");
	//echo 'lastweekstamp: '. date('Y-m-d', $lastweekstamp) ."\n";
	//Query for most visited films last week
	$query = " 
		SELECT COUNT( * ) AS c, theaterID AS m
		FROM  `log_theater` 
		WHERE TIMESTAMP > " . $lastweekstamp . "
		GROUP BY theaterID
		ORDER BY COUNT( * ) DESC 
	"; 
	//echo $query; 
	$myrows = $wpdb->get_results($query);
	$count = 0;
	foreach ($myrows as $row) : 
		$movID = $row->m;
		$url = wp_get_attachment_url( get_post_thumbnail_id($movID) ); ?>
		<tr>
			<th><?php echo $count+1;?></th>
			<th><a href="<?php echo get_permalink($movID); ?>"><?php echo get_the_title( $movID ); ?></a></th> 
		</tr>
		<?php $count++; if ($count > 9) break;
	endforeach;
?>
</table>