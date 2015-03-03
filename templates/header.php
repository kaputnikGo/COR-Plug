<?php
/**
 * COR 2015 theme - default header
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
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
	
<!-- call COR 2015 custom css here -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/custom.css" type="text/css" media="all" />
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<!-- default, index header -->
	<header id="masthead" class="site-header" role="banner">
		<a class="headerLogoLink" href="<?php echo home_url(); ?>">
			<img class="headerLogo" src="<?php echo content_url(); ?>/uploads/2015/02/cor-adviser-logo.png" alt="COR Adviser logo" ></a>
		<a class="portnerLogoLink" href="http://www.portnerpress.com.au">
			<img class="portnerLogo" src="<?php echo content_url(); ?>/uploads/2015/02/portner-banner-logo.png" alt="Portner Press logo" ></a>
	</header><!-- #masthead -->
	
<div id="main" class="site-main">
