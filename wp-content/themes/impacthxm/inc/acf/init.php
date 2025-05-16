<?php
/**
 * ACF Initialization and Configuration
 * Loads all ACF field groups and sets up necessary configurations
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class ImpactHXM_ACF {
    /**
     * Constructor
     */
    public function __construct() {
        // Load ACF field groups
        add_action('init', array($this, 'load_field_groups'), 20);

        // Configure ACF settings
        add_action('acf/init', array($this, 'configure_acf'));

        // Add options pages
        add_action('acf/init', array($this, 'add_options_pages'));

        // Set up JSON save/load points
        add_filter('acf/settings/save_json', array($this, 'set_json_save_point'));
        add_filter('acf/settings/load_json', array($this, 'set_json_load_point'));
    }

    /**
     * Load all ACF field group definitions
     */
    public function load_field_groups() {
        $field_groups = array(
            'homepage-fields.php',
            'theme-settings.php',
            'solutions-fields.php',
            'case-studies-fields.php',
            'contact-fields.php'
        );

        foreach ($field_groups as $group) {
            $file = get_template_directory() . '/inc/acf/' . $group;
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }

    /**
     * Configure ACF settings
     */
    public function configure_acf() {
        // Set Google Maps API key if needed
        // acf_update_setting('google_api_key', 'your-key-here');

        // Disable ACF menu item for non-admins
        if (!current_user_can('manage_options')) {
            add_filter('acf/settings/show_admin', '__return_false');
        }
    }

    /**
     * Add ACF options pages
     */
    public function add_options_pages() {
        if (function_exists('acf_add_options_page')) {
            // Main Theme Settings
            acf_add_options_page(array(
                'page_title' => 'Theme Settings',
                'menu_title' => 'Theme Settings',
                'menu_slug' => 'theme-settings',
                'capability' => 'edit_theme_options',
                'redirect' => false,
                'position' => '59.5',
                'icon_url' => 'dashicons-admin-customizer',
            ));

            // Sub-pages if needed
            acf_add_options_sub_page(array(
                'page_title' => 'Header Settings',
                'menu_title' => 'Header',
                'parent_slug' => 'theme-settings',
            ));

            acf_add_options_sub_page(array(
                'page_title' => 'Footer Settings',
                'menu_title' => 'Footer',
                'parent_slug' => 'theme-settings',
            ));

            acf_add_options_sub_page(array(
                'page_title' => 'Social Media Settings',
                'menu_title' => 'Social Media',
                'parent_slug' => 'theme-settings',
            ));
        }
    }

    /**
     * Set JSON save point for ACF fields
     */
    public function set_json_save_point($path) {
        $path = get_template_directory() . '/inc/acf/json';
        
        // Create directory if it doesn't exist
        if (!file_exists($path)) {
            wp_mkdir_p($path);
        }
        
        return $path;
    }

    /**
     * Set JSON load point for ACF fields
     */
    public function set_json_load_point($paths) {
        // Remove original path
        unset($paths[0]);

        // Append our custom path
        $paths[] = get_template_directory() . '/inc/acf/json';

        return $paths;
    }

    /**
     * Helper function to get an ACF field from options
     */
    public static function get_theme_option($field_name, $format_value = true) {
        if (function_exists('get_field')) {
            return get_field($field_name, 'option', $format_value);
        }
        return false;
    }

    /**
     * Helper function to get an ACF sub-field from options
     */
    public static function get_theme_sub_option($field_name, $parent_field, $format_value = true) {
        if (function_exists('get_field')) {
            $parent = get_field($parent_field, 'option', $format_value);
            return isset($parent[$field_name]) ? $parent[$field_name] : false;
        }
        return false;
    }
}

// Initialize the class
new ImpactHXM_ACF();

/**
 * Helper function to get theme options
 */
function impacthxm_get_theme_option($field_name, $format_value = true) {
    return ImpactHXM_ACF::get_theme_option($field_name, $format_value);
}

/**
 * Helper function to get theme sub-options
 */
function impacthxm_get_theme_sub_option($field_name, $parent_field, $format_value = true) {
    return ImpactHXM_ACF::get_theme_sub_option($field_name, $parent_field, $format_value);
}

/**
 * Ensure ACF is active before initializing fields
 */
function impacthxm_acf_admin_notice() {
    ?>
    <div class="notice notice-error">
        <p><?php _e('ImpactHXM theme requires Advanced Custom Fields PRO to function properly.', 'impacthxm'); ?></p>
    </div>
    <?php
}

if (!class_exists('ACF')) {
    add_action('admin_notices', 'impacthxm_acf_admin_notice');
    return;
}
