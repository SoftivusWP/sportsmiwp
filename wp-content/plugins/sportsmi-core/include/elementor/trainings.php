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
class TP_trainings extends Widget_Base
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
        return 'tp-trainings';
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
        return __('Trainings', 'tpcore');
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
            'trainings_general_content',
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

        $this->start_controls_section(
            'trainings_one_heading_general_content',
            [
                'label' => esc_html__('Heading', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_one',
                ]
            ]
        );


        $this->add_control(
            'sportsmi_heading_one_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trainings', 'sportsmi-core'),
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
        $this->add_control(
            'sportsmi_heading_one_content_description',
            [
                'label' => esc_html__('Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas doloribus provident assumenda quidem.', 'sportsmi-core'),
                'rows' => 10,
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'trainings_three_heading_general_content',
            [
                'label' => esc_html__('Heading', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_three',
                ]
            ]
        );

        $this->add_control(
            'sportsmi_heading_three_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trainings', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_three_content_title',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_three_content_description',
            [
                'label' => esc_html__('Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas doloribus provident assumenda quidem.', 'sportsmi-core'),
                'rows' => 10,
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'trainings_four_heading_general_content',
            [
                'label' => esc_html__('Heading', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_content_style_selection' => 'style_four',
                ]
            ]
        );

        $this->add_control(
            'sportsmi_heading_four_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trainings', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_four_content_title',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_four_content_description',
            [
                'label' => esc_html__('Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas doloribus provident assumenda quidem.', 'sportsmi-core'),
                'rows' => 10,
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );

        $this->end_controls_section();


        // Posts Per Page Show
        $this->start_controls_section(
            'trainings_one_general_content',
            [
                'label' => esc_html__('Content', 'sportsmi-core')
            ]
        );


        $this->add_control(
            'trainings_category',
            [
                'label' => __('Select Trainings', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('trainings'),
                'default'     => $this->get_all_post_key('trainings'),
            ]
        );


        $this->add_control(
            'trainings_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => -1,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'trainings_template_order_by',
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
            'trainings_template_order',
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


        // $this->start_controls_section(
        //     'trainings_one_show_hide_content',
        //     [
        //         'label' => esc_html__('Show/Hide', 'sportsmi-core')
        //     ]
        // );

        // $this->add_control(
        //     'trainingsone_feature_show',
        //     [
        //         'label' => esc_html__('Show Feature Title?', 'sportsmi-core'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'label_on' => esc_html__('Show', 'sportsmi-core'),
        //         'label_off' => esc_html__('Hide', 'sportsmi-core'),
        //         'return_value' => 'yes',
        //         'default' => 'yes',
        //     ]
        // );
        // $this->add_control(
        //     'trainings_one_review_area',
        //     [
        //         'label' => esc_html__('Show Review/Rating?', 'sportsmi-core'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'label_on' => esc_html__('Show', 'sportsmi-core'),
        //         'label_off' => esc_html__('Hide', 'sportsmi-core'),
        //         'return_value' => 'yes',
        //         'default' => 'yes',
        //     ]
        // );
        // $this->add_control(
        //     'trainings_link_show',
        //     [
        //         'label' => esc_html__('Show Source/Link?', 'sportsmi-core'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'label_on' => esc_html__('Show', 'sportsmi-core'),
        //         'label_off' => esc_html__('Hide', 'sportsmi-core'),
        //         'return_value' => 'yes',
        //         'default' => 'yes',
        //     ]
        // );


        // $this->end_controls_section();


        // ======================= Heading Style =================================//

        // Subtitle 
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => esc_html__('Subtitle', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_three', 'style_four']
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'subtitle_style_typ',
                'selector' => '{{WRAPPER}} .sub-title',

            ]
        );

        $this->add_control(
            'subtitle_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'subtitle_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
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
                'label'      => __('Padding', 'plugin-name'),
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
                    'sportsmi_content_style_selection' => ['style_one', 'style_three', 'style_four']
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



        $this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_three', 'style_four']
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'description_style_typ',
                'selector' => '{{WRAPPER}} .pp',

            ]
        );

        $this->add_control(
            'description_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pp' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
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
                'label'      => __('Padding', 'plugin-name'),
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
                'label' => esc_html__('card', 'plugin-name'),
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
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_two', 'style_three']
                ]
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
                'label' => esc_html__('Icon', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_two', 'style_four']
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




        // =======================Button Style===========================//

        $this->start_controls_section(
            'button_style',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
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
            'button_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_three']
                ]
            ]
        );

        $this->add_control(
            'button_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:hover' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_three']
                ]
            ]
        );
        $this->add_control(
            'button_secondary_color',
            [
                'label'     => esc_html__('Btn Secondary Hover Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_two', 'style_four']
                ]
            ]
        );

        $this->add_control(
            'button_secondary_color_hover',
            [
                'label'     => esc_html__('Btn Secondary', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:hover' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_two', 'style_four']
                ]
            ]
        );
        $this->add_control(
            'button_bgcolor',
            [
                'label'     => esc_html__('Btn BG Primary', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .cmn-button:after' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_three']
                ]
            ]
        );
        $this->add_control(
            'button_hvr_bgcolor',
            [
                'label'     => esc_html__(' Btn Hover BG Primary', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:hover' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_one', 'style_three']
                ]
            ]
        );
        $this->add_control(
            'button_secondary_hvr_bgcolor',
            [
                'label'     => esc_html__('Btn Secondary BG', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button--secondary' => 'background: {{VALUE}} !important;',
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_two', 'style_four']
                ]
            ]
        );
        $this->add_control(
            'button_secondary_bgcolor',
            [
                'label'     => esc_html__('Btn Secondary BG Hover', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:after' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'sportsmi_content_style_selection' => ['style_two', 'style_four']
                ]
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
                'post_type'      => 'trainings',
                'posts_per_page' => $settings['trainings_posts_per_page'],
                'orderby'        => $settings['trainings_template_order_by'],
                'order'          => $settings['trainings_template_order'],
                'post__in'          => $settings['trainings_category'],
                'post_status'    => 'publish',
                'paged'          => $paged,

            )
        );

?>


        <script>
            jQuery(document).ready(function($) {
                // training slider
                jQuery(".training__slider").not(".slick-initialized").slick({
                    infinite: true,
                    autoplay: true,
                    focusOnSelect: true,
                    slidesToShow: 3,
                    speed: 900,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: false,
                    prevArrow: jQuery(".prev-training"),
                    nextArrow: jQuery(".next-training"),
                    centerMode: true,
                    centerPadding: "0px",
                    responsive: [{
                            breakpoint: 1200,
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





                // training tertiary slider
                jQuery(".training__slider--tertiary")
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
                        prevArrow: jQuery(".prev-training--tertiary"),
                        nextArrow: jQuery(".next-training--tertiary"),
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

                // training secondary slider
                jQuery(".training__slider--secondary")
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
                        prevArrow: jQuery(".prev-training--secondary"),
                        nextArrow: jQuery(".next-training--secondary"),
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
            });
        </script>
        <style>
            .training .training__slider-single__thumb-small i {
                font-family: 'dashicons';
                font-style: normal;
            }

            .training .training__slider-single__thumb-small img {
                transform: none !important;
            }
        </style>


        <!-- ==== training section start ==== -->
        <?php if ($settings['sportsmi_content_style_selection'] == 'style_one') : ?>
            <section class="section training wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section__header">
                                <?php if (!empty($settings['sportsmi_heading_one_content_subtitle'])) :   ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_one_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_one_content_title'])) :   ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_one_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_one_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['sportsmi_heading_one_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-12">
                            <div class="training__slider">
                                <?php
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        $select_image_types = function_exists('get_field') ? get_field('select_image_types') : '';
                                        $icon_field = function_exists('get_field') ? get_field('icon_field') : '';
                                        $image_field = function_exists('get_field') ? get_field('image_field') : '';
                                ?>
                                        <div class="training__slider-single cus_card">
                                            <div class="training__slider-single__thumb">
                                                <a href="<?php the_permalink() ?>" class="cus_thumb">
                                                    <?php the_post_thumbnail() ?>
                                                </a>
                                                <div class="training__slider-single__thumb-small cus_icon">
                                                    <?php if ($select_image_types == 'Choose Icons') : ?>
                                                        <i class="<?php echo esc_html($icon_field); ?>"></i>
                                                    <?php elseif ($select_image_types == 'Choose Images') : ?>
                                                        <img src="<?php echo esc_url($image_field); ?>" alt="<?php echo esc_attr__('..', 'sportsmi'); ?>">
                                                    <?php else : ?>
                                                        <i class="<?php echo esc_html($icon_field); ?>"></i>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="training__slider-single__content cus_cont">
                                                <h5>
                                                    <a href="<?php the_permalink(); ?>" class="cus_title_link">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>
                                                <p class="secondary-text"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>

                                                <a href="<?php the_permalink() ?>" class="cmn-button">
                                                    <?php echo esc_html__('View More', 'sportsmi-core') ?>
                                                </a>
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
                                <button class="next-training cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                                <button class="prev-training cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php if ($settings['sportsmi_content_style_selection'] == 'style_two') : ?>
            <section class="section training training--main wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row justify-content-center section__row">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $select_image_types = function_exists('get_field') ? get_field('select_image_types') : '';
                                $icon_field = function_exists('get_field') ? get_field('icon_field') : '';
                                $image_field = function_exists('get_field') ? get_field('image_field') : '';
                        ?>
                                <div class="col-md-6 col-xl-4 section__col">
                                    <div class="training__slider-single cus_card">
                                        <div class="training__slider-single__thumb">
                                            <a href="<?php the_permalink() ?>" class="cus_thumb">
                                                <?php the_post_thumbnail() ?>
                                            </a>
                                            <div class="training__slider-single__thumb-small cus_icon">
                                                <?php if ($select_image_types == 'Choose Icons') : ?>
                                                    <i class="<?php echo esc_html($icon_field); ?>"></i>
                                                <?php elseif ($select_image_types == 'Choose Images') : ?>
                                                    <img src="<?php echo esc_url($image_field); ?>" alt="<?php echo esc_attr__('..', 'sportsmi'); ?>">
                                                <?php else : ?>
                                                    <i class="<?php echo esc_html($icon_field); ?>"></i>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <div class="training__slider-single__content cus_cont">
                                            <h5>
                                                <a href="<?php the_permalink(); ?>" class="cus_title_link">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h5>
                                            <p class="secondary-text"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                            <a href="<?php the_permalink() ?>" class="cmn-button cmn-button--secondary">
                                                <?php echo esc_html__('View More', 'sportsmi-core') ?>
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

        <?php if ($settings['sportsmi_content_style_selection'] == 'style_three') : ?>
            <section class="section training--tertiary wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section__header">
                                <?php if (!empty($settings['sportsmi_heading_three_content_subtitle'])) : ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_three_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif; ?>
                                <?php if (!empty($settings['sportsmi_heading_three_content_title'])) : ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_three_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['sportsmi_heading_three_content_description'])) : ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['sportsmi_heading_three_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-12">
                            <div class="training__slider--tertiary">
                                <?php
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                ?>
                                        <div class="training--tertiary__card cus_card">
                                            <div class="training--tertiary__card-thumb">
                                                <a href="<?php the_permalink() ?>" class="cus_thumb">
                                                    <?php the_post_thumbnail() ?>
                                                </a>
                                            </div>
                                            <div class="training--tertiary__card-content cus_cont">
                                                <h5>
                                                    <a href="<?php the_permalink(); ?>" class="cus_title_link">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>
                                                <p class="secondary-text"><?php echo wp_trim_words(get_the_excerpt(), 12, '...'); ?></p>
                                                <a href="<?php the_permalink() ?>" class="cmn-button">
                                                    <?php echo esc_html__('View more', 'sportsmi-core') ?>
                                                </a>
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
                                <button class="next-training--tertiary cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                                <button class="prev-training--tertiary cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php if ($settings['sportsmi_content_style_selection'] == 'style_four') : ?>
            <!-- ==== training section start ==== -->
            <section class="section training training--secondary">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section__header wow fadeInUp" data-wow-duration="0.4s">
                                <?php if (!empty($settings['sportsmi_heading_four_content_subtitle'])) : ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_four_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif; ?>
                                <?php if (!empty($settings['sportsmi_heading_four_content_title'])) : ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_four_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['sportsmi_heading_four_content_description'])) : ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['sportsmi_heading_four_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-12">
                            <div class="training__slider--secondary">
                                <?php
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        $select_image_types = function_exists('get_field') ? get_field('select_image_types') : '';
                                        $icon_field = function_exists('get_field') ? get_field('icon_field') : '';
                                        $image_field = function_exists('get_field') ? get_field('image_field') : '';
                                ?>
                                        <div class="training__slider-single cus_card">
                                            <div class="training__slider-single__thumb-small cus_icon">
                                                <?php if ($select_image_types == 'Choose Icons') : ?>
                                                    <i class="<?php echo esc_html($icon_field); ?>"></i>
                                                <?php elseif ($select_image_types == 'Choose Images') : ?>
                                                    <img src="<?php echo esc_url($image_field); ?>" alt="<?php echo esc_attr__('..', 'sportsmi'); ?>">
                                                <?php else : ?>
                                                    <i class="<?php echo esc_html($icon_field); ?>"></i>
                                                <?php endif; ?>
                                            </div>
                                            <div class="training__slider-single__content cus_cont">
                                                <h5>
                                                    <a href="<?php the_permalink(); ?>" class="cus_title_link">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>
                                                <p class="secondary-text"><?php echo wp_trim_words(get_the_excerpt(), 8, '...'); ?></p>
                                                <a href="<?php the_permalink() ?>" class="cmn-button cmn-button--secondary">
                                                    <?php echo esc_html__('View more', 'sportsmi-core') ?>
                                                </a>
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
                                <button class="next-training--secondary cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                                <button class="prev-training--secondary cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ==== / training section end ==== -->
        <?php endif; ?>
<?php
    }
}

$widgets_manager->register(new TP_trainings());
