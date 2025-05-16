<?php
/**
 * Template Name: Single Case Study
 * 
 * This is the template that displays individual case studies.
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('case-study'); ?>>
    <?php
    // Header Information
    $header = get_field('case_header');
    if ($header): ?>
    <header class="case-study-header bg-primary-dark text-white">
        <div class="container">
            <div class="case-study-header__content">
                <?php if ($header['client_logo']): ?>
                <div class="client-logo animate-fade-in">
                    <?php echo wp_get_attachment_image($header['client_logo']['ID'], 'logo', false, array('class' => 'client-logo__image')); ?>
                </div>
                <?php endif; ?>
                
                <h1 class="case-study-header__title animate-slide-up">
                    <?php the_title(); ?>
                </h1>

                <div class="case-study-header__meta animate-fade-in">
                    <?php if ($header['industry']): ?>
                    <div class="meta-item">
                        <span class="meta-label">Industry:</span>
                        <span class="meta-value"><?php echo esc_html($header['industry']); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if ($header['company_size']): ?>
                    <div class="meta-item">
                        <span class="meta-label">Company Size:</span>
                        <span class="meta-value"><?php echo esc_html($header['company_size']); ?></span>
                    </div>
                    <?php endif; ?>
                </div>

                <?php if ($header['outcome_summary']): ?>
                <p class="case-study-header__summary body-large animate-fade-in">
                    <?php echo esc_html($header['outcome_summary']); ?>
                </p>
                <?php endif; ?>
            </div>

            <?php if ($header['featured_image']): ?>
            <div class="case-study-header__image animate-fade-in">
                <?php echo wp_get_attachment_image($header['featured_image']['ID'], 'hero'); ?>
            </div>
            <?php endif; ?>
        </div>
    </header>
    <?php endif; ?>

    <main class="case-study-content">
        <?php
        // Challenge Section
        $challenge = get_field('challenge');
        if ($challenge): ?>
        <section class="challenge bg-white">
            <div class="container">
                <h2 class="section-title">The Challenge</h2>
                
                <div class="challenge__content body-large animate-fade-in">
                    <?php echo wp_kses_post($challenge['background']); ?>
                </div>

                <?php if ($challenge['pain_points']): ?>
                <div class="pain-points grid">
                    <?php foreach ($challenge['pain_points'] as $point): ?>
                    <div class="card pain-point animate-fade-in">
                        <h3 class="pain-point__title">
                            <?php echo esc_html($point['pain_point']); ?>
                        </h3>
                        <?php if ($point['impact']): ?>
                        <p class="pain-point__impact">
                            <?php echo esc_html($point['impact']); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <?php if ($challenge['quote']): ?>
                <blockquote class="challenge-quote card card-testimonial animate-fade-in">
                    <p class="quote__text">
                        <?php echo esc_html($challenge['quote']['text']); ?>
                    </p>
                    <footer class="quote__author">
                        <cite>
                            <?php echo esc_html($challenge['quote']['author']); ?>
                            <?php if ($challenge['quote']['position']): ?>
                                <span class="quote__position">
                                    <?php echo esc_html($challenge['quote']['position']); ?>
                                </span>
                            <?php endif; ?>
                        </cite>
                    </footer>
                </blockquote>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php
        // Solution Section
        $solution = get_field('solution');
        if ($solution): ?>
        <section class="solution bg-gray-100">
            <div class="container">
                <h2 class="section-title">The Solution</h2>

                <div class="solution__content body-large animate-fade-in">
                    <?php echo wp_kses_post($solution['overview']); ?>
                </div>

                <?php if ($solution['key_features']): ?>
                <div class="features grid">
                    <?php foreach ($solution['key_features'] as $feature): ?>
                    <div class="card feature animate-fade-in">
                        <h3 class="feature__title">
                            <?php echo esc_html($feature['name']); ?>
                        </h3>
                        <?php if ($feature['details']): ?>
                        <p class="feature__details">
                            <?php echo esc_html($feature['details']); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <?php if ($solution['timeline']): ?>
                <div class="implementation-timeline animate-fade-in">
                    <h3>Implementation Timeline</h3>
                    <p class="timeline__text">
                        <?php echo esc_html($solution['timeline']); ?>
                    </p>
                </div>
                <?php endif; ?>

                <?php if ($solution['image']): ?>
                <div class="solution__image animate-fade-in">
                    <?php echo wp_get_attachment_image($solution['image']['ID'], 'large'); ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php
        // Results Section
        $results = get_field('results');
        if ($results): ?>
        <section class="results bg-white">
            <div class="container">
                <h2 class="section-title">The Results</h2>

                <?php if ($results['metrics']): ?>
                <div class="metrics-grid">
                    <?php foreach ($results['metrics'] as $metric): ?>
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

                <?php if ($results['business_impact']): ?>
                <div class="impact-grid grid">
                    <?php foreach ($results['business_impact'] as $impact): ?>
                    <div class="card impact animate-fade-in">
                        <h3 class="impact__title">
                            <?php echo esc_html($impact['title']); ?>
                        </h3>
                        <?php if ($impact['description']): ?>
                        <p class="impact__description">
                            <?php echo esc_html($impact['description']); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php
        // Testimonial Section
        $testimonial = get_field('testimonial');
        if ($testimonial): ?>
        <section class="testimonial bg-gray-100">
            <div class="container">
                <blockquote class="card card-testimonial animate-fade-in">
                    <?php if ($testimonial['highlight']): ?>
                    <p class="testimonial__highlight h3">
                        <?php echo esc_html($testimonial['highlight']); ?>
                    </p>
                    <?php endif; ?>

                    <p class="testimonial__quote">
                        <?php echo esc_html($testimonial['quote']); ?>
                    </p>

                    <footer class="testimonial__author">
                        <?php if ($testimonial['photo']): ?>
                        <div class="author__photo">
                            <?php echo wp_get_attachment_image($testimonial['photo']['ID'], 'testimonial'); ?>
                        </div>
                        <?php endif; ?>
                        <cite>
                            <?php echo esc_html($testimonial['author']); ?>
                            <?php if ($testimonial['position']): ?>
                                <span class="author__position">
                                    <?php echo esc_html($testimonial['position']); ?>
                                </span>
                            <?php endif; ?>
                        </cite>
                    </footer>
                </blockquote>
            </div>
        </section>
        <?php endif; ?>

        <?php
        // Next Steps Section
        $next_steps = get_field('next_steps');
        if ($next_steps): ?>
        <section class="next-steps bg-white">
            <div class="container">
                <h2 class="section-title">Looking Ahead</h2>

                <div class="next-steps__content body-large animate-fade-in">
                    <?php echo wp_kses_post($next_steps['future_plans']); ?>
                </div>

                <?php if ($next_steps['additional_features']): ?>
                <div class="features-list">
                    <h3>Additional Features Being Considered</h3>
                    <ul class="features-grid">
                        <?php foreach ($next_steps['additional_features'] as $feature): ?>
                        <li class="feature-item animate-fade-in">
                            <?php echo esc_html($feature['feature']); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php
        // Call to Action
        $cta = get_field('case_study_cta');
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
    </main>
</article>

<?php get_footer(); ?>
