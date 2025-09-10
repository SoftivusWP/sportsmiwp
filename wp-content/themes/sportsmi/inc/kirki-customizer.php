<?php

/**
 * bentox customizer
 *
 * @package bentox
 */

use Kirki\Compatibility\Kirki;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Added Panels & Sections
 */
function bentox_customizer_panels_sections($wp_customize)
{

    //Add panel
    $wp_customize->add_panel('bentox_customizer', [
        'priority' => 10,
        'title'    => esc_html__('Sportsmi Customizer', 'sportsmi'),
    ]);

    /**
     * Customizer Section
     */
    $wp_customize->add_section('header_top_setting', [
        'title'       => esc_html__('Header Info Setting', 'sportsmi'),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bentox_customizer',
    ]);

    $wp_customize->add_section('header_top_setting_color', [
        'title'       => esc_html__('Header Menu Color', 'sportsmi'),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bentox_customizer',
    ]);

    $wp_customize->add_section('section_header_logo', [
        'title'       => esc_html__('Header Setting', 'sportsmi'),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bentox_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'sportsmi'),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bentox_customizer',
    ]);

    $wp_customize->add_section('header_side_setting', [
        'title'       => esc_html__('Side Info', 'sportsmi'),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bentox_customizer',
    ]);

    $wp_customize->add_section('breadcrumb_setting', [
        'title'       => esc_html__('Breadcrumb Setting', 'sportsmi'),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bentox_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'sportsmi'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bentox_customizer',
    ]);

    $wp_customize->add_section('footer_setting', [
        'title'       => esc_html__('Footer Settings', 'sportsmi'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bentox_customizer',
    ]);

    $wp_customize->add_section('color_setting', [
        'title'       => esc_html__('Color Setting', 'sportsmi'),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bentox_customizer',
    ]);

    $wp_customize->add_section('404_page', [
        'title'       => esc_html__('404 Page', 'sportsmi'),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bentox_customizer',
    ]);

    $wp_customize->add_section('typo_setting', [
        'title'       => esc_html__('Typography Setting', 'sportsmi'),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bentox_customizer',
    ]);

    $wp_customize->add_section('slug_setting', [
        'title'       => esc_html__('Slug Settings', 'sportsmi'),
        'description' => '',
        'priority'    => 22,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bentox_customizer',
    ]);
}

add_action('customize_register', 'bentox_customizer_panels_sections');

function _header_top_fields($fields)
{


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bentox_preloader',
        'label'    => esc_html__('Preloader On/Off', 'sportsmi'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
    ];

    $fields[] = [
        'type'        => 'text',
        'settings'    => 'preloader_text',
        'label'       => esc_html__('Preloader Text', 'sportsmi'),
        'section'     => 'header_top_setting',
        'default'     => 'LOADING',
        'active_callback' => [
            [
                'setting'  => 'aikeu_preloader',
                'operator' => '==',
                'value'    => true,
            ]
        ]
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'preloader_image',
        'label'       => esc_html__('Preloader Image', 'sportsmi'),
        'section'     => 'header_top_setting',
        'default'     => '', // No default image
        'active_callback' => [
            [
                'setting'  => 'aikeu_preloader',
                'operator' => '==',
                'value'    => true,
            ]
        ]
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bentox_backtotop',
        'label'    => esc_html__('Back To Top On/Off', 'sportsmi'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bentox_cart_switch',
        'label'    => esc_html__('Cart Swicher', 'sportsmi'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
    ];

    // Login Button
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'header_user_switch',
        'label'    => esc_html__('User Swicher', 'sportsmi'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'choose_style_login_button',
        'label'       => esc_html__('Select Button Style', 'sportsmi'),
        'section'     => 'header_top_setting',
        'placeholder' => esc_html__('Select an option...', 'sportsmi'),
        'priority'    => 10,
        'multiple'    => false,
        'choices'     => [
            'style_one' => esc_html__('Style One', 'sportsmi'),
            'style_two' => esc_html__('Style Two', 'sportsmi'),
        ],
        'default'     => 'style_one',
        'active_callback' => [
            [
                'setting'  => 'header_user_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];


    // Login Button Text
    $fields[] = [
        'type'     => 'text',
        'settings' => 'loginbtn_text',
        'label'    => esc_html__('Login Text', 'sportsmi'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Sign In', 'sportsmi'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'header_user_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];


    // URL
    $fields[] = [
        'type'     => 'link',
        'settings' => 'loginbtn_link',
        'label'    => esc_html__('Login Link', 'sportsmi'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('', 'sportsmi'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'header_user_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'header_button_switch',
        'label'    => esc_html__('Button Swicher', 'sportsmi'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
    ];


    $fields[] = [
        'type'        => 'select',
        'settings'    => 'choose_style_button',
        'label'       => esc_html__('Select Button Style', 'sportsmi'),
        'section'     => 'header_top_setting',
        'placeholder' => esc_html__('Select an option...', 'sportsmi'),
        'priority'    => 10,
        'multiple'    => false,
        'choices'     => [
            'style_one' => esc_html__('Style One', 'sportsmi'),
            'style_two' => esc_html__('Style Two', 'sportsmi'),
        ],
        'default'     => 'style_one',
        'active_callback' => [
            [
                'setting'  => 'header_button_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    // Button Text Two
    $fields[] = [
        'type'     => 'text',
        'settings' => 'header_button_text',
        'label'    => esc_html__('Header Button Text', 'sportsmi'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Button', 'sportsmi'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'header_button_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];


    // email
    $fields[] = [
        'type'     => 'link',
        'settings' => 'header_button_link',
        'label'    => esc_html__('Header Button Link', 'sportsmi'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('', 'sportsmi'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'header_button_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    return $fields;
}

add_filter('kirki/fields', '_header_top_fields');



/*
Header Settings
 */
function _header_header_fields($fields)
{
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__('Select Header Style', 'sportsmi'),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__('Select an option...', 'sportsmi'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__('Header Logo', 'sportsmi'),
        'description' => esc_html__('Upload Your Logo.', 'sportsmi'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/images/logo/logo.png',
        'active_callback' => [
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'secondary_logo',
        'label'       => esc_html__('Header Secondary Logo', 'sportsmi'),
        'description' => esc_html__('Upload Your Secondary Logo.', 'sportsmi'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/images/logo/logo-secondary.png',
        'active_callback' => [
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-2',
            ],
        ],
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_header_fields');



/*
Header Settings color
 */
function _header_top_fields_color($fields)
{

    // menu

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'header_menu_bg_color',
        'label'       => __('Header BG Color', 'sportsmi'),
        'description' => esc_html__('This is a Header BG Color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'header_menu_active_bg_color',
        'label'       => __('Header Active BG Color', 'sportsmi'),
        'description' => esc_html__('This is a Header Active BG Color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'header_menu_typography',
        'label'       => esc_html__('Menu Typography', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.header .nav__menu-items li a,.header .nav__menu-items li.dropdown>a::after',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'header_menu_color',
        'label'       => __('Menu Color', 'sportsmi'),
        'description' => esc_html__('This is a Menu color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'header_menu_color_hover',
        'label'       => __('Menu Hover Color', 'sportsmi'),
        'description' => esc_html__('This is a Menu color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'header_menu_color_drop',
        'label'       => __('Menu Dropdown BG Color', 'sportsmi'),
        'description' => esc_html__('This is a Menu color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'header_menu_drop_color',
        'label'       => __('Menu Dropdown Color', 'sportsmi'),
        'description' => esc_html__('This is a Menu color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'header_menu_drop_color_hover',
        'label'       => __('Menu Dropdown Hover Color', 'sportsmi'),
        'description' => esc_html__('This is a Menu color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 10,
    ];


    // rightside


    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'menu_btn_typography',
        'label'       => esc_html__('Button Typography', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
        ],
        'priority'    => 12,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.cmn-button',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'menu_menu_cart_color',
        'label'       => __('Menu Cart Color', 'sportsmi'),
        'description' => esc_html__('This is a Cart color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 12,
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'custom_menu_css_user_color',
        'label'       => __('User Text Color', 'sportsmi'),
        'description' => esc_html__('This is a Button color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 12,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'custom_menu2_css_user_color',
        'label'       => __('header2 User Text Color', 'sportsmi'),
        'description' => esc_html__('This is a Button color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 12,
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'custom_menu_css_buttom',
        'label'       => __('Menu Button BG', 'sportsmi'),
        'description' => esc_html__('This is a Button bg color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 12,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'custom_menu_css_buttom_border',
        'label'       => __('Menu Button Border', 'sportsmi'),
        'description' => esc_html__('This is a Button border color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 12,
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'custom_menu_css_buttom_color',
        'label'       => __('Menu Button Color', 'sportsmi'),
        'description' => esc_html__('This is a Button color control.', 'sportsmi'),
        'section'     => 'header_top_setting_color',
        'default'     => '',
        'priority'    => 12,
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_top_fields_color');


/*
_header_page_title_fields
 */
function _header_page_title_fields($fields)
{

    // Breadcrumb Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_switch',
        'label'    => esc_html__('Breadcrumb Hide', 'sportsmi'),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
    ];


    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__('Breadcrumb Background Image', 'sportsmi'),
        'description' => esc_html__('Breadcrumb Background Image', 'sportsmi'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/images/banner/breadcrumb.png',
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'breadcrumb_bg_color',
        'label'       => __('Breadcrumb BG Color', 'sportsmi'),
        'description' => esc_html__('This is a Breadcrumb bg color control.', 'sportsmi'),
        'section'     => 'breadcrumb_setting',
        'default'     => '#05441a',
        'priority'    => 10,
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    // Breadcrumb title Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_title_switch',
        'label'    => esc_html__('Breadcrumb Title Hide', 'sportsmi'),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'breadcrumb_title_typography',
        'label'       => esc_html__('Breadcrumb Title Font', 'sportsmi'),
        'section'     => 'breadcrumb_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.banner--inner .banner--inner__content h2',
            ],
        ],
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_title_switch',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'breadcrumb_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    // Breadcrumb text Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_text_switch',
        'label'    => esc_html__('Breadcrumb Text Hide', 'sportsmi'),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'breadcrumb_text_typography',
        'label'       => esc_html__('Breadcrumb Font', 'sportsmi'),
        'section'     => 'breadcrumb_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.banner--inner__breadcrumb span, .banner--inner__breadcrumb',
            ],
        ],
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_text_switch',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'breadcrumb_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_shop',
        'label'    => esc_html__('Shop Title', 'sportsmi'),
        'section'  => 'breadcrumb_setting',
        'default'  => esc_html__('Shop', 'sportsmi'),
        'priority' => 10,
    ];

    // $fields[] = [
    //     'type'     => 'text',
    //     'settings' => 'breadcrumb_product_details',
    //     'label'    => esc_html__('Shop Details', 'sportsmi'),
    //     'section'  => 'breadcrumb_setting',
    //     // 'default'  => esc_html__('Shop Details', 'sportsmi'),
    //     'priority' => 10,
    // ];



    // $fields[] = [
    //     'type'     => 'switch',
    //     'settings' => 'breadcrumb_info_switch',
    //     'label'    => esc_html__('Breadcrumb Info switch', 'sportsmi'),
    //     'section'  => 'breadcrumb_setting',
    //     'default'  => '1',
    //     'priority' => 10,
    //     'choices'  => [
    //         'on'  => esc_html__('Enable', 'sportsmi'),
    //         'off' => esc_html__('Disable', 'sportsmi'),
    //     ],
    // ];

    return $fields;
}
add_filter('kirki/fields', '_header_page_title_fields');

/*
Header Social
 */
function _header_blog_fields($fields)
{
    // Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bentox_blog_btn_switch',
        'label'    => esc_html__('Blog BTN On/Off', 'sportsmi'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bentox_blog_cat',
        'label'    => esc_html__('Blog Category Meta On/Off', 'sportsmi'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bentox_blog_author',
        'label'    => esc_html__('Blog Author Meta On/Off', 'sportsmi'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bentox_blog_date',
        'label'    => esc_html__('Blog Date Meta On/Off', 'sportsmi'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bentox_blog_comments',
        'label'    => esc_html__('Blog Comments Meta On/Off', 'sportsmi'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bentox_blog_btn',
        'label'    => esc_html__('Blog Button text', 'sportsmi'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Read More', 'sportsmi'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__('Blog Title', 'sportsmi'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog', 'sportsmi'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__('Blog Details Title', 'sportsmi'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog Details', 'sportsmi'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_blog_fields');

/*
Footer
 */
function _header_footer_fields($fields)
{
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__('Choose Footer Style', 'sportsmi'),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__('Select an option...', 'sportsmi'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
        ],
        'default'     => 'footer-style-1',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'bentox_footer_bg_color',
        'label'       => __('Footer BG Color', 'sportsmi'),
        'description' => esc_html__('This is a Footer bg color control.', 'sportsmi'),
        'section'     => 'footer_setting',
        'default'     => '#05441A',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_shape_image',
        'label'    => esc_html__('Shape Image On/Off', 'sportsmi'),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'sportsmi'),
            'off' => esc_html__('Disable', 'sportsmi'),
        ],
    ];

    $fields[] = [
        'type'        => 'slider',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__('Number of Footer Widget Columns', 'sportsmi'),
        'description' => esc_html__('Select how many widget columns to show in the footer.', 'sportsmi'),
        'section'     => 'footer_setting',
        'default'     => 4,
        'choices'     => [
            'min'  => 1,
            'max'  => 5,
            'step' => 1,
        ],
    ];



    $fields[] = [
        'type'     => 'text',
        'settings' => 'bentox_copyright',
        'label'    => esc_html__('Copy Right', 'sportsmi'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('Copyright &copy; 2025 SportsMI. All Rights Reserved', 'sportsmi'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_footer_fields');

// color
function bentox_color_fields($fields)
{

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'primary_color_option',
        'label'       => __('Primary Color', 'sportsmi'),
        'description' => esc_html__('This is a Primary color control.', 'sportsmi'),
        'section'     => 'color_setting',
        'default'     => '#0e7a31',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'secondary_color_option',
        'label'       => __('Secondary Color', 'sportsmi'),
        'description' => esc_html__('This is a Secondary color control.', 'sportsmi'),
        'section'     => 'color_setting',
        'default'     => '#ffffff',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'tertiary_color_option',
        'label'       => __('Tertiary Color', 'sportsmi'),
        'description' => esc_html__('This is a Tertiary color control.', 'sportsmi'),
        'section'     => 'color_setting',
        'default'     => '#3f3f3f',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', 'bentox_color_fields');

// 404
function bentox_404_fields($fields)
{
    // 404 settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'bentox_404_bg',
        'label'       => esc_html__('404 Image.', 'sportsmi'),
        'description' => esc_html__('404 Image.', 'sportsmi'),
        'section'     => '404_page',
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'bentox_error_title',
        'label'    => esc_html__('Not Found Title', 'sportsmi'),
        'section'  => '404_page',
        'default'  => esc_html__('Page not found', 'sportsmi'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'bentox_error_desc',
        'label'    => esc_html__('404 Description Text', 'sportsmi'),
        'section'  => '404_page',
        'default'  => esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'sportsmi'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'bentox_error_link_text',
        'label'    => esc_html__('404 Link Text', 'sportsmi'),
        'section'  => '404_page',
        'default'  => esc_html__('Back To Home', 'sportsmi'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'bentox_404_fields');


/**
 * Added Fields
 */
function bentox_typo_fields($fields)
{
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__('Body Font', 'sportsmi'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'p',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_link_setting',
        'label'       => esc_html__('Link', 'sportsmi'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'a',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_span_setting',
        'label'       => esc_html__('Span', 'sportsmi'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'a',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__('Heading h1 Fonts', 'sportsmi'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__('Heading h2 Fonts', 'sportsmi'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__('Heading h3 Fonts', 'sportsmi'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__('Heading h4 Fonts', 'sportsmi'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__('Heading h5 Fonts', 'sportsmi'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__('Heading h6 Fonts', 'sportsmi'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter('kirki/fields', 'bentox_typo_fields');



/**
 * Added Fields
 */
function slug_setting($fields)
{
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'event_slug',
        'label'    => esc_html__('Event Slug', 'sportsmi'),
        'section'  => 'slug_setting',
        'placeholder' => esc_html__('event', 'sportsmi'),
        'default'  => esc_html__('event', 'sportsmi'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'facility_slug',
        'label'    => esc_html__('Facility Slug', 'sportsmi'),
        'section'  => 'slug_setting',
        'placeholder' => esc_html__('facility', 'sportsmi'),
        'default'  => esc_html__('facility', 'sportsmi'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'training_slug',
        'label'    => esc_html__('Trainings Slug', 'sportsmi'),
        'section'  => 'slug_setting',
        'placeholder' => esc_html__('trainings', 'sportsmi'),
        'default'  => esc_html__('trainings', 'sportsmi'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'team_slug',
        'label'    => esc_html__('Team Slug', 'sportsmi'),
        'section'  => 'slug_setting',
        'default'  => esc_html__('team', 'sportsmi'),
        'placeholder' => esc_html__('team', 'sportsmi'),
        'priority' => 10,
    ];

    return $fields;
}

add_filter('kirki/fields', 'slug_setting');




/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function bentox_THEME_option($name)
{
    $value = '';
    if (class_exists('sportsmi')) {
        $value = kirki::get_option(bentox_get_theme(), $name);
    }

    return apply_filters('bentox_THEME_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function bentox_get_theme()
{
    return 'sportsmi';
}
