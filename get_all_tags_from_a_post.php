  // Get an array of tag object from a post id
  wp_get_post_tags(get_the_ID());
  
  // Get an array of tags name from a post id
  wp_get_post_tags(get_the_ID(), array( 'fields' => 'names' )); // ids
  
