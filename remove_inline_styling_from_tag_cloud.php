function remove_tagcloud_inline_styling($input){
    return preg_replace('/ style=("|\')(.*?)("|\')/','',$input);
}

add_filter('wp_generate_tag_cloud', 'remove_tagcloud_inline_styling',10,1);
