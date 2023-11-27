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


// Grobbels cooking guide categories shortcode
function grobbels_guide_categories() {
    // Query the terms from the 'guide_categories' taxonomy
    $args = array(
        'taxonomy' => 'guide_categories',
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
            $category_featured_image = get_field('guide_category_featured_image', 'guide_categories_' . $term->term_id);
            $category_label = get_field('guide_category_banner_label', 'guide_categories_' . $term->term_id);

            $output .= '<div class="category_box">';
            $output .= '<div class="category_box_left">';
            
            if (!empty($category_featured_image)) {
                $image_alt = get_post_meta(attachment_url_to_postid($category_featured_image), '_wp_attachment_image_alt', true);
                $output .= '<img src="' . esc_url($category_featured_image) . '" alt="' . esc_attr($image_alt) . '" />';
            }
            
            $output .= '</div>';
            $output .= '<div class="category_box_right">';
            $output .= '<h2><span>' . $category_label . '</span>' . $term->name . '</h2>';
            $output .= '<a href="' . get_term_link($term) . '" class="btn_view_products">View Instructions</a>';
            $output .= '</div>';
            $output .= '</div>';
        }
    } else {
        $output .= 'No cooking guide categories found.';
    }
    $output .= '</div>';

    return $output;
}
add_shortcode('grobbels_guide_categories', 'grobbels_guide_categories');


function grobbel_guide_single() {

    $output = '<div class="grobbels_guide_single">';

    // Directions Nav
    $output .= '
    <div class="guide_nav">
        <div class="guide_nav_item">
            <a href="#stove_top">
                <div class="guide_image_wrapper">
                    <img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-1.png" alt="Stove Top Icon"/>
                </div>
                <h2>Stove Top</h2>
                <span>Directions</span>
            </a>        
        </div>
        <div class="guide_nav_item">
            <a href="#oven">
                <div class="guide_image_wrapper">
                    <img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-2.png" alt="Oven Icon"/>
                </div>
                <h2>Oven</h2>
                <span>Directions</span>
            </a>        
        </div>
        <div class="guide_nav_item">
            <a href="#crock_pot">
                <div class="guide_image_wrapper">
                    <img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-3.png" alt="Crock Pot Icon"/>
                </div>
                <h2>Crock Pot</h2>
                <span>Directions</span>
            </a>        
        </div>
        <div class="guide_nav_item">
            <a href="#pressure">
                <div class="guide_image_wrapper">
                    <img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-4.png" alt="Pressure Icon"/>
                </div>
                <h2>Pressure</h2>
                <span>Directions</span>
            </a>        
        </div>
        <div class="guide_nav_item">
            <a href="#grill">
                <div class="guide_image_wrapper">
                    <img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-5.png" alt="Grill Icon"/>
                </div>
                <h2>Grill</h2>
                <span>Directions</span>
            </a>        
        </div>
        <div class="guide_nav_item">
            <a href="#smoker">
                <div class="guide_image_wrapper">
                    <img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-6.png" alt="Smoker Icon"/>
                </div>
                <h2>Smoker</h2>
                <span>Directions</span>
            </a>        
        </div>
        <div class="guide_nav_item">
            <a href="#air_fryer">
                <div class="guide_image_wrapper">
                    <img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-7.png" alt="Air Fryer Icon"/>
                </div>
                <h2>Air Fryer</h2>
                <span>Directions</span>
            </a>        
        </div>
    </div>';   


    // Stove Top directions
    if ($stove_top_directions = get_field('stove_top_directions')) {
        $output .= '<div class="guide_section_main" id="stove_top">';
        $output .= '<div class="guide_section_left">';
        $output .= '<img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-1.png" alt="Stove Icon"/>';
        $output .= '<h3>Stove Top</h3>';
        $output .= '<span>Directions</span>';
        $output .= '</div>';
        $output .= '<div class="guide_section_right">';
        $output .= $stove_top_directions;
        $output .= '</div>';
        $output .= '</div>';
    }

    // Oven directions
    if ($oven_directions = get_field('oven_directions')) {
        $output .= '<div class="guide_section_main" id="oven">';
        $output .= '<div class="guide_section_left">';
        $output .= '<img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-2.png" alt="Oven Icon"/>';
        $output .= '<h3>Oven</h3>';
        $output .= '<span>Directions</span>';
        $output .= '</div>';
        $output .= '<div class="guide_section_right">';
        $output .= $oven_directions;
        $output .= '</div>';
        $output .= '</div>';
    }

    // Crock Pot directions
    if ($crock_pot_directions = get_field('crock_pot_directions')) {
        $output .= '<div class="guide_section_main" id="crock_pot">';
        $output .= '<div class="guide_section_left">';
        $output .= '<img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-3.png" alt="Crock Pot Icon" />';
        $output .= '<h3>Crock Pot</h3>';
        $output .= '<span>Directions</span>';
        $output .= '</div>';
        $output .= '<div class="guide_section_right">';
        $output .= $crock_pot_directions;
        $output .= '</div>';
        $output .= '</div>';
    }

    // Pressure directions
    if ($pressure_directions = get_field('pressure_directions')) {
        $output .= '<div class="guide_section_main" id="pressure">';
        $output .= '<div class="guide_section_left">';
        $output .= '<img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-4.png" alt="Pressure Icon"/>';
        $output .= '<h3>Pressure</h3>';
        $output .= '<span>Directions</span>';
        $output .= '</div>';
        $output .= '<div class="guide_section_right">';
        $output .= $pressure_directions;
        $output .= '</div>';
        $output .= '</div>';
    }

    // Grill directions
    if ($grill_directions = get_field('grill_directions')) {
        $output .= '<div class="guide_section_main" id="grill">';
        $output .= '<div class="guide_section_left">';
        $output .= '<img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-5.png" alt="Grill Icon"/>';
        $output .= '<h3>Grill</h3>';
        $output .= '<span>Directions</span>';
        $output .= '</div>';
        $output .= '<div class="guide_section_right">';
        $output .= $grill_directions;
        $output .= '</div>';
        $output .= '</div>';
    }

    // Smoker directions
    if ($smoker_directions = get_field('smoker_directions')) {
        $output .= '<div class="guide_section_main" id="smoker">';
        $output .= '<div class="guide_section_left">';
        $output .= '<img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-6.png" alt="Smoker Icon" />';
        $output .= '<h3>Smoker</h3>';
        $output .= '<span>Directions</span>';
        $output .= '</div>';
        $output .= '<div class="guide_section_right">';
        $output .= $smoker_directions;
        $output .= '</div>';
        $output .= '</div>';
    }

    // Air Fryer directions
    if ($air_fryer_directions = get_field('air_fryer_directions')) {
        $output .= '<div class="guide_section_main" id="air_fryer">';
        $output .= '<div class="guide_section_left">';
        $output .= '<img src="' . get_site_url() . '/wp-content/uploads/2023/11/img-7.png" alt="Air Fryer Icon" />';
        $output .= '<h3>Air Fryer</h3>';
        $output .= '<span>Directions</span>';
        $output .= '</div>';
        $output .= '<div class="guide_section_right">';
        $output .= $air_fryer_directions;
        $output .= '</div>';
        $output .= '</div>';
    }

    $output .= '</div>';

    return $output;
}
add_shortcode('grobbel_guide_single', 'grobbel_guide_single');