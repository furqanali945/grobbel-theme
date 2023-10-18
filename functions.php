<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

// Include custom post types 
require get_stylesheet_directory() . '/inc/custom-post-types.php';

// Include custom taxonomies
require get_stylesheet_directory() . '/inc/taxonomies.php';

// Include term meta fields
require get_stylesheet_directory() . '/inc/term-meta-fields.php';

// Include shortcodes
require get_stylesheet_directory() . '/inc/shortcodes.php';


/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		3
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );