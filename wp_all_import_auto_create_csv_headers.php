<?php
add_filter( 'wp_all_import_auto_create_csv_headers', 'wpai_wp_all_import_auto_create_csv_headers', 10, 2 ); 
function wpai_wp_all_import_auto_create_csv_headers( $create_headers, $import_id ){ 
    // Return true to auto-generate header, or false to use the header in the file.
    return TRUE;
}
