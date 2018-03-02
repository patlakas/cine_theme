<?php 
$thisThursday = getlastthursdaydate();
$thuBefore = getlastthursdaystamp();
$comingsoon = 0;
?>
<?php for ($i=7; $i<350; $i=$i+7) { ?>		

			<?php 
				$thenext = date('d-m-Y', strtotime("+". $i . " days", $thuBefore) ); //echo $thenext . "<br>";
				$args = array(
				    'meta_query' => array ( array('key' => 'premiere', 'value' => $thenext) ),
				    'post_type' => array('movie'),
				    'posts_per_page' => -1
				);
			$loop3 = new WP_Query( $args );
			if ($loop3->have_posts() ) :  ?>
				<div class="panel panel-default">
					  <div class="panel-heading">
						<h3 class="panel-title">Πρεμιέρες Πέμπτης <?php echo date('d/m', strtotime("+". $i . " days", $thuBefore) ); ?></h3>
					  </div>
					  <div class="panel-body">
						<?php while ( $loop3->have_posts() ) : $loop3->the_post();  
						?>
							- <a href="<?php echo get_permalink(); ?>"> 
							<?php if(get_field('greek_title')) { ?>
								<span><strong style="display: inline;"><?php echo get_field('greek_title');?></strong></span>
								(<?php echo get_field('original_title');?>)
							<?php } else {?>
							<strong><?php echo get_field('original_title');?></strong>
							<?php }  $comingsoon++; ?></a><br>

						<?php endwhile; ?>
					  </div>
				</div>
			<?php endif; ?>
<?php } ?>
