<?php
//get tags of post
$tags = get_the_tags( get_the_ID() );

if ( ! empty( $tags ) ) {
    //extract tag id's from term objects
    $tag_ids = array_column( $tags, 'term_id' );

    //get five random posts that are in any tag of the current post
    $posts = get_posts( [
        'post_not_in'   => get_the_ID(),
        'tag__in'       => $tags_string,
        'order'         => 'ASC',
        'orderby'       => 'rand',
        'post_per_page' => 5
    ] );
}