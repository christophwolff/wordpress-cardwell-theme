<?php
namespace BR\WordPress\helper;

/**
 * Theme Setup
 *
 **/

add_action('after_setup_theme', '\BR\WordPress\helper\br_theme_setup');
function br_theme_setup(){
    load_theme_textdomain('br-theme', get_template_directory() . '/languages');
    add_theme_support( 'post-thumbnails' );

    /**
	 * Remove WP generator meta for security reason
	 */
	remove_action('wp_head', 'wp_generator');

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	register_nav_menus( array(
		'main_nav' => 'Main Navigation',
		'footer_nav' => 'Footer Navigation'
	) );

}

/**
 * Register widget area.
 *
 */
function br_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'br-medienexperten' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'br-medienexperten' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '\BR\WordPress\helper\br_widgets_init' );

/**
 * A Bootstrap Pagination
 *
 **/
function br_pagination() {
    global $wp_query;
    $big = 999999999;
    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?page=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_next' => false,
        'type' => 'array',
        'prev_next' => TRUE,
        'prev_text' => '<',
        'next_text' => '>',
            ));
    if (is_array($pages)) {
        $current_page = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<section><nav>';
        echo '<ul class="pagination">';
        foreach ($pages as $i => $page) {
        	$page = str_replace('page-numbers', 'page-link', $page);
            if ($current_page == 1 && $i == 0) {
                echo "<li class='page-item active'>$page</li>";
            } else {
                if ($current_page != 1 && $current_page == $i) {
                    echo "<li class='page-item active'>$page</li>";
                } else {
                    echo "<li class='page-item'>$page</li>";
                }
            }
        }
        echo '</ul>';
        echo '</nav></section>';
    }
}

/**
 * Remove URL Field from Comments Section
 *
 **/
function br_disable_comment_url( $fields ) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','\BR\WordPress\helper\br_disable_comment_url');

if ( ! function_exists( 'br_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function br_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = esc_attr( get_the_date( ) );

	$posted_on = sprintf(
		'<span>Veröffentlicht am ' . $time_string . '</span>'
	);

	$byline = sprintf(
		esc_html_x( 'von %s', 'post author', 'br-medienexperten' ),
		'<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author_meta('first_name')  ) . ' ' . esc_html( get_the_author_meta('last_name')  ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function br_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'br-medienexperten' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links">' . esc_html__( 'Kategorien %1$s', 'br-medienexperten' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'br-medienexperten' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Schlagworte %1$s', 'br-medienexperten' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	// if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
	// 	echo '<span class="comments-link">';
	// 	/* translators: %s: post title */
	// 	comments_popup_link( sprintf( wp_kses( __( '<span class="screen-reader-text">%s</span> kommentieren', 'br-medienexperten' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
	// 	echo '</span>';
	// }

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'br-medienexperten' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}

add_theme_support( 'align-wide' );

/**
 * undocumented function
 *
 * @return String
 * @author Christoph Wolff
 **/
function get_admin_avatar_url() {
	return get_avatar_url(1);
}
