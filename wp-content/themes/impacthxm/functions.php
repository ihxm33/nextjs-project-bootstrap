<?php
/**
 * ImpactHXM Theme functions and definitions
 */

if (!defined('ABSPATH')) {
    exit;
}

// Include theme files
require_once get_template_directory() . '/inc/acf/init.php';
require_once get_template_directory() . '/inc/performance.php';
require_once get_template_directory() . '/inc/ui-enhancements.php';
require_once get_template_directory() . '/inc/security.php';

// Set memory limit
if (function_exists('wp_raise_memory_limit')) {
    wp_raise_memory_limit('admin');
}

// Set max execution time
if (!in_array(ini_get('disable_functions'), array('set_time_limit', 'ini_set'))) {
    set_time_limit(120);
    ini_set('max_execution_time', '120');
}

// Theme Setup
function impacthxm_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add support for block styles
    add_theme_support('wp-block-styles');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register nav menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'impacthxm'),
        'footer'  => esc_html__('Footer Menu', 'impacthxm'),
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for full and wide align images
    add_theme_support('align-wide');

    // Add support for custom color palette
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => esc_html__('Primary', 'impacthxm'),
            'slug'  => 'primary',
            'color' => '#007bff',
        ),
        array(
            'name'  => esc_html__('Secondary', 'impacthxm'),
            'slug'  => 'secondary',
            'color' => '#6c757d',
        ),
        array(
            'name'  => esc_html__('Dark', 'impacthxm'),
            'slug'  => 'dark',
            'color' => '#212529',
        ),
        array(
            'name'  => esc_html__('Light', 'impacthxm'),
            'slug'  => 'light',
            'color' => '#f8f9fa',
        ),
    ));
}
add_action('after_setup_theme', 'impacthxm_setup');

// Enqueue scripts and styles
function impacthxm_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('impacthxm-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null);

    // Enqueue theme stylesheets
    wp_enqueue_style('impacthxm-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('impacthxm-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array('impacthxm-style'), '1.0.0');

    // Enqueue custom JavaScript
    wp_enqueue_script('impacthxm-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);

    // Add custom JavaScript variables
    wp_localize_script('impacthxm-script', 'impacthxmData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('impacthxm-nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'impacthxm_scripts');

// Register Custom Post Types
function impacthxm_register_post_types() {
    // Solutions Post Type
    register_post_type('solution', array(
        'labels' => array(
            'name'               => __('Solutions', 'impacthxm'),
            'singular_name'      => __('Solution', 'impacthxm'),
            'add_new'           => __('Add New Solution', 'impacthxm'),
            'add_new_item'      => __('Add New Solution', 'impacthxm'),
            'edit_item'         => __('Edit Solution', 'impacthxm'),
            'new_item'          => __('New Solution', 'impacthxm'),
            'view_item'         => __('View Solution', 'impacthxm'),
            'search_items'      => __('Search Solutions', 'impacthxm'),
            'not_found'         => __('No solutions found', 'impacthxm'),
            'not_found_in_trash'=> __('No solutions found in trash', 'impacthxm'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-networking',
        'show_in_rest'        => true,
        'menu_position'       => 20,
        'rewrite'            => array('slug' => 'solutions'),
    ));

    // Insights Post Type
    register_post_type('insight', array(
        'labels' => array(
            'name'               => __('Insights', 'impacthxm'),
            'singular_name'      => __('Insight', 'impacthxm'),
            'add_new'           => __('Add New Insight', 'impacthxm'),
            'add_new_item'      => __('Add New Insight', 'impacthxm'),
            'edit_item'         => __('Edit Insight', 'impacthxm'),
            'new_item'          => __('New Insight', 'impacthxm'),
            'view_item'         => __('View Insight', 'impacthxm'),
            'search_items'      => __('Search Insights', 'impacthxm'),
            'not_found'         => __('No insights found', 'impacthxm'),
            'not_found_in_trash'=> __('No insights found in trash', 'impacthxm'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-lightbulb',
        'show_in_rest'        => true,
        'menu_position'       => 21,
        'rewrite'            => array('slug' => 'insights'),
    ));
}
add_action('init', 'impacthxm_register_post_types');

// Register Custom Taxonomies
function impacthxm_register_taxonomies() {
    // Insight Categories
    register_taxonomy('insight_category', 'insight', array(
        'labels' => array(
            'name'          => __('Categories', 'impacthxm'),
            'singular_name' => __('Category', 'impacthxm'),
        ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => array('slug' => 'insight-category'),
    ));
}
add_action('init', 'impacthxm_register_taxonomies');

// ACF Options Page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));
}

// Add custom image sizes
add_image_size('solution-thumbnail', 600, 400, true);
add_image_size('insight-thumbnail', 400, 300, true);

// Disable Gutenberg editor for certain templates
function impacthxm_disable_gutenberg($is_enabled, $post_type) {
    if ($post_type === 'page') {
        $template = get_page_template_slug(get_the_ID());
        if ($template === 'templates/homepage.php') {
            return false;
        }
    }
    return $is_enabled;
}
add_filter('use_block_editor_for_post_type', 'impacthxm_disable_gutenberg', 10, 2);

// Add custom body classes
function impacthxm_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    return $classes;
}
add_filter('body_class', 'impacthxm_body_classes');
