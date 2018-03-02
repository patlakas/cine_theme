<!-- THE TV CORNER -->
	<div class="col-md-12">
	<hr>
	</div>
    <div class="col-md-4">
	<img src="<?php bloginfo('template_url'); ?>/img/tv.png" class="img-responsive">
	</div>
	
    <div class="col-md-12" style="padding-top:10px;">
    <div class="row"> <!-- INSIDE ROW -->
        <?php 
            $args = array( 'post_type' => array('post'), 'category__in' => array( 4656 ), 'posts_per_page' =>4);
            $loop = new WP_Query( $args ); $count = 0;
            while ( $loop->have_posts() ) : $loop->the_post(); 
        ?>
        <div class="col-md-3">
        <div class="row">
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
        </div>
        </div>
        <?php  
        endwhile; 
        ?>
    </div><!-- INSIDE ROW CLOSING -->
    </div><!-- col-md-12 closing -->