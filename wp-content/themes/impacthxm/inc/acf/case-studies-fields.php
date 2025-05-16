<?php
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_case_studies',
        'title' => 'Case Study Details',
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'case-study',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            'the_content',
        ),
        'fields' => array(
            // Header Information
            array(
                'key' => 'field_case_header',
                'label' => 'Header Information',
                'name' => 'case_header',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_client_logo',
                        'label' => 'Client Logo',
                        'name' => 'client_logo',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_client_industry',
                        'label' => 'Industry',
                        'name' => 'industry',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_company_size',
                        'label' => 'Company Size',
                        'name' => 'company_size',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_outcome_summary',
                        'label' => 'Outcome Summary',
                        'name' => 'outcome_summary',
                        'type' => 'textarea',
                        'rows' => 2,
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_featured_image',
                        'label' => 'Featured Image',
                        'name' => 'featured_image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                ),
            ),

            // Challenge Section
            array(
                'key' => 'field_challenge',
                'label' => 'The Challenge',
                'name' => 'challenge',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_challenge_background',
                        'label' => 'Background',
                        'name' => 'background',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_pain_points',
                        'label' => 'Pain Points',
                        'name' => 'pain_points',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'min' => 1,
                        'max' => 5,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_pain_point',
                                'label' => 'Pain Point',
                                'name' => 'pain_point',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_pain_point_impact',
                                'label' => 'Business Impact',
                                'name' => 'impact',
                                'type' => 'text',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_challenge_quote',
                        'label' => 'Client Quote',
                        'name' => 'quote',
                        'type' => 'group',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_quote_text',
                                'label' => 'Quote Text',
                                'name' => 'text',
                                'type' => 'textarea',
                                'rows' => 3,
                            ),
                            array(
                                'key' => 'field_quote_author',
                                'label' => 'Author Name',
                                'name' => 'author',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_quote_position',
                                'label' => 'Author Position',
                                'name' => 'position',
                                'type' => 'text',
                            ),
                        ),
                    ),
                ),
            ),

            // Solution Section
            array(
                'key' => 'field_solution',
                'label' => 'The Solution',
                'name' => 'solution',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_solution_overview',
                        'label' => 'Solution Overview',
                        'name' => 'overview',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_key_features',
                        'label' => 'Key Features',
                        'name' => 'key_features',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'min' => 1,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_feature_name',
                                'label' => 'Feature Name',
                                'name' => 'name',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_feature_details',
                                'label' => 'Feature Details',
                                'name' => 'details',
                                'type' => 'textarea',
                                'rows' => 2,
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_implementation_timeline',
                        'label' => 'Implementation Timeline',
                        'name' => 'timeline',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_solution_image',
                        'label' => 'Solution Image/Screenshot',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                ),
            ),

            // Results Section
            array(
                'key' => 'field_results',
                'label' => 'The Results',
                'name' => 'results',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_metrics',
                        'label' => 'Key Metrics',
                        'name' => 'metrics',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'min' => 1,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_metric_value',
                                'label' => 'Value',
                                'name' => 'value',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_metric_label',
                                'label' => 'Label',
                                'name' => 'label',
                                'type' => 'text',
                                'required' => 1,
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_business_impact',
                        'label' => 'Business Impact',
                        'name' => 'business_impact',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'min' => 1,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_impact_title',
                                'label' => 'Impact Title',
                                'name' => 'title',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_impact_description',
                                'label' => 'Impact Description',
                                'name' => 'description',
                                'type' => 'textarea',
                                'rows' => 2,
                            ),
                        ),
                    ),
                ),
            ),

            // Testimonial Section
            array(
                'key' => 'field_testimonial',
                'label' => 'Testimonial',
                'name' => 'testimonial',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_testimonial_quote',
                        'label' => 'Extended Quote',
                        'name' => 'quote',
                        'type' => 'textarea',
                        'rows' => 4,
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_testimonial_author',
                        'label' => 'Author Name',
                        'name' => 'author',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_testimonial_position',
                        'label' => 'Author Position',
                        'name' => 'position',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_testimonial_photo',
                        'label' => 'Author Photo',
                        'name' => 'photo',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_testimonial_highlight',
                        'label' => 'Highlighted Statement',
                        'name' => 'highlight',
                        'type' => 'text',
                        'instructions' => 'Key statement to be highlighted as a callout',
                    ),
                ),
            ),

            // Next Steps Section
            array(
                'key' => 'field_next_steps',
                'label' => 'Looking Ahead',
                'name' => 'next_steps',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_future_plans',
                        'label' => 'Future Plans',
                        'name' => 'future_plans',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                    ),
                    array(
                        'key' => 'field_additional_features',
                        'label' => 'Additional Features Being Considered',
                        'name' => 'additional_features',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_feature',
                                'label' => 'Feature',
                                'name' => 'feature',
                                'type' => 'text',
                            ),
                        ),
                    ),
                ),
            ),

            // Call to Action
            array(
                'key' => 'field_case_study_cta',
                'label' => 'Call to Action',
                'name' => 'case_study_cta',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_cta_text',
                        'label' => 'CTA Text',
                        'name' => 'text',
                        'type' => 'text',
                        'default_value' => 'Facing similar challenges?',
                    ),
                    array(
                        'key' => 'field_cta_button_text',
                        'label' => 'Button Text',
                        'name' => 'button_text',
                        'type' => 'text',
                        'default_value' => 'Get a personalized consultation',
                    ),
                    array(
                        'key' => 'field_cta_button_link',
                        'label' => 'Button Link',
                        'name' => 'button_link',
                        'type' => 'link',
                    ),
                ),
            ),
        ),
    ));

endif;
