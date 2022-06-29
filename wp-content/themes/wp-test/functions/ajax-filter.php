<?php

add_action( 'wp_ajax_nopriv_my_filter_ajax', 'my_filter_ajax' );
add_action( 'wp_ajax_my_filter_ajax', 'my_filter_ajax' );

function my_filter_ajax() {

	$response = array(
		"posts"     => '',

	);

	wp_send_json( $response );

	wp_die();

}
