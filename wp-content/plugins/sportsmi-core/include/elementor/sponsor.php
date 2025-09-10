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
class TP_sponsor extends Widget_Base
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
        return 'tp-sponsor';
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
        return __('Sponsor', 'tpcore');
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


        //sponsor Section
        $this->start_controls_section(
            'sportsmi_sponsor_card_section_genaral',
            [
                'label' => esc_html__('Sponsor', 'sportsmi-core')
            ]
        );


        $this->add_control(
            'sportsmi_sponsor_carousel',
            [
                'label' => esc_html__('Add Sponsor Logo', 'sportsmi-core'),
                'type' => Controls_Manager::GALLERY,
                'default' => [],
                'show_label' => false,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );


        $this->end_controls_section();

        // ======================= Style =================================//

        $this->start_controls_section(
            'button_one_style',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'button_one_border_radius',
            [
                'label'      => __('Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .sponsor__inner-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'button_one_bdr_color',
            [
                'label' => esc_html__('Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sponsor__inner-card' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );


        $this->add_responsive_control(
            'button_one_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .sponsor__inner-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .sponsor__inner-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
        <script>
            jQuery(document).ready(function($) {
                // sponsor slider
                jQuery(".sponsor__inner")
                    .not(".slick-initialized")
                    .slick({
                        infinite: true,
                        autoplay: true,
                        focusOnSelect: true,
                        slidesToShow: 7,
                        speed: 900,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: false,
                        centerMode: true,
                        centerPadding: "0px",
                        responsive: [{
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 5,
                                },
                            },
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 4,
                                },
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 3,
                                },
                            },
                            {
                                breakpoint: 424,
                                settings: {
                                    slidesToShow: 2,
                                },
                            },
                        ],
                    });
            });
        </script>
        <!-- ==== sponsor section start ==== -->
        <div class="sponsor wow fadeInUp" data-wow-duration="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="sponsor__inner">
                            <?php foreach ($settings['sportsmi_sponsor_carousel'] as $item) : ?>
                                <?php if (!empty($item['url'])) :   ?>
                                    <div class="sponsor__inner-card">
                                        <img src="<?php echo esc_url($item['url']) ?>" alt="<?php echo esc_attr('Sponsor-img') ?>">
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==== / sponsor section end ==== -->

<?php
    }
}

$widgets_manager->register(new TP_sponsor());
