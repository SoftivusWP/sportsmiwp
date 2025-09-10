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
class TP_play_btn extends Widget_Base
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
        return 'tp-play-btn';
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
        return __('Play Video', 'tpcore');
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


        //play_card Section
        $this->start_controls_section(
            'sportsmi_play_card_card_section_genaral',
            [
                'label' => esc_html__('Play Button', 'sportsmi-core')
            ]
        );

        $this->add_control(
            'sportsmi_play_card_title',
            [
                'label' => esc_html__('Heading Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Location', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );


        // popup
        $this->add_control(
            'sportsmi_popup_content_image',
            [
                'label' => esc_html__('Choose Image', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'sportsmi_popup_link',
            [
                'label' => esc_html__('Link', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'sportsmi-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );




        $this->end_controls_section();

        // ======================= contact card Start Style =================================//

        // card  Icon 
        $this->start_controls_section(
            'card_icon_style',
            [
                'label' => esc_html__('Icon', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_icon_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_icon_bg_color',
            [
                'label'     => esc_html__('BG Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn' => 'background: {{VALUE}};',
                ],
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
                    '{{WRAPPER}} .play-btn i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .play-btn' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}} !important;',


                ],
            ]
        );

        $this->add_control(
            'card_box_bg_color',
            [
                'label'     => esc_html__('Background Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn ' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'facility_border_radius',
            [
                'label'      => __('Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .play-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->add_responsive_control(
            'facility_main_border_radius',
            [
                'label'      => __('Image Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-popup__content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'facility_icon_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .play-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'facility_icon_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .play-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // Facility  Title 
        $this->start_controls_section(
            'facility_title_style',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'facility_title_style_typ',
                'selector' => '{{WRAPPER}} .facility__card-content h5',

            ]
        );

        $this->add_control(
            'facility_title_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .facility__card-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'facility_title_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .facility__card-content h5 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'facility_title_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .facility__card-content h5 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'facility_title_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .facility__card-content h5 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // Facility  Description 
        $this->start_controls_section(
            'facility_description_style',
            [
                'label' => esc_html__('Description', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'facility_description_style_typ',
                'selector' => '{{WRAPPER}} .facility__card-content p',

            ]
        );

        $this->add_control(
            'facility_description_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .facility__card-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'facility_description_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .facility__card-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'facility_description_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .facility__card-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
        // ======================= contact card End Style =================================//

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


        <!-- ==== gallery popup start ==== -->
        <section class="section gallery-popup">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section__header">
                            <?php if (!empty($settings['sportsmi_play_card_title'])) : ?>
                                <h2 class="title"><?php echo wp_kses($settings['sportsmi_play_card_title'], wp_kses_allowed_html('post')) ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="gallery-popup__content wow fadeInUp" data-wow-duration="0.4s">
                            <?php if (!empty($settings['sportsmi_popup_content_image']['url'])) :   ?>
                                <img src="<?php echo esc_url($settings['sportsmi_popup_content_image']['url']) ?>" alt="<?php echo esc_attr('Gallery') ?>">
                            <?php endif ?>
                            <div class="play-wrapper">
                                <?php if (!empty($settings['sportsmi_popup_link'])) :   ?>
                                    <a href="<?php echo esc_url($settings['sportsmi_popup_link']['url']) ?>" class="play-btn" target="<?php echo esc_attr('_blank') ?>" title="<?php echo esc_attr('Youtube Video Player') ?>">
                                        <i class="fa-solid fa-play"></i>
                                    </a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php
    }
}

$widgets_manager->register(new TP_play_btn());
