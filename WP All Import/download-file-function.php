<?php
/*
###################  READ ME  #################################
You'll pass the URL to your feed/file to this function inside the "Download from URL" option when creating an import.
Image examples: https://d.pr/hCfNek and https://d.pr/MnerNb.

1. [custom_file_download("ftp://username:password@hostname.com/full/path/to/file.csv","csv")]

2. [custom_file_download("http://example.com/full/path/to/file.csv","csv")]

You must add the code for the function inside your themes functions.php file, or in a plugin like Code Snippets.
This code is provided in the hope that it helps, but without any support.
###############################################################
*/

// Programmatically download and return import file via URL.
function custom_file_download($url, $type = 'xml'){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    /* Optional: Set headers...
    *    $headers = array();
    *    $headers[] = "Accept-Language: de";
    *    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    */
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
            exit('Error:' . curl_error($ch));
    }
    curl_close ($ch);
    $uploads = wp_upload_dir();
    $filename = $uploads['basedir'] . '/' . strtok(basename($url), "?") . '.' . $type;
    if (file_exists($filename)){
            @unlink($filename);
    }
    /* Optional: Change delimiters for CSV
    *
    *    $result = str_replace("!#", "|", $result);
    *    
    */
    file_put_contents($filename, $result);
    return str_replace($uploads['basedir'], $uploads['baseurl'], $filename);
}
