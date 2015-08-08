<?php

namespace AngularWP\Images;

function add_link( $html ){
	$html = preg_replace( '/(<a.*")>/', '$1 target="_self">', $html );
	return $html;
}

add_filter( 'images_send_to_editor', __NAMESPACE__ . '\\add_link', 10 );
