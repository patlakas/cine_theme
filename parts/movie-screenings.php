		<?php 
			$today = time(); //echo "<br>"; //echo $today;
			$premiere = get_field('premiere');
			$premieretime = $timestamp = strtotime($premiere); //echo "<br>"; echo $premieretime;  
			$thisThursday = getlastthursdaydate();
			$noaithouses = getNumberOfScreeningsForMovie($movieID, "all") ; 
			$noaithousesATH = getNumberOfScreeningsForMovie($movieID, 17577) ; 
			$noaithousesTHE = getNumberOfScreeningsForMovie($movieID, 17594) ; 
			$noaithousesEPA = getNumberOfScreeningsForMovie($movieID, "eparxia") ; 
		?>
		<h4>
			<big><!---<img height="24px;" src="http://cinego.gr/wp-content/themes/cinego/img/go.png" />--->Παίζεται σε: <strong><?php echo $noaithouses; ?></strong> αίθουσες
			</big><br>
			<?php echo $noaithousesATH; ?> αίθουσες στην Αθήνα<br>
			<?php echo $noaithousesTHE; ?> αίθουσες στην Θεσσαλονίκη<br>
			<?php echo $noaithousesEPA; ?> αίθουσες στην Επαρχία<br>
		</h4> 
		<hr>
		
		<?php 
			//echo $today; echo "<br>"; echo $premieretime;
		if ($today >= $premieretime): if ($noaithouses > 0): ?>
			<div> <!--start tabs-->
				  <!-- Nav tabs -->
				  <ul id="tabsprovolon" class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#athens" aria-controls="athens" role="tab" data-toggle="tab" style="padding: 7px; font-size:0.9em;"><strong>Αθήνα</strong></a></li>
				    <li role="presentation"><a href="#thess" aria-controls="thess" role="tab" data-toggle="tab" style="padding: 7px; font-size:0.9em;"><strong>Θεσσαλονίκη</strong></a></li>
				    <li role="presentation"><a href="#eparxia" aria-controls="greece" role="tab" data-toggle="tab" style="padding: 7px; font-size:0.9em;"><strong>Επαρχία</strong></a></li>
				   
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="athens">
						<p>
							<?php 
							$poliID = 17577; 
							$screenings = getScreeningsOfMovieIDPoliID($movieID,$poliID);
							printScreeningsMovieIDPoliID($screenings);
							?>
						</p>
					</div>
				    <div role="tabpanel" class="tab-pane" id="thess">
						<p>
							<?php 
							$poliID = 17594; 
							$screenings = getScreeningsOfMovieIDPoliID($movieID,$poliID);
							printScreeningsMovieIDPoliID($screenings);
							?>
						</p>
					</div>
				    <div role="tabpanel" class="tab-pane" id="eparxia">
	
						<p>
							<?php 
							$screenings = getScreeningsOfMovieIDEparxia($movieID);
							printScreeningsMovieIDPoliID($screenings, 1);
							?>
						</p>
					</div>
				 </div>

			</div><!-- end tabs-->
		<?php else: ?>
			<strong>Η ταινία δεν παίζεται πλέον στις αίθουσες </strong>
		<?php endif; else: ?>	
			<strong>Υπομονή! Η ταινία έρχεται στις αίθουσες στις <?php echo get_field('premiere'); ?> </strong>
		<?php endif; ?>