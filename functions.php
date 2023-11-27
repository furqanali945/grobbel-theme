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

// add scripts based on taxonomy
function add_script_to_footer_for_product_categories() {
    // Check if it's a 'product_categories' archive page
    if ( is_tax( 'product_categories' ) ) {
        // adding script to show no product message on the product archive page
        wp_enqueue_script(
            'custom-product-category-script',
            get_stylesheet_directory_uri() . '/assets/js/custom_product_archive.js', 
            array(), 
            '1.1', 
            true 
        );
    }
    // Check if it's a 'recipe_categories' archive page
    if ( is_tax( 'recipe_categories' ) ) {
        // adding script to show no recipe message on the recipe archive page
        wp_enqueue_script(
            'custom-recipe-category-script',
            get_stylesheet_directory_uri() . '/assets/js/custom_recipe_archive.js', 
            array(), 
            '1.1', 
            true 
        );
    }
    // Check if it's a 'guide_categories' archive page
    if ( is_tax( 'guide_categories' ) ) {
        // adding script to show no guide message on the guide archive page
        wp_enqueue_script(
            'custom-guide-category-script',
            get_stylesheet_directory_uri() . '/assets/js/custom_guide_archive.js', 
            array(), 
            '1.1', 
            true 
        );
    }
}
add_action('wp_enqueue_scripts', 'add_script_to_footer_for_product_categories');




