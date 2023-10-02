<?php
/**
 * This code will ensure that only the admin gets the registration email upon new user registration and not the user who is being created.
 *
 * @param array $wp_new_user_notification The notification list array.
 * @return array $wp_new_user_notification The modified notification list array.
 */
function prefix_wp_new_user_notification_email_cb( $wp_new_user_notification ) {

	$wp_new_user_notification['to'] = '';
	return $wp_new_user_notification;

}

add_filter( 'wp_new_user_notification_email', 'prefix_wp_new_user_notification_email_cb' );
