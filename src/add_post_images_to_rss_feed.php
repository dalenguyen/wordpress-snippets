<?php
function add_post_image_to_rss($content) {
    global $post;
    if ( has_post_thumbnail( $post->ID ) ){
        $content = '<div>' . get_the_post_thumbnail( $post->ID, 'large', array( 'style' => 'margin-bottom: 15px;' ) ) . '</div>' . $content;
    }
    return $content;
}

add_filter('the_excerpt_rss', 'add_post_images_to_rss');
add_filter('the_content_feed', 'add_post_images_to_rss');
