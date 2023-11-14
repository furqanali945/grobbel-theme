<?php
/**
 * Add term meta fields to 'recipe_categories' taxonomy.
 */
function add_recipe_category_fields() {
    // Add 'Category Banner tag' field.
    register_term_meta('recipe_categories', 'category_banner_tag', array(
        'type' => 'string',
        'description' => 'Category Banner Tag',
        'single' => true,
        'show_in_rest' => false
    ));

     // Add 'Category Banner Title' field.
    register_term_meta('recipe_categories', 'category_banner_title', array(
        'type' => 'string',
        'description' => 'Category Banner Title',
        'single' => true,
        'show_in_rest' => false
    ));

    // Add 'Category Featured Image' field.
    register_term_meta('recipe_categories', 'category_featured_image', array(
        'type' => 'string',
        'description' => 'Recipe Category Featured Image URL',
        'single' => true,
        'show_in_rest' => false
    ));

    // Add 'Category Banner Image' field.
    register_term_meta('recipe_categories', 'category_banner_image', array(
        'type' => 'string',
        'description' => 'Recipe Category Banner Image URL',
        'single' => true,
        'show_in_rest' => false
    ));
}
add_action('init', 'add_recipe_category_fields');

/**
 * Display custom fields in the recipe term edit page.
 */
function display_recipe_category_fields($term) {

    // Get the 'Category Banner tag' value.
    $category_banner_title = get_term_meta($term->term_id, 'category_banner_title', true);

    // Get the 'Category Banner tag' value.
    $category_banner_tag = get_term_meta($term->term_id, 'category_banner_tag', true);

    // Get the 'Category Featured Image' value.
    $category_featured_image = get_term_meta($term->term_id, 'category_featured_image', true);

    // Get the 'Category Banner Image' value.
    $category_banner_image = get_term_meta($term->term_id, 'category_banner_image', true);

    ?>
    <tr class="form-field">
        <th scope="row"><label for="category_banner_title">Category Banner Title</label></th>
        <td>
            <input type="text" name="category_banner_title" id="category-banner-title" value="<?php echo esc_attr($category_banner_title); ?>" />
            <p class="description">Enter the text of the Category's banner title.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="category_banner_tag">Category Banner Tag</label></th>
        <td>
            <input type="text" name="category_banner_tag" id="category-banner-tag" value="<?php echo esc_attr($category_banner_tag); ?>" />
            <p class="description">Enter the text of the Category's banner tag.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="category_featured_image">Category Featured Image</label></th>
        <td>
            <input type="text" name="category_featured_image" id="category-featured-image" value="<?php echo esc_attr($category_featured_image); ?>" />
            <p class="description">Enter the URL of the category's featured image.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="category_banner_image">Category Banner Image</label></th>
        <td>
            <input type="text" name="category_banner_image" id="category-banner-image" value="<?php echo esc_attr($category_banner_image); ?>" />
            <p class="description">Enter the URL of the category's banner image.</p>
        </td>
    </tr>
    <?php
}
add_action('recipe_categories_edit_form_fields', 'display_recipe_category_fields');

/**
 * Display custom fields in the term add page.
 */
function display_recipe_category_add_fields() {
    ?>
    <div class="form-field">
        <label for="category-banner-tag">Category Banner Title</label>
        <input type="text" name="category_banner_title" id="category-banner-title" value="" />
        <p class="description">Enter the text of the Category's banner Title.</p>
    </div>
    <div class="form-field">
        <label for="category-banner-tag">Category Banner Tag</label>
        <input type="text" name="category_banner_tag" id="category-banner-tag" value="" />
        <p class="description">Enter the text of the Category's banner tag.</p>
    </div>
    <div class="form-field">
        <label for="category-featured-image">Category Featured Image</label>
        <input type="text" name="category_featured_image" id="category-featured-image" value="" />
        <p class="description">Enter the URL of the category's featured image.</p>
    </div>

    <div class="form-field">
        <label for="category-banner-image">Category Banner Image</label>
        <input type="text" name="category_banner_image" id="category-banner-image" value="" />
        <p class="description">Enter the URL of the category's Banner image.</p>
    </div>
    <?php
}

// Hooks for term add screens.
add_action('recipe_categories_add_form_fields', 'display_recipe_category_add_fields');

/**
 * Save custom fields when edited in the term edit page.
 */
function save_recipe_category_fields($term_id) {
    if (isset($_POST['category_banner_title'])) {
        $category_banner_title = sanitize_text_field($_POST['category_banner_title']);
        update_term_meta($term_id, 'category_banner_title', $category_banner_title);
    }
    if (isset($_POST['category_banner_tag'])) {
        $category_banner_tag = sanitize_text_field($_POST['category_banner_tag']);
        update_term_meta($term_id, 'category_banner_tag', $category_banner_tag);
    }
    if (isset($_POST['category_featured_image'])) {
        $category_featured_image = sanitize_text_field($_POST['category_featured_image']);
        update_term_meta($term_id, 'category_featured_image', $category_featured_image);
    }

    if (isset($_POST['category_banner_image'])) {
        $category_banner_image = sanitize_text_field($_POST['category_banner_image']);
        update_term_meta($term_id, 'category_banner_image', $category_banner_image);
    }
}
add_action('edited_recipe_categories', 'save_recipe_category_fields');
add_action('created_recipe_categories', 'save_recipe_category_fields');
