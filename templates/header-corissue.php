<?php 
/**
 * COR 2015 theme corissue header
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * derived from TwentyFourteen
 *
 *
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-16099602-20', 'auto');
  ga('send', 'pageview');

</script>

<!-- call COR 2015 custom css here -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/custom.css" type="text/css" media="all" />


</head>

<body <?php body_class(); ?>>
<!-- header-corissue -->
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<a class="headerLogoLink" href="<?php echo home_url(); ?>">
			<img class="headerLogo" src="<?php echo content_url(); ?>/uploads/2015/02/cor-adviser-logo.png" alt="COR Adviser logo" ></a>
			<div class="logoutBlock">
			<?php
				// check if user logged in
				//if(!empty($user_name)) {
				if ( is_user_logged_in() ) {
					echo '<span style="color: #daf543; font-size: 16px;">| </span><a href="' . wp_logout_url() . '" title="Logout">log out</a>';
				}
				else {
					// else show nothing/home button, they not logged in
					echo '<span style="color: #daf543; font-size: 16px;">| </span><a href="' . home_url() . '" title="home">home</a>';
				}
			?>
			</div>
		<a class="portnerLogoLink" href="http://www.portnerpress.com.au">
			<img class="portnerLogo" src="<?php echo content_url(); ?>/uploads/2015/02/portner-banner-logo.png" alt="Portner Press logo" ></a>
	</header><!-- #masthead -->

<div id="main" class="site-main">

<!-- COR Issues banner -->
	<div class="issuePageHeader">
		<img class="issuePageImage" src="<?php echo content_url(); ?>/uploads/2015/02/corissue-banner.png" alt="COR Isuue banner" >
		<div class="headerWrapper">
			<h1 class="issuePageTitle">Issues</h1>
			<header class="entry-header">
			</header><!-- .entry-header -->		
		</div><!-- .headerWrapper -->
	</div><!-- .issuePageHeader -->

