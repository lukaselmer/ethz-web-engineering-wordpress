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
    add_theme_support('custom-header', array('width' => 2560, 'height' => 64, 'uploads' => true,
        'default-text-color' => '333333', 'default-image' => get_template_directory_uri() . '/images/header.jpg',));
}

add_action('after_setup_theme', 'eth_theme_setup');


function eth_customize_register($wp_customize) {
    function add_color_option($wp_customize, $key, $default) {
        $name = ucwords(str_replace('_', ' ', $key));
        $wp_customize->add_setting($key, array('default' => $default, 'transport' => 'refresh',));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $key,
            array('label' => __($name, 'eth'), 'section' => 'colors', 'settings' => $key)));
    }

    add_color_option($wp_customize, 'menu_top_color', '#ffc45e');
    add_color_option($wp_customize, 'menu_left_color', '#ffc45e');
    add_color_option($wp_customize, 'menu_right_color', '#ffc45e');
    add_color_option($wp_customize, 'box_center_color', '#ffc45e');
    add_color_option($wp_customize, 'box_center_inner_color', '#ebebeb');
    add_color_option($wp_customize, 'article_text_color', '#0b0b0b');
    add_color_option($wp_customize, 'footer_text_color', '#999999');
}

add_action('customize_register', 'eth_customize_register');

function eth_customize_css() {
    ?>
    <style type="text/css">
        h1 a, header .description { color: <?php echo "#" . get_header_textcolor() ?>; }
        nav.menu-left { background: <?php echo get_theme_mod('menu_left_color'); ?>; }
        nav.menu-top ul li { background: <?php echo get_theme_mod('menu_top_color'); ?>; }
        .right-content .content-box { background: <?php echo get_theme_mod('menu_right_color'); ?>; }
        .main-content.content-box { background: <?php echo get_theme_mod('box_center_color'); ?> !important; }
        .main-content.content-box > article { background: <?php echo get_theme_mod('box_center_inner_color'); ?> !important; }
        article { color: <?php echo get_theme_mod('article_text_color'); ?>; }
        footer, footer a { color: <?php echo get_theme_mod('footer_text_color'); ?>; }
    </style>
<?php
}

add_action('wp_head', 'eth_customize_css');

// TODO: remove this for production (I guess...)
flush_rewrite_rules(true);

//metabox
function cd_meta_box_add()
{
    add_meta_box( 'my-meta-box-id', 'ThyHotel Page Attributes', 'cd_meta_box_cb', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'cd_meta_box_add' );

function cd_meta_box_cb()
{
    $values = get_post_custom( $post->ID );
    $selected = isset( $values['sidebar'] ) ? esc_attr( $values['sidebar'][0] ) : ”;
    ?>     
    <p>
        <label for="my_meta_box_select">Sidebar</label>
        <select name="my_meta_box_select" id="my_meta_box_select">
            <option value="random" <?php selected( $selected, 'random' ); ?>>Random</option>
            <option value="reviews" <?php selected( $selected, 'reviews' ); ?>>Reviews</option>
            <option value="reviewers" <?php selected( $selected, 'reviewers' ); ?>>Reviewers</option>
        </select>
    </p>
    <?php 
}

add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
      
    if( isset( $_POST['my_meta_box_select'] ) )
        update_post_meta( $post_id, 'sidebar', esc_attr( $_POST['my_meta_box_select'] ) );
}
?>