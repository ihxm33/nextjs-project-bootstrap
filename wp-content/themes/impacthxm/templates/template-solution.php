<?php
/**
 * Template Name: Solution Page
 * 
 * This is the template that displays solution pages.
 */

get_header(); ?>

<main id="primary" class="site-main">
    <?php
    // Hero Section
    $hero = get_field('solution_hero');
    if ($hero): ?>
    <section class="hero bg-primary-dark text-white">
        <div class="container">
            <div class="hero__content animate-slide-up">
                <h1 class="hero__title">
                    <?php echo esc_html($hero['headline']); ?>
                </h1>
                <p class="hero__subtitle body-large">
                    <?php echo esc_html($hero['subheadline']); ?>
                </p>
                <?php if ($hero['hero_image']): ?>
                <div class="hero__image">
                    <?php echo wp_get_attachment_image($hero['hero_image']['ID'], 'hero', false, array('class' => 'animate-fade-in')); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Overview Section
    $overview = get_field('solution_overview');
    if ($overview): ?>
    <section class="overview bg-white">
        <div class="container">
            <div class="overview__content body-large">
                <?php echo wp_kses_post($overview['content']); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Key Features
    $features = get_field('solution_features');
    if ($features): ?>
    <section class="features bg-gray-100">
        <div class="container">
            <div class="grid features__grid">
                <?php foreach ($features as $feature): ?>
                <div class="card card-feature animate-fade-in">
                    <?php if ($feature['icon']): ?>
                    <div class="feature__icon">
                        <?php echo wp_get_attachment_image($feature['icon']['ID'], 'thumbnail'); ?>
                    </div>
                    <?php endif; ?>
                    <h3 class="feature__title">
                        <?php echo esc_html($feature['title']); ?>
                    </h3>
                    <p class="feature__description">
                        <?php echo esc_html($feature['description']); ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Implementation Approach
    $implementation = get_field('implementation_approach');
    if ($implementation): ?>
    <section class="implementation bg-white">
        <div class="container">
            <div class="implementation__content">
                <?php echo wp_kses_post($implementation['content']); ?>

                <?php if ($implementation['steps']): ?>
                <div class="implementation__steps">
                    <?php foreach ($implementation['steps'] as $index => $step): ?>
                    <div class="step animate-fade-in">
                        <div class="step__number">
                            <?php echo esc_html($index + 1); ?>
                        </div>
                        <h3 class="step__title">
                            <?php echo esc_html($step['title']); ?>
                        </h3>
                        <p class="step__description">
                            <?php echo esc_html($step['description']); ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Client Outcome
    $outcome = get_field('client_outcome');
    if ($outcome): ?>
    <section class="outcome bg-gray-100">
        <div class="container">
            <div class="outcome__content">
                <?php echo wp_kses_post($outcome['content']); ?>

                <?php if ($outcome['metrics']): ?>
                <div class="metrics-grid">
                    <?php foreach ($outcome['metrics'] as $metric): ?>
                    <div class="metric animate-fade-in">
                        <div class="metric__value">
                            <?php echo esc_html($metric['value']); ?>
                        </div>
                        <div class="metric__label">
                            <?php echo esc_html($metric['label']); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Call to Action
    $cta = get_field('solution_cta');
    if ($cta): ?>
    <section class="cta bg-primary-dark text-white">
        <div class="container text-center">
            <p class="cta__text body-large">
                <?php echo esc_html($cta['text']); ?>
            </p>
            <div class="cta__button-wrapper">
                <a href="<?php echo esc_url($cta['button_link']); ?>" class="btn btn-primary">
                    <?php echo esc_html($cta['button_text']); ?>
                </a>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Related Resources
    $related_resources = get_field('related_resources');
    if ($related_resources): ?>
    <section class="related-resources bg-white">
        <div class="container">
            <h2 class="section-title text-center">Related Resources</h2>
            <div class="grid resources__grid">
                <?php foreach ($related_resources as $post):
                    setup_postdata($post); ?>
                <article class="card resource-card animate-fade-in">
                    <?php if (has_post_thumbnail()): ?>
                    <div class="resource-card__image">
                        <?php the_post_thumbnail('card'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="resource-card__content">
                        <h3 class="resource-card__title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <div class="resource-card__excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                            Learn More
                        </a>
                    </div>
                </article>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
