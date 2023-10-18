<?php
// Grobbels product categories shortcode
function grobbels_product_categories() {

	// Query the terms from the 'product_categories' taxonomy
    $args = array(
        'taxonomy' => 'product_categories',
        'hide_empty' => false, // Display empty terms
        'number' => 10,
    );

    $terms = get_terms($args);

	$output = '<div class="grobbels_category_main">';
    if (!empty($terms)) {
        foreach ($terms as $term) {
            $category_featured_image = get_term_meta($term->term_id, 'category_featured_image', true);
            $category_extra_image = get_term_meta($term->term_id, 'category_extra_image', true);

            $output .= '<div class="category_box">';
	            $output .= '<div class="category_box_left">';
		            if (!empty($category_featured_image)) {
		                $output .= '<img src="' . esc_url($category_featured_image) . '" />';
		            }
	            $output .= '</div>';
	            $output .= '<div class="category_box_right">';
		            $output .= '<h2>' . $term->name . '</h2>';
		            $output .= '<h3>PRODUCTS</h3>';
		            $output .= '<p>' . $term->description . '</p>';
		            if (!empty($category_extra_image)) {
		                $output .= '<img src="' . esc_url($category_extra_image) . '" />';
		            }
		            $output .= '<a href="' . get_term_link($term) . '" class="btn_view_products">View Products</a>';
	            $output .= '</div>';
            $output .= '</div>';
        }
    } else {
        $output .= 'No product categories found.';
    }
    $output .= '</div>';

	return $output;

}
add_shortcode( 'grobbels_product_categories', 'grobbels_product_categories' );