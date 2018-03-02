<?php /*
	Template Name: Box Office Add Mine
	*/
	?>
<?php get_header(); ?>
<?php $user_ID = get_current_user_id(); echo $user_ID;
	if($user_ID): ?>
	<h2> Προσθεσε Box Office Entry: </h2>
	<div class="row">
		<div class="col-md-12" style="padding=0;">
			<?php include('addscreening/selmovie.php'); ?>
			<div class="col-md-6" style="padding=0;">
				Αθήνα (This Week) <br> <input id="this-week-ath" type="text" style="width:100%;"><br>
				Αθήνα (Συνολο) <br> <input id="total-ath" type="text" style="width:100%;"><br>
				Ελλάδα (This Week) <br> <input id="this-week-ell" type="text" style="width:100%;"><br>
				Ελλάδα (Συνολο) <br> <input id="total-ell" type="text" style="width:100%;"><br>
				<br>
				<?php $date = getnextthursdaydate(); ?>
				Βδομάδα: <br> <input id="as-vdomada" type="text" value="<?php echo $date; ?>"> <br>
				Εταιρία: <br> <input id="company" type="text" style="width:100%;"><br>

			</div>
		</div>
		<div class="col-md-12">
			<button id="bo-submit" type="button " class="btn btn-danger" style="width:100%;">
				Εισαγωγή Box Office Entry στην Βάση! 
			</button>

		</div>
		<div id="bo-submit" class="col-md-12">

		</div> 
	</div>
	<div id="bo-submitted">
	</div>
<?php endif; ?>
<?php get_footer(); ?>
