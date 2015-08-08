<?php

$functions_includes = [
	'lib/init.php',
	'lib/assets.php',
	'lib/config.php',
	'lib/images.php'
];

foreach ($functions_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);


add_filter( 'query_vars', function( $query_vars ) {
	$query_vars[] = 'post_parent';
	return $query_vars;
});

