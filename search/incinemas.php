<?php 
	// Vres vdomada provolis 
	$given= time(); //echo 'Tora: '. date('Y-m-d', $given) ."\n"; echo "Σημερα ειναι: " . date('w', $given) . "<br>";
	if( date('w', $given) == '4' ) {  $thisThursday = date('d-m-Y', $given); }
	else {
		$thuBefore = strtotime("last thursday", $given); //echo 'Proigoumeni Pempti: '. date('Y-m-d', $thuBefore) ."\n";
		$thisThursday = date('d-m-Y', $thuBefore);
	}
	//echo "Προηγουμενη Πέμπτη: "; echo $thisThursday;
?>
<?php 
// Dimiourgei to array incinemas me ta id olon ton tainions (monadika)
/*	$incinemas = array();
	$args = array(
	    'meta_query' => array( array('key' => 'vdomada', 'value' => $thisThursday ) ),
	    'post_type' => array('screening'),
	    'posts_per_page' => 30
	);

	$loop2 = new WP_Query( $args );
	while ( $loop2->have_posts() ) : $loop2->the_post(); 
		$themov = get_field('movie'); 
		$movie = (string)($themov[0]);
		if (!in_array($movie, $incinemas)) array_push($incinemas,$movie);
	endwhile;  
	//var_dump($incinemas);*/

	$incinemas2 = array();
	$args = array(
	    'meta_query' => array( array('key' => 'vdomada', 'value' => $thisThursday ) ),
	    'post_type' => array('screening'),
	    'posts_per_page' => -1
	);

	$loop2 = new WP_Query( $args );
	while ( $loop2->have_posts() ) : $loop2->the_post(); 
		$themov = get_field('movie'); 
		$movie = (string)($themov[0]);
		$premiera = strtotime( get_field('premiere',$movie) );
		if (!in_array($movie, $incinemas2)) array_push($incinemas2,$movie);
	endwhile;  

	$incinemas3 = array();
	foreach ($incinemas2 as $movie) :
		$premiere = get_field('premiere',$movie);
		$premiera = strtotime( $premiere );
		//echo "<br>" . "Premiera ==== " . $premiere  ." ------------------ " . $premiera . " ------------------------ " . $movie . " ------------------------------------" . "<br>";
		array_push($incinemas3, array( 'movie' => $movie, 'premiere' => $premiera ) );
	endforeach;
	//print_r($incinemas3);
	function cmp($a, $b)
	{
	    //echo "<br>" . "PremieraA ==== " . $a[premiere] . " PremieraB ==== " .  $b[premiere] . "<br>";
	    return -strcmp($a[premiere], $b[premiere]);
	}

	usort($incinemas3, 'cmp');
	//echo "<br>" . "---------------------------------------------------------------------------------------" . "<br>";
	//print_r($incinemas3);
	//echo "<br>" . "---------------------------------------------------------------------------------------" . "<br>";
	$incinemas = array();
	foreach ($incinemas3 as $movie) :
		//echo( $movie[movie]); echo "<br>";
		array_push($incinemas,$movie[movie]);
	endforeach;
	//var_dump($incinemas);

?>

