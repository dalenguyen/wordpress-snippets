<?php
function add_custom_mime_types($mimes){
    $new_file_types = array (
        'zip' => 'application/zip',
        'pdf' => 'application/pdf',
        'epub' => 'application/epub+zip',
        //add more here
    );

    return array_merge($mimes,$new_file_types);
}

add_filter('upload_mimes','add_custom_mime_types');
