<!-- THE SIDEBAR -->
<div class="row">
    <!-- HEADER -->
    <!-- AD  -->
   <ins class="adsbygoogle"
	     style="display:block"
	     data-ad-client="ca-pub-5350109138535147"
	     data-ad-slot="1003403253"
	     data-ad-format="auto"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script> 
	<center>

	</center>

    <!-- AFIEROMATA -->
    <div class="col-md-12">
    <hr>
	<img src="<?php bloginfo('template_url'); ?>/img/afieromata.png" class="img-responsive" style="padding-bottom:10px;">
    <!--<h3 style="padding-bottom:10px; font-size:<?php echo $h3size;?>em; "><?php _E('Αφιερώματα');?></h3>-->
	</div> 
    <?php 
	    $args = array( 'post_type' => array('post'), 'category__in' => array( 5,  3151, 4181, 6), 'posts_per_page' =>1);
		$loop = new WP_Query( $args ); $count = 0;
		while ( $loop->have_posts() ) : $loop->the_post(); 
    ?>
       <!-- FEATURED IMAGE -->
       <div class="col-md-12">
       <?php if ( has_post_thumbnail() ) { 
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
            <a href="<?php the_permalink(); ?>">
                <div class="rect" style="background-image: url('<?php echo $url;?>');"></div>
            </a>
        <?php } ?>
        </div>
        <!-- TITLE -->
        <div class="col-md-12" style="padding-bottom:15px;">
            <h4 style="font-size:<?php echo $h4size;?>em;"><a href="<?php the_permalink(); ?>"><?php the_title();  ?></strong></a></h4>
        </div>
    <?php  
    endwhile; 
    ?>

    <!-- SYNENTEYKSEIS -->
    <div class="col-md-12">
    <hr>
	<img src="<?php bloginfo('template_url'); ?>/img/interviews.png" class="img-responsive" style="padding-bottom:10px;">
    <!--<h3 style="padding-bottom:10px; font-size:<?php echo $h3size;?>em;"><?php _E('Συνεντεύξεις');?></h3>-->
	</div> 
    <?php 
	    $args = array( 'post_type' => array('post'), 'category__in' => array( 3 ), 'posts_per_page' =>1);
		$loop = new WP_Query( $args ); $count = 0;
		while ( $loop->have_posts() ) : $loop->the_post(); 
    ?>
       <!-- FEATURED IMAGE -->
       <div class="col-md-12">
       <?php if ( has_post_thumbnail() ) { 
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
            <a href="<?php the_permalink(); ?>">
                <div class="rect" style="background-image: url('<?php echo $url;?>');"></div>
            </a>
        <?php } ?>
        </div>
        <!-- TITLE -->
        <div class="col-md-12" style="padding-bottom:15px;">
            <h4 style="font-size:<?php echo $h4size;?>em;"><a href="<?php the_permalink(); ?>"><?php the_title();  ?></strong></a></h4>
        </div>
    <?php  
    endwhile; 
    ?>

       <!-- INSIDE CINEMA -->
    <div class="col-md-12">
    <hr>
	<img src="<?php bloginfo('template_url'); ?>/img/inside.png" class="img-responsive" style="padding-bottom:10px;">
    <!--<h3 style="padding-bottom:10px; font-size:<?php echo $h3size;?>em;"><?php _E('Λίστες');?></h3>-->
	</div> 
    <?php 
	    $args = array( 'post_type' => array('post'), 'category__in' => array( 8260 ), 'posts_per_page' =>1);
		$loop = new WP_Query( $args ); $count = 0;
		while ( $loop->have_posts() ) : $loop->the_post(); 
    ?>
       <!-- FEATURED IMAGE -->
       <div class="col-md-12">
       <?php if ( has_post_thumbnail() ) { 
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
            <a href="<?php the_permalink(); ?>">
                <div class="rect" style="background-image: url('<?php echo $url;?>');"></div>
            </a>
        <?php } ?>
        </div>
        <!-- TITLE -->
        <div class="col-md-12" style="padding-bottom:15px;">
            <h4 style="font-size:<?php echo $h4size;?>em;"><a href="<?php the_permalink(); ?>"><?php the_title();  ?></strong></a></h4>
        </div>
    <?php  
    endwhile; 
    ?>

	<!-- SOUNDTRACKS -->
    <div class="col-md-12">
    <hr>
	<img src="<?php bloginfo('template_url'); ?>/img/soundtracks.png" class="img-responsive" style="padding-bottom:10px;">
    <!--<h3 style="padding-bottom:10px; font-size:<?php echo $h3size;?>em;"><?php _E('Λίστες');?></h3>-->
	</div> 
    <?php 
	    $args = array( 'post_type' => array('post'), 'category__in' => array( 4023 ), 'posts_per_page' =>1);
		$loop = new WP_Query( $args ); $count = 0;
		while ( $loop->have_posts() ) : $loop->the_post(); 
    ?>
       <!-- FEATURED IMAGE -->
       <div class="col-md-12">
       <?php if ( has_post_thumbnail() ) { 
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
            <a href="<?php the_permalink(); ?>">
                <div class="rect" style="background-image: url('<?php echo $url;?>');"></div>
            </a>
        <?php } ?>
        </div>
        <!-- TITLE -->
        <div class="col-md-12" style="padding-bottom:15px;">
            <h4 style="font-size:<?php echo $h4size;?>em;"><a href="<?php the_permalink(); ?>"><?php the_title();  ?></strong></a></h4>
        </div>
    <?php  
    endwhile; 
    ?>

	<!-- EKTOS THEMATS -->
    <div class="col-md-12">
    <hr>
	<img src="<?php bloginfo('template_url'); ?>/img/ektos.png" class="img-responsive" style="padding-bottom:10px;">
    <!--<h3 style="padding-bottom:10px; font-size:<?php echo $h3size;?>em;"><?php _E('Λίστες');?></h3>-->
	</div> 
    <?php 
	    $args = array( 'post_type' => array('post'), 'category__in' => array( 1977 ), 'posts_per_page' =>1);
		$loop = new WP_Query( $args ); $count = 0;
		while ( $loop->have_posts() ) : $loop->the_post(); 
    ?>
       <!-- FEATURED IMAGE -->
       <div class="col-md-12">
       <?php if ( has_post_thumbnail() ) { 
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
            <a href="<?php the_permalink(); ?>">
                <div class="rect" style="background-image: url('<?php echo $url;?>');"></div>
            </a>
        <?php } ?>
        </div>
        <!-- TITLE -->
        <div class="col-md-12" style="padding-bottom:15px;">
            <h4 style="font-size:<?php echo $h4size;?>em;"><a href="<?php the_permalink(); ?>"><?php the_title();  ?></strong></a></h4>
        </div>
    <?php  
    endwhile; 
    ?>

</div>