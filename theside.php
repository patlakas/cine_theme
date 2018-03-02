<!-- AD -->
<div class="row" style="padding-top:20px;">
	<div class="col-md-12">
		<!-- AD  -->
    <ins class="adsbygoogle"
	     style="display:block"
	     data-ad-client="ca-pub-5350109138535147"
	     data-ad-slot="1003403253"
	     data-ad-format="auto"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>

	</div>
</div>
<!-- END AD -->
<!-- COMING SOON & FORM -->
<div class="row" style="padding:1em;">
    <?php 
$thisThursday = getlastthursdaydate();
$thuBefore = getlastthursdaystamp();
?>
<?php for ($i=7; $i<10; $i=$i+7) { ?>		

			<?php 
				$thenext = date('d-m-Y', strtotime("+". $i . " days", $thuBefore) ); //echo $thenext . "<br>";
				$args = array(
				    'meta_query' => array ( array('key' => 'premiere', 'value' => $thenext) ),
				    'post_type' => array('movie'),
				    'posts_per_page' => -1
				);
			$loop3 = new WP_Query( $args );
			if ($loop3->have_posts() ) :  ?>
				<div class="panel panel-default" >
					  <div class="panel-heading">
						<h3 style="font-size:<?php echo $h3sizel?>em;" class="panel-title">Προσεχώς(Πέμπτη <?php echo date('d/m', strtotime("+". $i . " days", $thuBefore) ); ?>)</h3>
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
							<?php } ?></a><br>

						<?php endwhile; ?>
					  </div>
				</div>
			<?php endif; ?>
<?php } ?>
<a href="http://cinefreaks.gr/coming-soon/" class="btn btn-default">Όλα τα προσεχώς</a>
</div>
<!-- END COMING SOON -->

<!-- LATEST POSTS -->
<!-- ALL THE LATEST POSTS -->
<div class="row" style="padding:1em;">
	<div class="col-md-12">
		<img src="<?php bloginfo('template_url'); ?>/img/latest.png" class="img-responsive">
	</div>
    <!-- POSTS -->
</div>
<div class="row" style="padding:1em;">
    <?php 
	    $args = array( 'post_type' => array('post','movie'), 'posts_per_page' =>3);
		$loop = new WP_Query( $args ); $count = 0;
		while ( $loop->have_posts() ) : $loop->the_post(); 
    ?>
            <!-- FEATURED IMAGE -->
            <?php if ( has_post_thumbnail() ) { 
                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
                <a href="<?php the_permalink(); ?>">
                    <div class="rect" style="background-image: url('<?php echo $url;?>');"></div>
                </a>
            <?php } ?>
			<?php if ( wp_is_mobile() ) $h3size = 1.6; else $h3size = 1.3; ?>
			<h4 style="font-size:<?php echo $h4size;?>em;"> 
				<strong><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></strong>
			</h4>
            <!-- GET CATEGORIES -->
            <?php $catcount = 0; foreach((get_the_category()) as $cat) { $catcount++; } ?>		
			<?php $catcount2 = 0; foreach((get_the_category()) as $cat) { $catcount2++; ?>
			<strong>		
				<a href="<?php bloginfo('siteurl'); ?>/category/<?php echo $cat->slug;?>/"> <?php echo $cat->name;?></a>
			</strong>
			<?php if ($catcount2 != $catcount) echo ", "; ?>
			<?php }?>
            | <?php the_time('j-n-Y @ H:i') ?> 
            <!-- GET EXCERPT -->
            <p><?php the_excerpt("<strong>Περισσότερα...</strong>"); ?></p>
    		<div class="row" style="padding-left:1em;padding-right:1em;">
				<hr>
			</div>
    <?php  
    endwhile; 
    ?> 
</div>
<!-- END LATEST POSTS -->