<?php 
	$movieID = $tainia;  //echo "movie = " . $movieID . "<br>"; echo "poli==" . $poli . " perioxi = " . $perioxi; 
?>
<?php 
	if ( ($poli==17577 && $perioxi == 'all') || $poli!=17577 ):
		$screenings = getScreeningsOfMovieIDPoliID($movieID,$poli); //var_dump($screenings);
		printScreeningsMovieIDPoliID($screenings);
	endif;
	if ($poli==17577 && $perioxi != 'all'):
		$screenings2 = getScreeningsOfMovieIDPoliIDPerioxiID($movieID,$poli,$perioxi);
		printScreeningsMovieIDPoliID($screenings2);
	endif;
?>

