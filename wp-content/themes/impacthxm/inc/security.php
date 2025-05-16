<?php
/**
 * Security enhancements for ImpactHXM theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Remove WordPress version from various locations
 */
function impacthxm_remove_version_info() {
    return '';
}
add_filter('the_generator', 'impacthxm_remove_version_info');

/**
 * Disable XML-RPC
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Remove WordPress version from scripts and styles
 */
function impacthxm_remove_version_from_assets($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'impacthxm_remove_version_from_assets', 9999);
add_filter('script_loader_src', 'impacthxm_remove_version_from_assets', 9999);

/**
 * Disable file editing in WordPress admin
 */
if (!defined('DISALLOW_FILE_EDIT')) {
    define('DISALLOW_FILE_EDIT', true);
}

/**
 * Add security headers
 */
function impacthxm_add_security_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
        header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
        
        // Only add HSTS header if SSL is enabled
        if (is_ssl()) {
            header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
        }
    }
}
add_action('send_headers', 'impacthxm_add_security_headers');

/**
 * Prevent information disclosure on failed login
 */
function impacthxm_failed_login() {
    return __('Invalid credentials.', 'impacthxm');
}
add_filter('login_errors', 'impacthxm_failed_login');

/**
 * Block suspicious queries
 */
function impacthxm_block_suspicious_queries() {
    global $user_ID;
    
    if ($user_ID) {
        if (!current_user_can('administrator')) {
            if (
                strpos($_SERVER['REQUEST_URI'], 'author=') !== false ||
                strpos($_SERVER['REQUEST_URI'], 'author_name=') !== false
            ) {
                wp_die('Access denied', 'Access Denied', array('response' => 403));
            }
        }
    }
}
add_action('init', 'impacthxm_block_suspicious_queries');

/**
 * Add login security
 */
function impacthxm_check_failed_login($user, $username, $password) {
    if (!session_id()) {
        session_start();
    }

    $failed_login_limit = 3;
    $lockout_duration = 15 * 60; // 15 minutes
    $ip = $_SERVER['REMOTE_ADDR'];

    // Get the login attempts array
    $login_attempts = get_transient('failed_login_attempts');
    if (!is_array($login_attempts)) {
        $login_attempts = array();
    }

    // Check if IP is currently blocked
    if (isset($login_attempts[$ip]) && time() < $login_attempts[$ip]['lockout']) {
        $minutes_left = ceil(($login_attempts[$ip]['lockout'] - time()) / 60);
        return new WP_Error(
            'too_many_attempts',
            sprintf(
                __('Too many failed login attempts. Please try again in %d minutes.', 'impacthxm'),
                $minutes_left
            )
        );
    }

    // If this is a failed login
    if (is_wp_error($user)) {
        if (!isset($login_attempts[$ip])) {
            $login_attempts[$ip] = array(
                'attempts' => 0,
                'lockout' => 0
            );
        }

        $login_attempts[$ip]['attempts']++;

        if ($login_attempts[$ip]['attempts'] >= $failed_login_limit) {
            $login_attempts[$ip]['lockout'] = time() + $lockout_duration;
        }

        set_transient('failed_login_attempts', $login_attempts, 12 * HOUR_IN_SECONDS);
    } else {
        // Successful login, reset attempts
        if (isset($login_attempts[$ip])) {
            unset($login_attempts[$ip]);
            set_transient('failed_login_attempts', $login_attempts, 12 * HOUR_IN_SECONDS);
        }
    }

    return $user;
}
add_filter('authenticate', 'impacthxm_check_failed_login', 30, 3);

/**
 * Add nonce to logout links
 */
function impacthxm_logout_link($link) {
    if (strpos($link, 'action=logout') !== false) {
        $link = wp_nonce_url($link, 'log-out');
    }
    return $link;
}
add_filter('logout_url', 'impacthxm_logout_link');

/**
 * Disable user enumeration
 */
function impacthxm_disable_user_enumeration() {
    if (!is_admin() && isset($_REQUEST['author'])) {
        wp_die('Access denied', 'Access Denied', array('response' => 403));
    }
}
add_action('init', 'impacthxm_disable_user_enumeration');

/**
 * Add Content Security Policy
 */
function impacthxm_add_csp_headers() {
    if (!is_admin()) {
        $csp = array(
            "default-src 'self'",
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' *.googleapis.com *.gstatic.com",
            "style-src 'self' 'unsafe-inline' *.googleapis.com",
            "img-src 'self' data: *.googleapis.com *.gstatic.com",
            "font-src 'self' data: *.gstatic.com",
            "connect-src 'self'",
            "media-src 'self'",
            "object-src 'none'",
            "frame-src 'self'",
            "worker-src 'self'",
            "manifest-src 'self'"
        );
        
        header("Content-Security-Policy: " . implode('; ', $csp));
    }
}
add_action('send_headers', 'impacthxm_add_csp_headers');
