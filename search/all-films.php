<?php 
	$thisThursday = getlastthursdaydate();
?>
<h3>Οι πρεμιέρες της εβδομάδας</h3><hr>
<?php

	//include('incinemas.php');
	//$incinemas = incinemas(); //var_dump($incinemas);
	$co = 0; 
	//var_dump($incinemas);
 foreach ($incinemas as $movie) :
	if (get_field('premiere',$movie) == $thisThursday) : ?>
	<?php if ($co == 0) :?>  <div class="col-md-12 col-xs-12" style="margin-bottom:10px;"> <?php endif; ?>
	<div class="col-md-4 col-xs-6"  style="cursor: pointer; height:15em; overflow: hidden; margin-bottom:10px;"> <!--- id="mov<?php echo $movie; ?>" themov="<?php echo $movie; ?>" --->
		<a href="http://cinefreaks.gr/anazitisi-provolon/?moviesel=<?php echo $movie; ?>">
			<?php $poster=get_field('poster',$movie); ?>
			<?php if( !empty($poster) ): ?>
			<?php $url = $poster['url'];?>
				<img src="<?php echo $url; ?>" >
			<?php else:  
				if ( has_post_thumbnail()) { the_post_thumbnail(); } 		
			endif; ?>
			<!---<center> <strong> Δες που παίζεται </strong> </center> --->
		</a>
	</div>
	<?php $co++; //if ($co == 3) { $co = 0; echo "</div>"; } ?>
<?php endif; ?>
<?php endforeach; ?>
</div>

<h3>Παίζονται ακόμα στις αίθουσες</h3><hr>
<?php $co = 0; ?>
<?php foreach ($incinemas as $movie) : ?>
<?php //echo $movie; ?>
<?php if (get_field('premiere',$movie) != $thisThursday) : ?>
	<?php if ($co == 0) :?>  <div class="col-md-12 col-xs-12" style="margin-bottom:10px;"> <?php endif; ?>
	<div class="col-md-4 col-xs-6" id="mov<?php echo $movie; ?>" themov="<?php echo $movie; ?>" style="cursor: pointer; height:15em; overflow: hidden;"> 
		<a href="http://cinefreaks.gr/anazitisi-provolon/?moviesel=<?php echo $movie; ?>">
			<?php $poster=get_field('poster',$movie); ?>
			<?php if( !empty($poster) ): ?>
			<?php $url = $poster['url'];?>
				<img src="<?php echo $url; ?>" >
			<?php else:  
				if ( has_post_thumbnail()) { the_post_thumbnail(); } 		
			endif; ?>
			<!---<center> <strong> Δες που παίζεται</strong> </center>--->
		</a>
	</div>
	<?php $co++; if ($co == 3) { $co = 0; echo "</div>"; } ?>
<?php endif; ?>
<?php endforeach; ?>
</div>
