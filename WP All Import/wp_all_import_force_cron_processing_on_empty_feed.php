<?php
// Forces cron import to run even if feed returns 0 results.
// Doesn't work on a feed that is completely unavailable.
add_filter('wp_all_import_force_cron_processing_on_empty_feed', 'wpai_wp_all_import_force_cron_processing_on_empty_feed', 10, 2);

function wpai_wp_all_import_force_cron_processing_on_empty_feed($is_force_processing, $import_id){
  return true;
}
