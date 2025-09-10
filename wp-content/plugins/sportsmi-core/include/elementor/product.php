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
class TP_product extends Widget_Base
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
        return 'tp-product';
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
        return __('Product', 'tpcore');
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
            'post_per_pages' => -1,
            'post_status'      => 'publish',
        );
        $all_post   = new \WP_Query($args);

        while ($all_post->have_posts()) {
            $all_post->the_post();
            $return_val[get_the_ID()] = get_the_title();
        }

        return $return_val;
    }

    public function get_all_post_list_by_post_type($post_type)
    {
        $return_val = [];
        $args       = array(
            'post_type'      => $post_type,
            'posts_per_page' => 2,
            'post_status'      => 'publish',
        );
        $all_post   = new \WP_Query($args);

        while ($all_post->have_posts()) {
            $all_post->the_post();
            $return_val[get_the_ID()] = get_the_title();
        }

        return $return_val;
    }


    public function get_taxonomy_terms($taxonomy)
    {
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        ]);

        $term_options = [];
        foreach ($terms as $term) {
            $term_options[$term->term_id] = $term->name;
        }

        return $term_options;
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

        // product
        $this->start_controls_section(
            'sportsmi_product_section_genaral',
            [
                'label' => esc_html__('product Section', 'sportsmi-core')
            ]
        );

        $this->add_control(
            'sportsmi_product_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'sportsmi-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'sportsmi-core'),
                    'style_two' => esc_html__('Style Two', 'sportsmi-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'card_header_section_show',
            [
                'label' => esc_html__('Header Switch', 'finview-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'finview-core'),
                'label_off' => esc_html__('Hide', 'finview-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'section_pt_show',
            [
                'label' => esc_html__('Padding Top Switch', 'finview-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'finview-core'),
                'label_off' => esc_html__('Hide', 'finview-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'section_pb_show',
            [
                'label' => esc_html__('Padding Bottom Switch', 'finview-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'finview-core'),
                'label_off' => esc_html__('Hide', 'finview-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'card_button_section_show',
            [
                'label' => esc_html__('Button Switch', 'finview-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'finview-core'),
                'label_off' => esc_html__('Hide', 'finview-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_header_section_show' => 'yes'
                ]
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
            // 'product_item_per_page',
            'product_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 2,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'product_name',
            [
                'label'   => __('Product Name', 'scooby-core'),
                'type'    => Controls_Manager::SELECT2,
                'options' => $this->get_post_list_by_post_type('product'),
                'default' => $this->get_all_post_list_by_post_type('product'),
                'multiple'   => 'true',
            ]
        );

        $this->add_control(
            'product_category',
            [
                'label' => __('Select Category', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_taxonomy_terms('product_cat'), // Adjust 'product_cat' to your taxonomy
                'default'     => [],
            ]
        );


        $this->add_control(
            'product_order',
            [
                'label' => __('Orders', 'scooby-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'DESC' => __('Descending', 'scooby-core'),
                    'ASC' => __('Ascending', 'scooby-core'),
                    'rand' => __('Random', 'scooby-core'),
                ],
                'default' => 'DESC',
            ]
        );

        $this->add_control(
            'product_order_by',
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
            'desktop_column',
            [
                'label' => esc_html__('Desktop ', 'rsaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '12' => esc_html__('1 Column', 'rsaddon'),
                    '6' => esc_html__('2 Column', 'rsaddon'),
                    '4' => esc_html__('3 Column', 'rsaddon'),
                    '3' => esc_html__('4 Column', 'rsaddon'),
                    '2' => esc_html__('6 Column', 'rsaddon'),
                ],
            ]
        );
        $this->add_control(
            'leptop_column',
            [
                'label' => esc_html__('Leptop', 'rsaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '12' => esc_html__('1 Column', 'rsaddon'),
                    '6' => esc_html__('2 Column', 'rsaddon'),
                    '4' => esc_html__('3 Column', 'rsaddon'),
                    '3' => esc_html__('4 Column', 'rsaddon'),
                    '2' => esc_html__('6 Column', 'rsaddon'),
                ],
            ]
        );
        $this->add_control(
            'tablet_column',
            [
                'label' => esc_html__('Tablet', 'rsaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '12' => esc_html__('1 Column', 'rsaddon'),
                    '6' => esc_html__('2 Column', 'rsaddon'),
                    '4' => esc_html__('3 Column', 'rsaddon'),
                    '3' => esc_html__('4 Column', 'rsaddon'),
                    '2' => esc_html__('6 Column', 'rsaddon'),
                ],
            ]
        );
        $this->add_control(
            'mobile_column',
            [
                'label' => esc_html__('Mobile', 'rsaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => '12',
                'options' => [
                    '12' => esc_html__('1 Column', 'rsaddon'),
                    '6' => esc_html__('2 Column', 'rsaddon'),
                    '4' => esc_html__('3 Column', 'rsaddon'),
                    '3' => esc_html__('4 Column', 'rsaddon'),
                    '2' => esc_html__('6 Column', 'rsaddon'),
                ],
            ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
            'trainings_three_heading_general_content',
            [
                'label' => esc_html__('Heading', 'sportsmi-core'),
                'condition' => [
                    'card_header_section_show' => 'yes',
                ]
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
                    '{{WRAPPER}} .section__header' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .section__cta' => 'text-align: {{VALUE}};',
                ],

            ]
        );


        $this->add_control(
            'sportsmi_heading_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Shop', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_content_title',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Featured products', 'sportsmi-core'),
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
                'default' => esc_html__('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas doloribus provident assumenda quidem. Minus quia doloribus, eveniet nam esse molestiae iste dolores numquam.', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );

        // Button text
        $this->add_control(
            'sportsmi_content_button',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('See all products', 'sportsmi-core'),
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
                    'url' => '#',
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


        // ======================= Heading Style =================================//

        // Subtitle 
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => esc_html__('Subtitle', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
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
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
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
            'button_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'color: {{VALUE}};',
                ],
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

        // product card
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
                    '{{WRAPPER}} .shop__card-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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


        // card Rating Icon 
        $this->start_controls_section(
            'card_icon_style',
            [
                'label' => esc_html__('Rating Icon', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_icon_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .shop__card-review i' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .shop__card-review i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
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
                'selector' => '{{WRAPPER}} .woocommerce-loop-product__title',

            ]
        );

        $this->add_control(
            'card_title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-loop-product__title' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .woocommerce-loop-product__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .woocommerce-loop-product__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // Card Description
        $this->start_controls_section(
            'card_des_style',
            [
                'label' => esc_html__('Price Color', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'card_des_style_typ',
                'selector' => '{{WRAPPER}} .woocommerce-Price-amount bdi,.woocommerce-Price-amount bdi span',
            ]
        );

        $this->add_control(
            'card_des_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-Price-amount bdi,.woocommerce-Price-amount bdi span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_reg_style_color',
            [
                'label'     => esc_html__('Regular Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price del bdi,.price del bdi span' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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

        $params = array(
            'post_type' => 'product',
            'posts_per_page' => $settings['product_posts_per_page'],
            'orderby'        => $settings['product_order_by'],
            'order' => $settings['product_order'],
            'post_status'    => 'publish',
            'post__in' => $settings['product_name'],
        );


        if (!empty($settings['product_category'])) {
            $params['tax_query'] = [
                [
                    'taxonomy' => 'product_cat', // Replace with your category taxonomy
                    'field'    => 'term_id',
                    'terms'    => $settings['product_category'],
                ],
            ];
        }

        $wc_query = new \WP_Query($params);

?>


        <!-- ==== shop section start ==== -->

        <?php if ($settings['sportsmi_product_content_style_selection'] == 'style_one') : ?>
            <section class="section shop <?php echo ($settings['section_pb_show'] == 'yes') ? '' : 'pb-0' ?> <?php echo ($settings['section_pt_show'] == 'yes') ? '' : 'pt-0' ?> wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <?php if (!empty($settings['card_header_section_show'] == 'yes')) :   ?>
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
                                        <p class="xlr pp"><?php echo wp_kses($settings['sportsmi_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="row justify-content-center g-4">
                        <?php

                        if ($wc_query->have_posts()) :
                            while ($wc_query->have_posts()) :
                                $wc_query->the_post();
                                global $product;
                        ?>
                                <div class="col-sm-<?php echo esc_html($settings['mobile_column']); ?> col-md-<?php echo esc_html($settings['tablet_column']); ?> col-lg-<?php echo esc_html($settings['leptop_column']); ?>  col-xxl-<?php echo esc_html($settings['desktop_column']); ?>">
                                    <div class="shop__card cus_card">
                                        <div class="shop__card-thumb">
                                            <a href="<?php the_permalink() ?>" class="cus_thumb">
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php echo esc_attr__('product-img', 'scooby-core') ?>">
                                            </a>
                                        </div>
                                        <div>
                                            <div class="shop__card-info">
                                                <a href="<?php the_permalink() ?>" class="d-block"><?php woocommerce_template_loop_product_title() ?></a>
                                                <?php woocommerce_template_loop_price(); ?>
                                            </div>
                                            <div class="shop__card-review">
                                                <?php
                                                $rating_count = $product->get_average_rating();
                                                ?>

                                                <ul>
                                                    <?php for ($x = 0; $x < 5; $x++) : ?>
                                                        <?php if ($x < $rating_count) : ?>
                                                            <i class="fa-solid fa-star"></i>
                                                        <?php else : ?>
                                                            <i class="fa-regular fa-star"></i>
                                                        <?php endif ?>
                                                    <?php endfor ?>
                                                </ul>

                                            </div>
                                            <div class="shop__card-cta">
                                                <a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="cmn-button" data-product_id="<?php echo get_the_ID(); ?>"><?php echo esc_html__('Add Cart', 'scooby') ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php if (!empty($settings['card_button_section_show'] == 'yes')) :   ?>
                        <div class="row">
                            <div class="col-12">
                                <?php if (!empty($settings['sportsmi_content_button'])) : ?>
                                    <div class="section__cta">
                                        <a href="<?php echo esc_html($settings['sportsmi_content_button_url']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_content_button']) ?></a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </section>
            <!-- ==== / shop section end ==== -->
        <?php endif; ?>

        <?php if ($settings['sportsmi_product_content_style_selection'] == 'style_two') : ?>
            <section class="section shop shop--secondary <?php echo ($settings['section_pb_show'] == 'yes') ? '' : 'pb-0' ?> <?php echo ($settings['section_pt_show'] == 'yes') ? '' : 'pt-0' ?>  wow fadeInUp" data-wow-duration="0.4s" data-background="<?php echo get_template_directory_uri() ?>/assets/images/player-bg.png">
                <div class="container">
                    <?php if (!empty($settings['card_header_section_show'] == 'yes')) :   ?>
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
                                        <p class="xlr pp"><?php echo wp_kses($settings['sportsmi_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="row justify-content-center g-4">
                        <?php

                        if ($wc_query->have_posts()) :
                            while ($wc_query->have_posts()) :
                                $wc_query->the_post();
                                global $product;
                        ?>
                                <div class="col-md-10 col-lg-6 col-xl-6">
                                    <div class="shop__card cus_card">
                                        <div class="shop__card-thumb">
                                            <a href="<?php the_permalink() ?>" class="cus_thumb">
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php echo esc_attr__('product-img', 'scooby-core') ?>">
                                            </a>
                                        </div>
                                        <div>
                                            <div class="shop__card-info">
                                                <a href="<?php the_permalink() ?>" class="d-block"><?php woocommerce_template_loop_product_title() ?></a>
                                                <?php woocommerce_template_loop_price(); ?>
                                            </div>
                                            <div class="shop__card-review">
                                                <?php
                                                $rating_count = $product->get_average_rating();
                                                ?>

                                                <ul>
                                                    <?php for ($x = 0; $x < 5; $x++) : ?>
                                                        <?php if ($x < $rating_count) : ?>
                                                            <i class="fa-solid fa-star"></i>
                                                        <?php else : ?>
                                                            <i class="fa-regular fa-star"></i>
                                                        <?php endif ?>
                                                    <?php endfor ?>
                                                </ul>

                                            </div>
                                            <div class="shop__card-cta">
                                                <a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="cmn-button" data-product_id="<?php echo get_the_ID(); ?>"><?php echo esc_html__('Add Cart', 'scooby') ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php if (!empty($settings['card_button_section_show'] == 'yes')) :   ?>
                        <div class="row">
                            <div class="col-12">
                                <?php if (!empty($settings['sportsmi_content_button'])) : ?>
                                    <div class="section__cta">
                                        <a href="<?php echo esc_html($settings['sportsmi_content_button_url']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_content_button']) ?></a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </section>
            <!-- ==== / shop section end ==== -->
        <?php endif; ?>

<?php

    }
}

$widgets_manager->register(new TP_product());
