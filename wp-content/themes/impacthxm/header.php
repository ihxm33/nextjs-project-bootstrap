<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary">
        <?php esc_html_e('Skip to content', 'impacthxm'); ?>
    </a>

    <header id="masthead" class="site-header">
        <div class="header-top bg-primary-dark text-white">
            <div class="container">
                <?php
                $company_info = impacthxm_get_theme_option('company_info');
                if ($company_info && !empty($company_info['company_phone'])): ?>
                    <div class="contact-info">
                        <a href="tel:<?php echo esc_attr($company_info['company_phone']); ?>" class="text-white">
                            <?php echo esc_html($company_info['company_phone']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="header-main">
            <div class="container">
                <div class="header-content">
                    <div class="site-branding">
                        <?php
                        if (has_custom_logo()):
                            the_custom_logo();
                        else: ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h1>
                        <?php endif; ?>
                    </div>

                    <nav id="site-navigation" class="main-navigation">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                            <span class="screen-reader-text"><?php esc_html_e('Menu', 'impacthxm'); ?></span>
                            <span class="menu-icon"></span>
                        </button>

                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_id' => 'primary-menu',
                            'container_class' => 'primary-menu-container',
                            'menu_class' => 'primary-menu',
                        ));
                        ?>
                    </nav>

                    <?php
                    $header_settings = impacthxm_get_theme_option('header_settings');
                    if ($header_settings && !empty($header_settings['header_cta_text'])): ?>
                        <div class="header-cta">
                            <a href="<?php echo esc_url($header_settings['header_cta_link']); ?>" class="btn btn-primary">
                                <?php echo esc_html($header_settings['header_cta_text']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if (is_front_page() || is_singular('case-study') || is_page_template('templates/template-solution.php')): ?>
            <div class="header-banner bg-primary-dark text-white">
                <div class="container">
                    <?php if (is_front_page()): ?>
                        <?php
                        $hero = get_field('hero_section');
                        if ($hero): ?>
                            <div class="banner-content">
                                <h1 class="banner-title animate-slide-up">
                                    <?php echo esc_html($hero['hero_title']); ?>
                                </h1>
                                <p class="banner-subtitle body-large animate-fade-in">
                                    <?php echo esc_html($hero['hero_subtitle']); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    <?php elseif (is_singular('case-study')): ?>
                        <div class="banner-content">
                            <h1 class="banner-title animate-slide-up"><?php the_title(); ?></h1>
                        </div>
                    <?php elseif (is_page_template('templates/template-solution.php')): ?>
                        <?php
                        $solution_hero = get_field('solution_hero');
                        if ($solution_hero): ?>
                            <div class="banner-content">
                                <h1 class="banner-title animate-slide-up">
                                    <?php echo esc_html($solution_hero['headline']); ?>
                                </h1>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </header>

    <div id="content" class="site-content">
