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
        	$category_featured_image = get_field('category_featured_image_1', 'product_categories_' . $term->term_id);
            $category_extra_image = get_field('category_extra_image_1', 'product_categories_' . $term->term_id);

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


// Grobbels recipe categories shortcode
function grobbels_recipe_categories() {
    // Query the terms from the 'recipe_categories' taxonomy
    $args = array(
        'taxonomy' => 'recipe_categories',
        'hide_empty' => false, // Display empty terms
        'number' => 10,
        'orderby' => 'ID',
        'order' => 'ASC',
    );

    $terms = get_terms($args);

    $output = '<div class="grobbels_category_main grobbels_recipe_main">';
    
    if (!empty($terms)) {
        foreach ($terms as $term) {
            // Use ACF functions to retrieve custom field values
            $category_featured_image = get_field('category_featured_image_1', 'recipe_categories_' . $term->term_id);

            $output .= '<div class="category_box">';
            $output .= '<div class="category_box_left">';
            
            if (!empty($category_featured_image)) {
                $image_alt = get_post_meta(attachment_url_to_postid($category_featured_image), '_wp_attachment_image_alt', true);
                $output .= '<img src="' . esc_url($category_featured_image) . '" alt="' . esc_attr($image_alt) . '" />';
            }
            
            $output .= '</div>';
            $output .= '<div class="category_box_right">';
            $output .= '<h2>' . $term->name . '</h2>';
            $output .= '<p>' . $term->description . '</p>';
            $output .= '<a href="' . get_term_link($term) . '" class="btn_view_products">View Recipes</a>';
            $output .= '</div>';
            $output .= '</div>';
        }
    } else {
        $output .= 'No recipe categories found.';
    }
    $output .= '</div>';

    return $output;
}
add_shortcode('grobbels_recipe_categories', 'grobbels_recipe_categories');