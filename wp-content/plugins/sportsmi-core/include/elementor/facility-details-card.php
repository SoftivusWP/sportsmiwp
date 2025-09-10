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
class TP_facility_det_card extends Widget_Base
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
        return 'tp-facility_det_card';
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
        return __('Facility Details Card', 'tpcore');
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


        // inner card
        $this->start_controls_section(
            'sportsmi_card_details',
            [
                'label' => esc_html__('Card', 'sportsmi-core'),
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'sportsmi_card_icon_one',
            [
                'label' => esc_html__('Icon', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'sportsmi-shot-upper',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'sportsmi_card_title_one',
            [
                'label' => esc_html__(' Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sportsmi_card_content_one',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Lorem ipsum dolor sit amet consectetur', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );


        $this->add_control(
            'card_inner_repeater',
            [
                'label' => esc_html__('Card', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sportsmi_card_title_one' => esc_html__('Default title', 'sportsmi-core'),

                    ],
                    [
                        'sportsmi_card_title_one' => esc_html__('Default title', 'sportsmi-core'),

                    ],
                    [
                        'sportsmi_card_title_one' => esc_html__('Default title', 'sportsmi-core'),

                    ],
                    [
                        'sportsmi_card_title_one' => esc_html__('Default title', 'sportsmi-core'),

                    ],

                ],
                'title_field' => '{{{ sportsmi_card_title_one }}}',
            ]
        );

        $this->end_controls_section();


        //======================= Style =================================//


        //inner card 
        // Icon 
        $this->start_controls_section(
            'facility_icon_style',
            [
                'label' => esc_html__('Card Icon', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'facility_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_icon svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .card_icon i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_icon:hover svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .card_icon:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bgcolor',
            [
                'label'     => esc_html__('Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_icon' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_hvr_bgcolor',
            [
                'label'     => esc_html__('Hover Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_icon:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'facility_bdr_color',
            [
                'label' => esc_html__('Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_icon' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'facility_bdr_hvr_color',
            [
                'label' => esc_html__('Hover Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_icon:hover' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );

        // Icon Size
        $this->add_responsive_control(
            'inner_card_icon_custom_dimensionsss',
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
                    '{{WRAPPER}} .card_icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .card_icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon box Size
        $this->add_responsive_control(
            'inner_card_icon_box_custom_dimensionsss',
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
                    '{{WRAPPER}} .card_icon' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}} !important;',


                ],
            ]
        );

        $this->add_responsive_control(
            'inner_card_border_radius',
            [
                'label'      => __('Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .card_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'inner_card_icon_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .card_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'inner_card_icon_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .card_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // card title
        $this->start_controls_section(
            'card_title_style',
            [
                'label' => esc_html__('Card Content', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'card_title_style_typ',
                'selector' => '{{WRAPPER}} .cart_title',
            ]
        );

        $this->add_control(
            'card_title_style_color',
            [
                'label'     => esc_html__('Title Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cart_title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_desc_style_color',
            [
                'label'     => esc_html__('Description Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'des_card_title_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cart_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'des_card_title_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cart_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                'selector' => '{{WRAPPER}} .facility__overview-single-content p',

            ]
        );

        $this->add_control(
            'card_des_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .facility__overview-single-content p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .facility__overview-single-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .facility__overview-single-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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





        <!-- ==== details start ==== -->

        <div class="facility__overview">
            <div class="row section__row">
                <?php foreach ($settings['card_inner_repeater'] as $item) : ?>
                    <div class="col-md-6 section__col">
                        <div class="facility__overview-single">
                            <?php if (!empty($item['sportsmi_card_icon_one'])) : ?>
                                <div class="facility__overview-single-thumb card_icon">
                                    <?php \Elementor\Icons_Manager::render_icon($item['sportsmi_card_icon_one'], ['aria-hidden' => 'true']); ?>
                                </div>
                            <?php endif ?>
                            <?php if (!empty($item['sportsmi_card_title_one'])) :   ?>
                                <div class="facility__overview-single-content">
                                    <h6 class="cart_title"><?php echo esc_html($item['sportsmi_card_title_one']) ?></h6>
                                    <p class="secondary-text"><?php echo esc_html($item['sportsmi_card_content_one']) ?></p>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- ==== details start ==== -->

<?php
    }
}

$widgets_manager->register(new TP_facility_det_card());
