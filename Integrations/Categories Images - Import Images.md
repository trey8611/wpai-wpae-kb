Plugin: https://wordpress.org/plugins/categories-images/

Import images in a "Taxonomies" import and use this code to import the necessary data for the "Categories Images" plugin.

```php
function my_gallery_image( $post_id, $att_id, $file ) {
	$import_id = ( isset( $_GET['id'] ) ? $_GET['id'] : ( isset( $_GET['import_id'] ) ? $_GET['import_id'] : 'new' ) );
	$import = new PMXI_Import_Record();
	$import->getById( $import_id );	
	$import_post_type = $import->options['custom_type'];
	
	if ( $import_post_type == 'taxonomies' ) {		
		$option_name = 'z_taxonomy_image' . $post_id;
		update_option( $option_name, wp_get_attachment_url( $att_id ) );		
	}	
}

add_action( 'pmxi_gallery_image', 'my_gallery_image', 10, 3 );
```
