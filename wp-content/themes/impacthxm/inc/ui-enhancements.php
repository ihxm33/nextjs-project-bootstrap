<?php
/**
 * UI/UX enhancements for ImpactHXM theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add custom admin color scheme
 */
function impacthxm_admin_color_scheme() {
    wp_admin_css_color(
        'impacthxm',
        __('ImpactHXM', 'impacthxm'),
        admin_url("css/colors/midnight/colors.css"),
        array('#007bff', '#6c757d', '#212529', '#f8f9fa')
    );
}
add_action('admin_init', 'impacthxm_admin_color_scheme');

/**
 * Add smooth scroll behavior
 */
function impacthxm_add_smooth_scroll() {
    ?>
    <style>
        html {
            scroll-behavior: smooth;
        }
        @media screen and (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }
        }
    </style>
    <?php
}
add_action('wp_head', 'impacthxm_add_smooth_scroll');

/**
 * Add loading animation for page transitions
 */
function impacthxm_page_transition_styles() {
    ?>
    <style>
        .page-transition {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.98);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        .page-transition.active {
            opacity: 1;
            pointer-events: all;
        }
        .page-transition-spinner {
            width: 40px;
            height: 40px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <?php
}
add_action('wp_head', 'impacthxm_page_transition_styles');

/**
 * Add page transition HTML
 */
function impacthxm_page_transition_html() {
    ?>
    <div class="page-transition">
        <div class="page-transition-spinner"></div>
    </div>
    <?php
}
add_action('wp_footer', 'impacthxm_page_transition_html');

/**
 * Add page transition JavaScript
 */
function impacthxm_page_transition_script() {
    ?>
    <script>
    (function() {
        document.addEventListener('DOMContentLoaded', function() {
            const transition = document.querySelector('.page-transition');
            
            // Show transition on link clicks
            document.querySelectorAll('a:not([target="_blank"]):not([href^="#"]):not([href^="mailto:"]):not([href^="tel:"])').forEach(link => {
                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href && href.indexOf(window.location.origin) === 0) {
                        e.preventDefault();
                        transition.classList.add('active');
                        setTimeout(() => {
                            window.location = href;
                        }, 300);
                    }
                });
            });

            // Hide transition on page load
            window.addEventListener('load', function() {
                transition.classList.remove('active');
            });
        });
    })();
    </script>
    <?php
}
add_action('wp_footer', 'impacthxm_page_transition_script');

/**
 * Add intersection observer for animations
 */
function impacthxm_add_intersection_observer() {
    ?>
    <script>
    (function() {
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
            });
        }
    })();
    </script>
    <?php
}
add_action('wp_footer', 'impacthxm_add_intersection_observer');

/**
 * Add custom cursor styles
 */
function impacthxm_custom_cursor_styles() {
    ?>
    <style>
        .custom-cursor {
            width: 20px;
            height: 20px;
            border: 2px solid #007bff;
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            mix-blend-mode: difference;
            transition: transform 0.2s ease;
            transform: translate(-50%, -50%) scale(1);
        }
        .custom-cursor.hover {
            transform: translate(-50%, -50%) scale(1.5);
        }
        @media (hover: none) {
            .custom-cursor {
                display: none;
            }
        }
    </style>
    <?php
}
add_action('wp_head', 'impacthxm_custom_cursor_styles');

/**
 * Add custom cursor HTML and JavaScript
 */
function impacthxm_custom_cursor_script() {
    ?>
    <div class="custom-cursor"></div>
    <script>
    (function() {
        const cursor = document.querySelector('.custom-cursor');
        if (cursor && window.matchMedia('(hover: hover)').matches) {
            document.addEventListener('mousemove', e => {
                cursor.style.left = e.clientX + 'px';
                cursor.style.top = e.clientY + 'px';
            });

            document.querySelectorAll('a, button, input[type="submit"], .clickable').forEach(el => {
                el.addEventListener('mouseenter', () => cursor.classList.add('hover'));
                el.addEventListener('mouseleave', () => cursor.classList.remove('hover'));
            });
        }
    })();
    </script>
    <?php
}
add_action('wp_footer', 'impacthxm_custom_cursor_script');
