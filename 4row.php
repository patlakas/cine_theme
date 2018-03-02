<div class="row" style="padding:10px;">
	<div class="col-md-4">
		<h4 style="font-size:<?php echo $h4size;?>em;"><?php _E('Κινηματογραφικός χάρτης');?></h4>
		<hr>
		<a href="http://cinefreaks.gr/o-kinimatografikos-chartis-tis-elladas/">
			<img src="http://cinefreaks.gr/wp-content/uploads/2017/09/xartis.jpg"/>
		</a>
	</div>		
	<div class="col-md-4">
		<h4 style="font-size:<?php echo $h4size;?>em;"><?php _E('Δημοφιλέστεροι κινηματογράφοι');?></h4>
		<hr>
		<?php include ('util/pop-theaters.php');?>
	</div>
	<div class="col-md-4">
		<h4 style="font-size:<?php echo $h4size;?>em;"><?php _E('Box office');?></h4>
		<hr>
		
		<table class="table table-striped table-bordered">
  			<tr>
				<th>#</th>
				<th><p>Τίτλος ταινίας</p></th> 
				<th><p>Εισιτήρια</p></th>
  			</tr>
			<!-- get box office -->
			<?php 
			$i=7;
			$thurs = getlastthursdaydate();
			$thisThursday = getlastthursdaydate();
			$thuBefore = getlastthursdaystamp();
			$theprevious = date('d-m-Y', strtotime("-". $i . " days", $thuBefore) );
			$query = " 
				SELECT * 
				FROM  `boxoffice` 
				WHERE vdomada =  '". $theprevious . "'
				ORDER BY tick_ath_vdomada DESC
				LIMIT 10
			"; 
			//echo $query; 
			global $wpdb;
			$myrows = $wpdb->get_results($query);
			?>
			<!--end get boxoffice -->
			<!-- print boxoffice -->
			<?php
				$tcount=1; 
				foreach ($myrows as $row) : 				
			?>
			  
			   <tr>
				<th><?php echo $tcount;?></th>
				<th> 
					<? $movid = $row->movieID; ?> 
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
				<th> <?echo $row->tick_ath_vdomada; ?> 
				</th>
  				</tr>
				 <?php $tcount++; if ($tcount > 10) break;
	endforeach; ?>
			 <!-- end print box office -->
		</table>
		
	</div>
</div><!--row-->