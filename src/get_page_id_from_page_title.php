<?php
// This will return an object of the page
$page = get_page_by_title( 'page-name' );
if ( ! empty( $page ) ) {
    $page_id = $page->ID;
}
