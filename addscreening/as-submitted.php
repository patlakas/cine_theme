<?php 
	$movie = $_POST['movie']; 
	$cinema = $_POST['cinema'];
	$poli = $_POST['poli'];
	$perioxi = $_POST['perioxi'];
	//echo "<br>perioxi == " . $perioxi;	
	$date = $_POST['date'];
	$aithousa = $_POST['aithousa'];
	$dubbed = $_POST['dubbed'];
	$triad = $_POST['triad'];
	$atmos = $_POST['atmos'];
	$nyxtes = $_POST['nyxtes'];
	$thess = $_POST['thess'];
	$kath = $_POST['kath'];
	$pem = $_POST['pem'];
	$par = $_POST['par'];
	$sav = $_POST['sav'];
	$kyr = $_POST['kyr'];
	$dey = $_POST['dey'];
	$tri = $_POST['tri'];
	$tet = $_POST['tet'];
	$user = $_POST['user'];
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
	$query= "INSERT INTO `provoles` VALUES('" . $movie . "', '" . $cinema . "', '" . $poli . "', '" . $perioxi . "', '" . $aithousa . "', '" . $dubbed . "', '" . $triad . "', '" . $atmos . "', '" . $kath . "', '" . $pem . "', '" . $par . "', '" . $sav . "', '" . $kyr . "', '" . $dey . "', '" . $tri . "', '" . $tet . "', '" . $date . "', 'null', '" . $nyxtes . "', '" . $thess . "', '" .  $user . "', '')"; //echo $query;
	global $wpdb;
	//echo "<br> query = " . $query . "<br>";
	$myrows = $wpdb->get_results($query);
	echo "<h3> Movie=" . get_the_title ($movie) . " <br>Cinema=" . get_the_title ($cinema) .  "<br> Η προβολή προστέθηκε! Κάνε ότι αλλαγές θέλεις για να προσθέσεις νέα! <h3/>"
?>


