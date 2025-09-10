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
class TP_team extends Widget_Base
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
        return 'tp-team';
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
        return __('Team', 'tpcore');
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



        // team
        $this->start_controls_section(
            'sportsmi_team_section_genaral',
            [
                'label' => esc_html__('Team Section', 'sportsmi-core')
            ]
        );


        $this->add_control(
            'sportsmi_team_content_style_selection',
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
            'team_one_general_content',
            [
                'label' => esc_html__('Content', 'sportsmi-core'),
            ]
        );


        $this->add_control(
            'team_category',
            [
                'label' => __('Select team', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('team'),
                // 'default'     => $this->get_all_post_key('team'),
            ]
        );


        $this->add_control(
            'team_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => -1,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'team_template_order_by',
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
            'team_template_order',
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
            'team_content_one',
            [
                'label' => esc_html__('Heading', 'sportsmi-core'),
            ]
        );

        $this->add_responsive_control(
            'sportsmi_heading_content_align_one',
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
                'default'         => 'left',
                'selectors'     => [
                    '{{WRAPPER}} .section__content' => 'text-align: {{VALUE}};',
                ],

            ]
        );



        $this->add_control(
            'sportsmi_heading_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Team', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_content_title',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Meet Our Experts', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_content_description',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('SportsMI Sports Academy is a Sports Academy with a history that goes back to XX century. From a cricket Academy to soccer tournaments', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );

        $this->end_controls_section();



        // List Repeater
        $this->start_controls_section(
            'list_text_content',
            [
                'label' => esc_html__('List Content', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_team_content_style_selection' => 'style_one'
                ]
            ]
        );

        // list content
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'sportsmi_pricing_list',
            [
                'label' => esc_html__('list content', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('5-15+ years experience', 'sportsmi-core'),
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
                        'sportsmi_pricing_list' => esc_html__('5-15+ years experience', 'sportsmi-core'),
                    ],
                    [
                        'sportsmi_pricing_list' => esc_html__('Get our best adviser', 'sportsmi-core'),
                    ],
                    [
                        'sportsmi_pricing_list' => esc_html__('Get our best trainers ', 'sportsmi-core'),
                    ],
                    [
                        'sportsmi_pricing_list' => esc_html__('Individual Support ', 'sportsmi-core'),
                    ],

                ],
                'title_field' => '{{{ sportsmi_pricing_list }}}',
            ]
        );

        $this->end_controls_section();


        //Button
        $this->start_controls_section(
            'btn_text_content',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_team_content_style_selection' => 'style_one'
                ]
            ]
        );

        // Button text
        $this->add_control(
            'sportsmi_content_button',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('About us', 'sportsmi-core'),
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



        // ======================= Style =================================//


        // Subtitle 
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'subtitle_style_typ',
                'selector' => '{{WRAPPER}} .sub-title',
            ]
        );

        $this->add_control(
            'subtitle_style_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'subtitle_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'subtitle_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // Title 
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'title_style_typ',
                'selector' => '{{WRAPPER}} .title',

            ]
        );

        $this->add_control(
            'title_style_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
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
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // description
        $this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__('Description', 'sportsmi-core'),
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
            'description_style_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pp' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_style_margin',
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
            'description_style_padding',
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

        // list content 
        $this->start_controls_section(
            'pricing_list_style',
            [
                'label' => esc_html__('List Content', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sportsmi_team_content_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'pricing_list_style_typ',
                'selector' => '{{WRAPPER}} .section__content-inner li',

            ]
        );

        $this->add_control(
            'pricing_list_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section__content-inner li' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section__content-inner li i' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .section__content-inner li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .section__content-inner li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // Card style

        $this->start_controls_section(
            'slider_description_style',
            [
                'label' => esc_html__('Card', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Name Typography', 'sportsmi-core'),
                'name'     => 'slider_name_style_typ',
                'selector' => '{{WRAPPER}} .team_name',

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Designation Typography', 'sportsmi-core'),
                'name'     => 'slider_desig_style_typ',
                'selector' => '{{WRAPPER}} .team_deg',

            ]
        );

        $this->add_control(
            'card_bg_style_color',
            [
                'label'     => esc_html__('Card Bg', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__slider-card' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'slider_name_style_color',
            [
                'label'     => esc_html__('Name Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_name' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'slider_desig_style_color',
            [
                'label'     => esc_html__('Designation Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_deg' => 'color: {{VALUE}};',
                ],
            ]
        );


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
            'slider_cardf_style_margin',
            [
                'label' => esc_html__('Name Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .team_name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_cafrd_style_margin',
            [
                'label' => esc_html__('Designation Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .team_deg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'slider_caffrd_style_padding',
            [
                'label'      => __('Card Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .team__slider-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
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

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $query = new \WP_Query(
            array(
                'post_type'      => 'team',
                'posts_per_page' => $settings['team_posts_per_page'],
                'orderby'        => $settings['team_template_order_by'],
                'order'          => $settings['team_template_order'],
                'post__in'       => $settings['team_category'],
                'post_status'    => 'publish',
                'paged'          => $paged,

            )
        );
?>

        <script>
            jQuery(document).ready(function($) {
                // team slider
                jQuery(".team__slider")
                    .not(".slick-initialized")
                    .slick({
                        infinite: true,
                        autoplay: true,
                        focusOnSelect: true,
                        slidesToShow: 2,
                        speed: 900,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: false,
                        prevArrow: jQuery(".prev-team"),
                        nextArrow: jQuery(".next-team"),
                        centerMode: true,
                        centerPadding: "0px",
                        responsive: [{
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 2,
                                },
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 1,
                                },
                            },
                        ],
                    });


                // team secondary slider
                jQuery(".team__slider--secondary")
                    .not(".slick-initialized")
                    .slick({
                        infinite: true,
                        autoplay: true,
                        focusOnSelect: true,
                        slidesToShow: 4,
                        speed: 900,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: false,
                        prevArrow: jQuery(".prev-team--secondary"),
                        nextArrow: jQuery(".next-team--secondary"),
                        centerMode: true,
                        centerPadding: "0px",
                        responsive: [{
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 3,
                                },
                            },
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 3,
                                },
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                },
                            },
                            {
                                breakpoint: 576,
                                settings: {
                                    slidesToShow: 1,
                                },
                            },
                        ],
                    });
            });
        </script>



        <!-- ==== team section primary start ==== -->
        <?php if ($settings['sportsmi_team_content_style_selection'] == 'style_one') : ?>
            <section class="section team wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row section__row align-items-center">
                        <div class="col-lg-6 col-xl-6 section__col">
                            <div class="team__slider">
                                <?php
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        $team_deg = function_exists('get_field') ? get_field('team_deg') : '';
                                        $social_fb_url = function_exists('get_field') ? get_field('social_fb_url') : '';
                                        $social_tw_url = function_exists('get_field') ? get_field('social_tw_url') : '';
                                        $social_in_url = function_exists('get_field') ? get_field('social_in_url') : '';
                                        $social_ln_url = function_exists('get_field') ? get_field('social_ln_url') : '';
                                        $social_yt_url = function_exists('get_field') ? get_field('social_yt_url') : '';
                                        $social_tel_url = function_exists('get_field') ? get_field('social_tel_url') : '';
                                        $social_wc_url = function_exists('get_field') ? get_field('social_wc_url') : '';
                                        $social_wapp_url = function_exists('get_field') ? get_field('social_wapp_url') : '';
                                ?>
                                        <div class="team__slider-card">
                                            <a href="<?php the_permalink() ?>" class="cus_thumb w-100">
                                                <div class="team__slider-card__thumb w-100">
                                                    <?php the_post_thumbnail() ?>
                                                </div>
                                            </a>
                                            <div class="team__slider-card__content">
                                                <h5 class="team_name">
                                                    <a href="<?php the_permalink(); ?>" class="cus_title_link">
                                                        <?php echo the_title(); ?>
                                                    </a>
                                                </h5>
                                                <?php if (!empty(esc_html($team_deg))) :   ?>
                                                    <p class="team_deg secondary-text mt-1"><?php echo esc_html($team_deg) ?></p>
                                                <?php endif ?>

                                                <div class="social">
                                                    <?php if (!empty(esc_url($social_fb_url))) :   ?>
                                                        <a href="<?php echo esc_url($social_fb_url) ?>">
                                                            <i class="fa-brands fa-facebook-f"></i>
                                                        </a>
                                                    <?php endif ?>
                                                    <?php if (!empty(esc_url($social_tw_url))) :   ?>
                                                        <a href="<?php echo esc_url($social_tw_url) ?>">
                                                            <i class="fa-brands fa-twitter"></i>
                                                        </a>
                                                    <?php endif ?>
                                                    <?php if (!empty(esc_url($social_in_url))) :   ?>
                                                        <a href="<?php echo esc_url($social_in_url) ?>">
                                                            <i class="fa-brands fa-square-instagram"></i>
                                                        </a>
                                                    <?php endif ?>
                                                    <?php if (!empty(esc_url($social_ln_url))) :   ?>
                                                        <a href="<?php echo esc_url($social_ln_url) ?>">
                                                            <i class="fa-brands fa-linkedin-in"></i>
                                                        </a>
                                                    <?php endif ?>
                                                    <?php if (!empty(esc_url($social_yt_url))) :   ?>
                                                        <a href="<?php echo esc_url($social_yt_url) ?>">
                                                            <i class="fa-brands fa-youtube"></i>
                                                        </a>
                                                    <?php endif ?>
                                                    <?php if (!empty(esc_url($social_tel_url))) :   ?>
                                                        <a href="<?php echo esc_url($social_tel_url) ?>">
                                                            <i class="fa-brands fa-telegram"></i>
                                                        </a>
                                                    <?php endif ?>
                                                    <?php if (!empty(esc_url($social_wc_url))) :   ?>
                                                        <a href="<?php echo esc_url($social_wc_url) ?>">
                                                            <i class="fa-brands fa-weixin"></i>
                                                        </a>
                                                    <?php endif ?>
                                                    <?php if (!empty(esc_url($social_wapp_url))) :   ?>
                                                        <a href="<?php echo esc_url($social_wapp_url) ?>">
                                                            <i class="fa-brands fa-whatsapp"></i>
                                                        </a>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile ?>
                                <?php endif ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider-navigation justify-content-start">
                                        <button class="next-team cmn-button cmn-button--secondary">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </button>
                                        <button class="prev-team cmn-button cmn-button--secondary">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-5 offset-xl-1 order-first order-lg-last section__col">
                            <div class="section__content">
                                <?php if (!empty($settings['sportsmi_heading_content_subtitle'])) :   ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_title'])) :   ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_description'])) :   ?>
                                    <p class="xlr pp section__content-text"><?php echo wp_kses($settings['sportsmi_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>

                                <?php if (!empty($settings['pricing_list_repeater'])) : ?>
                                    <div class="section__content-inner">
                                        <ul>
                                            <?php foreach ($settings['pricing_list_repeater'] as $item) : ?>
                                                <li>
                                                    <i class="fa-solid fa-check"></i>
                                                    <?php echo !empty($item['sportsmi_pricing_list']) ? esc_html($item['sportsmi_pricing_list']) : ''; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['sportsmi_content_button'])) : ?>
                                    <div class="section__content-cta">
                                        <a href="<?php echo esc_html($settings['sportsmi_content_button_url']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_content_button']) ?></a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== / team section primary end ==== -->


        <!-- ==== team section secondary start ==== -->
        <?php if ($settings['sportsmi_team_content_style_selection'] == 'style_two') : ?>
            <section class="section team wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section__header">
                                <?php if (!empty($settings['sportsmi_heading_content_subtitle'])) :   ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_title'])) :   ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_description'])) :   ?>
                                    <p class="xlr pp section__content-text"><?php echo wp_kses($settings['sportsmi_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="team__slider--secondary">
                            <?php
                            if ($query->have_posts()) :
                                while ($query->have_posts()) :
                                    $query->the_post();
                                    $team_deg = function_exists('get_field') ? get_field('team_deg') : '';
                                    $social_fb_url = function_exists('get_field') ? get_field('social_fb_url') : '';
                                    $social_tw_url = function_exists('get_field') ? get_field('social_tw_url') : '';
                                    $social_in_url = function_exists('get_field') ? get_field('social_in_url') : '';
                                    $social_ln_url = function_exists('get_field') ? get_field('social_ln_url') : '';
                                    $social_yt_url = function_exists('get_field') ? get_field('social_yt_url') : '';
                                    $social_tel_url = function_exists('get_field') ? get_field('social_tel_url') : '';
                                    $social_wc_url = function_exists('get_field') ? get_field('social_wc_url') : '';
                                    $social_wapp_url = function_exists('get_field') ? get_field('social_wapp_url') : '';

                            ?>
                                    <div class="team__slider-card">
                                        <a href="<?php the_permalink() ?>" class="cus_thumb w-100">
                                            <div class="team__slider-card__thumb w-100">
                                                <?php the_post_thumbnail() ?>
                                            </div>
                                        </a>
                                        <div class="team__slider-card__content">
                                            <h5 class="team_name">
                                                <a href="<?php the_permalink(); ?>" class="cus_title_link">
                                                    <?php echo the_title(); ?>
                                                </a>
                                            </h5>
                                            <?php if (!empty(esc_html($team_deg))) :   ?>
                                                <p class="team_deg secondary-text mt-1"><?php echo esc_html($team_deg) ?></p>
                                            <?php endif ?>

                                            <div class="social">
                                                <?php if (!empty(esc_url($social_fb_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_fb_url) ?>">
                                                        <i class="fa-brands fa-facebook-f"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_tw_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_tw_url) ?>">
                                                        <i class="fa-brands fa-twitter"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_in_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_in_url) ?>">
                                                        <i class="fa-brands fa-square-instagram"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_ln_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_ln_url) ?>">
                                                        <i class="fa-brands fa-linkedin-in"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_yt_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_yt_url) ?>">
                                                        <i class="fa-brands fa-youtube"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_tel_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_tel_url) ?>">
                                                        <i class="fa-brands fa-telegram"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_wc_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_wc_url) ?>">
                                                        <i class="fa-brands fa-weixin"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_wapp_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_wapp_url) ?>">
                                                        <i class="fa-brands fa-whatsapp"></i>
                                                    </a>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile ?>
                            <?php endif ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-navigation">
                                <button class="next-team--secondary cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                                <button class="prev-team--secondary cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- ==== team section secondary start ==== -->
        <?php if ($settings['sportsmi_team_content_style_selection'] == 'style_three') : ?>
            <section class="section team wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section__header">
                                <?php if (!empty($settings['sportsmi_heading_content_subtitle'])) :   ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_title'])) :   ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_description'])) :   ?>
                                    <p class="xlr pp section__content-text"><?php echo wp_kses($settings['sportsmi_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $team_deg = function_exists('get_field') ? get_field('team_deg') : '';
                                $social_fb_url = function_exists('get_field') ? get_field('social_fb_url') : '';
                                $social_tw_url = function_exists('get_field') ? get_field('social_tw_url') : '';
                                $social_in_url = function_exists('get_field') ? get_field('social_in_url') : '';
                                $social_ln_url = function_exists('get_field') ? get_field('social_ln_url') : '';
                                $social_yt_url = function_exists('get_field') ? get_field('social_yt_url') : '';
                                $social_tel_url = function_exists('get_field') ? get_field('social_tel_url') : '';
                                $social_wc_url = function_exists('get_field') ? get_field('social_wc_url') : '';
                                $social_wapp_url = function_exists('get_field') ? get_field('social_wapp_url') : '';

                        ?>
                                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                                    <div class="team__slider-card m-0">
                                        <a href="<?php the_permalink() ?>" class="cus_thumb w-100">
                                            <div class="team__slider-card__thumb w-100">
                                                <?php the_post_thumbnail() ?>
                                            </div>
                                        </a>
                                        <div class="team__slider-card__content">
                                            <h5 class="team_name">
                                                <a href="<?php the_permalink(); ?>" class="cus_title_link">
                                                    <?php echo the_title(); ?>
                                                </a>
                                            </h5>
                                            <?php if (!empty(esc_html($team_deg))) :   ?>
                                                <p class="team_deg secondary-text mt-1"><?php echo esc_html($team_deg) ?></p>
                                            <?php endif ?>

                                            <div class="social">
                                                <?php if (!empty(esc_url($social_fb_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_fb_url) ?>">
                                                        <i class="fa-brands fa-facebook-f"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_tw_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_tw_url) ?>">
                                                        <i class="fa-brands fa-twitter"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_in_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_in_url) ?>">
                                                        <i class="fa-brands fa-square-instagram"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_ln_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_ln_url) ?>">
                                                        <i class="fa-brands fa-linkedin-in"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_yt_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_yt_url) ?>">
                                                        <i class="fa-brands fa-youtube"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_tel_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_tel_url) ?>">
                                                        <i class="fa-brands fa-telegram"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_wc_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_wc_url) ?>">
                                                        <i class="fa-brands fa-weixin"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (!empty(esc_url($social_wapp_url))) :   ?>
                                                    <a href="<?php echo esc_url($social_wapp_url) ?>">
                                                        <i class="fa-brands fa-whatsapp"></i>
                                                    </a>
                                                <?php endif ?>
                                            </div>
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
        <!-- ==== team section secondary end ==== -->

<?php
    }
}

$widgets_manager->register(new TP_team());
