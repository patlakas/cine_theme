<?php /*
	Template Name: Add Screening Mine
	*/
	?>
<?php get_header(); ?>
<?php $user_ID = get_current_user_id(); echo $user_ID;
	if($user_ID): ?>
	<h2> Προσθεσε προβολή: </h2>
	<div class="row">
		<div class="col-md-12" style="padding=0;">
			<?php include('addscreening/selmovie.php'); ?>
			<?php include('addscreening/seltheater.php'); ?>
		</div>
		<div class="col-md-12" style="margin-top:15px; padding=0;">
			<div class="col-md-2">
				Νούμερο / Όνομα Αίθουσας: <br><input id="as-aithousa" type="text"><br>
				<?php $date = getnextthursdaydate(); ?>
				Ημερομηνία Πρεμιέρας: <br> <input id="as-vdomada" type="text" value="<?php echo $date; ?>"> <br>
				<?php $userID = get_current_user_id(); ?> 
				<input id="as-user" type="text" style="width:100%; display:none;" value="<?php echo $userID; ?>">
			</div>
			<div class="col-md-2">
				Μεταγλ:  <input id="as-dubbed" type="checkbox" value="dubbed"><br>
				3D:  <input id="as-3d" type="checkbox" value="3d"><br>
				Atmos: <input id="as-atmos" type="checkbox" value="atmos"><br>
				Νύχτες: <input id="as-nyxtes" type="checkbox" value="nyxtes"><br>
				Θεσσαλονίκη: <input id="as-thess" type="checkbox" value="thess"><br>
			</div>
			<div class="col-md-3">
				Πρόγραμμα Καθημερινα: <br> <input id="as-program-kath" type="text" style="width:100%;"><br>
			</div>
			<div class="col-md-5">
				<div class="col-md-3">Πέμπτης:   </div>
				<div class="col-md-9"> <input id="as-program-pem" type="text" style="width:100%;"> </div>
				<div class="col-md-3">Παρασκευής: </div>
				<div class="col-md-9"> <input id="as-program-par" type="text" style="width:100%;"></div>
				<div class="col-md-3">Σαββάτου: </div>
				<div class="col-md-9"> <input id="as-program-sav" type="text" style="width:100%;"></div>
				<div class="col-md-3">Κυριακής: </div>
				<div class="col-md-9"> <input id="as-program-kyr" type="text" style="width:100%;"></div>
				<div class="col-md-3">Δευτέρας: </div>
				<div class="col-md-9"> <input id="as-program-dey" type="text" style="width:100%;"></div>
				<div class="col-md-3">Τρίτης: </div>
				<div class="col-md-9"> <input id="as-program-tri" type="text" style="width:100%;"></div>
				<div class="col-md-3">Τετάρτης: </div>
				<div class="col-md-9"> <input id="as-program-tet" type="text" style="width:100%;"></div>
			</div>
		</div>
		<div class="col-md-12">
			<button id="as-submit" type="button " class="btn btn-danger" style="width:100%;">
				Εισαγωγή Προβολής στην Βάση! 
			</button>

		</div>
		<div id="as-submitted" class="col-md-12">

		</div> 
	</div>
<?php endif; ?>
<?php get_footer(); ?>
