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
?>