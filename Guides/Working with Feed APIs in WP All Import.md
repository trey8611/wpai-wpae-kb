You can manipulate the curl request using the http_api_curl hook. Examples:

```php
add_action( 'http_api_curl', 'my_curl_header', 10, 3 );

function my_curl_header( $ch, $r, $url ) {
     if ( $url == 'http://example.com/path/to/feed/file.xml' ) {
          curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
               'authorization: Token mytoken',
               'Content-Type: application/json'
          ) );
     }
}
```
