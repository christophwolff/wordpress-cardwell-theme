<?php
namespace BR\WordPress\imageSizes;

add_image_size( '16-9-xxl', 3199, 1799, true);
add_image_size( '16-9-xl', 2400, 1350, true);
add_image_size( '16-9-lg', 1984, 1116, true);
add_image_size( '16-9-md', 1536, 864, true);
add_image_size( '16-9-sm', 1088, 612, true);
add_image_size( '16-9-xs', 640, 360, true);
add_image_size( '1-1-xxl', 800, 800, true);
add_image_size( '1-1-lg', 400, 400, true);
add_image_size( '1-1-xs', 200, 200, true);
add_image_size( 'project-xl', 2000, 1140, true);
add_image_size( 'project-lg', 1400, 842, true);


add_filter('jpeg_quality', function( $arg ) { return 80; });
