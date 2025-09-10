<?php

namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_social extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'tp-social';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Social', 'tpcore');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'tp-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['tpcore'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['tpcore'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {


        // ======================================Content One============================================//
        $this->start_controls_section(
            'social_content',
            [
                'label' => esc_html__('Social', 'sportsmi-core'),
            ]
        );



        $this->add_responsive_control(
            'sportsmi_social_content_align',
            [
                'label'         => esc_html__('Social Align', 'sportsmi-core'),
                'type'             => \Elementor\Controls_Manager::CHOOSE,
                'options'         => [
                    'left'         => [
                        'title' => esc_html__('Left', 'sportsmi-core'),
                        'icon'     => 'eicon-text-align-left',
                    ],
                    'center'     => [
                        'title' => esc_html__('Center', 'sportsmi-core'),
                        'icon'     => 'eicon-text-align-center',
                    ],
                    'right'     => [
                        'title' => esc_html__('Right', 'sportsmi-core'),
                        'icon'     => 'eicon-text-align-right',
                    ],
                    'justify'     => [
                        'title' => esc_html__('Justified', 'sportsmi-core'),
                        'icon'     => 'eicon-text-align-justify',
                    ],
                ],
                'default'         => 'center',
                'selectors'     => [
                    '{{WRAPPER}} .social ' => 'justify-content: {{VALUE}};',
                ],

            ],

        );


        // Facebook URL
        $this->add_control(
            'social_fb_icon_url',
            [
                'label' => esc_html__('Facebook URL', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => esc_html__('#', 'sportsmi-core'),
                'placeholder' => esc_html__('https://your-link.com', 'sportsmi-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        // Twitter URL
        $this->add_control(
            'social_tw_icon_url',
            [
                'label' => esc_html__('Twitter URL', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'sportsmi-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        // Instagram URL
        $this->add_control(
            'social_in_icon_url',
            [
                'label' => esc_html__('Instagram URL', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'sportsmi-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        // LinkedIn URL
        $this->add_control(
            'social_ln_icon_url',
            [
                'label' => esc_html__('LinkedIn URL', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'sportsmi-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        // YouTube URL
        $this->add_control(
            'social_yt_icon_url',
            [
                'label' => esc_html__('YouTube URL', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'sportsmi-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        // fb URL
        $this->add_control(
            'social_tel_icon_url',
            [
                'label' => esc_html__('Telegram URL', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'sportsmi-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        // fb URL
        $this->add_control(
            'social_wc_icon_url',
            [
                'label' => esc_html__('WhatsApp URL', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'sportsmi-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        // fb URL
        $this->add_control(
            'social_wa_icon_url',
            [
                'label' => esc_html__('WeChat URL', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'sportsmi-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );



        $this->end_controls_section();

        // ======================= Style =================================//

        // Card style

        $this->start_controls_section(
            'slider_description_style',
            [
                'label' => esc_html__('Card', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        // $this->add_group_control(
        //     Group_Control_Typography::get_type(),
        //     [
        //         'label'    => esc_html__('Name Typography', 'sportsmi-core'),
        //         'name'     => 'slider_name_style_typ',
        //         'selector' => '{{WRAPPER}} .team_name',

        //     ]
        // );
        // $this->add_group_control(
        //     Group_Control_Typography::get_type(),
        //     [
        //         'label'    => esc_html__('Designation Typography', 'sportsmi-core'),
        //         'name'     => 'slider_desig_style_typ',
        //         'selector' => '{{WRAPPER}} .team_deg',

        //     ]
        // );

        // $this->add_control(
        //     'card_bg_style_color',
        //     [
        //         'label'     => esc_html__('Card Bg', 'sportsmi-core'),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .team__slider-card' => 'background: {{VALUE}};',
        //         ],
        //     ]
        // );

        // $this->add_control(
        //     'slider_name_style_color',
        //     [
        //         'label'     => esc_html__('Name Color', 'sportsmi-core'),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .team_name' => 'color: {{VALUE}};',
        //         ],
        //     ]
        // );
        // $this->add_control(
        //     'slider_desig_style_color',
        //     [
        //         'label'     => esc_html__('Designation Color', 'sportsmi-core'),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .team_deg' => 'color: {{VALUE}};',
        //         ],
        //     ]
        // );


        // Icon Size
        $this->add_responsive_control(
            'counter_icon_custom_dimensionsss',
            [
                'label' => esc_html__('Social Icon Size', 'finview-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .social a i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon box Size
        $this->add_responsive_control(
            'counter_icon_box_custom_dimensionsss',
            [
                'label' => esc_html__('Box Size', 'finview-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .social a' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}} !important;',


                ],
            ]
        );
        $this->add_control(
            'slider_social_icon_style_color',
            [
                'label'     => esc_html__('Social Icon Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'slider_social_iconhov_style_color',
            [
                'label'     => esc_html__('Social Icon Hover Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social a:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'slidel_iconhov_style_color',
            [
                'label'     => esc_html__('Social BG', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social a' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sliiconhov_style_color',
            [
                'label'     => esc_html__('Social Hover BG', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_border',
                'selector' => '{{WRAPPER}} .social a',
            ]
        );

        $this->add_control(
            'slider_socisal_iconhov_style_color',
            [
                'label'     => esc_html__('Border Hover Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_border_radius',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .social a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );

        $this->add_responsive_control(
            'slider_cardf_stylde_margin',
            [
                'label' => esc_html__('Name Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .social' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->end_controls_section();



    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>

        <div class="social">
            <?php if (!empty($settings['social_fb_icon_url'])) :   ?>
                <a href="<?php echo esc_html($settings['social_fb_icon_url']['url']) ?>">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
            <?php endif ?>
            <?php if (!empty($settings['social_tw_icon_url']['url'])) :   ?>
                <a href="<?php echo esc_html($settings['social_tw_icon_url']['url']) ?>">
                    <i class="fa-brands fa-twitter"></i>
                </a>
            <?php endif ?>
            <?php if (!empty($settings['social_in_icon_url']['url'])) :   ?>
                <a href="<?php echo esc_html($settings['social_in_icon_url']['url']) ?>">
                    <i class="fa-brands fa-square-instagram"></i>
                </a>
            <?php endif ?>
            <?php if (!empty($settings['social_ln_icon_url']['url'])) :   ?>
                <a href="<?php echo esc_html($settings['social_ln_icon_url']['url']) ?>">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
            <?php endif ?>
            <?php if (!empty($settings['social_yt_icon_url']['url'])) :   ?>
                <a href="<?php echo esc_html($settings['social_yt_icon_url']['url']) ?>">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            <?php endif ?>
            <?php if (!empty($settings['social_tel_icon_url']['url'])) :   ?>
                <a href="<?php echo esc_html($settings['social_tel_icon_url']['url']) ?>">
                    <i class="fa-brands fa-telegram"></i>
                </a>
            <?php endif ?>
            <?php if (!empty($settings['social_wc_icon_url']['url'])) :   ?>
                <a href="<?php echo esc_html($settings['social_wc_icon_url']['url']) ?>">
                    <i class="fa-brands fa-weixin"></i>
                </a>
            <?php endif ?>
            <?php if (!empty($settings['social_wa_icon_url']['url'])) :   ?>
                <a href="<?php echo esc_html($settings['social_wa_icon_url']['url']) ?>">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
            <?php endif ?>
        </div>

<?php
    }
}

$widgets_manager->register(new TP_social());
