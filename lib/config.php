<?php

namespace AngularWP\Config;

/**
 * Enable theme features
 * 
 * Features provided by Soil plugin
 * @link https://github.com/roots/soil
 */
add_theme_support('soil-clean-up');         // Enable clean up from Soil
add_theme_support('soil-nav-walker');       // Enable cleaner nav walker from Soil
add_theme_support('soil-relative-urls');    // Enable relative URLs from Soil
add_theme_support('soil-nice-search');      // Enable nice search from Soil
//add_theme_support('soil-jquery-cdn');       // Enable to load jQuery from the Google CDN

/**
 * Configuration values
 */
if (!defined('WP_ENV')) {
  // Fallback if WP_ENV isn't defined in your WordPress config
  // Used in lib/assets.php to check for 'development' or 'production'
  define('WP_ENV', 'production');
}
if (!defined('DIST_DIR')) {
  // Path to the build directory for front-end assets
  define('DIST_DIR', '/dist/');
}

add_filter('show_admin_bar', '__return_false');
