<?php
function disable_self_pingback( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
    if ( 0 === strpos( $link, $home ) )
    unset($links[$l]);
}
add_action( 'pre_ping', 'disable_self_pingback' );