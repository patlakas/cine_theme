<div class="row" style="min-height:500px;">
<div class="col-md-8 col-xs-12">
	<div class="row" style="padding-top:20px;">
    <?php if ( have_posts() ) : ?>
            <h2><?php printf( __( '%s'), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h2>
		    <hr>		 
		<?php
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
           	$taxonomy = get_query_var( 'taxonomy' );
            $term2 = get_query_var( 'term' );
            // $paged=(get_query_var('paged')) ? get_query_var('paged'):1;
            global $query_string;
            $moviequery = wp_parse_args($query_string);
            $moviequery1 = array (
                'post_type'=>'movie',
                $taxonomy => $term2,
				'paged'=> $paged,
                'posts_per_page' =>9,		
                
            );
            query_posts($moviequery);
            while ( have_posts() ) : the_post(); 
            $movie = $post->ID; ?>
           <div class="col-md-4 col-xs-12" style="margin-right:-5px;text-align:center; height:360px;"> 
				<center><a href="<?php the_permalink(); ?>">
						<?php $poster=get_field('poster'); ?>
						<?php if( !empty($poster) ): 
							$url = $poster['url'];
						elseif:
                            if( class_exists( 'kdMultipleFeaturedImages' ) )
                                $posterurl = kd_mfi_get_featured_image_url( 'featured-image-2', 'movie', 'full' );
                            if (!$posterurl){
                                    $poster=get_field('poster'); 
                                    if( !empty($poster) ) $url = $poster['url'];
                            }
                        else:  
							if ( has_post_thumbnail()) { 
								$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); }
                                           		
						endif;?>
						<div style="height:300px; overflow: hidden; padding-bottom:-20px; ">
						<div id="post-img" style="background-image: url('<?php echo $url;?>');background-size: cover; background-repeat: no-repeat; overflow: hidden;height:21vw;">
						</div>
						</div>
						<h4 style=""><a href="<?php echo get_permalink($movie); ?>" style="font-size: 1em;line-height: 1em; text-align: center; color: #000;">
								<?php if (get_field('greek_title', $movie) ) { echo get_field('greek_title', $movie); } else { echo get_field('original_title', $movie);} ?></a></h4>
						<!--<img src="<?php //echo $url; ?>" class="img-responsive"/> --> 
				<?php  ?></a></center>
			</div>
           <?php endwhile;
		    endif;?>
	<?php // include('util/incinemas.php'); 
	//var_dump($incinemas); ?>
	<?php 
        // Reset Query
        wp_pagenavi();
        wp_reset_query();
        ?>
    </div>
</div><!-- md-8 -->
<div class="col-md-4 col-xs-12"> 
	<?php include('theside.php');?>
</div>
</div>