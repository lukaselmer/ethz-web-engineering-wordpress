<?php

register_nav_menu('top', 'Top Menu');
register_nav_menu('left', 'Left Menu');

add_theme_support('post-thumbnails');


function create_reviewer_post_type() {
    register_post_type('reviewer',
        array(
            'labels' => array(
                'name' => __('Reviewers'),
                'singular_name' => __('Reviewer'),
                'add_new' => __('Add new reviewer'),
                'add_new_item' => __('Add new reviewer'),
                'edit_item' => __('Add new reviewer'),
                'new_item' => __('New reviewer'),
                'view_item' => __('View reviewer'),
                'search_items' => __('Search reviewer'),
                'not_found' => __('No reviewers found'),
                'not_found_in_trash' => __('No reviewers found in trash'),
                'parent_item_colon' => ''
            ),
            'description' => 'The reviewers of the reviewed items.',
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'reviewers'),
            'supports' => array('title', 'thumbnail'),
            'publicly_queryable' => false,
        )
    );
}

//flush_rewrite_rules(true);
add_action('init', 'create_reviewer_post_type');


function admin_init() {
    add_meta_box("prodInfo-meta", "Reviewer Options", "reviewer_meta_options", "reviewer", "normal", "high");
}

function reviewer_meta_options() {
    global $post;
    $custom = get_post_custom($post->ID);
    ?>
    <style>
        .opt-admin-custom label {
            display: block;
            margin: 10px 0 0 0;
        }
    </style>
    <div class="opt-admin-custom">
        <label for="subtitle">Title:</label>
        <input id="subtitle" name="title" value="<?php echo $custom["title"][0]; ?>"/>
    </div>

    <div class="opt-admin-custom">
        <label for="role">Role*:</label>
        <input id="role" required name="role" value="<?php echo $custom["role"][0]; ?>"/>
    </div>

    <div class="opt-admin-custom">
        <label for="cite">Cite*:</label>
        <input id="cite" required name="cite" value="<?php echo $custom["cite"][0]; ?>"/>
    </div>

    <div class="opt-admin-custom">
        <label for="relevance">Relevance*:</label>
        <input id="relevance" type="number" required name="relevance" value="<?php echo $custom["relevance"][0]; ?>"/>
    </div>
<?php
}

function save_reviewer_meta_options() {
    global $post;

    if (isset($_POST["relevance"]))
        update_post_meta($post->ID, "relevance", intval($_POST["relevance"]));

    foreach (array("title", "role", "cite") as $val)
        if (isset($_POST[$val]))
            update_post_meta($post->ID, $val, $_POST[$val]);
}

add_action('admin_init', 'admin_init');
add_action('save_post', 'save_reviewer_meta_options');


function eth_theme_setup() {
    add_theme_support('custom-background', array('default-color' => 'ebebeb',));
}

add_action('after_setup_theme', 'eth_theme_setup');
