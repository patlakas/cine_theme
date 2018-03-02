<?php 
	$movie = $_POST['movie']; 
	$weekath = $_POST['weekath'];
	$totalath = $_POST['totalath'];
	$weekell = $_POST['weekell'];
	$totalell = $_POST['totalell'];
	$date = $_POST['date'];
	$company = $_POST['company'];

/*	echo "Movie == " . $movie;
	echo "<br>Cinema == " . $cinema;
	echo "<br>poli == " . $poli;	
	echo "<br>date == " . $date;
	echo "<br>aithousa == " . $aithousa;
	echo "<br>dubbed == " . $dubbed;
	echo "<br>3D == " . $triad;
	echo "<br>Atmos == " . $atmos;
	echo "<br>kath == " . $kath;
	echo "<br>pem == " . $pem;
	echo "<br>par == " . $par;
	echo "<br>sav == " . $sav;
	echo "<br>kyr == " . $kyr;
	echo "<br>dey == " . $dey;
	echo "<br>tri == " . $tri;
	echo "<br>tet == " . $tet;
	echo "<br>user == " . $user;*/
	$query= "INSERT INTO `boxoffice` VALUES('" . $date . "', '" . $company . "', '" . $movie . "', '" . $weekath . "', '" . $totalath . "', '" . $totalell . "', '" . $weekell . "','')"; //echo $query;
	global $wpdb;
	echo "<br> query = " . $query . "<br>";
	$myrows = $wpdb->get_results($query);
	echo "<h3> Movie=" . get_the_title ($movie) . "To boxoffice προστέθηκε! Κάνε ότι αλλαγές θέλεις για να προσθέσεις νέα! <h3/>"
?>
