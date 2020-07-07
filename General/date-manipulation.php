<?php
// Date manipulation
// Flexible to work with pretty much any date format.

function my_fix_date( $date, $format = 'Ymd', $new_format = 'Y/m/d' ) {
	if ( $obj = DateTime::createFromFormat( $format, $date ) ) {
		return $obj->format( $new_format );	
	} else {
		return null;
    }
}