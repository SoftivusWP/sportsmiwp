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
class TP_pricing extends Widget_Base
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
        return 'tp-pricing';
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
        return __('Pricing', 'tpcore');
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

        // about
        $this->start_controls_section(
            'sportsmi_about_section_genaral',
            [
                'label' => esc_html__('About Section', 'sportsmi-core')
            ]
        );


        $this->add_control(
            'sportsmi_pricing_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'sportsmi-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'sportsmi-core'),
                    'style_one_alt' => esc_html__('Style One Alt', 'sportsmi-core'),
                    'style_two' => esc_html__('Style Two', 'sportsmi-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();


        // Icon
        $this->start_controls_section(
            'sportsmi_icon_section_genaral',
            [
                'label' => esc_html__('Icon', 'sportsmi-core')
            ]
        );

        $this->add_control(
            'show_icon',
            [
                'label' => esc_html__('Show Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'textdomain'),
                'label_off' => esc_html__('Hide', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'sportsmi_pricing_card_icon',
            [
                'label' => esc_html__('Icon', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'sportsmi-shot-upper',
                    'library' => 'solid',
                ],
            ]
        );

        $this->end_controls_section();

        //pricing title Section
        $this->start_controls_section(
            'sportsmi_heading_one_section_genaral',
            [
                'label' => esc_html__('Heading', 'sportsmi-core')
            ]
        );


        $this->add_responsive_control(
            'sportsmi_heading_content_align',
            [
                'label'         => esc_html__('Heading Text Align', 'sportsmi-core'),
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
                    '{{WRAPPER}} .pricing__card .pricing__card-head' => 'text-align: {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'sportsmi_pricing_content',
            [
                'label' => esc_html__('Pricing', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$59', 'sportsmi-core'),
                'placeholder' => esc_html__('<span class="primary-text">$</span>59</span>', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_pricing_content_title',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_pricing_content_description',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Lorem ipsum dolor sit.', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );

        $this->end_controls_section();




        //Pricing List Repeater
        $this->start_controls_section(
            'list_text_content',
            [
                'label' => esc_html__('List Content', 'sportsmi-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        // list content
        $repeater->add_control(
            'sportsmi_pricing_list',
            [
                'label' => esc_html__('list content', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Lorem Ipsum is simply.', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your list content here', 'sportsmi-core'),
            ]
        );

        $this->add_control(
            'pricing_list_repeater',
            [
                'label' => esc_html__('pricing Card List', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sportsmi_pricing_list' => esc_html__('Type your list content here', 'sportsmi-core'),

                    ],
                    [
                        'sportsmi_pricing_list' => esc_html__('Type your list content here', 'sportsmi-core'),

                    ],
                    [
                        'sportsmi_pricing_list' => esc_html__('Type your list content here ', 'sportsmi-core'),

                    ],

                ],
                'title_field' => '{{{ sportsmi_pricing_list }}}',
            ]
        );

        $this->end_controls_section();


        // button Start
        $this->start_controls_section(
            'sportsmi_button_section_genaral',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_responsive_control(
            'sportsmi_button_content_align',
            [
                'label'         => esc_html__('Button Align', 'sportsmi-core'),
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
                    '{{WRAPPER}} .pricing__card-cta' => 'text-align: {{VALUE}};',
                ],

            ]
        );

        // Button text
        $this->add_control(
            'sportsmi_heading_content_button',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default Button', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your button here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        // Button URL
        $this->add_control(
            'sportsmi_heading_content_button_url',
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


        // =======================  Style =================================//

        // card bg
        $this->start_controls_section(
            'pricing_card_style',
            [
                'label' => esc_html__('Card', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_bgcolor',
            [
                'label'     => esc_html__('Card Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_top_bgcolor',
            [
                'label'     => esc_html__('Card Head Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-head' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'custom_box_shadow',
            [
                'label' => esc_html__('Box Shadow', 'textdomain'),
                'type' => \Elementor\Controls_Manager::BOX_SHADOW,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} !important;',
                ],
            ]
        );


        $this->add_responsive_control(
            'card_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pricing__card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing__card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();



        // card Icon 
        $this->start_controls_section(
            'icon_style',
            [
                'label' => esc_html__('Card Icon', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => esc_html__('Icon Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-head__thumb svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .pricing__card-head__thumb i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-head__thumb:hover svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .pricing__card-head__thumb:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bgcolor',
            [
                'label'     => esc_html__('Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-head__thumb' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_hvr_bgcolor',
            [
                'label'     => esc_html__('Hover Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-head__thumb:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_box_bdr_color',
            [
                'label' => esc_html__('Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-head__thumb' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_box_bdr_hvr_color',
            [
                'label' => esc_html__('Hover Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-head__thumb:hover' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );

        // Icon Size
        $this->add_responsive_control(
            'icon_custom_dimensionsss',
            [
                'label' => esc_html__('Icon Size', 'sportsmi-core'),
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
                    '{{WRAPPER}} .pricing__card-head__thumb i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .pricing__card-head__thumb svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon box Size
        $this->add_responsive_control(
            'icon_box_custom_dimensionsss',
            [
                'label' => esc_html__('Box Size', 'sportsmi-core'),
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
                    '{{WRAPPER}} .pricing__card-head__thumb' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}} !important;',


                ],
            ]
        );

        $this->add_responsive_control(
            'icon_box_border_radius',
            [
                'label'      => __('Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing__card-head__thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-head__thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing__card-head__thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // ======================= Pricing content Style =================================//

        // pricing_content 
        $this->start_controls_section(
            'pricing_content_style',
            [
                'label' => esc_html__('Pricing Content', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'pricing_content_style_typ',
                'selector' => '{{WRAPPER}} .pricing__card-head h2',

            ]
        );

        $this->add_control(
            'pricing_content_style_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-head h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_content_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-head h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_content_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing__card-head h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // Title 
        $this->start_controls_section(
            'pricing_title_style',
            [
                'label' => esc_html__('Pricing Title', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'title_style_typ',
                'selector' => '{{WRAPPER}} .cus_title',

            ]
        );

        $this->add_control(
            'pricing_title_style_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_title_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_title_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //    description_style
        $this->start_controls_section(
            'pricing_description_style',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'description_style_typ',
                'selector' => '{{WRAPPER}} .pp',

            ]
        );

        $this->add_control(
            'pricing_description_style_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pp' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_description_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pp' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_description_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // ======================= List Style =================================//

        // Pricing list content 
        $this->start_controls_section(
            'pricing_list_style',
            [
                'label' => esc_html__('List Content', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'pricing_list_style_typ',
                'selector' => '{{WRAPPER}} .pricing__card-body li',

            ]
        );

        $this->add_control(
            'pricing_list_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-body li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_list_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-body li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_list_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing__card-body li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // Pricing list Icon content 
        $this->start_controls_section(
            'pricing_list_icon_style',
            [
                'label' => esc_html__('List Icon', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'pricing_list_icon_style_typ',
                'selector' => '{{WRAPPER}} .pricing__card-body li i',

            ]
        );

        $this->add_control(
            'pricing_list_icon_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-body li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // =======================Button Style One===========================//

        $this->start_controls_section(
            'button_one_style',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'button_one_typ',
                'selector' => '{{WRAPPER}} .cmn-button',
            ]
        );

        $this->add_control(
            'button_one_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_one_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_one_bgcolor',
            [
                'label'     => esc_html__('Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .cmn-button:after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_sec_bgcolor',
            [
                'label'     => esc_html__('Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_one_hvr_bgcolor',
            [
                'label'     => esc_html__('Hover Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_one_bdr_color',
            [
                'label' => esc_html__('Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_one_bdr_hvr_color',
            [
                'label' => esc_html__('Hover Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:hover' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_one_border_radius',
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
            'button_one_style_margin',
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
            'button_one_style_padding',
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

?>

        <!-- ==== pricing section One start ==== -->
        <?php if ($settings['sportsmi_pricing_content_style_selection'] == 'style_one') : ?>
            <section class="pricing pricing--secondary wow fadeInUp" data-wow-duration="0.4s">
                <div class="plan-tablee">
                    <div class="pricing__card">
                        <div class="pricing__card-head">
                            <?php if ('yes' === $settings['show_icon']) : ?>
                                <?php if (!empty($settings['sportsmi_pricing_card_icon'])) : ?>
                                    <div class="pricing__card-head__thumb">
                                        <?php \Elementor\Icons_Manager::render_icon($settings['sportsmi_pricing_card_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if (!empty($settings['sportsmi_pricing_content'])) : ?>
                                <h2><?php echo wp_kses($settings['sportsmi_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['sportsmi_pricing_content_title'])) : ?>
                                <h5 class="cus_title"><?php echo wp_kses($settings['sportsmi_pricing_content_title'], wp_kses_allowed_html('post')) ?></h5>
                            <?php endif; ?>
                            <?php if (!empty($settings['sportsmi_pricing_content_description'])) : ?>
                                <p class="pp secondary-text"><?php echo wp_kses($settings['sportsmi_pricing_content_description'], wp_kses_allowed_html('post')) ?></p>
                            <?php endif; ?>
                            <hr>
                        </div>

                        <div class="pricing__card-body">
                            <ul>
                                <?php if (!empty($settings['pricing_list_repeater'])) : ?>
                                    <?php foreach ($settings['pricing_list_repeater'] as $item) : ?>
                                        <li class="secondary-text">
                                            <i class="fa-solid fa-check"></i>
                                            <?php echo !empty($item['sportsmi_pricing_list']) ? esc_html($item['sportsmi_pricing_list']) : ''; ?>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <?php if (!empty($settings['sportsmi_heading_content_button'])) : ?>
                            <div class="pricing__card-cta">
                                <a href="<?php echo esc_html($settings['sportsmi_heading_content_button_url']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_heading_content_button']) ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== / pricing section One end ==== -->

        <!-- ==== pricing section One start ==== -->
        <?php if ($settings['sportsmi_pricing_content_style_selection'] == 'style_one_alt') : ?>
            <section class="pricing pricing--secondary  pricing--tertiary wow fadeInUp" data-wow-duration="0.4s">
                <div class="plan-tablee">
                    <div class="pricing__card">
                        <div class="pricing__card-head">
                            <?php if ('yes' === $settings['show_icon']) : ?>
                                <?php if (!empty($settings['sportsmi_pricing_card_icon'])) : ?>
                                    <div class="pricing__card-head__thumb">
                                        <?php \Elementor\Icons_Manager::render_icon($settings['sportsmi_pricing_card_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if (!empty($settings['sportsmi_pricing_content_title'])) : ?>
                                <h5 class="cus_title"><?php echo wp_kses($settings['sportsmi_pricing_content_title'], wp_kses_allowed_html('post')) ?></h5>
                            <?php endif; ?>
                            <?php if (!empty($settings['sportsmi_pricing_content_description'])) : ?>
                                <p class="pp secondary-text"><?php echo wp_kses($settings['sportsmi_pricing_content_description'], wp_kses_allowed_html('post')) ?></p>
                            <?php endif; ?>
                            <?php if (!empty($settings['sportsmi_pricing_content'])) : ?>
                                <h2><?php echo wp_kses($settings['sportsmi_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                            <?php endif; ?>
                            <hr>
                        </div>

                        <div class="pricing__card-body">
                            <ul>
                                <?php if (!empty($settings['pricing_list_repeater'])) : ?>
                                    <?php foreach ($settings['pricing_list_repeater'] as $item) : ?>
                                        <li class="secondary-text">
                                            <i class="fa-solid fa-check"></i>
                                            <?php echo !empty($item['sportsmi_pricing_list']) ? esc_html($item['sportsmi_pricing_list']) : ''; ?>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <?php if (!empty($settings['sportsmi_heading_content_button'])) : ?>
                            <div class="pricing__card-cta">
                                <a href="<?php echo esc_html($settings['sportsmi_heading_content_button_url']['url']) ?>" class="cmn-button cmn-button--secondary"><?php echo esc_html($settings['sportsmi_heading_content_button']) ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== / pricing section One end ==== -->

        <!-- ==== pricing section Two start ==== -->
        <?php if ($settings['sportsmi_pricing_content_style_selection'] == 'style_two') : ?>
            <section class="pricing wow fadeInUp" data-wow-duration="0.4s">
                <div class="plan-tablee">
                    <div class="pricing__card">
                        <div class="pricing__card-head">
                            <?php if (!empty($settings['sportsmi_pricing_content'])) : ?>
                                <h2><?php echo wp_kses($settings['sportsmi_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['sportsmi_pricing_content_title'])) : ?>
                                <h5 class="cus_title"><?php echo wp_kses($settings['sportsmi_pricing_content_title'], wp_kses_allowed_html('post')) ?></h5>
                            <?php endif; ?>
                            <?php if (!empty($settings['sportsmi_pricing_content_description'])) : ?>
                                <p class="pp secondary-text"><?php echo wp_kses($settings['sportsmi_pricing_content_description'], wp_kses_allowed_html('post')) ?></p>
                            <?php endif; ?>
                            <?php if (!empty($settings['sportsmi_pricing_card_icon'])) : ?>
                                <div class="pricing__card-head__thumb">
                                    <?php \Elementor\Icons_Manager::render_icon($settings['sportsmi_pricing_card_icon'], ['aria-hidden' => 'true']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pricing__card-body">
                            <ul>
                                <?php if (!empty($settings['pricing_list_repeater'])) : ?>
                                    <?php foreach ($settings['pricing_list_repeater'] as $item) : ?>
                                        <li class="secondary-text">
                                            <i class="fa-solid fa-check"></i>
                                            <?php echo !empty($item['sportsmi_pricing_list']) ? esc_html($item['sportsmi_pricing_list']) : ''; ?>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <?php if (!empty($settings['sportsmi_heading_content_button'])) : ?>
                            <div class="pricing__card-cta">
                                <a href="<?php echo esc_html($settings['sportsmi_heading_content_button_url']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_heading_content_button']) ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== / pricing section Two end ==== -->
<?php
    }
}

$widgets_manager->register(new TP_pricing());
