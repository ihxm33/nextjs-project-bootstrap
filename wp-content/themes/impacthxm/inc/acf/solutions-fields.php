<?php
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_solutions',
        'title' => 'Solution Details',
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-solution.php',
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
            // Hero Section
            array(
                'key' => 'field_solution_hero',
                'label' => 'Hero Section',
                'name' => 'solution_hero',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_solution_headline',
                        'label' => 'Headline',
                        'name' => 'headline',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_solution_subheadline',
                        'label' => 'Subheadline',
                        'name' => 'subheadline',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_solution_hero_image',
                        'label' => 'Hero Image',
                        'name' => 'hero_image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                ),
            ),

            // Overview Section
            array(
                'key' => 'field_solution_overview',
                'label' => 'Overview',
                'name' => 'solution_overview',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_overview_content',
                        'label' => 'Overview Content',
                        'name' => 'content',
                        'type' => 'textarea',
                        'rows' => 4,
                        'required' => 1,
                    ),
                ),
            ),

            // Key Features
            array(
                'key' => 'field_solution_features',
                'label' => 'Key Features',
                'name' => 'solution_features',
                'type' => 'repeater',
                'layout' => 'block',
                'min' => 1,
                'max' => 6,
                'sub_fields' => array(
                    array(
                        'key' => 'field_feature_title',
                        'label' => 'Feature Title',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_feature_description',
                        'label' => 'Feature Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 3,
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_feature_icon',
                        'label' => 'Feature Icon',
                        'name' => 'icon',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                ),
            ),

            // Implementation Approach
            array(
                'key' => 'field_implementation',
                'label' => 'Implementation Approach',
                'name' => 'implementation_approach',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_implementation_content',
                        'label' => 'Implementation Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_implementation_steps',
                        'label' => 'Implementation Steps',
                        'name' => 'steps',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'min' => 0,
                        'max' => 6,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_step_title',
                                'label' => 'Step Title',
                                'name' => 'title',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_step_description',
                                'label' => 'Step Description',
                                'name' => 'description',
                                'type' => 'textarea',
                                'rows' => 2,
                            ),
                        ),
                    ),
                ),
            ),

            // Client Outcome
            array(
                'key' => 'field_client_outcome',
                'label' => 'Client Outcome',
                'name' => 'client_outcome',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_outcome_content',
                        'label' => 'Outcome Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_outcome_metrics',
                        'label' => 'Success Metrics',
                        'name' => 'metrics',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'min' => 0,
                        'max' => 4,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_metric_value',
                                'label' => 'Metric Value',
                                'name' => 'value',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_metric_label',
                                'label' => 'Metric Label',
                                'name' => 'label',
                                'type' => 'text',
                            ),
                        ),
                    ),
                ),
            ),

            // Call to Action
            array(
                'key' => 'field_solution_cta',
                'label' => 'Call to Action',
                'name' => 'solution_cta',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_cta_text',
                        'label' => 'CTA Text',
                        'name' => 'text',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_cta_button_text',
                        'label' => 'Button Text',
                        'name' => 'button_text',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_cta_button_link',
                        'label' => 'Button Link',
                        'name' => 'button_link',
                        'type' => 'link',
                        'required' => 1,
                    ),
                ),
            ),

            // Additional Resources
            array(
                'key' => 'field_related_resources',
                'label' => 'Related Resources',
                'name' => 'related_resources',
                'type' => 'relationship',
                'post_type' => array(
                    'post',
                    'case-study',
                ),
                'filters' => array(
                    'search',
                    'post_type',
                ),
                'elements' => array(
                    'featured_image',
                ),
                'min' => 0,
                'max' => 3,
            ),
        ),
    ));

endif;
