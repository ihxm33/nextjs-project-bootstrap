<?php
/**
 * Template Name: Contact Page
 * 
 * This template displays the contact page with consultation form and contact info.
 */

get_header(); ?>

<main id="primary" class="site-main">
    <?php
    // Hero Section
    $hero = get_field('contact_hero');
    if ($hero): ?>
    <section class="hero bg-primary-dark text-white">
        <div class="container">
            <h1 class="hero__title animate-slide-up">
                <?php echo esc_html($hero['main_headline']); ?>
            </h1>
            <p class="hero__subtitle body-large animate-fade-in">
                <?php echo esc_html($hero['subheadline']); ?>
            </p>
            <div class="hero__intro animate-fade-in">
                <?php echo wp_kses_post(wpautop($hero['intro_copy'])); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Form Section
    $form = get_field('form_settings');
    if ($form): ?>
    <section class="contact-form bg-white">
        <div class="container">
            <h2 class="section-title text-center">
                <?php echo esc_html($form['headline']); ?>
            </h2>
            <div class="form-wrapper animate-fade-in">
                <?php
                if (!empty($form['shortcode'])) {
                    echo do_shortcode($form['shortcode']);
                }
                ?>
            </div>
            <?php if ($form['supporting_copy']): ?>
            <p class="form-supporting-copy text-center body-small animate-fade-in">
                <?php echo esc_html($form['supporting_copy']); ?>
            </p>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Alternative Contact Options
    $alt_contact = get_field('alt_contact');
    if ($alt_contact): ?>
    <section class="alt-contact bg-gray-100">
        <div class="container">
            <h2 class="section-title text-center">
                <?php echo esc_html($alt_contact['headline']); ?>
            </h2>
            <?php if ($alt_contact['contact_methods']): ?>
            <ul class="contact-methods-list animate-fade-in">
                <?php foreach ($alt_contact['contact_methods'] as $method): ?>
                <li class="contact-method">
                    <strong><?php echo esc_html($method['label']); ?>:</strong>
                    <?php if (!empty($method['link'])): ?>
                        <a href="<?php echo esc_url($method['link']); ?>">
                            <?php echo esc_html($method['value']); ?>
                        </a>
                    <?php else: ?>
                        <?php echo esc_html($method['value']); ?>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Social Proof Section
    $social_proof = get_field('social_proof');
    if ($social_proof): ?>
    <section class="social-proof bg-white">
        <div class="container">
            <h2 class="section-title text-center">
                <?php echo esc_html($social_proof['headline']); ?>
            </h2>
            <?php if ($social_proof['client_logos']): ?>
            <div class="client-logos grid animate-fade-in">
                <?php foreach ($social_proof['client_logos'] as $client): ?>
                <div class="client-logo">
                    <?php if ($client['logo']): ?>
                    <?php echo wp_get_attachment_image($client['logo']['ID'], 'logo'); ?>
                    <?php endif; ?>
                    <?php if ($client['company_name']): ?>
                    <p class="client-name"><?php echo esc_html($client['company_name']); ?></p>
                    <?php endif; ?>
                    <?php if ($client['industry']): ?>
                    <p class="client-industry"><?php echo esc_html($client['industry']); ?></p>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if ($social_proof['testimonial']): ?>
            <blockquote class="testimonial card card-testimonial animate-fade-in">
                <p class="testimonial__quote">
                    <?php echo esc_html($social_proof['testimonial']['text']); ?>
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
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // FAQ Section
    $faq = get_field('faq_section');
    if ($faq && $faq['faqs']): ?>
    <section class="faq bg-gray-100">
        <div class="container">
            <h2 class="section-title text-center">Frequently Asked Questions</h2>
            <div class="faq-list animate-fade-in">
                <?php foreach ($faq['faqs'] as $item): ?>
                <div class="faq-item">
                    <h3 class="faq-question"><?php echo esc_html($item['question']); ?></h3>
                    <div class="faq-answer"><?php echo wp_kses_post(wpautop($item['answer'])); ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    // Secondary CTA
    $secondary_cta = get_field('secondary_cta');
    if ($secondary_cta): ?>
    <section class="secondary-cta bg-primary-dark text-white">
        <div class="container text-center">
            <h2 class="secondary-cta__text">
                <?php echo esc_html($secondary_cta['text']); ?>
            </h2>
            <a href="<?php echo esc_url($secondary_cta['button_link']); ?>" class="btn btn-primary">
                <?php echo esc_html($secondary_cta['button_text']); ?>
            </a>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
