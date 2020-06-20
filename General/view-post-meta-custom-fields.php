<?php
/*
 * Use this in the "Content" field in an import.
 * Add the function with the Post ID like this:
 * 
 * [my_view_meta("1")]
 * 
 * Then, click "Preview" to see all of the Custom Fields for that post ID.
 */

function my_view_meta( $id, $post_type = 'post' ) {
	$func = 'get_post_meta';
	if ( $post_type == 'term' ) $func = 'get_term_meta';
	if ( $post_type == 'user' ) $func = 'get_user_meta';

	$final = array();
	if ( $meta = $func( $id ) ) {
		foreach ( $meta as $key => $value ) {
			$final[ $key ] = maybe_unserialize( $value[0] );
		}
	}
    
    echo '<pre>';
    print_r( $final );
    echo '</pre>';
}