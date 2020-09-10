<?php
add_action( 'http_api_curl', 'my_curl_settings', 10, 3 );

function my_curl_settings( $ch, $r, $url ) {
    if ( stristr( $url, 'example.com/feedurl' ) ) {
        curl_setopt( $ch, CURLOPT_TIMEOUT, 180 );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 180 );
    }
}
