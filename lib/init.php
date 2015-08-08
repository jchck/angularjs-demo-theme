<?php

namespace AngularWP\Init;

function setup(){
	add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );