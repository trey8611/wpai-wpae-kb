<?php
function my_adjust_range( $price ) {
    switch ( true ) {
        case ( $price >= 0 && $price <= 10 ):
            $adjustment = 1.7;
            break;
        case ( $price > 10 && $price <= 20 ):
            $adjustment = 1.6;
            break;
        case ( $price > 20 && $price <= 30 ):
            $adjustment = 1.5;
            break;        
        default:
            $adjustment = 1;
            break;
    }
    return round( $price * $adjustment, 2 );
}
