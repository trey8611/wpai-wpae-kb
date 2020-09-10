# Link Products Without SKU to Orders While Importing

1. Import your products and add a custom field "_old_id" containing the import element {id[1]}, like this: [https://d.pr/i/pLxdiJ](https://d.pr/i/pLxdiJ).
2. Import your orders and use the following custom PHP function in the 'Product SKU' field (it should look like this [https://d.pr/i/8ijjl4](https://d.pr/i/8ijjl4)):
```php
//Usage example: [my_connect_orders({productid[1]})]

function my_connect_orders( $product_id ) {
    global $wpdb;
    $query = 'SELECT `post_id` FROM `' . $wpdb->prefix . 'postmeta` WHERE `meta_key` = "_old_id" AND `meta_value` = "' . $product_id . '"';

				if ( $product = $wpdb->get_row( $query ) ) {
					$random_sku = md5( $product->post_id );
					if ( $wc_product = wc_get_product( $product->post_id ) ) {
						$wc_product->set_sku( $random_sku );
						$wc_product->save();
						return $random_sku;
					}
				}
}
```
3. Add the following hook in order to clean the temporary SKUs:
```php
function remove_auto_generated_sku($post_id, $xml_node, $is_update)
{
     global $wpdb;
    $query = 'SELECT `post_id` FROM `' . $wpdb->prefix . 'postmeta` WHERE `meta_key` = "_old_id" AND `meta_value` = "' . $xml_node->productid . '"';
	
		if ( $product = $wpdb->get_row( $query )  ) {
        $random_sku = md5( $product->post_id );
		if ( $wc_product = wc_get_product( $product->post_id ) ) {
			$current_sku = $wc_product->get_sku();
			if ($current_sku == $random_sku) {
            		$wc_product->set_sku( '' );
            		$wc_product->save();
						}
				}
        
    }	
}

add_action('pmxi_saved_post', 'remove_auto_generated_sku', 10, 3);
```
4. Finally, set the records per iteration to 1: [https://d.pr/i/81z8e8](https://d.pr/i/81z8e8).

Both code snippets can be added into the Function Editor or in a plugin like [Code Snippets](https://wordpress.org/plugins/code-snippets/).
