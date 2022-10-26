<?php

// Show related posts @ single post

function related_posts() {

	// current post id
	$current_post_id = get_the_ID();

	$related = new WP_Query(
		array(
			'category__in'   => wp_get_post_categories( $current_post_id ),
			'posts_per_page' => 4,
			'orderby'        => 'rand',
			'post__not_in'   => array( $current_post_id ) // exlcude currnet post
		)
	);

	if ( $related->have_posts() ) {

		echo '<div class="all-related-posts">';

			while ( $related->have_posts() ) {  $related->the_post();

				// related post data
				$post_id             = get_the_ID();
				$post_title          = get_the_title( $post_id );
				$post_permalink      = get_the_permalink( $post_id );
				$post_featured_image = get_the_post_thumbnail( $post_id, 'medium' );

				// entry div structure
				echo '<div class="related-post-item">';
					echo '<div class="post-featured-image">' . $post_featured_image . '</div>';
					echo '<h3 class="post-title">' . $post_title  . '</h3>';
					echo '<a href="' . $post_permalink . '" class="button">Read More</a>';
				echo '</div>';

			}

		echo '</div>';

	} else {

		echo '<p>No related post found!!!</p>';

	}

	wp_reset_postdata();

}
