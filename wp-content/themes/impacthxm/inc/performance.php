<?php
/**
 * Performance optimizations for ImpactHXM theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Optimize WordPress performance
 */
function impacthxm_performance_optimizations() {
    // Remove unnecessary meta tags
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

    // Disable emoji support if not needed
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    // Disable XML-RPC
    add_filter('xmlrpc_enabled', '__return_false');

    // Remove REST API links if not needed
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('template_redirect', 'rest_output_link_header', 11);
}
add_action('init', 'impacthxm_performance_optimizations');

/**
 * Add preload for critical assets
 */
function impacthxm_add_preload_tags() {
    ?>
    <link rel="preload" href="<?php echo esc_url(get_theme_file_uri('assets/fonts/inter-var.woff2')); ?>" as="font" type="font/woff2" crossorigin>
    <?php
}
add_action('wp_head', 'impacthxm_add_preload_tags', 1);

/**
 * Defer non-critical CSS and JavaScript
 */
function impacthxm_defer_non_critical_assets($tag, $handle) {
    // Don't defer these scripts
    $critical_scripts = array('jquery', 'impacthxm-script');
    
    if (is_admin() || in_array($handle, $critical_scripts)) {
        return $tag;
    }

    // Add defer attribute to script tags
    if (strpos($tag, '<script') !== false) {
        return str_replace(' src=', ' defer src=', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'impacthxm_defer_non_critical_assets', 10, 2);

/**
 * Enable gzip compression
 */
function impacthxm_enable_compression() {
    if (extension_loaded('zlib') && !headers_sent() && !in_array('ob_gzhandler', ob_list_handlers())) {
        ob_start('ob_gzhandler');
    }
}
add_action('init', 'impacthxm_enable_compression');

/**
 * Add browser caching headers
 */
function impacthxm_add_caching_headers() {
    if (!is_admin()) {
        header('Expires: '.gmdate('D, d M Y H:i:s', time() + 3600*24*7).' GMT');
        header('Cache-Control: public, max-age=' . (3600 * 24 * 7));
    }
}
add_action('send_headers', 'impacthxm_add_caching_headers');

/**
 * Lazy load images
 */
function impacthxm_lazy_load_images($content) {
    if (is_admin() || empty($content)) {
        return $content;
    }

    // Replace src with data-src for images
    $content = preg_replace('/<img(.*?)src=/i', '<img$1src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src=', $content);
    $content = preg_replace('/<img(.*?)class="/i', '<img$1class="lazyload ', $content);
    $content = preg_replace('/<img(.*?)(?<!class=)([\s>])/i', '<img$1 class="lazyload"$2', $content);

    return $content;
}
add_filter('the_content', 'impacthxm_lazy_load_images');

/**
 * Add image dimensions to prevent layout shifts
 */
function impacthxm_add_image_dimensions($content) {
    if (is_admin() || empty($content)) {
        return $content;
    }

    preg_match_all('/<img[^>]+>/i', $content, $images);

    foreach ($images[0] as $image) {
        if (strpos($image, ' width=') === false || strpos($image, ' height=') === false) {
            preg_match('/src="([^"]*)"/i', $image, $src);
            if (!empty($src[1])) {
                $dimensions = getimagesize($src[1]);
                if ($dimensions) {
                    $new_image = str_replace('<img', '<img width="'.$dimensions[0].'" height="'.$dimensions[1].'"', $image);
                    $content = str_replace($image, $new_image, $content);
                }
            }
        }
    }

    return $content;
}
add_filter('the_content', 'impacthxm_add_image_dimensions');

/**
 * Minify HTML output
 */
function impacthxm_minify_html($buffer) {
    if (!is_admin() && !is_feed() && !is_robots() && !is_trackback()) {
        // Remove comments (except IE tags)
        $buffer = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $buffer);
        
        // Remove whitespace
        $buffer = str_replace(array("\n", "\r", "\t"), '', $buffer);
        $buffer = preg_replace('/\s+/', ' ', $buffer);
        
        return $buffer;
    }
    return $buffer;
}
add_action('template_redirect', function() {
    ob_start('impacthxm_minify_html');
});
