<?php

// Popular posts - counting hits
function wp_popular_posts( $post_id ) {

	$count_key = 'popular_posts';

	$count = get_post_meta( $post_id, $count_key, true );

	if ( '' == $count ) {
		
		$count = 0;

		delete_post_meta( $post_id, $count_key );

		add_post_meta( $post_id, $count_key, '0' );

	} else {

		$count++;
		
		update_post_meta( $post_id, $count_key, $count );

	}
}

function wp_track_posts( $post_id ) {
	
	if ( ! is_single() ) {
		return;
	}

	if ( empty( $post_id ) ) {

		global $post;

		$post_id = $post->ID;

	}

	wp_popular_posts( $post_id );

}
add_action( 'wp_head', 'wp_track_posts' );


// Shortcode: display popular posts based on cat
add_shortcode( 'popular-posts', 'wp_display_popular_posts' );
function wp_display_popular_posts( $atts, $content = null ) {

	ob_start();

		extract( shortcode_atts( array(
			'num' => 5,
			'cat' => '',
		), $atts ) ); 

		$temps = explode( ',', $cat );

		$array = array();

		foreach ( $temps as $temp ) {
			$array[] = trim( $temp );
		}

		$cats = ! empty( $cat ) ? $array : '';

		echo'<ul class="rp-posts">';

			$popular = new WP_Query( array(
				'posts_per_page' => $num,
				'meta_key'       => 'popular_posts',
				'orderby'        => 'meta_value_num',
				'order'          => 'DESC',
				'category__in'   => $cats
			) );

			while ( $popular->have_posts() ) : $popular->the_post();

				echo'<li><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></li>';

			endwhile;

			wp_reset_postdata();

		echo'</ul>';

	return ob_get_clean();

}
