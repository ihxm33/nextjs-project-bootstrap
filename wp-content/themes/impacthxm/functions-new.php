<?php
/**
 * ImpactHXM functions and definitions
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * Theme Setup
 */
function impacthxm_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Register nav menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'impacthxm'),
        'footer-solutions' => esc_html__('Footer Solutions', 'impacthxm'),
        'footer-resources' => esc_html__('Footer Resources', 'impacthxm'),
        'footer-company' => esc_html__('Footer Company', 'impacthxm'),
        'footer-legal' => esc_html__('Footer Legal', 'impacthxm'),
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for full and wide align images
    add_theme_support('align-wide');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height' => 60,
        'width' => 200,
        'flex-width' => true,
        'flex-height' => true,
    ));

    // Add image sizes
    add_image_size('hero', 1920, 1080, true);
    add_image_size('card', 600, 400, true);
    add_image_size('testimonial', 120, 120, true);
    add_image_size('logo', 200, 100, false);
}
add_action('after_setup_theme', 'impacthxm_setup');

/**
 * Set the content width in pixels
 */
function impacthxm_content_width() {
    $GLOBALS['content_width'] = apply_filters('impacthxm_content_width', 1200);
}
add_action('after_setup_theme', 'impacthxm_content_width', 0);

/**
 * Enqueue scripts and styles
 */
function impacthxm_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style(
        'impacthxm-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@500;600;700&display=swap',
        array(),
        null
    );

    // Enqueue main stylesheet
    wp_enqueue_style(
        'impacthxm-style',
        get_stylesheet_uri(),
        array(),
        _S_VERSION
    );

    // Enqueue design system
    wp_enqueue_style(
        'impacthxm-design-system',
        get_template_directory_uri() . '/assets/css/design-system.css',
        array(),
        _S_VERSION
    );

    // Enqueue responsive styles
    wp_enqueue_style(
        'impacthxm-responsive',
        get_template_directory_uri() . '/assets/css/responsive.css',
        array(),
        _S_VERSION
    );

    // Enqueue main JavaScript file
    wp_enqueue_script(
        'impacthxm-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        _S_VERSION,
        true
    );

    // Localize script
    wp_localize_script('impacthxm-main', 'impacthxmSettings', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'themeUrl' => get_template_directory_uri(),
    ));
}
add_action('wp_enqueue_scripts', 'impacthxm_scripts');

/**
 * Register widget areas
 */
function impacthxm_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Blog Sidebar', 'impacthxm'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'impacthxm'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'impacthxm_widgets_init');

/**
 * Include required files
 */
$includes = array(
    '/inc/acf/init.php',              // ACF fields initialization
    '/inc/performance.php',           // Performance optimizations
    '/inc/security.php',              // Security enhancements
    '/inc/ui-enhancements.php',       // UI improvements
);

foreach ($includes as $file) {
    if (file_exists(get_template_directory() . $file)) {
        require_once get_template_directory() . $file;
    }
}

/**
 * Register Custom Post Types
 */
function impacthxm_register_post_types() {
    // Case Studies
    register_post_type('case-study', array(
        'labels' => array(
            'name' => __('Case Studies', 'impacthxm'),
            'singular_name' => __('Case Study', 'impacthxm'),
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-portfolio',
        'rewrite' => array('slug' => 'case-studies'),
    ));
}
add_action('init', 'impacthxm_register_post_types');

/**
 * Add custom image sizes to editor
 */
function impacthxm_custom_image_sizes($sizes) {
    return array_merge($sizes, array(
        'hero' => __('Hero Image', 'impacthxm'),
        'card' => __('Card Image', 'impacthxm'),
        'testimonial' => __('Testimonial Image', 'impacthxm'),
        'logo' => __('Logo', 'impacthxm'),
    ));
}
add_filter('image_size_names_choose', 'impacthxm_custom_image_sizes');

/**
 * Customize excerpt length
 */
function impacthxm_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'impacthxm_excerpt_length');

/**
 * Customize excerpt more
 */
function impacthxm_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'impacthxm_excerpt_more');

/**
 * Add custom body classes
 */
function impacthxm_body_classes($classes) {
    // Add page slug
    if (is_singular()) {
        global $post;
        $classes[] = 'page-' . $post->post_name;
    }

    return $classes;
}
add_filter('body_class', 'impacthxm_body_classes');
