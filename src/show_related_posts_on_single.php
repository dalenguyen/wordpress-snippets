<?php

// Show related posts @ single post.

/**
 * Show random posts from the same categories as the current post.
 *
 * @return void
 */
function related_posts() {

	// current post id.
	$current_post_id = get_the_ID();

	$related = new WP_Query(
		array(
			'category__in'   => wp_get_post_categories( $current_post_id ),
			'posts_per_page' => 4,
			'orderby'        => 'rand',
			'post__not_in'   => array( $current_post_id ), // exclude current post.
		)
	);

	if ( $related->have_posts() ) {

		echo '<div class="all-related-posts">';

		while ( $related->have_posts() ) {
			$related->the_post();

			// entry div structure.
			echo '<div class="related-post-item">';
			echo '<div class="post-featured-image">';
			the_post_thumbnail( 'medium' );
			echo '</div>';
			echo '<h3 class="post-title">' . esc_html( get_the_title() ) . '</h3>';
			echo '<a href="' . esc_url( get_the_permalink() ) . '" class="button">Read More</a>';
			echo '</div>';

		}

		echo '</div>';

	} else {

		echo '<p>No related post found!!!</p>';

	}

	wp_reset_postdata();

}
