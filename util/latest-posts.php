<!-- ALL THE LATEST POSTS -->
<div class="row">
    <!-- HEADER -->
    <div class="col-md-12">
		<hr>
	</div>
	<div class="col-md-6">
		
		<img src="<?php bloginfo('template_url'); ?>/img/latest.png" class="img-responsive">
	</div>
    <!-- POSTS -->
</div>
<div class="row">
    <?php 
	    $args = array( 'post_type' => array('post','movie','tvseries'), 'posts_per_page' =>10);
		$loop = new WP_Query( $args ); $count = 0;
		while ( $loop->have_posts() ) : $loop->the_post(); 
    ?>
        <div class="col-md-12 col-sm-12" align="left" style="padding-top:20px;"> 
			<?php if ( wp_is_mobile() ) $h3size = 1.6; else $h3size = 1.3; ?>
			<h4 style="font-size:<?php echo $h4size;?>em;"> 
				<strong><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></strong>
			</h4>
		</div>
        <div class="col-md-4 col-sm-12">
            <!-- FEATURED IMAGE -->
            <?php if ( has_post_thumbnail() ) { 
                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
                <a href="<?php the_permalink(); ?>">
                    <div class="rect" style="background-image: url('<?php echo $url;?>');"></div>
                </a>
            <?php } ?>
        </div>
        <div class="col-md-8 col-sm-12">
            <!-- GET CATEGORIES -->
            <?php $catcount = 0; foreach((get_the_category()) as $cat) { $catcount++; } ?>		
			<?php $catcount2 = 0; foreach((get_the_category()) as $cat) { $catcount2++; ?>
			<strong>		
				<a href="<?php bloginfo('siteurl'); ?>/category/<?php echo $cat->slug;?>/"> <?php echo $cat->name;?></a>
			</strong>
			<?php if ($catcount2 != $catcount) echo ", "; ?>
			<?php }?>
			<?php if (get_post_type() == 'movie') echo "Movie"; ?>
            | <?php the_time('j-n-Y @ H:i') ?> 
            <!-- GET EXCERPT -->
            <p><?php the_excerpt("<strong>Περισσότερα...</strong>"); ?></p>
        </div>
    <?php  
    endwhile; 
    ?> 
</div>