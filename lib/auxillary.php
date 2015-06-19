<?php
/*
*	COR Plug auxillary functions
*	
*	auxillary.php
*
*/


// parse php in footer widget Text (ie. date('Y'))
function execute_php($html){
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}

/***************************************************/

//	DEBUG

/****************************************************/

// called from COR Plug, basic admin page debug
function display_basic_debug() {
	get_corissue_posts_list();
}

//send messages to wp-admin console error log
function logger( $message ) {
	// check for option first
	//if ( get_option('cor_debug_log') == 1 ) {
		error_log( $message, 0); 	
	//}
}

// debug list of Insider posts and status
function get_corissue_posts_list() {
	// get all corissue posts
	$corissue_list_html = return_corissue_posts_list();
	
	if ( $corissue_list_html ) {
		foreach($corissue_list_html as $line) {
			echo $line;
		}
	}
}

/***************************************************/

//	ARCHIVED

/****************************************************/

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
/*
if ( (isset($_GET['action']) && $_GET['action'] != 'logout') || 
		(isset($_POST['login_location']) && !empty($_POST['login_location'])) ) {
	add_filter('login_redirect', 'agora_login_redirect', 10, 3);
}
*/

?>