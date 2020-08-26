# Importing Delivery Time
In addition to the taxonomy, the delivery time taxonomy term ID must be stored in a custom field. Here's an example of how you can import it:

Import the 'name' of the delivery time into a custom field called '_my_delivery_time': https://d.pr/i/yYkwbi.
Save the following code inside the Function Editor (All Import -> Settings):

```php
function my_saved_post($post_id, $xml_node, $is_update) {
	// get delivery name from postmeta
	$delivery = get_post_meta( $post_id, '_my_delivery_time', true );
	// look up delivery term ID
	$term = get_term_by('name', $delivery, 'product_delivery_times' );
	// update postmeta
	update_post_meta($post_id, '_lieferzeit', $term->term_id);
}
add_action('pmxi_saved_post', 'my_saved_post', 10, 3);
```

This uses WP All Import's API, which you can learn about here: http://www.wpallimport.com/documentation/developers/action-reference/.
