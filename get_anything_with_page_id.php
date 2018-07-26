
// Get the page / post content (easy way)
echo get_post_field('post_content', $page_id);

// $more_link_text Optional. Content for when there is more text. Default is null
// $stripteaser Optional. Strip teaser content before the more text. Default is false.

$post = get_post($page_id);
setup_postdata( $post, $more_link_text, $stripteaser);
the_content();

// get other info by using ID
get_the_permalink($page_id);
get_the_title($page_id);
get_the_post_thumbnail_url($page_id);
get_the_excerpt($page_id);
get_the_date( 'l F j, Y', $page_id);

// Check if the page is front page or not
get_option("page_on_front") == $page_id;