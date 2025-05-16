<?php
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_contact_page',
        'title' => 'Contact Page Settings',
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-contact.php',
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
                'key' => 'field_contact_hero',
                'label' => 'Hero Section',
                'name' => 'contact_hero',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_main_headline',
                        'label' => 'Main Headline',
                        'name' => 'main_headline',
                        'type' => 'text',
                        'default_value' => "Let's transform your HR capabilities",
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_subheadline',
                        'label' => 'Subheadline',
                        'name' => 'subheadline',
                        'type' => 'text',
                        'default_value' => 'Schedule a personalized consultation to see how enterprise-grade HR technology can work for your business',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_intro_copy',
                        'label' => 'Introduction Copy',
                        'name' => 'intro_copy',
                        'type' => 'textarea',
                        'rows' => 3,
                        'required' => 1,
                    ),
                ),
            ),

            // Form Settings
            array(
                'key' => 'field_form_settings',
                'label' => 'Form Settings',
                'name' => 'form_settings',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_form_headline',
                        'label' => 'Form Headline',
                        'name' => 'headline',
                        'type' => 'text',
                        'default_value' => 'Get your personalized HR technology consultation',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_form_shortcode',
                        'label' => 'Form Shortcode',
                        'name' => 'shortcode',
                        'type' => 'text',
                        'instructions' => 'Enter the shortcode for your contact form (e.g., [contact-form-7 id="123"])',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_form_supporting_copy',
                        'label' => 'Form Supporting Copy',
                        'name' => 'supporting_copy',
                        'type' => 'textarea',
                        'default_value' => "What happens next? Within one business day, you'll receive a personal email to schedule a 30-minute consultation at a time that works for you. No aggressive sales tactics—just a helpful conversation about your HR technology needs.",
                        'rows' => 3,
                    ),
                ),
            ),

            // Alternative Contact Options
            array(
                'key' => 'field_alt_contact',
                'label' => 'Alternative Contact Options',
                'name' => 'alt_contact',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_alt_contact_headline',
                        'label' => 'Headline',
                        'name' => 'headline',
                        'type' => 'text',
                        'default_value' => 'Prefer to reach us directly? Contact our team at:',
                    ),
                    array(
                        'key' => 'field_contact_methods',
                        'label' => 'Contact Methods',
                        'name' => 'contact_methods',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'min' => 1,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_method_label',
                                'label' => 'Label',
                                'name' => 'label',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_method_value',
                                'label' => 'Value',
                                'name' => 'value',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_method_link',
                                'label' => 'Link',
                                'name' => 'link',
                                'type' => 'url',
                            ),
                        ),
                    ),
                ),
            ),

            // Social Proof
            array(
                'key' => 'field_social_proof',
                'label' => 'Social Proof',
                'name' => 'social_proof',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_social_proof_headline',
                        'label' => 'Headline',
                        'name' => 'headline',
                        'type' => 'text',
                        'default_value' => 'Trusted by growing businesses across industries',
                    ),
                    array(
                        'key' => 'field_client_logos',
                        'label' => 'Client Logos',
                        'name' => 'client_logos',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'min' => 0,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_logo',
                                'label' => 'Logo',
                                'name' => 'logo',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'thumbnail',
                                'library' => 'all',
                            ),
                            array(
                                'key' => 'field_company_name',
                                'label' => 'Company Name',
                                'name' => 'company_name',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_industry',
                                'label' => 'Industry',
                                'name' => 'industry',
                                'type' => 'text',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_featured_testimonial',
                        'label' => 'Featured Testimonial',
                        'name' => 'testimonial',
                        'type' => 'group',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_testimonial_text',
                                'label' => 'Testimonial Text',
                                'name' => 'text',
                                'type' => 'textarea',
                                'rows' => 4,
                            ),
                            array(
                                'key' => 'field_testimonial_author',
                                'label' => 'Author Name',
                                'name' => 'author',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_testimonial_position',
                                'label' => 'Author Position',
                                'name' => 'position',
                                'type' => 'text',
                            ),
                        ),
                    ),
                ),
            ),

            // FAQ Section
            array(
                'key' => 'field_faq_section',
                'label' => 'FAQ Section',
                'name' => 'faq_section',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_faqs',
                        'label' => 'FAQs',
                        'name' => 'faqs',
                        'type' => 'repeater',
                        'layout' => 'row',
                        'min' => 0,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_question',
                                'label' => 'Question',
                                'name' => 'question',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_answer',
                                'label' => 'Answer',
                                'name' => 'answer',
                                'type' => 'textarea',
                                'rows' => 3,
                                'required' => 1,
                            ),
                        ),
                    ),
                ),
            ),

            // Secondary CTA
            array(
                'key' => 'field_secondary_cta',
                'label' => 'Secondary CTA',
                'name' => 'secondary_cta',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_secondary_cta_text',
                        'label' => 'CTA Text',
                        'name' => 'text',
                        'type' => 'text',
                        'default_value' => 'Not ready for a consultation?',
                    ),
                    array(
                        'key' => 'field_secondary_cta_button_text',
                        'label' => 'Button Text',
                        'name' => 'button_text',
                        'type' => 'text',
                        'default_value' => 'Browse our resource center',
                    ),
                    array(
                        'key' => 'field_secondary_cta_button_link',
                        'label' => 'Button Link',
                        'name' => 'button_link',
                        'type' => 'link',
                    ),
                ),
            ),
        ),
    ));

endif;
