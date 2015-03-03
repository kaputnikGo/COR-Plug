<?php
/**
 * Plugin Name: COR Plug
 * Plugin URI: http://www.coradviser.com.au
 * Description: Add functions to COR 2015 theme - DEVELOPMENT VERSION.
 * Version: 1.1.6
 * Author: MA_PPP
 * Author URI: http://www.portphillippublishing.com.au
 * Text Domain: twentyfourteen
 * Domain Path: Optional. Plugin's relative directory path to .mo files. Example: /locale/
 * Network: Optional. Whether the plugin can only be activated network wide. Example: true
 * License: GPL2
 */
 
/*  Copyright 2015  MA_PPP  (email : kaputnikgo@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/********************************************

FUNCTION LIST:-

register_insider_addons();
initialise_menu();
init_admin_page();


********************************************/ 

define( 'COR_PLUG_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'COR_PLUG_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'COR_PLUG_VERSION', '1.1.6' );

// library functions called here
require_once( COR_PLUG_DIR_PATH . 'lib/function_list.php' );

// call addons
register_plugin_addons();

function register_plugin_addons() {
	// this
	add_action( 'admin_menu', 'initialise_menu' );
	// corissue_main.php
	add_action( 'init', 'create_new_post_type_corissue' );
	// auxillary.php
	add_filter( 'widget_text', 'execute_php', 100 );
	// this
	add_action('after_setup_theme', 'remove_admin_bar');
	//this, conditional
	/*
	if ( (isset($_GET['action']) && $_GET['action'] != 'logout') || 
		(isset($_POST['login_location']) && !empty($_POST['login_location'])) ) {
		add_filter('login_redirect', 'agora_login_redirect', 10, 3);
	}
	*/
}

function initialise_menu() {
	add_menu_page( 	'COR_Plug', 'COR Plug', 'manage_options', 'cor_plug', 
				'init_admin_page', COR_PLUG_DIR_URL . 'plug_icon.png', 4.4 );	
}

/*
// redirect to this url
function agora_login_redirect() {
	$latestArgs = array( 'numberposts' => 1, 'post_type' => 'corissue', 'order' => 'ASC' , 'post_status' => 'publish' );			
	$latestAdviser = wp_get_recent_posts( $latestArgs );
	$redirectLink = get_permalink( $latestAdviser->ID );
	Logger( 'redirectLink: ' . $redirectLink );
	//$location = $_SERVER['HTTP_REFERER'];
	wp_safe_redirect( $redirectLink );
	exit();
}
*/

// remove admin bar for non-admins
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

function init_admin_page() {
	if (!current_user_can('manage_options')) {  
		wp_die('You do not have sufficient permissions to access this page.');  
	}
	// call the admin_page.php
	echo file_get_contents( COR_PLUG_DIR_PATH . 'lib/admin_page.php' );
	echo '<br /><br />COR Plug version: ' . COR_PLUG_VERSION . '<br /><br />';
	echo '<br />debug:<br />';
	get_corissue_posts_list();
	echo 'end debug.<br />';
	
}

?>