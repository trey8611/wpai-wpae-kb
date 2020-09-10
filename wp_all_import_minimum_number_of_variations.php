<?php
/*
 * ​When "Create products with no variations as simple products" is enabled in the "Variations" section of the WooCommerce Add-On, WP All Import is going to create products with 1 variation as a simple product.
 * 
 * This filter allows you to change the minimum number of variations for variable products when the above option is enabled.
 *
 * Default return value is 2.
 */
add_filter('wp_all_import_minimum_number_of_variations', 'wpai_wp_all_import_minimum_number_of_variations', 10, 3);
function wpai_wp_all_import_minimum_number_of_variations($min_number_of_variations, $pid, $import_id) {
  return 1;
}
