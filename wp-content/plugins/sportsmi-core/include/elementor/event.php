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
class TP_event extends Widget_Base
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
        return 'tp-event';
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
        return __('Event', 'tpcore');
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
            'posts_per_page' => 8,
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



        $this->start_controls_section(
            'event_general_content',
            [
                'label' => esc_html__('General', 'sportsmi-core')
            ]
        );
        $this->add_control(
            'sportsmi_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'sportsmi-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'sportsmi-core'),
                    'style_two' => esc_html__('Style Two', 'sportsmi-core'),
                    'style_three' => esc_html__('Style Three', 'sportsmi-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();


        // Posts Per Page Show
        $this->start_controls_section(
            'event_one_general_content',
            [
                'label' => esc_html__('Content', 'sportsmi-core')
            ]
        );


        $this->add_control(
            'event_category',
            [
                'label' => __('Select Event', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('event'),
                'default'     => $this->get_all_post_key('event'),
            ]
        );


        $this->add_control(
            'event_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 8,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'event_template_order_by',
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
            'event_template_order',
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



        $this->start_controls_section(
            'trainings_three_heading_general_content',
            [
                'label' => esc_html__('Heading', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_two',]
                ]
            ]
        );

        $this->add_control(
            'sportsmi_heading_one_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Event', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_one_content_title',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        // Button text
        $this->add_control(
            'sportsmi_content_button',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('See All Event', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your button here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        // Button URL
        $this->add_control(
            'sportsmi_content_button_url',
            [
                'label' => esc_html__('Button URL', 'sportsmi-core'),
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



        // ======================= Heading Style =================================//


        // Section 
        $this->start_controls_section(
            'box_style',
            [
                'label' => esc_html__('Section Area', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'box_style_color',
            [
                'label'     => esc_html__('Background', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box_area' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .box_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .box_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // Title 
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_one',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'title_style_typ',
                'selector' => '{{WRAPPER}} .title',

            ]
        );

        $this->add_control(
            'title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // card
        $this->start_controls_section(
            'card_style',
            [
                'label' => esc_html__('Card', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_style_color',
            [
                'label'     => esc_html__('Background Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_card' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_img_border_radius',
            [
                'label'      => __('Image Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'card_border_radius',
            [
                'label'      => __('Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->add_responsive_control(
            'card_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // card  Icon 
        $this->start_controls_section(
            'card_icon_style',
            [
                'label' => esc_html__('Card Icon', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_icon_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_icon' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_icon_bg_color',
            [
                'label'     => esc_html__('background', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_icon_bdr_color',
            [
                'label' => esc_html__('Border Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_icon' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'card_icon_bdr_hvr_color',
            [
                'label' => esc_html__('Hover Border Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_icon:hover' => 'border:1px solid {{VALUE}}',
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
                    '{{WRAPPER}} .cus_icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .cus_icon' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}} !important;',


                ],
            ]
        );

        $this->add_responsive_control(
            'card_icon_border_radius',
            [
                'label'      => __('Border Radius', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'card_icon_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_icon_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'card_title_style',
            [
                'label' => esc_html__('Card Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'card_title_style_typ',
                'selector' => '{{WRAPPER}} .cus_title_link',

            ]
        );

        $this->add_control(
            'card_title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_title_link' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'card_title_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_title_link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_title_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_title_link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // Card Description
        $this->start_controls_section(
            'card_des_style',
            [
                'label' => esc_html__('Card Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'card_des_style_typ',
                'selector' => '{{WRAPPER}} .cus_cont p',

            ]
        );

        $this->add_control(
            'card_des_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_cont p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'card_des_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_cont p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_des_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_cont p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // button link
        $this->start_controls_section(
            'button_link_style',
            [
                'label' => esc_html__('Button Link', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_two']
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'card_des_link_style_typ',
                'selector' => '{{WRAPPER}} .cus_btn_link',

            ]
        );

        $this->add_control(
            'button_link_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_btn_link' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_link_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_btn_link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_link_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_btn_link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // =======================Button Style===========================//

        $this->start_controls_section(
            'button_style',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_three']
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'button_typ',
                'selector' => '{{WRAPPER}} .cmn-button',
            ]
        );
        $this->add_control(
            'button_secondary_color_hover',
            [
                'label'     => esc_html__('Btn Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_secondary_color',
            [
                'label'     => esc_html__('Btn Hover Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_secondary_hvr_bgcolor',
            [
                'label'     => esc_html__('Btn BG', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button--secondary' => 'background: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'button_secondary_bgcolor',
            [
                'label'     => esc_html__('Btn BG Hover', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:after' => 'background: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'button_bdr_color',
            [
                'label' => esc_html__('Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bdr_hvr_color',
            [
                'label' => esc_html__('Hover Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:hover' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => __('Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cmn-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'button_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cmn-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $query = new \WP_Query(
            array(
                'post_type'      => 'event',
                'posts_per_page' => $settings['event_posts_per_page'],
                'orderby'        => $settings['event_template_order_by'],
                'order'          => $settings['event_template_order'],
                'post_status'    => 'publish',
                'post__in'          => $settings['event_category'],
                'paged'          => $paged,
            )
        );

?>

        <script>
            jQuery(document).ready(function($) {
                // event secondary slider
                jQuery(".event--secondary__slider")
                    .not(".slick-initialized")
                    .slick({
                        infinite: true,
                        autoplay: false,
                        focusOnSelect: true,
                        slidesToShow: 5,
                        speed: 900,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: false,
                        prevArrow: jQuery(".prev-event"),
                        nextArrow: jQuery(".next-event"),
                        centerMode: true,
                        centerPadding: "120px",
                        responsive: [{
                                breakpoint: 1800,
                                settings: {
                                    slidesToShow: 4,
                                },
                            },
                            {
                                breakpoint: 1400,
                                settings: {
                                    slidesToShow: 3,
                                },
                            },
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 2,
                                },
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 1,
                                    centerPadding: "200px",
                                },
                            },
                            {
                                breakpoint: 660,
                                settings: {
                                    slidesToShow: 1,
                                    centerPadding: "120px",
                                },
                            },
                            {
                                breakpoint: 450,
                                settings: {
                                    slidesToShow: 1,
                                    centerPadding: "40px",
                                },
                            },
                        ],
                    });
            });
        </script>

        <!-- ==== training section start ==== -->
        <?php if ($settings['sportsmi_content_style_selection'] == 'style_one') : ?>
            <section class="section event wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section__header--secondary">
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="section__header--secondary__content">
                                            <?php if (!empty($settings['sportsmi_heading_one_content_subtitle'])) : ?>
                                                <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_one_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                            <?php endif; ?>
                                            <?php if (!empty($settings['sportsmi_heading_one_content_title'])) : ?>
                                                <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_one_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="section__header--secondary__cta">
                                            <a href="<?php echo esc_html($settings['sportsmi_content_button_url']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_content_button']) ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center section__row">
                        <?php if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $address_icon = function_exists('get_field') ? get_field('address_icon') : '';
                                $address_text = function_exists('get_field') ? get_field('address_text') : '';
                                $event_time = function_exists('get_field') ? get_field('event_time') : '';
                                $event_date = function_exists('get_field') ? get_field('event_date') : '';
                                $event_month = function_exists('get_field') ? get_field('event_month') : '';
                                $value_text = function_exists('get_field') ? get_field('value_text') : '';
                        ?>
                                <div class="col-sm-10 col-md-6 section__col">
                                    <div class="event__single">
                                        <div class="event__single-thumb">
                                            <a href="<?php the_permalink() ?>" class="cus_thumb">
                                                <?php the_post_thumbnail() ?>
                                            </a>
                                        </div>
                                        <div class="event__single-content cus_cont">
                                            <h3><?php echo esc_html($event_date) ?> <span class="primary-text"><?php echo esc_html($event_month) ?></span></h3>
                                            <p><?php echo esc_html($event_time) ?></p>
                                            <h5 class="cus_title"> <?php the_title(); ?></h5>
                                            <p class="secondary-text">
                                                <i class="cus_icon <?php echo esc_html($address_icon) ?>"></i>
                                                <?php echo esc_html($address_text) ?>
                                            </p>
                                            <p><?php echo esc_html($value_text) ?></p>
                                            <a href="<?php the_permalink() ?>" class="cmn-button">
                                                <?php echo esc_html__('Join Now', 'sportsmi-core') ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        <?php endif ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($settings['sportsmi_content_style_selection'] == 'style_two') : ?>
            <section class="section event--secondary wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section__header--secondary">
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="section__header--secondary__content">
                                            <?php if (!empty($settings['sportsmi_heading_one_content_subtitle'])) : ?>
                                                <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_one_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                            <?php endif; ?>
                                            <?php if (!empty($settings['sportsmi_heading_one_content_title'])) : ?>
                                                <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_one_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="section__header--secondary__cta">
                                            <a href="<?php echo esc_html($settings['sportsmi_content_button_url']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_content_button']) ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="event--secondary__slider">
                    <?php if ($query->have_posts()) :
                        while ($query->have_posts()) :
                            $query->the_post();
                            $address_icon = function_exists('get_field') ? get_field('address_icon') : '';
                            $address_text = function_exists('get_field') ? get_field('address_text') : '';
                            $event_time = function_exists('get_field') ? get_field('event_time') : '';
                            $event_date = function_exists('get_field') ? get_field('event_date') : '';
                            $event_month = function_exists('get_field') ? get_field('event_month') : '';
                            $value_text = function_exists('get_field') ? get_field('value_text') : '';
                    ?>
                            <div class="event--secondary__slider-card">
                                <span class="cus_thumb"><?php the_post_thumbnail() ?></span>
                                <div class="event--secondary__slider-card--alt cus_cont">
                                    <h3><?php echo esc_html($event_date) ?> <span class="primary-text"><?php echo esc_html($event_month) ?></span></h3>
                                    <p><?php echo esc_html($event_time) ?></p>
                                    <h5 class="cus_title"> <?php the_title(); ?></h5>
                                    <p class="secondary-text">
                                        <i class="cus_icon <?php echo esc_html($address_icon) ?>"></i>
                                        <?php echo esc_html($address_text) ?>
                                    </p>
                                    <p><?php echo esc_html($value_text) ?></p>
                                    <a href="<?php the_permalink() ?>" class="cmn-button">
                                        <?php echo esc_html__('Join Now', 'sportsmi-core') ?>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile ?>
                    <?php endif ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-navigation">
                                <button class="next-event cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                                <button class="prev-event cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($settings['sportsmi_content_style_selection'] == 'style_three') : ?>
            <section class="section event wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row justify-content-center section__row">
                        <?php if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $address_icon = function_exists('get_field') ? get_field('address_icon') : '';
                                $address_text = function_exists('get_field') ? get_field('address_text') : '';
                                $event_time = function_exists('get_field') ? get_field('event_time') : '';
                                $event_date = function_exists('get_field') ? get_field('event_date') : '';
                                $event_month = function_exists('get_field') ? get_field('event_month') : '';
                                $value_text = function_exists('get_field') ? get_field('value_text') : '';
                        ?>
                                <div class="col-sm-10 col-md-6 col-lg-4 col-xl-6 section__col">
                                    <div class="event__single">
                                        <div class="event__single-thumb">
                                            <a href="<?php the_permalink() ?>" class="cus_thumb">
                                                <?php the_post_thumbnail() ?>
                                            </a>
                                        </div>
                                        <div class="event__single-content">
                                            <h3><?php echo esc_html($event_date) ?> <span class="primary-text"><?php echo esc_html($event_month) ?></span></h3>
                                            <p><?php echo esc_html($event_time) ?></p>
                                            <h5 class="cus_title"> <?php the_title(); ?></h5>
                                            <p class="secondary-text">
                                                <i class="cus_icon <?php echo esc_html($address_icon) ?>"></i>
                                                <?php echo esc_html($address_text) ?>
                                            </p>
                                            <p><?php echo esc_html($value_text) ?></p>
                                            <a href="<?php the_permalink() ?>" class="cmn-button">
                                                <?php echo esc_html__('Join Now', 'sportsmi-core') ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        <?php endif ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="section__cta">
                                <?php
                                $big = 999999999; // need an unlikely integer
                                $pagination = paginate_links(array(
                                    'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                    'format'    => '?paged=%#%',
                                    'current'   => max(1, get_query_var('paged')),
                                    'total'     => $query->max_num_pages,
                                    'type'      => 'list',
                                    'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
                                    'next_text' => '<i class="fa-solid fa-angle-right"></i>',
                                ));
                                if ($pagination) {
                                    echo '<div class="pagination">' . $pagination . '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TP_event());
