<?php /*
Template Name: Festival Page
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php 
	$festival_tag=get_field("festival_tag");
	$mainsponsor=get_field("mainsponsor");
	$tweetfeed=get_field("tweetfeed");
	$sponsorvideo=get_field("sponsorvideo");
    $program=get_field("program");
	if ( has_post_thumbnail() ) {
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	 } ?>	
	<div class="row" style="padding:20px;">
		<div class="col-md-8 col-sm-12">
			<h1 style="margin-bottom:20px;"><?php the_title();?></h1>
			<?php the_content();?>
			<?php include('parts/movieSlider-festival.php');?>
			<?php echo $mainsponsor;?>
			<?php echo $sponsorvideo;?>
			<?php include('parts/all-posts-festival.php');?>
		</div>
		<div class="col-md-4 col-sm-12" style="text-align=center;">
			<img width="100%" src="<?php echo $url; ?>" class="thumbnail img-responsive" style="margin-bottom:10px;"/>
			<!-- programm -->
			<strong> <h4 style=""><i class="fa fa-calendar" aria-hidden="true"></i> | Το πρόγραμμα </h4></strong> </p>
			<hr>
			<?php echo $program;?>
			<!-- twitter -->
			<strong> <h4 style=""><i class="fa fa-twitter"></i> | Τι γράφει το Twitter </h4></strong> </p>
			<hr>
			<?php echo $tweetfeed;?> 
				
		</div>
	</div>
<?php endwhile; endif; ?> 
	<div class="row" style="padding-left:20px;padding-right:20px;">
		<div class="col-md-8 col-sm-12">		
		
		</div>
		<div class="col-md-4 col-sm-12">
			
		</div>
	</div>
<?php get_footer(); ?>