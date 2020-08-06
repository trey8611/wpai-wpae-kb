# Handle deletion of first variation
If you're importing variable products in WooCommerce and you do not have a parent product, the 1st variation is considered the parent. This can cause issues if you're trying to delete the first variation without deleting the parent product.

Below is an example snippet showing how you can disable the first variation without disabling the parent product whenever it's removed from your import file. This is only an example and will likely need to be modified for your use case.

```php
function my_is_post_to_delete( $is_post_to_delete, $post_id, $import ) {
    if ( $product = wc_get_product( $post_id ) ) {
		if ( $product->is_type( 'variable' ) && $product->get_parent_id() == 0 ) {
			if ( $variation = wc_get_product( $product->get_meta( '__first_variation_id', true ) ) ) {
				$variation->set_status( 'private' );
				$variation->save();
			}
			if ( empty( $product->get_available_variations() ) ) {
				$product->set_status( 'private' );
				$product->save();
			}
		} else {
			$product->set_status( 'private' );
			$product->save();
		}
	}
    return false;
}
add_filter( 'wp_all_import_is_post_to_delete', 'my_is_post_to_delete', 10, 3 );
```
