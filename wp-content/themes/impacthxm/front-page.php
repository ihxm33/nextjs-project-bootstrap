<?php
/**
 * Template Name: Homepage
 * 
 * This is the template that displays the homepage.
 */

get_header(); ?>

<main id="primary" class="site-main">
    <?php
    // Hero Section
    $hero = get_field('hero_section');
    if ($hero): ?>
    <section class="hero bg-primary-dark text-white">
        <div class="container">
            <div class="hero__content animate-slide-up">
                <h1 class="hero__title">
                    <?php echo esc_html($hero['hero_title']); ?>
                </h1>
                <p class="hero__subtitle body-large">
                    <?php echo esc_html($hero['hero_subtitle']); ?>
                </p>
                <div class="hero__cta-group">
                    <?php if ($hero['hero_primary_cta']): ?>
                        <a href="<?php echo esc_url($hero['hero_primary_cta']['link']); ?>" class="btn btn-primary">
                            <?php echo esc_html($hero['hero_primary_cta']['text']); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($hero['hero_secondary_cta']): ?>
                        <a href="<?php echo esc_url($hero['hero_secondary_cta']['link']); ?>" class="btn btn-secondary">
                            <?php echo esc_html($hero['hero_secondary_cta']['text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Benefits Section
    $benefits = get_field('benefits_section');
    if ($benefits): ?>
    <section class="benefits bg-white">
        <div class="container">
            <h2 class="section-title text-center">
                <?php echo esc_html($benefits['title']); ?>
            </h2>
            <?php if ($benefits['benefits']): ?>
            <div class="grid benefits__grid">
                <?php foreach ($benefits['benefits'] as $benefit): ?>
                <div class="card card-feature animate-fade-in">
                    <h3 class="card__title">
                        <?php echo esc_html($benefit['title']); ?>
                    </h3>
                    <p class="card__description">
                        <?php echo esc_html($benefit['description']); ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Problems Section
    $problems = get_field('problems_section');
    if ($problems): ?>
    <section class="problems bg-gray-100">
        <div class="container">
            <h2 class="section-title text-center">
                <?php echo esc_html($problems['title']); ?>
            </h2>
            <?php if ($problems['problems']): ?>
            <div class="grid problems__grid">
                <?php foreach ($problems['problems'] as $problem): ?>
                <div class="card animate-fade-in">
                    <h3 class="card__title text-primary">
                        <?php echo esc_html($problem['title']); ?>
                    </h3>
                    <p class="card__description">
                        <?php echo esc_html($problem['solution']); ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Social Proof Section
    $social_proof = get_field('social_proof_section');
    if ($social_proof): ?>
    <section class="social-proof bg-white">
        <div class="container">
            <h2 class="section-title text-center">
                <?php echo esc_html($social_proof['title']); ?>
            </h2>
            <?php if ($social_proof['testimonial']): ?>
            <div class="card card-testimonial animate-fade-in">
                <blockquote class="testimonial">
                    <p class="testimonial__quote">
                        <?php echo esc_html($social_proof['testimonial']['quote']); ?>
                    </p>
                    <footer class="testimonial__author">
                        <cite>
                            <?php echo esc_html($social_proof['testimonial']['author']); ?>
                            <?php if ($social_proof['testimonial']['position']): ?>
                                <span class="testimonial__position">
                                    <?php echo esc_html($social_proof['testimonial']['position']); ?>
                                </span>
                            <?php endif; ?>
                        </cite>
                    </footer>
                </blockquote>
            </div>
            <?php endif; ?>

            <?php if ($social_proof['stats']): ?>
            <div class="stats-grid">
                <?php foreach ($social_proof['stats'] as $stat): ?>
                <div class="stat animate-fade-in">
                    <p class="stat__text">
                        <?php echo esc_html($stat['text']); ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // CTA Section
    $cta = get_field('cta_section');
    if ($cta): ?>
    <section class="cta bg-primary-dark text-white">
        <div class="container text-center">
            <h2 class="cta__title">
                <?php echo esc_html($cta['title']); ?>
            </h2>
            <p class="cta__description body-large">
                <?php echo esc_html($cta['description']); ?>
            </p>
            <div class="cta__button-wrapper">
                <a href="<?php echo esc_url($cta['button_link']); ?>" class="btn btn-primary">
                    <?php echo esc_html($cta['button_text']); ?>
                </a>
            </div>
            <?php if ($cta['secondary_text']): ?>
            <p class="cta__secondary-text">
                <?php echo esc_html($cta['secondary_text']); ?>
            </p>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
