<?php // oles oi provoles
	$args = array(
	    'meta_query' => array( array('key' => 'vdomada', 'value' => $thisThursday ) ),
	    'post_type' => array('screening'),
	    'posts_per_page' => 30
	);

	$loop2 = new WP_Query( $args );
	while ( $loop2->have_posts() ) : $loop2->the_post(); 
		$themov = get_field('movie'); 
		$movie = (string)($themov[0]);
	?>
	  <div class="row" style="padding-bottom:5px;">
		<div class="col-md-5 col-xs-12"> 
			<a href="<?php echo get_permalink($movie); ?>">


<?php $poster=get_field('poster',$movie); ?>
<?php if( !empty($poster) ): ?>
<?php $url = $poster['url'];?>
	<img src="<?php echo $url; ?>" >
<?php else:  
	if ( has_post_thumbnail()) { the_post_thumbnail(); } 		
endif; ?>

			</a>
		</div>
		<div class="col-md-7 col-xs-12"> 					
			<strong><a href="<?php echo get_permalink($movie); ?>">
			<?php echo get_the_title( $movie ); ?> 
			</a></strong><br>
<?php $everyday_screening = get_field('everyday_screening'); $vdomada =  get_field('vdomada'); echo $vdomada; echo "<br>"; if($everyday_screening):?>
<strong>Ώρες Προβολής</strong> :<br> Καθημερινά <?php $everyday_screening = get_field('everyday_screening');
echo $everyday_screening; ?>
<?php else: ?>

<strong>Ώρες Προβολής</strong>:<br>
Πέμπτη <?php echo date('d/m', $thuBefore); ?>: <?php echo get_field('screen_pem'); ?><br>
Παρασκευή <?php echo date('d/m', strtotime("next friday", $thuBefore) ); ?>: <?php echo get_field('screen_par'); ?><br>
Σάββατο <?php echo date('d/m', strtotime("next saturday", $thuBefore) ); ?>: <?php echo get_field('screen_sav'); ?><br>
Κυριακή <?php echo date('d/m', strtotime("next sunday", $thuBefore) ); ?>: <?php echo get_field('screen_kyr'); ?><br>
Δευτέρα <?php echo date('d/m', strtotime("next monday", $thuBefore) ); ?>: <?php echo get_field('screen_dey'); ?><br>
Τρίτη <?php echo date('d/m', strtotime("next tuesday", $thuBefore) ); ?>: <?php echo get_field('screen_tri'); ?><br>
Τετάρτη <?php echo date('d/m', strtotime("next wednesday", $thuBefore) ); ?>: <?php echo get_field('screen_tet'); ?> <br>
<?php endif;?>
		</div>
		
	  </div>
	<?php endwhile;  ?>
