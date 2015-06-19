<?php
/*
*	COR_Plug corissue main function page
*	
*	corissue_main.php
*
*/

// create Corissue posts type with item on wp-admin page menu
function create_new_post_type_corissue() {
    $labels = array(
        'name'           => __('Corissue'),
        'singular_name'  => __('Corissue'),
    );
    $args = array(
        'labels'         => $labels,
        'public'         => true,
        'has_archive'    => false,
        'menu_position'  => 2,
        'description'    => 'COR Issues',
        'supports'       =>
            array( 'title',
                'comments', 'editor',
                'thumbnail', 'custom-fields', 'revisions'),
    );
    register_post_type('corissue', $args);
}

// create Insights posts type with item on wp-admin page menu
function create_new_post_type_insights() {
    $labels = array(
        'name'           => __('Insights'),
        'singular_name'  => __('Insights'),
    );
    $args = array(
        'labels'         => $labels,
        'public'         => true,
        'has_archive'    => true,
        'menu_position'  => 3,
        'description'    => 'Industry Insights',
        'supports'       =>
            array( 'title',
                'comments', 'editor',
                'thumbnail', 'custom-fields', 'revisions'),
    );
    register_post_type('insights', $args);
}

//list all the COR Issue posts on the COR Plug admin page - for debugging.
function return_corissue_posts_list() {
	// get all corissue posts by title
	$args = array( 'post_type' => 'corissue', 'order' => 'DEC' , 'post_status' => 'any' ); 
	$corissue_posts = get_posts( $args );

	$html_array = array();
	$count = 2;
	
	if ($corissue_posts) {
		// loops and save to array
		$html_array[0] = '<br />';
		$html_array[1] = '<ul class="plugul">';
		foreach ( $corissue_posts as $post ) { 
			setup_postdata( $post ); 
			$html_array[$count] = '<li class="plugli">status: ' . get_post_status($post->ID) . ' - <a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></li>';
			$count++;
		}
		$count++;
		$html_array[$count] = '</ul>';
		wp_reset_postdata();
		return $html_array;
	}
	else {
		Logger( 'No corissue found...' );
		return ( 'No Corissue posts found for debug listing.' );
	}
}
?>
