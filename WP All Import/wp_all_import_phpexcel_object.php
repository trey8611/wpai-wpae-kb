<?php
// Example: skip first data row in an import file that has a header row.
add_filter( 'wp_all_import_phpexcel_object', 'wpai_wp_all_import_phpexcel_object', 10, 2 );
function wpai_wp_all_import_phpexcel_object( $PHPExcel, $xlsFilePath ) {
	$PHPExcel->getActiveSheet()->removeRow(2,1);

	return $PHPExcel;
}
