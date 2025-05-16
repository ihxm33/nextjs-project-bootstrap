<?php
/**
 * Register ACF Fields
 */

if (!function_exists('acf_add_local_field_group')) {
    return;
}

// Theme Settings Fields
acf_add_local_field_group(array(
    'key' => 'group_theme_settings',
    'title' => 'Theme Settings',
    'fields' => array(
        array(
            'key' => 'field_header_settings',
            'label' => 'Header Settings',
            'name' => 'header_settings',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_header_cta_text',
                    'label' => 'CTA Button Text',
                    'name' => 'header_cta_text',
                    'type' => 'text',
                    'default_value' => 'Get your personalized demo',
                ),
                array(
                    'key' => 'field_header_cta_link',
                    'label' => 'CTA Button Link',
                    'name' => 'header_cta_link',
                    'type' => 'url',
                ),
            ),
        ),
        array(
            'key' => 'field_company_info',
            'label' => 'Company Information',
            'name' => 'company_info',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_company_phone',
                    'label' => 'Phone Number',
                    'name' => 'company_phone',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_company_email',
                    'label' => 'Email Address',
                    'name' => 'company_email',
                    'type' => 'email',
                ),
                array(
                    'key' => 'field_company_address',
                    'label' => 'Primary Address',
                    'name' => 'company_address',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_company_address_2',
                    'label' => 'Secondary Address',
                    'name' => 'company_address_2',
                    'type' => 'textarea',
                ),
            ),
        ),
        array(
            'key' => 'field_social_links',
            'label' => 'Social Media Links',
            'name' => 'social_links',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_linkedin',
                    'label' => 'LinkedIn',
                    'name' => 'linkedin',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_facebook',
                    'label' => 'Facebook',
                    'name' => 'facebook',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_instagram',
                    'label' => 'Instagram',
                    'name' => 'instagram',
                    'type' => 'url',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-settings',
            ),
        ),
    ),
));

// Homepage Fields
acf_add_local_field_group(array(
    'key' => 'group_homepage',
    'title' => 'Homepage Sections',
    'fields' => array(
        array(
            'key' => 'field_hero_section',
            'label' => 'Hero Section',
            'name' => 'hero_section',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_hero_title',
                    'label' => 'Title',
                    'name' => 'hero_title',
                    'type' => 'text',
                    'default_value' => 'Human experience management for growing businesses',
                ),
                array(
                    'key' => 'field_hero_subtitle',
                    'label' => 'Subtitle',
                    'name' => 'hero_subtitle',
                    'type' => 'textarea',
                    'default_value' => 'Enterprise-grade HR solutions made simple, affordable, and sized for your business.',
                ),
                array(
                    'key' => 'field_hero_primary_cta',
                    'label' => 'Primary CTA',
                    'name' => 'hero_primary_cta',
                    'type' => 'group',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_hero_primary_cta_text',
                            'label' => 'Text',
                            'name' => 'text',
                            'type' => 'text',
                            'default_value' => 'See our process',
                        ),
                        array(
                            'key' => 'field_hero_primary_cta_link',
                            'label' => 'Link',
                            'name' => 'link',
                            'type' => 'url',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_hero_secondary_cta',
                    'label' => 'Secondary CTA',
                    'name' => 'hero_secondary_cta',
                    'type' => 'group',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_hero_secondary_cta_text',
                            'label' => 'Text',
                            'name' => 'text',
                            'type' => 'text',
                            'default_value' => 'Explore solutions',
                        ),
                        array(
                            'key' => 'field_hero_secondary_cta_link',
                            'label' => 'Link',
                            'name' => 'link',
                            'type' => 'url',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'key' => 'field_benefits_section',
            'label' => 'Key Benefits Section',
            'name' => 'benefits_section',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_benefits_title',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => 'HR technology that grows with your business',
                ),
                array(
                    'key' => 'field_benefits',
                    'label' => 'Benefits',
                    'name' => 'benefits',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'min' => 3,
                    'max' => 3,
                    'sub_fields' => array(
                        array(
                            'key' => 'field_benefit_title',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_benefit_description',
                            'label' => 'Description',
                            'name' => 'description',
                            'type' => 'textarea',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'key' => 'field_problems_section',
            'label' => 'Problems & Solutions Section',
            'name' => 'problems_section',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_problems_title',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => 'HR challenges solved for businesses like yours',
                ),
                array(
                    'key' => 'field_problems',
                    'label' => 'Problems',
                    'name' => 'problems',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'min' => 3,
                    'max' => 3,
                    'sub_fields' => array(
                        array(
                            'key' => 'field_problem_title',
                            'label' => 'Problem Title',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_problem_solution',
                            'label' => 'Solution',
                            'name' => 'solution',
                            'type' => 'textarea',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'key' => 'field_social_proof_section',
            'label' => 'Social Proof Section',
            'name' => 'social_proof_section',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_social_proof_title',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => 'Transforming HR for growing businesses',
                ),
                array(
                    'key' => 'field_testimonial',
                    'label' => 'Testimonial',
                    'name' => 'testimonial',
                    'type' => 'group',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_testimonial_quote',
                            'label' => 'Quote',
                            'name' => 'quote',
                            'type' => 'textarea',
                        ),
                        array(
                            'key' => 'field_testimonial_author',
                            'label' => 'Author',
                            'name' => 'author',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_testimonial_position',
                            'label' => 'Position',
                            'name' => 'position',
                            'type' => 'text',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_stats',
                    'label' => 'Statistics',
                    'name' => 'stats',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'min' => 3,
                    'max' => 3,
                    'sub_fields' => array(
                        array(
                            'key' => 'field_stat_text',
                            'label' => 'Statistic',
                            'name' => 'text',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'key' => 'field_cta_section',
            'label' => 'Call to Action Section',
            'name' => 'cta_section',
            'type' => 'group',
            'sub_fields' => array(
                array(
                    'key' => 'field_cta_title',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'default_value' => 'Ready to transform your HR experience?',
                ),
                array(
                    'key' => 'field_cta_description',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                    'default_value' => 'Schedule a personalized demo to see how ImpactHXM can solve your specific HR challenges.',
                ),
                array(
                    'key' => 'field_cta_button_text',
                    'label' => 'Button Text',
                    'name' => 'button_text',
                    'type' => 'text',
                    'default_value' => 'Get your personalized demo',
                ),
                array(
                    'key' => 'field_cta_button_link',
                    'label' => 'Button Link',
                    'name' => 'button_link',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_cta_secondary_text',
                    'label' => 'Secondary Text',
                    'name' => 'secondary_text',
                    'type' => 'text',
                    'default_value' => 'No commitment required • 30-minute tailored presentation • See actual features in action',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));
