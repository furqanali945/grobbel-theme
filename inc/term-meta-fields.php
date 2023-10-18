<?php

/**
 * Add term meta fields to 'product_categories' taxonomy.
 */
function add_product_category_fields() {
	// Add 'Category Featured Image' field.
	register_term_meta('product_categories', 'category_featured_image', array(
	    'type' => 'string',
	    'description' => 'Category Featured Image URL',
	    'single' => true,
	    'show_in_rest' => false
	));

	// Add 'Category Extra Image' field.
	register_term_meta('product_categories', 'category_extra_image', array(
	    'type' => 'string',
	    'description' => 'Category Extra Image URL',
	    'single' => true,
	    'show_in_rest' => false
	));
}
add_action('init', 'add_product_category_fields');

/**
 * Display custom fields in the term edit page.
 */
function display_product_category_fields($term) {
    // Get the 'Category Featured Image' value.
    $category_featured_image = get_term_meta($term->term_id, 'category_featured_image', true);

    // Get the 'Category Extra Image' value.
    $category_extra_image = get_term_meta($term->term_id, 'category_extra_image', true);
    ?>
    <tr class="form-field">
        <th scope="row"><label for="category_featured_image">Category Featured Image</label></th>
        <td>
            <input type="text" name="category_featured_image" id="category-featured-image" value="<?php echo esc_attr($category_featured_image); ?>" />
            <p class="description">Enter the URL of the category's featured image.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="category_extra_image">Category Extra Image</label></th>
        <td>
            <input type="text" name="category_extra_image" id="category-extra-image" value="<?php echo esc_attr($category_extra_image); ?>" />
            <p class "description">Enter the URL of the category's extra image.</p>
        </td>
    </tr>
    <?php
}
add_action('product_categories_edit_form_fields', 'display_product_category_fields');

/**
 * Display custom fields in the term add page.
 */
function display_product_category_add_fields() {
    ?>
    <div class="form-field">
        <label for="category-featured-image">Category Featured Image</label>
        <input type="text" name="category_featured_image" id="category-featured-image" value="" />
        <p class="description">Enter the URL of the category's featured image.</p>
    </div>
    <div class="form-field">
        <label for="category-extra-image">Category Extra Image</label>
        <input type="text" name="category_extra_image" id="category-extra-image" value="" />
        <p class="description">Enter the URL of the category's extra image.</p>
    </div>
    <?php
}

// Hooks for term add screens.
add_action('product_categories_add_form_fields', 'display_product_category_add_fields');

/**
 * Save custom fields when edited in the term edit page.
 */
function save_product_category_fields($term_id) {
    if (isset($_POST['category_featured_image'])) {
        $category_featured_image = sanitize_text_field($_POST['category_featured_image']);
        update_term_meta($term_id, 'category_featured_image', $category_featured_image);
    }

    if (isset($_POST['category_extra_image'])) {
        $category_extra_image = sanitize_text_field($_POST['category_extra_image']);
        update_term_meta($term_id, 'category_extra_image', $category_extra_image);
    }
}
add_action('edited_product_categories', 'save_product_category_fields');
add_action('created_product_categories', 'save_product_category_fields');
