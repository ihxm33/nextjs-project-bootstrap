<?php
/**
 * Template part for displaying insights
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('insight-card'); ?>>
    <?php if (has_post_thumbnail()): ?>
        <div class="insight-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('insight-thumbnail'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="insight-content">
        <?php
        $categories = get_the_terms(get_the_ID(), 'insight_category');
        if ($categories && !is_wp_error($categories)): ?>
            <div class="insight-category">
                <?php echo esc_html($categories[0]->name); ?>
            </div>
        <?php endif; ?>

        <h3 class="insight-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>

        <div class="insight-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <div class="insight-meta">
            <a href="<?php the_permalink(); ?>" class="read-more">
                <?php esc_html_e('Read Article', 'impacthxm'); ?>
            </a>
        </div>
    </div>
</article>
