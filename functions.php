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

function add_current_nav_class( $classes, $item ) {

	// Getting the current post details
	global $post;

	// check if it's a post
	if ( empty( $post ) ) {
		return $classes;
	}

	// Getting the post type of the current post
	$current_post_type      = get_post_type_object( get_post_type( $post->ID ) );
	$current_post_type_slug = $current_post_type->rewrite['slug'];

	// Getting the post if the post type isn't a custom post type
	if ( is_null( $current_post_type_slug ) ) {
		if ( $current_post_type->name === 'post' ) {
			foreach ( explode( '/', $GLOBALS['wp_rewrite']->front ) as $front_url ) {
				if ( $front_url !== '' ) {
					// if slug is '/blog/tipps/' it will pick the first. In this case it's 'blog'
					$current_post_type_slug = $front_url;
					break;
				}
			}
		}
	}

	// Getting the URL of the menu item
	$menu_slug = strtolower( trim( $item->url ) );

	// If the menu item URL contains the current post types slug add the current-menu-item class
	if ( strpos( $menu_slug, $current_post_type_slug ) !== false ) {
		$classes[] = 'current-menu-item';
	} else {
		$classes = array_diff( $classes, [ 'current_page_parent' ] );
	}

	// Return the corrected set of classes to be added to the menu item
	return $classes;

}

add_action( 'nav_menu_css_class',  __NAMESPACE__ . '\\add_current_nav_class', 10, 2 );
