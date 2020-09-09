<?php
function my_adjust_price_by_cat( $price, $category ) {
    switch ( true ) {
        case ( $category == 'Corded' ):
            $adjustment = 1.12;
            break;
        case ( $category == 'Mouse Mat' ):
            $adjustment = 1.4;
            break;
        case ( $category == 'Webcam' ):
            $adjustment = 1.45;
            break;        
	default:
	    // Mark-up by 20% default
            $adjustment = 1.20;
            break;
    }
    return round( $price * $adjustment, 2 );
}
