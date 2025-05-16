<?php
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_homepage_sections',
        'title' => 'Homepage Sections',
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'fields' => array(
            // Hero Section
            array(
                'key' => 'field_hero_section',
                'label' => 'Hero Section',
                'name' => 'hero_section',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_hero_title',
                        'label' => 'Hero Title',
                        'name' => 'hero_title',
                        'type' => 'text',
                        'default_value' => 'Human experience management for growing businesses',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_hero_subtitle',
                        'label' => 'Hero Subtitle',
                        'name' => 'hero_subtitle',
                        'type' => 'text',
                        'default_value' => 'Enterprise-grade HR solutions made simple, affordable, and sized for your business.',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_hero_primary_cta',
                        'label' => 'Primary CTA',
                        'name' => 'hero_primary_cta',
                        'type' => 'group',
                        'layout' => 'table',
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
                                'type' => 'link',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_secondary_cta',
                        'label' => 'Secondary CTA',
                        'name' => 'hero_secondary_cta',
                        'type' => 'group',
                        'layout' => 'table',
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
                                'type' => 'link',
                            ),
                        ),
                    ),
                ),
            ),

            // Benefits Section
            array(
                'key' => 'field_benefits_section',
                'label' => 'Benefits Section',
                'name' => 'benefits_section',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_benefits_title',
                        'label' => 'Section Title',
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
                        'min' => 1,
                        'max' => 3,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_benefit_title',
                                'label' => 'Title',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Flexible and scalable platform',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_benefit_description',
                                'label' => 'Description',
                                'name' => 'description',
                                'type' => 'textarea',
                                'rows' => 3,
                                'default_value' => 'Easily adapt to your business growth with modular HR tools.',
                                'required' => 1,
                            ),
                        ),
                    ),
                ),
            ),

            // Problems Section
            array(
                'key' => 'field_problems_section',
                'label' => 'Problems Section',
                'name' => 'problems_section',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_problems_title',
                        'label' => 'Section Title',
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
                        'min' => 1,
                        'max' => 3,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_problem_title',
                                'label' => 'Problem',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Complex and fragmented HR systems',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_problem_solution',
                                'label' => 'Solution',
                                'name' => 'solution',
                                'type' => 'textarea',
                                'rows' => 3,
                                'default_value' => 'Our platform integrates all HR functions into a single, easy-to-use system.',
                                'required' => 1,
                            ),
                        ),
                    ),
                ),
            ),

            // Social Proof Section
            array(
                'key' => 'field_social_proof_section',
                'label' => 'Social Proof Section',
                'name' => 'social_proof_section',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_social_proof_title',
                        'label' => 'Section Title',
                        'name' => 'title',
                        'type' => 'text',
                        'default_value' => 'Transforming HR for growing businesses',
                    ),
                    array(
                        'key' => 'field_testimonial',
                        'label' => 'Featured Testimonial',
                        'name' => 'testimonial',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_testimonial_quote',
                                'label' => 'Quote',
                                'name' => 'quote',
                                'type' => 'textarea',
                                'rows' => 4,
                                'default_value' => 'ImpactHXM has revolutionized our HR processes, making them more efficient and employee-friendly.',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_testimonial_author',
                                'label' => 'Author Name',
                                'name' => 'author',
                                'type' => 'text',
                                'default_value' => 'Jane Doe, HR Director',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_testimonial_position',
                                'label' => 'Author Position',
                                'name' => 'position',
                                'type' => 'text',
                                'default_value' => 'HR Director',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_stats',
                        'label' => 'Statistics',
                        'name' => 'stats',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'min' => 1,
                        'max' => 3,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_stat_text',
                                'label' => 'Statistic',
                                'name' => 'text',
                                'type' => 'text',
                                'default_value' => '95% customer satisfaction rate',
                                'required' => 1,
                            ),
                        ),
                    ),
                ),
            ),

            // CTA Section
            array(
                'key' => 'field_cta_section',
                'label' => 'Call to Action Section',
                'name' => 'cta_section',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_cta_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'default_value' => 'Ready to transform your HR experience?',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_cta_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'text',
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
                        'type' => 'link',
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
    ));

endif;
