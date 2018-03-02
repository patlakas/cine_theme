<div class="row" style="min-height:500px;">
<div class="col-md-8 col-xs-12">
<div class="row"> 
	<?php if ( have_posts() ) : 
		
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		endif;?>	
		<div class="col-md-12">
			<div class="page-header"> 				
				<h3><?php echo $term->name; ?></h3> 
				
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<!--DIRECTOR-->
					<?php $args = array( 'post_type' => 'movie', 'movie_director'=>$term->slug, 'posts_per_page' =>-1);
						$loop = new WP_Query( $args );
						if  ($loop->have_posts()) {?>
						<h4>Σκηνοθέτης</h4>
						<hr>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
						<?php endwhile; ?>
					<?php }?>
					<!-- WRITER-->
					<?php $args = array( 'post_type' => 'movie', 'movie_writer'=>$term->slug, 'posts_per_page' =>-1);
						$loop = new WP_Query( $args );
						if  ($loop->have_posts()) {?>
						<h4>Σεναριογράφος</h4>
						<hr>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
						<?php endwhile; ?>
					<?php }?>
					<!-- ACTOR -->
					<?php $args = array( 'post_type' => 'movie', 'movie_cast'=>$term->slug, 'posts_per_page' =>-1);
						$loop = new WP_Query( $args );
						if  ($loop->have_posts()) {?>
						<h4>Ηθοποιός</h4>
						<hr>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
						<?php endwhile; ?>
					<?php }?>
				</div>
				<div class="col-md-8 col-sm-12">
					<h4>Άρθρα</h4>
					<hr>
					<?php $args = array( 'post_type' => 'post', 'tag'=>$term->slug, 'posts_per_page' =>-1);
						$loop = new WP_Query( $args );
						if  ($loop->have_posts()) {?>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
						<?php endwhile; ?>
					<?php } else {?>
					<p>Δεν υπάρχουν σχετικά άρθρα.</p>
					<?php }?>
				</div>
				
			</div>			
		</div>
	
</div>
</div>
<div class="col-md-4 col-xs-12"> 
	<?php include('theside.php');?>
</div>
</div>