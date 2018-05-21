<?php
namespace BR\WordPress\cpts;

function br_cpt_project_init() {

  $labels01 = array(
    'name' => _x('Projekte', 'post type general name'),
    'singular_name' => _x('Projekt', 'post type singular name'),
    'add_new' => _x('Neues Projekt', 'Single'),
    'add_new_item' => __('Neues Projekt'),
    'edit_item' => __('Projekt bearbeiten'),
    'new_item' => __('Neues Projekt'),
    'all_items' => __('Alle Projekte'),
    'view_item' => __('Projekt anschauen'),
    'search_items' => __('Projekte suchen'),
    'not_found' =>  __('Keine Projekte gefunden'),
    'not_found_in_trash' => __('Keine Projeke im Mülleimer gefunden'),
    'parent_item_colon' => '',
    'menu_name' => __('Projekte')

  );
  $args01 = array(
    'labels' => $labels01,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array(
      'slug' => __('projekte'),
      "with_front" => false
    ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
	'menu_position' => 5,
	'show_in_rest' => true,
    'menu_icon' => 'dashicons-portfolio',
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
  );
  register_taxonomy( 'topic', 'project',
        array(
             'hierarchical' => true,
             'label' => __('Thema'),
			 'query_var' => 'topic',
			 'show_in_rest' => true,
             'rewrite' => array('slug' => __('thema') )
        )
    );
   register_taxonomy( 'keyword', 'project',
    array(
			'hierarchical' => false,
			'label' => __('Technologie'),
			'query_var' => 'keyword',
	 		'rewrite' => array(
      	'slug' => __('technologie'),
      	'with_front' => false
      ),
	 		'show_in_rest' => true
    )
   );
  register_post_type('project',$args01);

}

add_action( 'init', '\BR\WordPress\cpts\br_cpt_project_init' );

function br_cpt_log_init() {

  $labels01 = array(
    'name' => _x('Logs', 'post type general name'),
    'singular_name' => _x('Log', 'post type singular name'),
    'add_new' => _x('Neuen Log', 'Single'),
    'add_new_item' => __('Neuen Log'),
    'edit_item' => __('Log bearbeiten'),
    'new_item' => __('Neuen Log'),
    'all_items' => __('Alle Logs'),
    'view_item' => __('Log anschauen'),
    'search_items' => __('Logs suchen'),
    'not_found' =>  __('Keine Logs gefunden'),
    'not_found_in_trash' => __('Keine Logs im Mülleimer gefunden'),
    'parent_item_colon' => '',
    'menu_name' => __('Logs')

  );
  $args01 = array(
    'labels' => $labels01,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array(
      'slug' => __('logs'),
      "with_front" => false
    ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
	'menu_position' => 5,
	'show_in_rest' => true,
    'menu_icon' => 'dashicons-book',
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
  );
  register_post_type('logs',$args01);

}

add_action( 'init', '\BR\WordPress\cpts\br_cpt_log_init' );
