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
class TP_facility extends Widget_Base
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
        return 'tp-facility';
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
        return __('Facility', 'tpcore');
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



        $this->start_controls_section(
            'facility_general_content',
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
                    'style_four' => esc_html__('Style Four', 'sportsmi-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();


        // Posts Per Page Show
        $this->start_controls_section(
            'facility_one_general_content',
            [
                'label' => esc_html__('Content', 'sportsmi-core')
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
                'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
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

        $this->add_control(
            'desktop_column',
            [
                'label' => esc_html__('Desktop < 1400', 'rsaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '12' => esc_html__('1 Column', 'rsaddon'),
                    '6' => esc_html__('2 Column', 'rsaddon'),
                    '4' => esc_html__('3 Column', 'rsaddon'),
                    '3' => esc_html__('4 Column', 'rsaddon'),
                    '2' => esc_html__('6 Column', 'rsaddon'),
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'leptop_lands_column',
            [
                'label' => esc_html__('Leptop Landscape < 1200', 'rsaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '12' => esc_html__('1 Column', 'rsaddon'),
                    '6' => esc_html__('2 Column', 'rsaddon'),
                    '4' => esc_html__('3 Column', 'rsaddon'),
                    '3' => esc_html__('4 Column', 'rsaddon'),
                    '2' => esc_html__('6 Column', 'rsaddon'),
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_two'
                ]
            ]
        );
        $this->add_control(
            'leptop_column',
            [
                'label' => esc_html__('Leptop < 992', 'rsaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => '6',
                'options' => [
                    '12' => esc_html__('1 Column', 'rsaddon'),
                    '6' => esc_html__('2 Column', 'rsaddon'),
                    '4' => esc_html__('3 Column', 'rsaddon'),
                    '3' => esc_html__('4 Column', 'rsaddon'),
                    '2' => esc_html__('6 Column', 'rsaddon'),
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_two'
                ]
            ]
        );
        $this->add_control(
            'tablet_column',
            [
                'label' => esc_html__('Tablet < 768', 'rsaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => '6',
                'options' => [
                    '12' => esc_html__('1 Column', 'rsaddon'),
                    '6' => esc_html__('2 Column', 'rsaddon'),
                    '4' => esc_html__('3 Column', 'rsaddon'),
                    '3' => esc_html__('4 Column', 'rsaddon'),
                    '2' => esc_html__('6 Column', 'rsaddon'),
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_two'
                ]
            ]
        );
        $this->add_control(
            'mobile_column',
            [
                'label' => esc_html__('Mobile < 576', 'rsaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => '6',
                'options' => [
                    '12' => esc_html__('1 Column', 'rsaddon'),
                    '6' => esc_html__('2 Column', 'rsaddon'),
                    '4' => esc_html__('3 Column', 'rsaddon'),
                    '3' => esc_html__('4 Column', 'rsaddon'),
                    '2' => esc_html__('6 Column', 'rsaddon'),
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'trim_words_count_content',
            [
                'label' => esc_html__('Trim Words Content', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('9', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your number here', 'sportsmi-core'),
            ]
        );

        // Button text
        $this->add_control(
            'sportsmi_content_button',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Button', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your button here', 'sportsmi-core'),
                'label_block' => true,
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_two']
                ]
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'trainings_three_heading_general_content',
            [
                'label' => esc_html__('Heading', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_three', 'style_four']
                ]
            ]
        );
        $this->add_control(
            'sportsmi_heading_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Facility', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'sportsmi-core'),
                'label_block' => true,
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_three', 'style_four']
                ]
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
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_three', 'style_four']
                ]
            ]
        );
        $this->add_control(
            'sportsmi_heading_content_description',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Sportsmi Sports Club is a Sports club with a history that goes back to XX century. From a cricket club to soccer tournaments,', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_three', 'style_four']
                ]
            ]
        );

        // Button text
        $this->add_control(
            'sportsmi_content_two_button',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your button here', 'sportsmi-core'),
                'label_block' => true,
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_four',
                ]
            ]
        );

        // Button URL
        $this->add_control(
            'sportsmi_content_two_button_url',
            [
                'label' => esc_html__('Button URL', 'sportsmi-core'),
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
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_four',
                ]
            ]
        );

        $this->add_control(
            'sportsmi_fac_one_content_image',
            [
                'label' => esc_html__('Choose Image', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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


        // Subtitle 
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_three', 'style_four'],
                ]
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
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_three', 'style_four'],
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

        //    Description
        $this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__('Description', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sportsmi_content_style_selection' =>  ['style_three', 'style_four'],
                ]
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
                    '{{WRAPPER}} .facility__card' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'faborder',
                'selector' => '{{WRAPPER}} .facility--secondary .facility--secondary__cards .facility__card',
            ]
        );


        $this->add_responsive_control(
            'card_border_radius',
            [
                'label'      => __('Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .facility__card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'card_borderdf_radius',
            [
                'label'      => __('Image Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .facility--secondary__thumbs img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                    '{{WRAPPER}} .facility__card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .facility__card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // card  Icon 
        $this->start_controls_section(
            'card_icon_style',
            [
                'label' => esc_html__('Icon', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'card_icon_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_icon i' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .cus_icon i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    'sportsmi_content_style_selection' => ['style_one', 'style_three', 'style_four']
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
                'label'     => esc_html__('Btn Icon Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_three']
                ]
            ]
        );
        $this->add_control(
            'button_secondary_color',
            [
                'label'     => esc_html__('Btn Icon Hover Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:hover i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_three']
                ]
            ]
        );
        $this->add_control(
            'button_sec_color',
            [
                'label'     => esc_html__('Btn Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_four',
                ]
            ]
        );
        $this->add_control(
            'button_sec_color_hover',
            [
                'label'     => esc_html__('Btn Hover Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:hover' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_four',
                ]
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
                'post_type'      => 'facility',
                'posts_per_page' => $settings['facility_posts_per_page'],
                'orderby'        => $settings['facility_template_order_by'],
                'order'          => $settings['facility_template_order'],
                'post__in'          => $settings['facility_category'],
                'post_status'    => 'publish',
                'paged'          => $paged,

            )
        );

?>


        <script>
            jQuery(document).ready(function($) {

                // facility slider
                jQuery(".facility__slider")
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
                        prevArrow: jQuery(".prev-facility"),
                        nextArrow: jQuery(".next-facility"),
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


                // facility related slider
                jQuery(".facility--main__slider")
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
                        prevArrow: jQuery(".prev-related-facility"),
                        nextArrow: jQuery(".next-related-facility"),
                        centerMode: true,
                        centerPadding: "0px",
                        responsive: [{
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
                                },
                            },
                        ],
                    });

            });
        </script>

        <style>
            .facility .facility__card-icon i {
                font-family: 'dashicons';
                font-style: normal;
            }
        </style>


        <!-- ==== training section start ==== -->
        <?php if ($settings['sportsmi_content_style_selection'] == 'style_one') : ?>
            <section class="section facility--main box_area wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section__header--secondary">
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="section__header--secondary__content">
                                            <?php if (!empty($settings['sportsmi_heading_one_content_title'])) : ?>
                                                <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_one_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="section__header--secondary__cta">
                                            <div class="slider-navigation justify-content-lg-end">
                                                <button class="next-related-facility cmn-button cmn-button--secondary">
                                                    <i class="fa-solid fa-angle-left"></i>
                                                </button>
                                                <button class="prev-related-facility cmn-button cmn-button--secondary">
                                                    <i class="fa-solid fa-angle-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="facility--main__slider">
                                <?php if ($query->have_posts()) :
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                ?>
                                        <div class="cus_card facility--main__card">
                                            <div class="facility--main__card-thumb">
                                                <a href="<?php the_permalink() ?>" class="cus_thumb">
                                                    <?php the_post_thumbnail() ?>
                                                </a>
                                            </div>
                                            <div class="facility--main__card-content cus_cont">
                                                <h5>
                                                    <a href="<?php the_permalink(); ?>" class="cus_title_link">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>
                                                <p class="secondary-text"><?php echo wp_trim_words(get_the_excerpt(), (int)$settings['trim_words_count_content'], '...'); ?></p>
                                                <a href="<?php the_permalink() ?>" class="cus_btn_link facility--main__card-content__cta">
                                                    <?php echo esc_html($settings['sportsmi_content_button']) ?>
                                                    <i class="fa-solid fa-right-long"></i>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endwhile ?>
                                <?php endif ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($settings['sportsmi_content_style_selection'] == 'style_two') : ?>
            <!-- ==== facility section start ==== -->
            <section class="section facility--main box_area wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row section__row justify-content-center">
                        <?php if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                        ?>
                                <div class="col-sm-<?php echo esc_html($settings['mobile_column']); ?> col-md-<?php echo esc_html($settings['tablet_column']); ?> col-lg-<?php echo esc_html($settings['leptop_column']); ?>  col-xl-<?php echo esc_html($settings['leptop_lands_column']); ?> col-xxl-<?php echo esc_html($settings['desktop_column']); ?> section__col">
                                    <div class="cus_card facility--main__card">
                                        <div class="facility--main__card-thumb">
                                            <a href="<?php the_permalink() ?>" class="cus_thumb">
                                                <?php the_post_thumbnail() ?>
                                            </a>
                                        </div>
                                        <div class="facility--main__card-content cus_cont">
                                            <h5>
                                                <a href="<?php the_permalink(); ?>" class="cus_title_link">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h5>
                                            <p class="secondary-text"><?php echo wp_trim_words(get_the_excerpt(), (int)$settings['trim_words_count_content'], '...'); ?></p>
                                            <a href="<?php the_permalink() ?>" class="cus_btn_link facility--main__card-content__cta">
                                                <?php echo esc_html($settings['sportsmi_content_button']) ?>
                                                <i class="fa-solid fa-right-long"></i>
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
            <!-- ==== / facility section end ==== -->
        <?php endif; ?>

        <?php if ($settings['sportsmi_content_style_selection'] == 'style_three') : ?>
            <section class="section facility box_area wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section__header">
                                <?php if (!empty($settings['sportsmi_heading_content_subtitle'])) :   ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_one_content_title'])) :   ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_one_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_description'])) :   ?>
                                    <p class="xlr pp "><?php echo wp_kses($settings['sportsmi_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-lg-12">
                            <div class="facility__slider">
                                <?php if ($query->have_posts()) :
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        $select_image_types = function_exists('get_field') ? get_field('select_image_types') : '';
                                        $icon_field = function_exists('get_field') ? get_field('icon_field') : '';
                                        $image_field = function_exists('get_field') ? get_field('image_field') : '';
                                ?>
                                        <div class="cus_card facility__card">
                                            <div class="cus_icon facility__card-icon ">
                                                <?php if ($select_image_types == 'Choose Icons') : ?>
                                                    <i class="<?php echo esc_html($icon_field); ?>"></i>
                                                <?php elseif ($select_image_types == 'Choose Images') : ?>
                                                    <img src="<?php echo esc_url($image_field); ?>" alt="<?php echo esc_attr__('..', 'sportsmi'); ?>">
                                                <?php else : ?>
                                                    <i class="<?php echo esc_html($icon_field); ?>"></i>
                                                <?php endif; ?>
                                            </div>
                                            <div class="facility__card-content cus_cont">
                                                <h5>
                                                    <a href="<?php the_permalink(); ?>" class="cus_title_link">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>
                                                <p class="secondary-text"><?php echo wp_trim_words(get_the_excerpt(), (int)$settings['trim_words_count_content'], '...'); ?></p>
                                            </div>
                                        </div>
                                    <?php endwhile ?>
                                <?php endif ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-navigation">
                                <button class="next-facility cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                                <button class="prev-facility cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($settings['sportsmi_content_style_selection'] == 'style_four') : ?>
            <section class="section facility facility--secondary box_area wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section__header">
                                <?php if (!empty($settings['sportsmi_heading_content_subtitle'])) :   ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_one_content_title'])) :   ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_one_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_description'])) :   ?>
                                    <p class="xlr pp "><?php echo wp_kses($settings['sportsmi_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_content_two_button'])) : ?>
                                    <div class="section__header-cta">
                                        <a href="<?php echo esc_html($settings['sportsmi_content_two_button_url']['url']) ?>" class="cmn-button cmn-button--secondary"><?php echo esc_html($settings['sportsmi_content_two_button']) ?></a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 align-items-center justify-content-between cus_design  pt-xxl-3 pb-xxl-4 ">
                        <?php if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();

                                $select_image_types = function_exists('get_field') ? get_field('select_image_types') : '';
                                $icon_field = function_exists('get_field') ? get_field('icon_field') : '';
                                $image_field = function_exists('get_field') ? get_field('image_field') : '';
                        ?>
                                <div class="col-sm-6 col-lg-4 col-xxl-3">
                                    <div class="facility--secondary__cards">
                                        <div class="facility__card">
                                            <div class="facility__card-icon">
                                                <?php if ($select_image_types == 'Choose Icons') : ?>
                                                    <i class="<?php echo esc_html($icon_field); ?>"></i>
                                                <?php elseif ($select_image_types == 'Choose Images') : ?>
                                                    <img src="<?php echo esc_url($image_field); ?>" alt="<?php echo esc_attr__('..', 'sportsmi'); ?>">
                                                <?php else : ?>
                                                    <i class="<?php echo esc_html($icon_field); ?>"></i>
                                                <?php endif; ?>
                                            </div>
                                            <div class="facility__card-content">
                                                <h5>
                                                    <a href="<?php the_permalink(); ?>" class="cus_title_link">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>
                                                <p class="secondary-text"><?php echo wp_trim_words(get_the_excerpt(), (int)$settings['trim_words_count_content'], '...'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        <?php endif ?>
                        <?php wp_reset_postdata(); ?>
                        <?php if (!empty($settings['sportsmi_fac_one_content_image']['url'])) :   ?>
                            <div class="facility--secondary__thumbs text-center cus_design_vector d-none d-lg-block">
                                <img src="<?php echo esc_url($settings['sportsmi_fac_one_content_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TP_facility());
