<?php
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_theme_settings',
        'title' => 'Theme Settings',
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
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
            // Brand Colors
            array(
                'key' => 'field_brand_colors',
                'label' => 'Brand Colors',
                'name' => 'brand_colors',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_primary_color',
                        'label' => 'Primary Color',
                        'name' => 'primary_color',
                        'type' => 'color_picker',
                        'default_value' => '#0E3A62',
                    ),
                    array(
                        'key' => 'field_secondary_color',
                        'label' => 'Secondary Color',
                        'name' => 'secondary_color',
                        'type' => 'color_picker',
                        'default_value' => '#1E64AA',
                    ),
                    array(
                        'key' => 'field_accent_color',
                        'label' => 'Accent Color',
                        'name' => 'accent_color',
                        'type' => 'color_picker',
                        'default_value' => '#FF5A09',
                    ),
                ),
            ),

            // Header Settings
            array(
                'key' => 'field_header_settings',
                'label' => 'Header Settings',
                'name' => 'header_settings',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_header_cta_text',
                        'label' => 'Header CTA Text',
                        'name' => 'header_cta_text',
                        'type' => 'text',
                        'default_value' => 'Get your personalized demo',
                    ),
                    array(
                        'key' => 'field_header_cta_link',
                        'label' => 'Header CTA Link',
                        'name' => 'header_cta_link',
                        'type' => 'link',
                    ),
                ),
            ),

            // Company Information
            array(
                'key' => 'field_company_info',
                'label' => 'Company Information',
                'name' => 'company_info',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_company_name',
                        'label' => 'Company Name',
                        'name' => 'company_name',
                        'type' => 'text',
                        'default_value' => 'ImpactHXM',
                    ),
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
                        'rows' => 3,
                    ),
                    array(
                        'key' => 'field_company_address_2',
                        'label' => 'Secondary Address',
                        'name' => 'company_address_2',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                ),
            ),

            // Social Links
            array(
                'key' => 'field_social_links',
                'label' => 'Social Media Links',
                'name' => 'social_links',
                'type' => 'group',
                'layout' => 'block',
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

            // Certifications
            array(
                'key' => 'field_certifications',
                'label' => 'Certifications',
                'name' => 'certifications',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_bbb_link',
                        'label' => 'BBB Profile Link',
                        'name' => 'bbb_link',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_nglcc_link',
                        'label' => 'NGLCC Profile Link',
                        'name' => 'nglcc_link',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_outgeorgia_link',
                        'label' => 'OUT Georgia Profile Link',
                        'name' => 'outgeorgia_link',
                        'type' => 'url',
                    ),
                ),
            ),

            // Footer Settings
            array(
                'key' => 'field_footer_settings',
                'label' => 'Footer Settings',
                'name' => 'footer_settings',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_footer_legal_text',
                        'label' => 'Legal Text',
                        'name' => 'footer_legal_text',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                    ),
                ),
            ),
        ),
    ));

    // Register Options Page
    if (function_exists('acf_add_options_page')):
        acf_add_options_page(array(
            'page_title' => 'Theme Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-settings',
            'capability' => 'edit_theme_options',
            'redirect' => false,
            'position' => '59.5',
            'icon_url' => 'dashicons-admin-customizer',
        ));
    endif;

endif;
