<?php 
function incinemas() {
	$thurs = getlastthursdaydate();
	$incinemas2 = array();
	// default poli = number
	$query = " 
		SELECT DISTINCT movieID AS m
		FROM  `provoles` 
		WHERE vdomada =  '". $thurs . "'
	"; 
	//echo $query; 
	global $wpdb;
	$movies = $wpdb->get_results($query);
	foreach ($movies as $movie) :
		$movieID = $movie->m;
		array_push($incinemas2, $movieID);
	endforeach; 

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


	return $incinemas;
}

function incinemasCity($poli) {
	$thurs = getlastthursdaydate();
	$incinemas = array();
	// default = poli = number
	$query = " 
		SELECT DISTINCT movieID AS m
		FROM  `provoles` 
		WHERE vdomada =  '". $thurs . "'
		AND poli = '". $poli ."'
	"; 
	//echo $query; 
	global $wpdb;
	$movies = $wpdb->get_results($query);
	foreach ($movies as $movie) :
		$movieID = $movie->m;
		array_push($incinemas, $movieID);
	endforeach; 
	return $incinemas;
}
?>
