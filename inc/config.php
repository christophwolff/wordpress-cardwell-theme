<?php
namespace BR\WordPress\config;

/**
 * Register Scripts and Style
 */
function theme_register_scripts () {
	wp_enqueue_style('br-boilerplate-theme-css', mix('styles/theme.css'), null, null);
	wp_register_script('br-boilerplate-theme-js', mix('scripts/theme.js'), '', '', true);
    wp_register_script('br-boilerplate-turbolinks-js', mix('scripts/turbolinks.js'), '', '', false);
    wp_enqueue_script( 'br-boilerplate-turbolinks-js' );
    wp_register_script('br-boilerplate-typed-js', mix('scripts/vendor/typed.min.js'), '', '', false);
    wp_enqueue_script( 'br-boilerplate-typed-js' );
	wp_enqueue_script( 'br-boilerplate-theme-js' );
}


/**
* Enqueue block styles on frontend and in editor
*
*/
function cardwell_block_styles() {
   wp_enqueue_style( 'mytheme-blocks', mix('styles/blocks.css') );
}
add_action( 'enqueue_block_assets',  __NAMESPACE__ . '\\cardwell_block_styles' );

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	add_filter( 'tiny_mce_plugins', __NAMESPACE__ . '\\disable_emojis_tinymce');
}

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param    array  $plugins
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

if (!function_exists('mix')) {
    /**
     * Get the path to a versioned Mix file.
     * Check if we are in development or production
     * @param string $path
     */
    function mix($path)
    {
        static $manifest;
        $enviroment = WP_DEBUG ? '/dev' : '/dist';
        if (!$manifest) {
            if (!file_exists($manifestPath = get_template_directory(). $enviroment . '/mix-manifest.json')) {
            	echo "File Not Found";
            }
            $manifest = json_decode(file_get_contents($manifestPath), true);
        }
        $path = "/{$path}";
        return get_template_directory_uri(). $enviroment .$manifest[$path];
    }
}
