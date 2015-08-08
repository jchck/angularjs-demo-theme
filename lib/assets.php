<?php

namespace AngularWP\Assets;

/**
*
* Angular scripts to install via bower:
* 1. angular.js
* 2. angular-route.js
* 3. angular-sanitize.js
*
**/


function scripts() {

	wp_register_script(
		'angularjs',
		get_stylesheet_directory_uri() . '/bower_components/angular/angular.min.js'
	);

	wp_register_script(
		'angularjs-route',
		get_stylesheet_directory_uri() . '/bower_components/angular-route/angular-route.min.js'
	);

	wp_register_script(
		'angularjs-sanitize',
		get_stylesheet_directory_uri() . '/bower_components/angular-sanitize/angular-sanitize.min.js'
	);

	wp_enqueue_script(
		'my-scripts',
		get_stylesheet_directory_uri() . '/js/scripts.js',
		array( 'angularjs', 'angularjs-route', 'angularjs-sanitize' )
	);

	wp_enqueue_script(
		'wp-service',
		get_stylesheet_directory_uri() . '/js/WPService.js'
	);

	wp_localize_script(
		'my-scripts',
		'myLocalized',
		array(
			'partials' => trailingslashit( get_template_directory_uri() ) . 'partials/'
			)
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\scripts' );