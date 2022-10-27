<?php
//get categories of post
$categories = get_the_terms( get_the_ID(), 'category' );

//extract category id's from term objects
$cat_ids    = array_column( $categories, 'term_id' );

//concat id's to a string with ',' as seperator
$cat_ids    = implode( ',', $cat_ids );

//get five random posts that are in any category of the current post
$posts = query_posts( [
    'post_not_in'   => get_the_ID(),
    'cat'           => $cat_ids,
    'order'         => 'ASC',
    'orderby'       => 'rand',
    'post_per_page' => 5
] );
