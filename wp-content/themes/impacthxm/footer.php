<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 */
?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer bg-primary-dark text-white">
        <div class="container footer-widgets">
            <div class="footer-widgets__row grid">
                <?php if (has_nav_menu('footer-solutions')): ?>
                <nav class="footer-menu footer-menu--solutions" aria-label="<?php esc_attr_e('Footer Solutions Menu', 'impacthxm'); ?>">
                    <h2 class="footer-menu__title"><?php esc_html_e('Solutions', 'impacthxm'); ?></h2>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-solutions',
                        'menu_class' => 'footer-menu__list',
                        'container' => false,
                    ));
                    ?>
                </nav>
                <?php endif; ?>

                <?php if (has_nav_menu('footer-resources')): ?>
                <nav class="footer-menu footer-menu--resources" aria-label="<?php esc_attr_e('Footer Resources Menu', 'impacthxm'); ?>">
                    <h2 class="footer-menu__title"><?php esc_html_e('Resources', 'impacthxm'); ?></h2>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-resources',
                        'menu_class' => 'footer-menu__list',
                        'container' => false,
                    ));
                    ?>
                </nav>
                <?php endif; ?>

                <?php if (has_nav_menu('footer-company')): ?>
                <nav class="footer-menu footer-menu--company" aria-label="<?php esc_attr_e('Footer Company Menu', 'impacthxm'); ?>">
                    <h2 class="footer-menu__title"><?php esc_html_e('Company', 'impacthxm'); ?></h2>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-company',
                        'menu_class' => 'footer-menu__list',
                        'container' => false,
                    ));
                    ?>
                </nav>
                <?php endif; ?>

                <div class="footer-contact">
                    <?php
                    $company_info = impacthxm_get_theme_option('company_info');
                    if ($company_info):
                    ?>
                    <h2 class="footer-contact__title"><?php esc_html_e('Contact Us', 'impacthxm'); ?></h2>
                    <address class="footer-contact__address">
                        <?php if (!empty($company_info['company_name'])): ?>
                            <div><?php echo esc_html($company_info['company_name']); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($company_info['company_phone'])): ?>
                            <div><a href="tel:<?php echo esc_attr($company_info['company_phone']); ?>" class="text-white"><?php echo esc_html($company_info['company_phone']); ?></a></div>
                        <?php endif; ?>
                        <?php if (!empty($company_info['company_email'])): ?>
                            <div><a href="mailto:<?php echo esc_attr($company_info['company_email']); ?>" class="text-white"><?php echo esc_html($company_info['company_email']); ?></a></div>
                        <?php endif; ?>
                        <?php if (!empty($company_info['company_address'])): ?>
                            <div><?php echo nl2br(esc_html($company_info['company_address'])); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($company_info['company_address_2'])): ?>
                            <div><?php echo nl2br(esc_html($company_info['company_address_2'])); ?></div>
                        <?php endif; ?>
                    </address>
                    <?php endif; ?>

                    <?php
                    $social_links = impacthxm_get_theme_option('social_links');
                    if ($social_links):
                    ?>
                    <div class="footer-social-links">
                        <?php if (!empty($social_links['linkedin'])): ?>
                            <a href="<?php echo esc_url($social_links['linkedin']); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="social-link linkedin">LinkedIn</a>
                        <?php endif; ?>
                        <?php if (!empty($social_links['facebook'])): ?>
                            <a href="<?php echo esc_url($social_links['facebook']); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="social-link facebook">Facebook</a>
                        <?php endif; ?>
                        <?php if (!empty($social_links['instagram'])): ?>
                            <a href="<?php echo esc_url($social_links['instagram']); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="social-link instagram">Instagram</a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="site-info bg-gray-900 text-gray-400">
            <div class="container">
                <?php
                $footer_settings = impacthxm_get_theme_option('footer_settings');
                if ($footer_settings && !empty($footer_settings['footer_legal_text'])):
                    echo wp_kses_post(wpautop($footer_settings['footer_legal_text']));
                else:
                    ?>
                    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                <?php endif; ?>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
