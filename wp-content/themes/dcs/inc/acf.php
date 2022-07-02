<?php

/**
 * Integration with Advanced Custom Fields
 */

// https://www.advancedcustomfields.com/resources/options-page/

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
    ]);

    acf_add_options_sub_page([
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ]);

    acf_add_options_sub_page([
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ]);
}

// https://www.advancedcustomfields.com/resources/register-fields-via-php/

if (class_exists('ACF')) {
    function dcs_acf_contacts()
    {
        acf_add_local_field_group(
            [

                'key' => 'group_theme_contacts',
                'title' => __('Contacts', 'dcs'),
                'fields' => [
                    [
                        'key' => 'field_6013f4fcd2434',
                        'label' => __('Contacts', 'dcs'),
                        'name' => 'contacts',
                        'type' => 'group',
                        'instructions' => __('Displayed in the site footer', 'dcs'),
                        'layout' => 'block',
                        'sub_fields' => [
                            [
                                'key' => 'field_6013f5efd2435',
                                'label' => __('Company', 'dcs'),
                                'name' => 'company',
                                'type' => 'text',
                                'instructions' => __('Example: Full Company Name', 'dcs'),
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                            [
                                'key' => 'field_6013f61bd2436',
                                'label' => __('Address - Line 1', 'dcs'),
                                'name' => 'address_1',
                                'type' => 'text',
                                'instructions' => __('Example: Street, Number', 'dcs'),
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                            [
                                'key' => 'field_6013f74fd2437',
                                'label' => __('Address - Line 2', 'dcs'),
                                'name' => 'address_2',
                                'type' => 'text',
                                'instructions' => __('Example => Postal Code, City, State', 'dcs'),
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                            [
                                'key' => 'field_6013fcab912d8',
                                'label' => __('Map URL', 'dcs'),
                                'name' => 'map_url',
                                'type' => 'url',
                                'instructions' => __('Example: https://goo.gl/maps/sNAFh8SNCLH5cYyL7 for Google Maps', 'dcs'),
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                            [
                                'key' => 'field_6013fcf2912d9',
                                'label' => __('Phone number', 'dcs'),
                                'name' => 'phone',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                            [
                                'key' => 'field_6013fd0b912da',
                                'label' => __('E-mail address', 'dcs'),
                                'name' => 'email',
                                'type' => 'email',
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                            [
                                'key' => 'field_6013fd34912db',
                                'label' => __('ID Number', 'dcs'),
                                'name' => 'id_number',
                                'type' => 'text',
                                'instructions' => __('Example: Social Security Number, Fiscal Code, etc.', 'dcs'),
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                            [
                                'key' => 'field_6013fd4b912dc',
                                'label' => __('VAT Number', 'dcs'),
                                'name' => 'vat_number',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'theme-general-settings',
                        ],
                    ],
                ],
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'seamless',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
            ]
        );
    }

    add_action('acf/init', 'dcs_acf_contacts');
}

if (class_exists('ACF')) {
    function dcs_acf_social()
    {
        acf_add_local_field_group(
            [
                'key' => 'group_theme_social',
                'title' => __('Social profiles', 'dcs'),
                'fields' => [
                    [
                        'key' => 'field_601400d769ba3',
                        'label' => __('Social profiles', 'dcs'),
                        'name' => 'social',
                        'type' => 'group',
                        'instructions' => __('Full social profile addresses. Not all fields are required, only filled fields will be displayed on the site as icons', 'dcs'),
                        'layout' => 'block',
                        'sub_fields' => [
                            [
                                'key' => 'field_601400d769ba7',
                                'label' => 'Facebook',
                                'name' => 'facebook',
                                'type' => 'url',
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                            [
                                'key' => 'field_601401b269bac',
                                'label' => 'Twitter',
                                'name' => 'twitter',
                                'type' => 'url',
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                            [
                                'key' => 'field_601401e469bad',
                                'label' => 'LinkedIn',
                                'name' => 'linkedin',
                                'type' => 'url',
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                            [
                                'key' => 'field_601401f569bae',
                                'label' => 'Instagram',
                                'name' => 'instagram',
                                'type' => 'url',
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                            [
                                'key' => 'field_6014026069baf',
                                'label' => 'Pinterest',
                                'name' => 'pinterest',
                                'type' => 'url',
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                            [
                                'key' => 'field_6014026f69bb0',
                                'label' => 'YouTube',
                                'name' => 'youtube',
                                'type' => 'url',
                                'wrapper' => [
                                    'width' => '33',
                                ],
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'theme-general-settings',
                        ],
                    ],
                ],
                'menu_order' => 1,
                'position' => 'normal',
                'style' => 'seamless',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
            ]
        );
    }

    add_action('acf/init', 'dcs_acf_social');
}

if (class_exists('ACF')) {
    function dcs_acf_meta()
    {
        acf_add_local_field_group(
            [

                'key' => 'group_theme_meta',
                'title' => __('Meta', 'dcs'),
                'fields' => [
                    [
                        'key' => 'field_60140651ee8f1',
                        'label' => __('Meta', 'dcs'),
                        'name' => 'meta',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => [
                            [
                                'key' => 'field_60140662ee8f2',
                                'label' => __('Chrome Theme', 'dcs'),
                                'name' => 'theme_color',
                                'type' => 'color_picker',
                                'instructions' => __('Tab color in Chrome for Android', 'dcs'),
                                'wrapper' => [
                                    'width' => '25',
                                ],
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'theme-general-settings',
                        ],
                    ],
                ],
                'menu_order' => 2,
                'position' => 'normal',
                'style' => 'seamless',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
            ]
        );
    }

    add_action('acf/init', 'dcs_acf_meta');

    // --- Metadata ---

    function dcs_head_meta()
    {
        // --- Chrome theme ---
        $themeColor = get_field('meta_theme_color', 'option');
        if ($themeColor) {
            echo '<meta name="theme-color" content="', esc_attr($themeColor), '">';
        }
    }

    add_action('wp_head', 'dcs_head_meta');
}

// --- Social icons ---

function dcs_socialicons()
{
    return [
        'facebook' => [
            'social-name' => 'Facebook',
            'icon-style' => 'fa-brands',
            'icon-name' => 'fa-facebook-f',
        ],
        'twitter' => [
            'social-name' => 'Twitter',
            'icon-style' => 'fa-brands',
            'icon-name' => 'fa-twitter',
        ],
        'linkedin' => [
            'social-name' => 'LinkedIn',
            'icon-style' => 'fa-brands',
            'icon-name' => 'fa-linkedin-in',
        ],
        'instagram' => [
            'social-name' => 'Instagram',
            'icon-style' => 'fa-brands',
            'icon-name' => 'fa-instagram',
        ],
        'pinterest' => [
            'social-name' => 'Pinterest',
            'icon-style' => 'fa-brands',
            'icon-name' => 'fa-pinterest-p',
        ],
        'youtube' => [
            'social-name' => 'YouTube',
            'icon-style' => 'fa-brands',
            'icon-name' => 'fa-youtube',
        ],
    ];
}
