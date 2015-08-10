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

class JsonManifest {
  private $manifest;

  public function __construct($manifest_path) {
    if (file_exists($manifest_path)) {
      $this->manifest = json_decode(file_get_contents($manifest_path), true);
    } else {
      $this->manifest = [];
    }
  }

  public function get() {
    return $this->manifest;
  }

  public function getPath($key = '', $default = null) {
    $collection = $this->manifest;
    if (is_null($key)) {
      return $collection;
    }
    if (isset($collection[$key])) {
      return $collection[$key];
    }
    foreach (explode('.', $key) as $segment) {
      if (!isset($collection[$segment])) {
        return $default;
      } else {
        $collection = $collection[$segment];
      }
    }
    return $collection;
  }
}

function asset_path($filename) {
  $dist_path = get_template_directory_uri() . DIST_DIR;
  $directory = dirname($filename) . '/';
  $file = basename($filename);
  static $manifest;

  if (empty($manifest)) {
    $manifest_path = get_template_directory() . DIST_DIR . 'assets.json';
    $manifest = new JsonManifest($manifest_path);
  }

  if (array_key_exists($file, $manifest->get())) {
    return $dist_path . $directory . $manifest->get()[$file];
  } else {
    return $dist_path . $directory . $file;
  }
}

function assets() {
  wp_enqueue_style('sage_css', asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('modernizr', asset_path('scripts/modernizr.js'), [], null, false);
  wp_enqueue_script('sage_js', asset_path('scripts/main.js'), ['jquery'], null, false);

  wp_enqueue_script( 'angular', get_template_directory_uri() . '/assets/scripts/scripts.js', [], null, false );

  wp_enqueue_script( 'wp_service', get_template_directory_uri() . '/assets/scripts/WPService.js', [], null, false );

  wp_localize_script('angular', 'localized', array('partials' => trailingslashit( get_template_directory_uri() ) . 'partials/'));
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\assets' );