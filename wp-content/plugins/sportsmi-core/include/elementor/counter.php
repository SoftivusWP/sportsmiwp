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
class TP_counter extends Widget_Base
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
        return 'tp-counter';
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
        return __('Counter', 'tpcore');
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

        // ====================================== Content One ============================================//

        $this->start_controls_section(
            'content_bg_section',
            [
                'label' => esc_html__('Counter Background', 'sportsmi-core'),
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Background', 'sportsmi-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .banner--secondary',
                // 'selector' => '{{WRAPPER}} .banner--secondary:after',
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Counter', 'sportsmi-core'),
            ]
        );

        // $this->add_control(
        //     'sportsmi_content_image',
        //     [
        //         'label' => esc_html__('Choose Image', 'sportsmi-core'),
        //         'type' => \Elementor\Controls_Manager::MEDIA,
        //         'default' => [
        //             'url' => \Elementor\Utils::get_placeholder_image_src(),
        //         ],
        //     ]
        // );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'sportsmi_counter_card_icon',
            [
                'label' => esc_html__('Icon', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'sportsmi-users',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'sportsmi_counter_number',
            [
                'label' => esc_html__('Counter number', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('100', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your number here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sportsmi_counter_sign',
            [
                'label' => esc_html__('Counter Sign', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your number here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'sportsmi_counter_text',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Active Member', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'card_repeater',
            [
                'label' => esc_html__('Counter Card', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sportsmi_counter_text' => esc_html__('Active Member', 'sportsmi-core'),

                    ],
                    [
                        'sportsmi_counter_text' => esc_html__('Active Member', 'sportsmi-core'),

                    ],
                    [
                        'sportsmi_counter_text' => esc_html__('Active Member', 'sportsmi-core'),

                    ],
                    [
                        'sportsmi_counter_text' => esc_html__('Active Member', 'sportsmi-core'),

                    ],
                ],
                'title_field' => '{{{ sportsmi_counter_text }}}',

            ]
        );


        $this->end_controls_section();


        // ======================= Style =================================//

        // counter_card_bg_style
        $this->start_controls_section(
            'counter_bg_style',
            [
                'label' => esc_html__('Counter', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'counter_content_align',
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
                'default'         => 'left',
                'selectors'     => [
                    '{{WRAPPER}} .counter .row' => 'justify-content: {{VALUE}};',
                ],

            ]
        );


        $this->add_control(
            'counter_bg_style_color',
            [
                'label'     => esc_html__('BG Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter__card' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'counter_box_style_color',
            [
                'label'      => __('Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .counter__card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'counter_bg_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter__card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'counter_bg_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .counter__card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // counter_number_style
        $this->start_controls_section(
            'counter_number_style',
            [
                'label' => esc_html__('Counter Number', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'counter_number_style_typ',
                'selector' => '{{WRAPPER}} .counter-part',

            ]
        );

        $this->add_control(
            'counter_number_style_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-part' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'counter_number_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter-part' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'counter_number_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .counter-part' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // counter_text
        $this->start_controls_section(
            'counter_text_style',
            [
                'label' => esc_html__('Counter Text', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'counter_text_style_typ',
                'selector' => '{{WRAPPER}} .counter_text',

            ]
        );

        $this->add_control(
            'counter_text_style_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();



        // counter Icon 
        $this->start_controls_section(
            'counter_icon_style',
            [
                'label' => esc_html__('Counter Icon', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'counter_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter__card-thumb svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .counter__card-thumb i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'counter_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter__card-thumb:hover svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .counter__card-thumb:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'counter_icon_bgcolor',
            [
                'label'     => esc_html__('Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter__card-thumb' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'counter_icon_hvr_bgcolor',
            [
                'label'     => esc_html__('Hover Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter__card-thumb:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'counter_bdr_color',
            [
                'label' => esc_html__('Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter__card-thumb' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bdr_counter_hvr_color',
            [
                'label' => esc_html__('Hover Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter__card-thumb:hover' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'counter_border_radius',
            [
                'label'      => __('Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .counter__card-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        // Icon Size
        $this->add_responsive_control(
            'counter_icon_custom_dimensionsss',
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
                    '{{WRAPPER}} .counter__card-thumb i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .counter__card-thumb svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon box Size
        $this->add_responsive_control(
            'counter_icon_box_custom_dimensionsss',
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
                    '{{WRAPPER}} .counter__card-thumb' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}} !important;',


                ],
            ]
        );

        $this->add_responsive_control(
            'counter_icon_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter__card-thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'counter_icon_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .counter__card-thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
        // ======================= Style End=================================//

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
        <!-- ==== counter section start ==== -->
        <section class="section counter">
            <div class="container">
                <div class="row section__row">
                    <?php foreach ($settings['card_repeater'] as $item) : ?>
                        <div class="col-sm-6 col-lg-3 section__col">
                            <div class="counter__card">
                                <?php if (!empty($item['sportsmi_counter_card_icon'])) :   ?>
                                    <div class="counter__card-thumb">
                                        <?php \Elementor\Icons_Manager::render_icon($item['sportsmi_counter_card_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                <?php endif ?>
                                <div class="counter__card-content">
                                    <?php if (!empty($item['sportsmi_counter_number'])) :   ?>
                                        <h2 class="counter-part"><span class="odometer" data-odometer-final="<?php echo esc_html($item['sportsmi_counter_number']) ?>"></span> <span><?php echo esc_html($item['sportsmi_counter_sign']) ?></span></h2>
                                    <?php endif ?>
                                    <?php if (!empty($item['sportsmi_counter_text'])) :   ?>
                                        <p class="counter_text primary-text"><?php echo wp_kses($item['sportsmi_counter_text'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- ==== / counter section end ==== -->
<?php
    }
}

$widgets_manager->register(new TP_counter());
