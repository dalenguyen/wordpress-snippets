<?php
//get tags of post
$tags        = get_the_terms( get_the_ID(), 'tag' );

//extract tag id's from term objects
$tag_ids     = array_column( $tags, 'term_id' );

//concat id's to a string with ',' as seperator
$tags_string = implode( $tag_ids, ',' );

//get five random posts that are in any tag of the current post
$posts = query_posts( [
    'post_not_in'   => get_the_ID(),
    'tag__in'       => $categories_string,
    'order'         => 'ASC',
    'orderby'       => 'rand',
    'post_per_page' => 5
] );