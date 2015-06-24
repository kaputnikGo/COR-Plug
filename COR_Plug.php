<?php
/**
 * Plugin Name: COR Plug
 * Plugin URI: http://www.coradviser.com.au
 * Description: Add functions to COR 2015 theme. Production Version.
 * Version: 1.5.0
 * Author: MA_PPP
 * Author URI: http://www.portphillippublishing.com.au
 * Text Domain: twentyfourteen
 * Domain Path: Optional. Plugin's relative directory path to .mo files. Example: /locale/
 * Network: Optional. Whether the plugin can only be activated network wide. Example: true
 * License: GPL2
 */
 
/*  Copyright 2015  MA_PPP  (email : noone@mail.com)

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
define( 'COR_PLUG_VERSION', '1.5.0' );

// library functions called here
require_once( COR_PLUG_DIR_PATH . 'lib/function_list.php' );

// call addons
register_plugin_addons();

function register_plugin_addons() {
	// this
	add_action( 'admin_menu', 'initialise_menu' );
	// corissue_main.php
	add_action( 'init', 'create_new_post_type_corissue' );
  add_action( 'init', 'create_new_post_type_insights' );
  add_action( 'init', 'create_new_post_type_article' );
	// auxillary.php
	add_filter( 'widget_text', 'execute_php', 100 );
	// this
	add_action('after_setup_theme', 'remove_admin_bar');
  // this
  add_filter( 'excerpt_more', 'custom_excerpt_more', 100 );
  // this
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	// this
  add_shortcode('cor_get_sidebar', 'cor_sidebar_shortcode');
  // this
  add_filter( 'pre_get_posts', 'cor_custom_feed' );
  //
}

function initialise_menu() {
	add_menu_page( 	
				'COR_Plug', 
				'COR Plug', 
				'manage_options', 
				'cor_plug', 
				'init_admin_page', 
				COR_PLUG_DIR_URL . 'plug_icon.png', 4.4 
				);
}

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
	echo '<br /><br />COR Plug version: <strong>' . COR_PLUG_VERSION . '</strong><br /><br />';
	echo '<br />debug:<br />';
	get_corissue_posts_list();
	echo 'end debug.<br />';
}

// enable call of sidebar from post
function cor_sidebar_shortcode(){
  ob_start();
  get_sidebar("index");
  $sidebar= ob_get_contents();
  ob_end_clean();
  return $sidebar;
}

// functions for excerpts in article/insights template pages
function custom_excerpt_length( $length ) {
	return 17;
}
function custom_excerpt_more( $more ) {
	return '&hellip; <a class="more-link" href="' . get_permalink( get_the_ID() ) . '"> Read more&hellip;</a>';
}

// Add custom post types - article and insights to main rss feed, not corissue.
function cor_custom_feed( $query ) {
        if ( $query->is_feed() )
            $query->set( 'post_type', array( 'article', 'insights' ) ); 
        return $query;
}

?>