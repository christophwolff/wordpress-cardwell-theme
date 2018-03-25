<?php
namespace BR\WordPress\helper;

add_theme_support( 'custom-header' );
$args = array(
 'width'         => 1536,
 'height'        => 213,
 'default-image' => get_template_directory_uri() . '/resources/images/default_header.jpg',
 'uploads'       => true,
 );
 add_theme_support( 'custom-header', $args );
 
 register_default_headers( array(
    'default-image' => array(
        'url'           => get_template_directory_uri() . '/resources/images/default_header.jpg',
        'thumbnail_url' => get_template_directory_uri() . '/resources/images/default_header_thumbnail.jpg',
        'description'   => __( 'Default Header Image', 'textdomain' )
    ),
) );