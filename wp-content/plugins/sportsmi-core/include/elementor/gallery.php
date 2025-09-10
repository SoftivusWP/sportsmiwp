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
class TP_gallery extends Widget_Base
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
        return 'tp-gallery';
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
        return __('Gallery', 'tpcore');
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


        //gallery Section
        $this->start_controls_section(
            'sportsmi_gallery_card_section_genaral',
            [
                'label' => esc_html__('Gallery', 'sportsmi-core')
            ]
        );



        $this->add_control(
            'gallery_one_content_image_one',
            [
                'label' => esc_html__('Choose Image One', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gallery_one_content_image_two',
            [
                'label' => esc_html__('Choose Image Two', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gallery_one_content_image_three',
            [
                'label' => esc_html__('Choose Image Three', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gallery_one_content_image_four',
            [
                'label' => esc_html__('Choose Image Four', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gallery_one_content_image_five',
            [
                'label' => esc_html__('Choose Image Five', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
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
                    '{{WRAPPER}} .gallery__thumb-single img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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


        <!-- ==== gallery section start ==== -->
        <div class="gallery wow fadeInUp" data-wow-duration="0.4s">
            <div class="container">
                <div class="row section__row align-items-center">
                    <div class="col-sm-6 col-lg-4 col-xl-4 section__col">
                        <div class="gallery__thumb">
                            <?php if (!empty($settings['gallery_one_content_image_one']['url'])) :   ?>
                                <div class="gallery__thumb-single">
                                    <img src="<?php echo esc_url($settings['gallery_one_content_image_one']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                </div>
                            <?php endif ?>
                            <?php if (!empty($settings['gallery_one_content_image_two']['url'])) :   ?>
                                <div class="gallery__thumb-single">
                                    <img src="<?php echo esc_url($settings['gallery_one_content_image_two']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4 section__col d-none d-lg-block">
                        <div class="gallery__thumb">
                            <?php if (!empty($settings['gallery_one_content_image_three']['url'])) :   ?>
                                <div class="gallery__thumb-single">
                                    <img src="<?php echo esc_url($settings['gallery_one_content_image_three']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-4 section__col">
                        <div class="gallery__thumb">
                            <?php if (!empty($settings['gallery_one_content_image_four']['url'])) :   ?>
                                <div class="gallery__thumb-single">
                                    <img src="<?php echo esc_url($settings['gallery_one_content_image_four']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                </div>
                            <?php endif ?>
                            <?php if (!empty($settings['gallery_one_content_image_five']['url'])) :   ?>
                                <div class="gallery__thumb-single">
                                    <img src="<?php echo esc_url($settings['gallery_one_content_image_five']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==== / gallery section end ==== -->


<?php
    }
}

$widgets_manager->register(new TP_gallery());
