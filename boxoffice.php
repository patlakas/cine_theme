<?php /*
	Template Name: Advanced Box Office Page
	*/
	$userID = get_current_user_id();
	global $wpdb;
	?>
<?php get_header(); ?>
<div class="row" style="padding-top:10px;padding-bottom:10px;">
<div class="col-md-8">
<h2 style="font-size:<?php echo $h2size;?>em;"><?php _E('Box office');?></h2>
		<hr>
        <p>Η ταξινόμηση των ταινιών, γίνεται με βάση το σύνολο των εισιτηρίων πανελλαδικά.</p>		
		<!-- get box office -->
			<?php
			$i=7;
			$thurs = getlastthursdaydate();
			$thisThursday = getlastthursdaydate();
			$thuBefore = getlastthursdaystamp();
			$theprevious = date('d-m-Y', strtotime("-". $i . " days", $thuBefore) );
			//echo $theprevious;
			$query = " 
				SELECT * 
				FROM  `boxoffice` 
				WHERE vdomada =  '". $theprevious . "'
				ORDER BY tick_ell_vdomada DESC
				
			"; 
			//echo $query; 
			global $wpdb;
			$myrows = $wpdb->get_results($query);
			?>
			<!--end get boxoffice -->
            <p>Αφορά την εβδομάδα: <?php echo $theprevious; ?></p>
        <table class="table table-striped table-bordered">
  			<tr>
				<th>#</th>
				<th><p>Τίτλος ταινίας</p></th> 
				<th><p>Αθήνα</p></th>
                <th><p>Αθήνα <small>(Σύνολο)</small></p></th>
                <th><p>Πανελλαδικά</p></th>
                <th><p>Πανελλαδικά <small>(Σύνολο)</small></p></th>
  			</tr>
			<!-- print boxoffice -->
			<?php
				$tcount=1; 
				foreach ($myrows as $row) : 				
			?>
			  
			   <tr>
				<th><?php echo $tcount;?></th>
				<th> 
					<?php $movid = $row->movieID; ?> 
					<a href="<?php echo get_permalink($movid); ?>">
		            <?php if(!get_field('original_title',$movid)) { ?>
    				 	<?php echo get_the_title($movid); ?>	
            		<?php } else { ?>
    		   		 	<?php if(get_field('greek_title')) { ?>
	    					<?php echo get_field('greek_title',$movid);?> 
			    	 	<?php } else {?>
			        		<?php echo get_field('original_title',$movid);?>
			    		<?php }?><br>
					<?php } ?>
					</a>
				</th> 
				<th><?php echo $row->tick_ath_vdomada; ?></th>
                <th><?php echo $row->tick_ath_total; ?></th>
                <th><?php echo $row->tick_ell_vdomada; ?></th>
                <th><?php echo $row->tick_ell_total; ?></th>
  				</tr>
				 <?php $tcount++; 
	endforeach; ?>
			 <!-- end print box office -->
		</table>		
	</div><!-- md8 -->
    <div class="col-md-4">
	<?php include('theside.php');?>
    </div>
</div> <!-- row -->
<?php get_footer(); ?>