<?php
namespace BR\WordPress\BoilerplateTheme;

require_once 'inc/config.php';
require_once 'inc/helper.php';
require_once 'inc/cpts.php';
require_once 'inc/image-sizes.php';
require_once 'inc/custom-header.php';

add_action( 'wp_enqueue_scripts', '\BR\WordPress\config\theme_register_scripts', 1 );
add_action( 'init', '\BR\WordPress\config\disable_emojis' );

/**
 * Remove WP generator geta for security reason
 */
remove_action('wp_head', 'wp_generator');
