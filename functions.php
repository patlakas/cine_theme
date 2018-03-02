<?php 
//add_filter('show_admin_bar', '__return_false');
add_filter( 'coauthors_guest_authors_enabled', '__return_false' );

function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyDyXWRDCTLQdBLGyT_IhgF1-shhGR4hvDY';
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// include util
include("util/date.php"); 
include("util/incinemas.php"); 
include("util/screenings.php"); 

function gettrailer() { 	
    $a = 0;
	$trailer = get_post_meta($post->ID, 'trailer', TRUE); 			
	if($trailer !='') {  $a =1; ?>	
		<div class="videoWrapper" style="margin-bottom:20px;">	
			<iframe height=auto src="//www.youtube.com/embed/<?php echo $trailer; ?>?rel=0" frameborder="3" allowfullscreen>
			</iframe>
		</div>
	<?php return 1; 
	}
	$trailer = get_post_meta($post->ID, 'othervideo', TRUE);	
	if($trailer  != '' && $a == 0) { $a=1; ?>	
		<div class="videoWrapper" style="margin-bottom:20px;">	
			<?php echo $trailer; ?>
		</div>
	    <?php   
	}
	$trailer = get_field('othervideo');	
	if($trailer  != '' && $a == 0) { $a=1; ?>	
		<div class="videoWrapper" style="margin-bottom:20px;">	
			<?php echo $trailer; ?>
		</div>
	    <?php   
	}
	$trailer = get_field('video');
	if($trailer != '' && $a == 0) { $a = 1; ?>	
		<div class="videoWrapper" style="margin-bottom:20px;">	
			<iframe height=auto src="//www.youtube.com/embed/<?php echo $trailer; ?>?rel=0" frameborder="3" allowfullscreen></iframe>
		</div>
	    <?php return 0;  
	} 
	if ( has_post_thumbnail() && $a == 0) { $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>	
				<a href="<?php the_permalink(); ?>">
					<center><img src="<?php echo $url; ?>" class="img-responsive" style="margin-bottom:20px;"/></center>
				</a>				
	<?php }
}

/*function RemoteConnect(){
	$servername = "cinego.gr";
	$username = "cinema_wp";
	$password = "@<H<&n5$";
	$dbname = "cinema_wp";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	return $conn;
} 

function getcinegoIDfor($movie,$media) {
	//echo "MPIKAAAAAAAAAAAA<br>";
	$conn = RemoteConnect();
	$query = " 
		SELECT  `post_id` 
		FROM  `gogoCin_postmeta` 
		WHERE meta_key =  '". $media ."ID'
		AND meta_value = '". $movie ."'
	"; 
//	$conn->query("SET NAMES 'utf8'");
//	$conn->query("SET CHARACTER SET 'utf8'");
	$result = $conn->query($query);
	var_dump($result);
	$cinegoid = 0;
	while($theid = mysqli_fetch_assoc($result)) {
		$cinegoid = $theid["post_id"];
		break;
	}
	$conn->close();
	return $cinegoid;
}*/

function filter_search($query) {
    if ($query->is_search) {
	$query->set('post_type', array('post', 'movie', 'shortfilm', 'tvseries', 'movietheater'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');

function enqueue_scripts_styles_init() {
//From CINEGO 
	wp_enqueue_script( 'ajax-script5', get_stylesheet_directory_uri().'/js/mapload.js', array('jquery'), 1.0 ); 
	wp_enqueue_script( 'ajax-script6', get_stylesheet_directory_uri().'/js/mapload_perioxi.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script51', get_stylesheet_directory_uri().'/js/mapload-euro.js', array('jquery'), 1.0 ); 
	wp_enqueue_script( 'ajax-script61', get_stylesheet_directory_uri().'/js/mapload_perioxi-euro.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script7', get_stylesheet_directory_uri().'/js/screeningload.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script8', get_stylesheet_directory_uri().'/js/pigaineme.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script10', get_stylesheet_directory_uri().'/js/vathmologia.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script11', get_stylesheet_directory_uri().'/js/wishlist.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script12', get_stylesheet_directory_uri().'/js/favcinema.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script20', get_stylesheet_directory_uri().'/js/AS-movie.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script21', get_stylesheet_directory_uri().'/js/AS-theater.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script22', get_stylesheet_directory_uri().'/js/AS-submit.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-scriptbox', get_stylesheet_directory_uri().'/js/BOXsubmit.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script23', get_stylesheet_directory_uri().'/js/nyxtes.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script24', get_stylesheet_directory_uri().'/js/nyxtes2.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script25', get_stylesheet_directory_uri().'/js/deletescr.js', array('jquery'), 1.0 );
	wp_enqueue_script( 'ajax-script26', get_stylesheet_directory_uri().'/js/deletewish.js', array('jquery'), 1.0 );
	wp_localize_script( 'ajax-script5', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-script6', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-script7', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-script8', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-script10', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-script11', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-script12', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-script20', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-script21', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-script22', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-scriptbox', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-script23', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-script24', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	wp_localize_script( 'ajax-script25', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	wp_localize_script( 'ajax-script26', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );  
//From the old cinefreaks
	wp_enqueue_script( 'ajax-script3', get_stylesheet_directory_uri().'/js/BSslidere.js', array('jquery'), 1.0 ); 
	wp_enqueue_script( 'ajax-script4', get_stylesheet_directory_uri().'/js/BSprevnext.js', array('jquery'), 1.0 ); 
	//wp_enqueue_script( 'ajax-script5', get_stylesheet_directory_uri().'/js/VDslidere.js', array('jquery'), 1.0 ); 
	wp_localize_script( 'ajax-script1', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
	//wp_localize_script( 'ajax-script5', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
}
add_action('init', 'enqueue_scripts_styles_init');


function ajax_action20_stuff() { // Add Screening - Movie autocomplete
	$text = $_POST['text'];
	//echo $text;
	include("addscreening/fillmovieselector.php"); 
	die();
}
add_action( 'wp_ajax_ajax_action20', 'ajax_action20_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action20', 'ajax_action20_stuff' ); // ajax for not logged in users

function ajax_action21_stuff() { // Add Screening - Theater autocomplete
	$text = $_POST['text']; 
//	echo $text;
	include("addscreening/filltheaterselector.php"); 
	die();
}
add_action( 'wp_ajax_ajax_action21', 'ajax_action21_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action21', 'ajax_action21_stuff' ); // ajax for not logged in users

function ajax_action22_stuff() { // Add Screening 
	include("addscreening/as-submitted.php"); 
	die();
}
add_action( 'wp_ajax_ajax_action22', 'ajax_action22_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action22', 'ajax_action22_stuff' ); // ajax for not logged in users

function ajax_actionbox_stuff() { // Box office done
	//echo "Done";
	include("addscreening/box-submitted.php"); 
	die();
}
add_action( 'wp_ajax_ajax_actionbox', 'ajax_actionbox_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_actionbox', 'ajax_actionbox_stuff' ); // ajax for not logged in users

function ajax_action23_stuff() { // Add Screening - Movie autocomplete
	$date = $_POST['date'];
	//echo $date;
	include("nyxtes/nyxtesdate.php"); 
	die();
}
add_action( 'wp_ajax_ajax_action23', 'ajax_action23_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action23', 'ajax_action23_stuff' ); // ajax for not logged in users


function ajax_action24_stuff() { // Add Screening - Movie autocomplete
	//echo "AAAAAAAAAAAAAa";	
	$movie = $_POST['movie'];
	//echo $movie;
	include("nyxtes/movie.php"); 
	die();
}
add_action( 'wp_ajax_ajax_action24', 'ajax_action24_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action24', 'ajax_action24_stuff' ); // ajax for not logged in users

function ajax_action25_stuff() { // Delete Screening 
	echo "Διέγράφω το ID ... ";
	$theid = $_POST['clickedID'];
	echo $theid;
	$query= "DELETE FROM `provoles` WHERE `provoles`.`ID` = " . $theid; echo $query;
	global $wpdb;
	$myrows = $wpdb->get_results($query);
	echo "Ok το διέγραψα - Κανε refresh τώρα";
	//include(""); 
	die();
}
add_action( 'wp_ajax_ajax_action25', 'ajax_action25_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action25', 'ajax_action25_stuff' ); // ajax for not logged in users

function ajax_action26_stuff() { // Add Screening - Movie autocomplete
	echo "Διέγράφω το ID ... ";
	$theid = $_POST['clickedID'];
	echo $theid;
	$query= "DELETE FROM `gogoCin_mine` WHERE `gogoCin_mine`.`ID` = " . $theid; //echo $query;
	global $wpdb;
	$myrows = $wpdb->get_results($query);
	echo "Ok το διέγραψα - Κανε refresh τώρα";
	//include(""); 
	die();
}
add_action( 'wp_ajax_ajax_action26', 'ajax_action26_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action26', 'ajax_action26_stuff' ); // ajax for not logged in users


function ajax_action5_stuff() { // Fortose xarti mono otan allazei i poli
	$poli = $_POST['poli'];
	include("search/screening_map_query.php"); 	
	die();
}
add_action( 'wp_ajax_ajax_action5', 'ajax_action5_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action5', 'ajax_action5_stuff' ); // ajax for not logged in users

function ajax_action6_stuff() { // Fortose xarti mono otan allazei i perioxi
	$poli = $_POST['poli'];
	$perioxi = $_POST['perioxi'];
	if ($perioxi == 'all') include("search/screening_map_query.php"); 
	else include("search/screening_map_query_perioxi.php"); 	
	die();
}
add_action( 'wp_ajax_ajax_action6', 'ajax_action6_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action6', 'ajax_action6_stuff' ); // ajax for not logged in users

function ajax_action7_stuff() { // Fortose xarti mono otan allazei i poli
	$poli = $_POST['poli'];
	$perioxi = $_POST['perioxi'];
	$tainia = $_POST['tainia'];
	$lesseuro = $_POST['lesseuro'];
	$incinemas = $_POST['incinemas'];
	include("search/screening_movie.php"); 	
	die();
}
add_action( 'wp_ajax_ajax_action7', 'ajax_action7_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action7', 'ajax_action7_stuff' ); // ajax for not logged in users

function ajax_action8_stuff() { // Fortose xarti mono otan allazei i poli
	$poli = $_POST['poli'];
	$perioxi = $_POST['perioxi'];
	include("search/ftinacinema.php"); 	
	die();
}
add_action( 'wp_ajax_ajax_action8', 'ajax_action8_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action8', 'ajax_action8_stuff' ); // ajax for not logged in users

function ajax_action10_stuff() { //  Nea vathmologia
	$userID = $_POST['userID'];
	$movieID = $_POST['movieID'];
	$rating = $_POST['rating']; 
	$timestamp = time();
	$query= "INSERT INTO `gogoCin_mine` VALUES('" . $userID . "', '" . $rating . "', '" . $movieID . "','ratingmovie','','" . $timestamp .  "')"; //echo $query;
	global $wpdb;
	$myrows = $wpdb->get_results($query);
	// egine i eggrafi - tora emfanise ta nea 
	$query = " SELECT AVG( vathmos ) AS v, COUNT(*) AS c FROM  `gogoCin_mine` WHERE postID ='" . $movieID . "' AND attribute = 'ratingmovie' "; 
	$myrows = $wpdb->get_results($query);?>
	<h4 style="margin-bottom:5px;"><?php _e('Βαθμολογία Χρηστών: '); echo number_format($myrows[0]->v, 1); echo " / 5"?> </h3> 
	<div id="ratings-gogo" class="post-ratings">
		<?php $stars = floor($myrows[0]->v * 2) / 2;  //echo "aaaa  " . $s; // stroggilema sto plisiestero miso gia na mpoune asterakia ?>
		<?php for ($i = 1; $i <= $stars; $i++) {?>
			<img style="display:inline;" src="http://cinego.gr/wp-content/plugins/wp-postratings/images/stars_dark/rating_on.gif" class="img-responsive" >
		<?php } ?>
		<?php if ($stars == 0.5 | $stars == 1.5 | $stars == 2.5 | $stars == 3.5 | $stars == 4.5   ) : ?> 
			<img style="display:inline;" src="http://cinego.gr/wp-content/plugins/wp-postratings/images/stars_dark/rating_half.gif" class="img-responsive" >
		<?php endif; ?>
		<?php for ($i = 1; $i <= 5-$stars; $i++) {?>
			<img style="display:inline;" src="http://cinego.gr/wp-content/plugins/wp-postratings/images/stars_dark/rating_off.gif" class="img-responsive" >
		<?php } ?>
		<br>
		από <?php  echo $myrows[0]->c; ?> βαθμολογήσεις 
	</div>
	<?php 
		$query = " SELECT vathmos AS v FROM  `gogoCin_mine` WHERE postID ='" . $movieID . "' AND attribute = 'ratingmovie' AND user = '" . $userID . "'"; 
		$myrows = $wpdb->get_results($query); 
	?>
	<h4 style="margin-top:10px; margin-bottom:5px;"><?php _e('Βαθμολογία Σου:');?></h3> 
	<div id="ratings-gogo" class="post-ratings">
		<?php $stars = floor($myrows[0]->v * 2) / 2;  //echo "aaaa  " . $s; // stroggilema sto plisiestero miso gia na mpoune asterakia ?>
		<?php for ($i = 1; $i <= $stars; $i++) {?>
			<img style="display:inline;" src="http://cinego.gr/wp-content/plugins/wp-postratings/images/stars_dark/rating_on.gif" class="img-responsive" >
		<?php } ?>
		<?php if ($stars == 0.5 | $stars == 1.5 | $stars == 2.5 | $stars == 3.5 | $stars == 4.5   ) : ?> 
			<img style="display:inline;" src="http://cinego.gr/wp-content/plugins/wp-postratings/images/stars_dark/rating_half.gif" class="img-responsive" >
		<?php endif; ?>
		<?php for ($i = 1; $i <= 5-$stars; $i++) {?>
			<img style="display:inline;" src="http://cinego.gr/wp-content/plugins/wp-postratings/images/stars_dark/rating_off.gif" class="img-responsive" >
		<?php } ?>
		<br>
	</div>
	<?php 
	//include("search/ftinacinema.php"); 	
	die();
}
add_action( 'wp_ajax_ajax_action10', 'ajax_action10_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action10', 'ajax_action10_stuff' ); // ajax for not logged in users

function ajax_action11_stuff() { //  wishlist
	$userID = $_POST['userID'];
	$movieID = $_POST['movieID'];
	$timestamp = time();
	$query= "INSERT INTO `gogoCin_mine` VALUES('" . $userID . "', '0', '" . $movieID . "','wishlist','','" . $timestamp .  "')"; //echo $query;
	global $wpdb;
	$myrows = $wpdb->get_results($query);
	// egine i eggrafi - tora emfanise ta nea 
	?>
	<button type="button " class="btn btn-danger"  style="width:90%;">
  		<i class="fa fa-bookmark"></i></span> Η ταινία είναι <br>στην Wishlist μου
	</button>
	<?php
	die(); 
}
add_action( 'wp_ajax_ajax_action11', 'ajax_action11_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action11', 'ajax_action11_stuff' ); // ajax for not logged in users

function ajax_action12_stuff() { //  favorite cinema
	$userID = $_POST['userID'];
	$theaterID = $_POST['theaterID'];
	$timestamp = time();
	$query= "INSERT INTO `gogoCin_mine` VALUES('" . $userID . "', '0', '" . $theaterID . "','favcinema','','" . $timestamp .  "')"; //echo $query;
	global $wpdb;
	$myrows = $wpdb->get_results($query);
	// egine i eggrafi - tora emfanise ta nea 
	?>
		<button type="button " class="btn btn-danger" style="width:95%;">
	  		<i class="fa fa-heart"></i> </span> Αγαπημένο <br> μου σινεμά
		</button>
	<?php
	die(); 
}
add_action( 'wp_ajax_ajax_action12', 'ajax_action12_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action12', 'ajax_action12_stuff' ); // ajax for not logged in users


/*function ajax_action5_stuff() {
	$movID = $_POST['movID'];
	$post = get_post( $movID );
	$permalink = get_permalink( $movID );
	include("loadvid.php"); 	
	die();
}
add_action( 'wp_ajax_ajax_action5', 'ajax_action5_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action5', 'ajax_action5_stuff' ); // ajax for not logged in users
*/

function vb_pagination( $query=null ) {
 
  global $wp_query;
  $query = $query ? $query : $wp_query;
  $big = 999999999;
 
  $paginate = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'type' => 'array',
    'total' => $query->max_num_pages,
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'prev_text' => __('&laquo;'),
    'next_text' => __('&raquo;'),
    )
  );
 
  if ($query->max_num_pages > 1) :
?>
<ul class="pagination" style="width:100% !important;">
  <?php
  foreach ( $paginate as $page ) {
    echo $page . '  ';
  }
  ?>
</ul>
<?php
  endif;
}

function wp_get_attachment_medium_url( $id )
{
    $medium_array = image_downsize( $id, 'medium' );
    $medium_path = $medium_array[0];

    return $medium_path;
}


function new_excerpt_more($post) {
    return ' ... <a class="read_more" href="'. get_permalink($post->ID) . '">' . '<strong> [Περισσότερα]</strong>' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	/**
* Featured images support
*
*/
add_theme_support( 'post-thumbnails' );
/**
* Menus support
*
*/
add_theme_support( 'menus' );
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
register_nav_menus(
array(
'menu-top' => __( 'Top Menu' ),
'menu-footer' => __( 'Footer Menu' ),
'menu-admin' => __( 'Admins Menu' )
)
);
}

 post_type_supports( 'post', 'custom-fields' );	
	/**
 * Custom types.
 *
 */
 if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(
            array(
                'label' => 'Secondary Image',
                'id' => 'secondary-image',
                'post_type' => array(
     'post', 'movie', 'tvseries', 'shortfilm', 'enshortfilm', 'enmovie', 'enpost'
		)
            )
        );
    }

 add_action( 'init', 'create_post_type' );
 

 function create_post_type() {

	register_post_type( 'movietheater',
		array(
			'labels' => array(
				'name' => __( 'Movie Theater' ),
				'singular_name' => __( 'Movie Theater' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail', 'custom-fields', 'excerpt','categories', 'author'),
		'taxonomies' => array('post_tag') // this is IMPORTANT 
		)
	);

	// This is for En Posts
/*	register_post_type( 'enpost',
		array(
			'labels' => array(
				'name' => __( 'English Posts' ),
				'singular_name' => __( 'English Post' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail', 'custom-fields', 'excerpt','categories', 'author'),
		'taxonomies' => array('post_tag') // this is IMPORTANT 
		)
	);*/

	// This is for Movies
	register_post_type( 'movie',
		array(
			'labels' => array(
				'name' => __( 'Movies' ),
				'singular_name' => __( 'Movie' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail','categories', 'author', 'publicize', 'custom-fields'),
		'taxonomies' => array('post_tag') // this is IMPORTANT
		)
	);

	// This is for TV Series
	register_post_type( 'tvseries',
		array(
			'labels' => array(
				'name' => __( 'TV Series' ),
				'singular_name' => __( 'TV Series' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail', 'custom-fields', 'excerpt','categories', 'author'),
		'taxonomies' => array('post_tag') // this is IMPORTANT 
		)
	);
	
	// This is for Short Films
	register_post_type( 'shortfilm',
		array(
			'labels' => array(
				'name' => __( 'Short Films' ),
				'singular_name' => __( 'Short Film' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail', 'custom-fields', 'excerpt','categories', 'publicize'),
		'taxonomies' => array('post_tag') // this is IMPORTANT
		)
	);
	
/*	// This is for En Short Films
	register_post_type( 'enshortfilm',
		array(
			'labels' => array(
				'name' => __( 'English Short Films' ),
				'singular_name' => __( 'En Short Film' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail', 'custom-fields', 'excerpt','categories'),
		'taxonomies' => array() // this is IMPORTANT
		)
	);*/
}



function quidro_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'enshortfilm', 'enmovie', 'enpost', 'movie', 'tvseries', 'shortfilm'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'quidro_add_custom_types' );

 add_action( 'init', 'create_my_taxonomies', 0 );
 function create_my_taxonomies() {
    register_taxonomy(
        'movie_genre',
        'movie',
        array(
            'labels' => array(
                'name' => 'Movie Genre',
                'add_new_item' => 'Add New Movie Genre',
                'new_item_name' => "New Movie Type Genre"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );

	register_taxonomy(
        'theater_city',
        array('movietheater'),
        array(
            'labels' => array(
                'name' => 'Theater City',
                'add_new_item' => 'Add New City',
                'new_item_name' => "New City"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );	

	register_taxonomy(
        'theater_perioxi',
        'movietheater',
        array(
            'labels' => array(
                'name' => 'Περιοχή(Μόνο για Αθήνα)',
                'add_new_item' => 'Add New Perioxi',
                'new_item_name' => "New Perioxi"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );	

    register_taxonomy(
        'movie_type',
        'movie',
        array(
            'labels' => array(
                'name' => 'Movie Type',
                'add_new_item' => 'Add New Movie Type',
                'new_item_name' => "New Movie Type Type"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );	

	register_taxonomy(
        'movie_director',
        'movie',
        array(
            'labels' => array(
                'name' => 'Director',
                'add_new_item' => 'Add New Director',
                'new_item_name' => "New Director"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'hierarchical' => false
        )
    );
	

	/*register_taxonomy(
        'movie_premier',
        'movie',
        array(
            'labels' => array(
                'name' => 'Premier',
                'add_new_item' => 'Add New Date',
                'new_item_name' => "New Date"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'hierarchical' => false
        )
    );*/

	register_taxonomy(
        'movie_writer',
        'movie',
        array(
            'labels' => array(
                'name' => 'Writer',
                'add_new_item' => 'Add New Writer',
                'new_item_name' => "New Writer"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'hierarchical' => false
        )
    );


/*	register_taxonomy(
        'movie_country',
        'movie',
        array(
            'labels' => array(
                'name' => 'Country',
                'add_new_item' => 'Add New Country',
                'new_item_name' => "New Country"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'hierarchical' => false
        )
    );
*/

/*	register_taxonomy(
        'movie_mins',
        'movie',
        array(
            'labels' => array(
                'name' => 'Duration',
                'add_new_item' => 'Add Duration',
                'new_item_name' => "Duration"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'hierarchical' => false
        )
    );
*/

	register_taxonomy(
        'movie_year',
        'movie',
        array(
            'labels' => array(
                'name' => 'Year',
                'add_new_item' => 'Add Year',
                'new_item_name' => "Year"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'hierarchical' => false
        )
    );

	register_taxonomy(
        'movie_cast',
        'movie',
        array(
            'labels' => array(
                'name' => 'Cast',
                'add_new_item' => 'Add New Cast',
                'new_item_name' => "New Cast"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'hierarchical' => false
        )
    );

	register_taxonomy(
        'tvseries_creators',
        'tvseries',
        array(
            'labels' => array(
                'name' => 'Creator',
                'add_new_item' => 'Add New Creator',
                'new_item_name' => "New Creator"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'hierarchical' => false
        )
    );
	
	register_taxonomy(
        'tvseries_cast',
        'tvseries',
        array(
            'labels' => array(
                'name' => 'Cast',
                'add_new_item' => 'Add New Cast',
                'new_item_name' => "New Cast"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'hierarchical' => false
        )
    );
	
	 register_taxonomy(
        'tvseries_genre',
        'tvseries',
        array(
            'labels' => array(
                'name' => 'TV Series Genre',
                'add_new_item' => 'Add New TV Series Genre',
                'new_item_name' => "New TV Series Genre"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
	
/*	register_taxonomy(
        'shortfilm_genre',
        'shortfilm',
        array(
            'labels' => array(
                'name' => 'Short Film Genre',
                'add_new_item' => 'Add New Short Film Genre',
                'new_item_name' => "New Short Film Genre"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
*/	
	register_taxonomy(
        'shortfilm_director',
        'shortfilm',
        array(
            'labels' => array(
                'name' => 'Director',
                'add_new_item' => 'Add New Director',
                'new_item_name' => "New Director"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'hierarchical' => false
        )
    );
	
	register_taxonomy(
        'shortfilm_cast',
        'shortfilm',
        array(
            'labels' => array(
                'name' => 'Cast',
                'add_new_item' => 'Add New Cast',
                'new_item_name' => "New Cast"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'hierarchical' => false
        )
    );
}

function auto_copyright($year = 'auto'){ 
    if(intval($year) == 'auto'){ $year = date('Y'); } 
    if(intval($year) == date('Y')){ echo intval($year); } 
    if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); } 
   if(intval($year) > date('Y')){ echo date('Y'); } 
  } 

 function disqus_embed($disqus_shortname) {
    global $post;
    wp_enqueue_script('disqus_embed','http://'.$disqus_shortname.'.disqus.com/embed.js');
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = "'.$disqus_shortname.'";
        var disqus_title = "'.$post->post_title.'";
        var disqus_url = "'.get_permalink($post->ID).'";
        var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
    </script>';
}

function myfeed_request($qv) {
	if (isset($qv['feed']))
		$qv['post_type'] = get_post_types();
	return $qv;
}
add_filter('request', 'myfeed_request');


function custom_post_author_archive($query) {
    if ($query->is_author)
        $query->set( 'post_type', array('shortfilm', 'movie', 'post', 'tvseries') );
    remove_action( 'pre_get_posts', 'custom_post_author_archive' );
}

if( class_exists( 'kdMultipleFeaturedImages' ) ) {

        $args = array(
                'id' => 'featured-image-2',
                'post_type' => 'movie',     // Set this to post or page
                'labels' => array(
                    'name'      => 'Poster(vertical image)',
                    'set'       => 'Set Poster',
                    'remove'    => 'Remove Poster',
                    'use'       => 'Use as Poster',
                )
        );

        new kdMultipleFeaturedImages( $args );
}

if( class_exists( 'kdMultipleFeaturedImages' ) ) {

        $args = array(
                'id' => 'featured-image-2en',
                'post_type' => 'enmovie',     // Set this to post or page
                'labels' => array(
                    'name'      => 'Poster(vertical image)',
                    'set'       => 'Set Poster',
                    'remove'    => 'Remove Poster',
                    'use'       => 'Use as Poster',
                )
        );

        new kdMultipleFeaturedImages( $args );
}
  

?>
