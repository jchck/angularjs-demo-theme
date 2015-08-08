<?php

$functions_includes = [
	'lib/assets.php',
	'lib/config.php'
];

foreach ($functions_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);


function my_add_link_target( $html ) {

	$html = preg_replace( '/(<a.*")>/', '$1 target="_self">', $html );
	return $html;
}
add_filter( 'image_send_to_editor', 'my_add_link_target', 10 );

add_filter( 'query_vars', function( $query_vars ) {
	$query_vars[] = 'post_parent';
	return $query_vars;
});

