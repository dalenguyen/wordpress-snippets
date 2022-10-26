function responsive_videos( $html ){
    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
    return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
}

add_filter( 'embed_oembed_html','evolution_wrap_oembed', 10, 1 );

//needed CSS Classes

.embed-responsive.embed-responsive-16by9 {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */
    padding-top: 25px;
    height: 0;
}

.embed-responsive.embed-responsive-16by9 iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

video {
    width: 100% !important;
    height: auto !important;
}