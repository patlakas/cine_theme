<head>

<!--- analytics tracking google ----> 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-19904978-2', 'cinefreaks.gr');
  ga('send', 'pageview');

</script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyXWRDCTLQdBLGyT_IhgF1-shhGR4hvDY&callback=initMap">
    </script>

<script data-cfasync="false">
  (function(r,e,E,m,b){E[r]=E[r]||{};E[r][b]=E[r][b]||function(){
  (E[r].q=E[r].q||[]).push(arguments)};b=m.getElementsByTagName(e)[0];m=m.createElement(e);
  m.async=1;m.src=("file:"==location.protocol?"https:":"")+"//s.reembed.com/G-nl9YK1.js";
  b.parentNode.insertBefore(m,b)})("reEmbed","script",window,document,"api");
</script>

<script>
function findBootstrapEnvironment() {
    var envs = ['xs', 'sm', 'md', 'lg'];

    $el = $('<div>');
    $el.appendTo($('body'));

    for (var i = envs.length - 1; i >= 0; i--) {
        var env = envs[i];

        $el.addClass('hidden-'+env);
        if ($el.is(':hidden')) {
            $el.remove();
            return env
        }
    };
}
</script>

<!-- Facebook Conversion Code for Key Page Views - John Patlakas 1 -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6022953386356', {'value':'0.00','currency':'EUR'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6022953386356&amp;cd[value]=0.00&amp;cd[currency]=EUR&amp;noscript=1" /></noscript>


    <meta charset="utf-8">
    <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
    <!-- Le styles -->
	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/responsive-nav.css" rel="stylesheet">	
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,900&subset=latin,greek' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Luckiest+Guy' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Fira+Sans&subset=greek,latin' rel='stylesheet' type='text/css'>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->

    <!--[if lt IE 9]>

      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->
    <?php //wp_enqueue_script("jquery"); ?>
    <?php //wp_head(); ?>
  </head>  

<body> 
<?php if ( wp_is_mobile() ) $h1size = 2.0; else $h1size = 1.7; ?>
<?php if ( wp_is_mobile() ) $h2size = 1.7; else $h2size = 1.5; ?>
<?php if ( wp_is_mobile() ) $h3size = 1.5; else $h3size = 1.4; ?>
<?php if ( wp_is_mobile() ) $h4size = 1.3; else $h4size = 1.3; ?>

<script> var a = findBootstrapEnvironment(); alert("ooooooo"); alert(a); </script>

<style>
.sidebar-nav {
    padding: 9px 0;
}

.dropdown-menu .sub-menu {
    left: 100%;
    position: absolute;
    top: 0;
    visibility: hidden;
    margin-top: -1px;
}

.dropdown-menu li:hover .sub-menu {
    visibility: visible;
}

.dropdown-menu li:hover .sub-menu .dropdown-menu li:hover .sub-menu {
    visibility: visible;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.nav-tabs .dropdown-menu, .nav-pills .dropdown-menu, .navbar .dropdown-menu {
    margin-top: 0;
}

.navbar .sub-menu:before {
    border-bottom: 7px solid transparent;
    border-left: none;
    border-right: 7px solid rgba(0, 0, 0, 0.2);
    border-top: 7px solid transparent;
    left: -7px;
    top: 10px;
}
.navbar .sub-menu:after {
    border-top: 6px solid transparent;
    border-left: none;
    border-right: 6px solid #fff;
    border-bottom: 6px solid transparent;
    left: 10px;
    top: 11px;
    left: -6px;
}

.dropdown-menu>li /* To prevent selection of text */
{   position:relative;
    -webkit-user-select: none; /* Chrome/Safari */        
    -moz-user-select: none; /* Firefox */
    -ms-user-select: none; /* IE10+ */
    /* Rules below not implemented in browsers yet */
    -o-user-select: none;
    user-select: none;
    cursor:pointer;
}
.dropdown-menu .sub-menu 
{
    left: 100%;
    position: absolute;
    top: 0;
    display:none;
    margin-top: -1px;
    border-top-left-radius:0;
    border-bottom-left-radius:0;
    border-left-color:#fff;
    box-shadow:none;
}
.right-caret:after,.left-caret:after
 {  content:"";
    border-bottom: 5px solid transparent;
    border-top: 5px solid transparent;
    display: inline-block;
    height: 0;
    vertical-align: middle;
    width: 0;
    margin-left:5px;
}
.right-caret:after
{   border-left: 5px solid #ffaf46;
}
.left-caret:after
{   border-right: 5px solid #ffaf46;
}

.dropdown-menu .sub-menu .sub-menu 
{
    left: 100%;
    position: absolute;
    top: 0;
    display:none;
    margin-top: -1px;
    border-top-left-radius:0;
    border-bottom-left-radius:0;
    border-left-color:#fff;
    box-shadow:none;
}

</style>

<script>
$(function(){
    $(".dropdown-menu > li > a.trigger").on("click",function(e){
        var current=$(this).next();
        var grandparent=$(this).parent().parent();
        if($(this).hasClass('left-caret')||$(this).hasClass('right-caret'))
            $(this).toggleClass('right-caret left-caret');
        grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
        grandparent.find(".sub-menu:visible").not(current).hide();
        current.toggle();
        e.stopPropagation();
    });
    $(".dropdown-menu > li > a:not(.trigger)").on("click",function(){
        var root=$(this).closest('.dropdown');
        root.find('.left-caret').toggleClass('right-caret left-caret');
        root.find('.sub-menu:visible').hide();
    });
});
</script>
<div id="main-wrap"> <!-- important -->
<div class="container">
	<div id="fb-root">
	</div>
	<script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=288294381184252&version=v2.0";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));
	</script>  
	<?php //include_once("analyticstracking.php") ?>  



<!--<a href="http://cinefreaks.gr/tiff56/"><img width="100%" src="http://cinefreaks.gr/wp-content/uploads/2015/11/56banner.png"/></a>--->
<?php
if ( wp_is_mobile() ) {
	$imgheight=240; $twidth="50%"; 
} else {
	$imgheight=120;	$twidth="100%"; 
}
?>
	
<div class="row" style="text-align:center; padding-top:10px; margin-right:-5px; margin-bottom:0.2em;" >
		<div class="col-md-3 col-sm-12" style="align:center; padding-top:0.7em;"> 		
			<center> <a href="<?php bloginfo('siteurl'); ?>"><img width="90%<? //echo $twidth; ?>" src="<?php bloginfo('template_url'); ?>/img/logosmall.png" ></a></center> 
		<!---<div class="col-md-4 col-md-offset-5" style="padding-top:25px;text-align:right;"> --->
			<div class= "row" style ="padding-right:1em; padding-left:1em; padding-top:0.1em; padding-bottom:0.1em;">
				<div class="col-md-12 col-sm-12 col-xs-12">
				<form class="form-search" action="<?php echo home_url( '/' ); ?>">
				<div>
				 <div class="form-group" style="">							
						<input  class="form-control" type="search" data-provide="typeahead" value="<?php echo esc_html($s); ?>" 			name="s" id="s" placeholder="Τι ψάχνεις;">
					</div>
				</div>
			</form>	
			</div>
			</div>
		</div>	

		<div class="col-md-9 col-sm-12" style ="padding-top:0.9em;"> 
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Responsive Ad -->
<!---		<ins class="adsbygoogle"
	    	 style="display:block"
	    	 data-ad-client="ca-pub-5350109138535147"
	    	 data-ad-slot="1003403253"
	     	data-ad-format="auto"></ins>--->
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
			<a href="http://cinefreaks.gr/berlinale-2018/"><img  src="http://cinefreaks.gr/wp-content/uploads/2018/02/berlinale2018-2.png"></a>
			<!---	<a href="http://filmschool.gr/"><img src="http://cinefreaks.gr/wp-content/uploads/2017/09/filmschool.jpg" ></a>
			<a href="http://www.trianon.gr/v1/component/k2/item/465-tom-of-finland.html"><img src="http://cinefreaks.gr/wp-content/uploads/2018/01/tof_728x90.gif"</a>--->
		</div>


		
</div>

		<!---<div  class="col-md-1 col-sm-12">
		<a href="<?php bloginfo( 'rss2_url'); ?>" style="color:#fff;margin-right:10px;"><i class="fa fa-rss fa-2x"></i></a>
		<a href="https://www.facebook.com/cinefreaksgr" style="color:#fff;margin-right:10px;"><i class="fa fa-facebook-official fa-2x"></i></a>
		<a href="https://twitter.com/cinefreaks" style="color:#fff;margin-right:10px;"><i class="fa fa-twitter fa-2x"></i></a>
		<a href="https://www.youtube.com/channel/UCVf7x1i68JXXnF5lcGNhvYA" style="color:#fff;margin-right:10px;"><i class="fa fa-youtube fa-2x"></i></a>	<a href="https://www.instagram.com/cinefreaks" style="color:#fff;margin-right:10px;"><i class="fa fa-instagram fa-2x"></i></a>
		</div>--->
	<div class="row">
	<div class="col-xs-12">
						<?php wp_nav_menu( array(
								'theme_location' => 'menu-top',
								'container'      => '',
								'menu_id'        => '',
								'menu_class'     => 'navigation'
							) ); ?> 
							<!--<div id="mobilemenu"></div>-->
<?php //echo do_shortcode('[responsive_menu]'); ?>

					</div>
	</div>
	<?php wp_enqueue_script("jquery"); ?>		
	<?php wp_head(); ?>