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
class TP_faq extends Widget_Base
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
        return 'tp-faq';
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
        return __('FAQ', 'tpcore');
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


        //faq Section
        $this->start_controls_section(
            'sportsmi_gallery_card_section_genaral',
            [
                'label' => esc_html__('FAQ', 'sportsmi-core')
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'sportsmi_cont_faq_icon',
            [
                'label' => esc_html__('Icon', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'sportsmi-ball',
                    'library' => 'solid',
                ],
            ]
        );


        $repeater->add_control(
            'sportsmi_cont_faq_tab',
            [
                'label' => esc_html__('FAQ Content', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Sports Academy', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sportsmi_cont_faq_title',
            [
                'label' => esc_html__('cont_card Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('FAQ Title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sportsmi_cont_faq_description',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Our staff are always on hand to make all members feel welcome. Fully dedicated to Sports lovers.', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );

        $repeater->add_control(
            'sportsmi_cont_faq_title_2',
            [
                'label' => esc_html__('cont_card Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('FAQ Title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sportsmi_cont_faq_description_2',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Our staff are always on hand to make all members feel welcome. Fully dedicated to Sports lovers.', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );
        $repeater->add_control(
            'sportsmi_cont_faq_title_3',
            [
                'label' => esc_html__('cont_card Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('FAQ Title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sportsmi_cont_faq_description_3',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Our staff are always on hand to make all members feel welcome. Fully dedicated to Sports lovers.', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );
        $repeater->add_control(
            'sportsmi_cont_faq_title_4',
            [
                'label' => esc_html__('cont_card Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('FAQ Title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sportsmi_cont_faq_description_4',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Our staff are always on hand to make all members feel welcome. Fully dedicated to Sports lovers.', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );
        $repeater->add_control(
            'sportsmi_cont_faq_title_5',
            [
                'label' => esc_html__('cont_card Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('FAQ Title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sportsmi_cont_faq_description_5',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Our staff are always on hand to make all members feel welcome. Fully dedicated to Sports lovers.', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );
        $repeater->add_control(
            'sportsmi_cont_faq_title_6',
            [
                'label' => esc_html__('cont_card Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('FAQ Title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sportsmi_cont_faq_description_6',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Our staff are always on hand to make all members feel welcome. Fully dedicated to Sports lovers.', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );


        $this->add_control(
            'faq_repeater',
            [
                'label' => esc_html__('FAQ Content', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sportsmi_cont_faq_tab' => esc_html__('Sports Academy', 'sportsmi-core'),
                    ],
                    [
                        'sportsmi_cont_faq_tab' => esc_html__('Sports Academy', 'sportsmi-core'),
                    ],
                    [
                        'sportsmi_cont_faq_tab' => esc_html__('Sports Academy', 'sportsmi-core'),
                    ],
                ],
                'title_field' => '{{{ sportsmi_cont_faq_tab }}}',
            ]
        );




        $this->end_controls_section();

        // ======================= Style =================================//



        // Facility  Icon 
        $this->start_controls_section(
            'facility_icon_style',
            [
                'label' => esc_html__('Icon', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_control(
            'facility_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-tab-btn svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .faq-tab-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'facility_icona_color',
            [
                'label'     => esc_html__('Active & Hover Icon Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-tab-btn-active svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .faq-tab-btn-active i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .faq-tab-btn:hover svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .faq-tab-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Icon Size
        $this->add_responsive_control(
            'icon_custom_dimensionsss',
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
                    '{{WRAPPER}} .faq-tab-btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .faq-tab-btn svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();




        // Facility  Title 
        $this->start_controls_section(
            'facility_title_style',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'facility_title_style_typ',
                'selector' => '{{WRAPPER}} .facility__card-content h5',

            ]
        );

        $this->add_control(
            'facility_title_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .facility__card-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'facility_title_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .facility__card-content h5 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'facility_title_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
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
                'label'      => __('Padding', 'plugin-name'),
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
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'facility_description_style_typ',
                'selector' => '{{WRAPPER}} .facility__card-content p',

            ]
        );

        $this->add_control(
            'facility_description_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .facility__card-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'facility_description_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
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
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .facility__card-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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


        <!-- ==== faq section start ==== -->
        <section class="faq section">
            <div class="container">
                <div class="row justify-content-center section__row">
                    <div class="col-lg-4 col-xl-4 section__col">
                        <div class="faq__tab-btns wow fadeInUp" data-wow-duration="0.4s">
                            <?php foreach ($settings['faq_repeater'] as $key => $item) : ?>
                                <?php if (!empty($item['sportsmi_cont_faq_tab'])) :   ?>
                                    <a href="<?php echo "#faq" . $key ?>" class="faq-tab-btn <?php echo ($key == 0) ? 'faq-tab-btn-active' : '' ?>">
                                        <?php if (!empty($item['sportsmi_cont_faq_icon'])) : ?>
                                            <?php \Elementor\Icons_Manager::render_icon($item['sportsmi_cont_faq_icon'], ['aria-hidden' => 'true']); ?>
                                        <?php endif; ?>
                                        <?php echo esc_html($item['sportsmi_cont_faq_tab']) ?>
                                    </a>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-6 section__col">
                        <div class="faq__tab">
                            <?php foreach ($settings['faq_repeater'] as $key => $item) : ?>
                                <div class="faq__tab-single" id="faq<?php echo esc_html($key) ?>">
                                    <div class="faq__tab-single__inner">
                                        <div class="accordion" id="accordionClub<?php echo esc_html($key) ?>">
                                            <div class="accordion-item">
                                                <?php if (!empty($item['sportsmi_cont_faq_title'])) :   ?>
                                                    <h5 class="accordion-header" id="heading<?php echo esc_html($key) ?>">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_html($key); ?>" aria-expanded="false" aria-controls="collapse<?php echo esc_html($key) ?>">
                                                            <?php echo esc_html($item['sportsmi_cont_faq_title']); ?>
                                                        </button>
                                                    </h5>
                                                <?php endif ?>
                                                <?php if (!empty($item['sportsmi_cont_faq_description'])) :   ?>
                                                    <div id="collapse<?php echo esc_html($key) ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo esc_html($key) ?>" data-bs-parent="#accordionClub<?php echo esc_html($key) ?>">
                                                        <div class="accordion-body">
                                                            <p><?php echo esc_html($item['sportsmi_cont_faq_description']) ?></p>
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-header" id="heading<?php echo esc_html($key . 1) ?>">
                                                    <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_html($key . 1) ?>" aria-expanded="false" aria-controls="collapse<?php echo esc_html($key . 1) ?>">
                                                        <?php if (!empty($item['sportsmi_cont_faq_title_2'])) :   ?>
                                                            <?php echo esc_html($item['sportsmi_cont_faq_title_2']) ?>
                                                        <?php endif ?>
                                                    </button>
                                                </h5>
                                                <div id="collapse<?php echo esc_html($key . 1) ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo esc_html($key . 1) ?>" data-bs-parent="#accordionClub<?php echo esc_html($key) ?>">
                                                    <div class="accordion-body">
                                                        <?php if (!empty($item['sportsmi_cont_faq_description_2'])) :   ?>
                                                            <p><?php echo esc_html($item['sportsmi_cont_faq_description_2']) ?></p>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-header" id="heading<?php echo esc_html($key . 2) ?>">
                                                    <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_html($key . 2) ?>" aria-expanded="false" aria-controls="collapse<?php echo esc_html($key . 2) ?>">
                                                        <?php if (!empty($item['sportsmi_cont_faq_title_3'])) :   ?>
                                                            <?php echo esc_html($item['sportsmi_cont_faq_title_3']) ?>
                                                        <?php endif ?>
                                                    </button>
                                                </h5>
                                                <div id="collapse<?php echo esc_html($key . 2) ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo esc_html($key . 2) ?>" data-bs-parent="#accordionClub<?php echo esc_html($key) ?>">
                                                    <div class="accordion-body">
                                                        <?php if (!empty($item['sportsmi_cont_faq_description_3'])) :   ?>
                                                            <p><?php echo esc_html($item['sportsmi_cont_faq_description_3']) ?></p>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-header" id="heading<?php echo esc_html($key . 3) ?>">
                                                    <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_html($key . 3) ?>" aria-expanded="false" aria-controls="collapse<?php echo esc_html($key . 3) ?>">
                                                        <?php if (!empty($item['sportsmi_cont_faq_title_4'])) :   ?>
                                                            <?php echo esc_html($item['sportsmi_cont_faq_title_4']) ?>
                                                        <?php endif ?>
                                                    </button>
                                                </h5>
                                                <div id="collapse<?php echo esc_html($key . 3) ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo esc_html($key . 3) ?>" data-bs-parent="#accordionClub<?php echo esc_html($key) ?>">
                                                    <div class="accordion-body">
                                                        <?php if (!empty($item['sportsmi_cont_faq_description_4'])) :   ?>
                                                            <p><?php echo esc_html($item['sportsmi_cont_faq_description_4']) ?></p>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-header" id="heading<?php echo esc_html($key . 4) ?>">
                                                    <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_html($key . 4) ?>" aria-expanded="false" aria-controls="collapse<?php echo esc_html($key . 4) ?>">
                                                        <?php if (!empty($item['sportsmi_cont_faq_title_5'])) :   ?>
                                                            <?php echo esc_html($item['sportsmi_cont_faq_title_5']) ?>
                                                        <?php endif ?>
                                                    </button>
                                                </h5>
                                                <div id="collapse<?php echo esc_html($key . 4) ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo esc_html($key . 4) ?>" data-bs-parent="#accordionClub<?php echo esc_html($key) ?>">
                                                    <div class="accordion-body">
                                                        <?php if (!empty($item['sportsmi_cont_faq_description_5'])) :   ?>
                                                            <p><?php echo esc_html($item['sportsmi_cont_faq_description_5']) ?></p>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-header" id="heading<?php echo esc_html($key . 5) ?>">
                                                    <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_html($key . 5) ?>" aria-expanded="false" aria-controls="collapse<?php echo esc_html($key . 5) ?>">
                                                        <?php if (!empty($item['sportsmi_cont_faq_title_6'])) :   ?>
                                                            <?php echo esc_html($item['sportsmi_cont_faq_title_6']) ?>
                                                        <?php endif ?>
                                                    </button>
                                                </h5>
                                                <div id="collapse<?php echo esc_html($key . 5) ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo esc_html($key . 5) ?>" data-bs-parent="#accordionClub<?php echo esc_html($key) ?>">
                                                    <div class="accordion-body">
                                                        <?php if (!empty($item['sportsmi_cont_faq_description_6'])) :   ?>
                                                            <p><?php echo esc_html($item['sportsmi_cont_faq_description_6']) ?></p>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>



<?php
    }
}

$widgets_manager->register(new TP_faq());
