<?php

//* List all authors of a blog grouped by first name with a single letter as a header character.

function list_authors_alphabetically() {

	$users = get_users( 'orderby=user_login&role=author' ); 

	$first_letter = '';

	foreach( $users as $user ) {

		$space = strpos( $user->user_login, ' ' );
		$letter = substr( $user->user_login, 0, 1 );
		$letter = strtoupper( $letter );
		
		if ( $letter != $first_letter ) {

			$first_letter = $letter;

			echo "<h4 id='ft_contrib_alphaletter_$first_letter'> $first_letter </h4>";

		}

		echo '<a href="' . get_author_posts_url( $user->ID, $user->user_nicename ) . '" title="' . $user->display_name . '">' . $user->display_name . '</a>';
		
		echo "<br>";
	}

}