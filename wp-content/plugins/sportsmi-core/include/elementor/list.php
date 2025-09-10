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
class TP_List extends Widget_Base
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
        return 'tp-list';
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
        return __('List', 'tpcore');
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



        // ======================Content================================//

        $this->start_controls_section(
            'aikeu_section_genaral',
            [
                'label' => esc_html__('List Style', 'aikeu-core')
            ]
        );

        $this->add_control(
            'aikeu_content_style',
            [
                'label'   => esc_html__('Content Style', 'aikeu-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('ul', 'aikeu-core'),
                    'style_two' => esc_html__('ol', 'aikeu-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'list_heading',
            [
                'label' => esc_html__('List Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('list title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title',
            [
                'label' => esc_html__('List Title', 'finview-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Default title', 'finview-core'),
                'placeholder' => esc_html__('Type your title here', 'finview-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list_repeater',
            [
                'label' => esc_html__('Counter Card', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('List Item #1', 'aikeu-core'),
                    ],
                    [
                        'list_title' => esc_html__('List Item #2', 'aikeu-core'),
                    ],
                    [
                        'list_title' => esc_html__('List Item #3', 'aikeu-core'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',

            ]
        );

        $this->end_controls_section();




        // =======================Style=================================//
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
                'selector' => '{{WRAPPER}} .cus_title',

            ]
        );

        $this->add_control(
            'title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_title' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .cus_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .cus_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'list_title_style',
            [
                'label' => esc_html__('List Content', 'finview-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'finview-core'),
                'name'     => 'list_title_typ',
                'selector' => '{{WRAPPER}} .cus_content',

            ]
        );

        $this->add_control(
            'list_title_color',
            [
                'label'     => esc_html__('Color', 'finview-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_content' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'space_between_widgets',
            [
                'label'     => esc_html__('Gap', 'aikeu-core'),
                'type'      => Controls_Manager::GAPS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw'],
                'selectors'  => [
                    '{{WRAPPER}} ul,ol' => 'gap: {{ROW}}{{UNIT}} {{COLUMN}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_title_margin',
            [
                'label' => esc_html__('Margin', 'finview-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_title_padding',
            [
                'label'      => __('Padding', 'finview-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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


        <style>
            .list_area {
                list-style-position: inside;
            }

            .list_area ul,
            .list_area ol {
                display: flex;
                flex-direction: column;
                padding-left: 10px;
            }
        </style>
        <div class="list_area">
            <?php if (!empty($settings['list_heading'])) :   ?>
                <p class="cus_title"><?php echo wp_kses($settings['list_heading'], wp_kses_allowed_html('post'))  ?></p>
            <?php endif ?>
            <?php if ($settings['aikeu_content_style'] == 'style_one') : ?>
                <ul>
                    <?php foreach ($settings['list_repeater'] as $item) : ?>
                        <li class="cus_content">
                            <?php echo wp_kses($item['list_title'], wp_kses_allowed_html('post'))  ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php endif; ?>
            <?php if ($settings['aikeu_content_style'] == 'style_two') : ?>
                <ol>
                    <?php foreach ($settings['list_repeater'] as $item) : ?>
                        <li class="cus_content">
                            <?php echo wp_kses($item['list_title'], wp_kses_allowed_html('post'))  ?>
                        </li>
                    <?php endforeach ?>
                </ol>
            <?php endif; ?>
        </div>


<?php
    }
}

$widgets_manager->register(new TP_List());
