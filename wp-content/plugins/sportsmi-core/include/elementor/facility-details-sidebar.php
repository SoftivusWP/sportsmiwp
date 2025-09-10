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
class TP_facility_det_sidebar extends Widget_Base
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
        return 'tp-facility_det_sidebar';
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
        return __('Facility Details Sidebar', 'tpcore');
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

    public function get_post_list_by_post_type($post_type)
    {
        $return_val = [];
        $args       = array(
            'post_type'      => $post_type,
            'posts_per_page' => -1,
            'post_status'      => 'publish',
        );
        $all_post   = new \WP_Query($args);

        while ($all_post->have_posts()) {
            $all_post->the_post();
            $return_val[get_the_ID()] = get_the_title();
        }
        wp_reset_query();
        return $return_val;
    }

    public function get_all_post_key($post_type)
    {
        $return_val = [];
        $args       = array(
            'post_type'      => $post_type,
            'posts_per_page' => 6,
            'post_status'      => 'publish',

        );
        $all_post   = new \WP_Query($args);

        while ($all_post->have_posts()) {
            $all_post->the_post();
            $return_val[] = get_the_ID();
        }
        wp_reset_query();
        return $return_val;
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


        // inner card
        $this->start_controls_section(
            'section_hide_show',
            [
                'label' => esc_html__('Hide Show', 'sportsmi-core'),
            ]
        );

        $this->add_control(
            'search_section_show',
            [
                'label' => esc_html__('Search Switch', 'finview-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'finview-core'),
                'label_off' => esc_html__('Hide', 'finview-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'category_section_show',
            [
                'label' => esc_html__('Category Switch', 'finview-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'finview-core'),
                'label_off' => esc_html__('Hide', 'finview-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'follow_section_show',
            [
                'label' => esc_html__('Follow Switch', 'finview-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'finview-core'),
                'label_off' => esc_html__('Hide', 'finview-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Search Show
        $this->start_controls_section(
            'search_one_general_content',
            [
                'label' => esc_html__('Search', 'sportsmi-core'),
                'condition' => [
                    'search_section_show' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'search_title_name',
            [
                'label' => esc_html__('Search Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Search', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your Title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Posts Per Page Show category
        $this->start_controls_section(
            'facility_one_general_content',
            [
                'label' => esc_html__('Category', 'sportsmi-core'),
                'condition' => [
                    'category_section_show' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'category_title_name',
            [
                'label' => esc_html__('Category Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('All Facility', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your Title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'facility_category',
            [
                'label' => __('Select facility', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('facility'),
                'default'     => $this->get_all_post_key('facility'),
            ]
        );


        $this->add_control(
            'facility_posts_per_page',
            [
                'label'       => esc_html__('Content Show', 'corelaw-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => -1,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'facility_template_order_by',
            [
                'label'   => esc_html__('Order By', 'corelaw-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'corelaw-core'),
                    'author'     => esc_html__('Post Author', 'corelaw-core'),
                    'title'      => esc_html__('Title', 'corelaw-core'),
                    'post_date'  => esc_html__('Date', 'corelaw-core'),
                    'rand'       => esc_html__('Random', 'corelaw-core'),
                    'menu_order' => esc_html__('Menu Order', 'corelaw-core'),
                ],
            ]
        );
        $this->add_control(
            'facility_template_order',
            [
                'label'   => esc_html__('Order', 'corelaw-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'corelaw-core'),
                    'desc' => esc_html__('Descending', 'corelaw-core')
                ],
                'default' => 'desc',
            ]
        );

        $this->end_controls_section();

        // social icon
        $this->start_controls_section(
            'social_content_one',
            [
                'label' => esc_html__('Social', 'sportsmi-core'),
                'condition' => [
                    'follow_section_show' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'follow_title_name',
            [
                'label' => esc_html__('Follow Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Follow Our Journey', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your Title here', 'sportsmi-core'),
                'label_block' => true,
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
                'default'         => 'left',
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






        //======================= Style =================================//


        // Sidebar
        $this->start_controls_section(
            'card_titside_style',
            [
                'label' => esc_html__('Sidebar Heading', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_side_title_style_color',
            [
                'label'     => esc_html__('Heading Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .side_heading' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Heading Typography', 'plugin-name'),
                'name'     => 'card_side_title_style_typ',
                'selector' => '{{WRAPPER}} .side_heading',

            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'card_side_style',
            [
                'label' => esc_html__('Sidebar Details', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Sidebar List Typography', 'plugin-name'),
                'name'     => 'card_side_list_style_typ',
                'selector' => '{{WRAPPER}} .side_list',

            ]
        );
        $this->add_control(
            'card_side_style_color',
            [
                'label'     => esc_html__('Sidebar List Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .side_list' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_side_i_style_color',
            [
                'label'     => esc_html__('Sidebar Icon Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .side_list i' => 'color: {{VALUE}}; border:1px solid {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'card_side_hover_style_color',
            [
                'label'     => esc_html__('List Hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .side_list:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .side_list i' => 'color: {{VALUE}}; border:1px solid {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'card_side_bg_style_color',
            [
                'label'     => esc_html__('List Hover BG', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .side_list' => 'background: {{VALUE}};',
                ],
            ]
        );

        // Icon Size
        $this->add_responsive_control(
            'card_icon_custom_dimensionsss',
            [
                'label' => esc_html__('Icon Size', 'plugin-name'),
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
                    '{{WRAPPER}} .side_list i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon box Size
        $this->add_responsive_control(
            'icon_box_custom_dimensionsss',
            [
                'label' => esc_html__('Box Size', 'plugin-name'),
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
                    '{{WRAPPER}} .side_list i' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}} !important;',


                ],
            ]
        );


        $this->add_responsive_control(
            'card_side_bg_style_radius',
            [
                'label'      => __('List Box Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .side_list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );


        $this->add_responsive_control(
            'card_side_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .side_list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_side_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .side_list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'social_side_style',
            [
                'label' => esc_html__('Social', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'social_side_i_style_color',
            [
                'label'     => esc_html__('Social Icon Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social i' => 'color: {{VALUE}}; border:1px solid {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'social_side_hover_style_color',
            [
                'label'     => esc_html__('Social Hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social a:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'social_side_bg_style_color',
            [
                'label'     => esc_html__('Social BG', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social a' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'social_side_bg_style_color2',
            [
                'label'     => esc_html__('Social Hover BG', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        // Icon Size
        $this->add_responsive_control(
            'social_icon_custom_dimensionsss',
            [
                'label' => esc_html__('Icon Size', 'plugin-name'),
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
                    '{{WRAPPER}} .social i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon box Size
        $this->add_responsive_control(
            'social_icon_box_custom_dimensionsss',
            [
                'label' => esc_html__('Box Size', 'plugin-name'),
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

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'socialborder',
                'selector' => '{{WRAPPER}} .social a',
            ]
        );

        $this->add_responsive_control(
            'social_side_bg_style_radius2',
            [
                'label'      => __('List Box Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .social a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'space_between_widgets',
            [
                'label'     => esc_html__('Gap', 'aikeu-core'),
                'type'      => Controls_Manager::GAPS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw'],
                'selectors'  => [
                    '{{WRAPPER}} .social' => 'gap: {{ROW}}{{UNIT}} {{COLUMN}}{{UNIT}}',
                ],
            ]
        );


        $this->add_responsive_control(
            'social_side_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .social' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_side_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .social' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
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

        $query = new \WP_Query(
            array(
                'post_type'      => 'facility',
                'posts_per_page' => $settings['facility_posts_per_page'],
                'orderby'        => $settings['facility_template_order_by'],
                'order'          => $settings['facility_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish',

            )
        );

?>
    <!-- ==== details start ==== -->
    <div class="sidebar cus_card wow fadeInUp" data-wow-duration="0.4s">
        <?php if (!empty($settings['search_section_show'] == 'yes')) :   ?>
            <div class="sidebar__single cus_card">
                <h5 class="side_heading"> <?php echo esc_html($settings['search_title_name']) ?></h5>
                <hr>
                <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                    <div class="search_form">
                        <input type="text" name="s" value="<?php echo get_search_query(); ?>" id="supportSearch" placeholder="<?php echo esc_attr__('Search', 'gamestorm'); ?>">
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
        <?php if (!empty($settings['category_section_show'] == 'yes')) :   ?>
            <div class="sidebar__single cus_card">
                <h5 class="side_heading"><?php echo esc_html($settings['category_title_name']) ?></h5>
                <div class="sidebar__tab">
                    <ul>
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                        ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>" class="facility-tab-btn side_list">
                                        <i class="fa-solid fa-angle-right"></i>
                                        <?php the_title(); ?>
                                    </a>
                                </li>
                            <?php endwhile ?>
                        <?php endif ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        <?php if (!empty($settings['follow_section_show'] == 'yes')) :   ?>
            <div class="sidebar__single cus_card">
                <h5 class="side_heading"><?php echo esc_html($settings['follow_title_name']) ?></h5>
                <hr class="cus_border">
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
            </div>
        <?php endif ?>
    </div>
    <!-- ==== details start ==== -->

<?php
    }
}

$widgets_manager->register(new TP_facility_det_sidebar());
