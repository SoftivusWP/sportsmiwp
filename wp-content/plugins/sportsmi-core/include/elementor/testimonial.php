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
class TP_testimonial extends Widget_Base
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
        return 'tp-testimonial';
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
        return __('testimonial', 'tpcore');
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

        // testimonial
        $this->start_controls_section(
            'sportsmi_testimonial_section_genaral',
            [
                'label' => esc_html__('Testimonial Section', 'sportsmi-core')
            ]
        );


        $this->add_control(
            'sportsmi_testimonial_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'sportsmi-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'sportsmi-core'),
                    'style_two' => esc_html__('Style Two', 'sportsmi-core'),
                    'style_three' => esc_html__('Style Three', 'sportsmi-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();


        // ======================================Content One============================================//
        $this->start_controls_section(
            'testimonial_content_one',
            [
                'label' => esc_html__('Testimonial One', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_testimonial_content_style_selection' => 'style_one'
                ]
            ]
        );



        $this->add_responsive_control(
            'sportsmi_heading_content_align_one',
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
                ],

            ]
        );



        $this->add_responsive_control(
            'sportsmi_card_content_align_one',
            [
                'label'         => esc_html__('Slider Text Align', 'sportsmi-core'),
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
                    '{{WRAPPER}} .testimonial__slider-card' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .testimonial__slider-card__author' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .testimonial__slider-card__body-review' => 'justify-content: {{VALUE}};',
                ],
            ],
        );

        $this->add_control(
            'sportsmi_heading_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default Subtitle', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_content_title',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default Title', 'sportsmi-core'),
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



        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testi_rating',
            [
                'label' => esc_html__('Rating', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 5,
            ]
        );

        $repeater->add_control(
            'testi_description',
            [
                'label' => esc_html__('Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );

        $repeater->add_control(
            'testimonial_image',
            [
                'label' => esc_html__('Choose Image', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'testi_name',
            [
                'label' => esc_html__('Name', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Author Name', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your name here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'testi_designation',
            [
                'label' => esc_html__('Designation', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Designation', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your designation here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'testimonial_repeater',
            [
                'label' => esc_html__('Testimonial List', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'testi_description' => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in', 'sportsmi-core'),

                    ],

                ],
                'title_field' => '{{{ testi_description }}}',

            ]
        );


        $this->end_controls_section();

        // ====================================== Content Two ============================================//
        $this->start_controls_section(
            'testimonial_content_two',
            [
                'label' => esc_html__('Testimonial Two', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_testimonial_content_style_selection' => 'style_two'
                ]
            ]
        );



        $this->add_responsive_control(
            'sportsmi_heading_content_align_two',
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
                    '{{WRAPPER}} .section__content' => 'text-align: {{VALUE}};',
                ],

            ]
        );


        $this->add_responsive_control(
            'sportsmi_card_content_align_two',
            [
                'label'         => esc_html__('Slider Text Align', 'sportsmi-core'),
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
                    '{{WRAPPER}} .testimonial__slider-card' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .testimonial__slider-card__author' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .testimonial__slider-card__body-review' => 'justify-content: {{VALUE}};',
                ],
            ],
        );


        $this->add_control(
            'sportsmi_heading_two_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default Subtitle', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_two_content_title',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default Title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_two_content_description',
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
                'default' => esc_html__('Join Our Club', 'sportsmi-core'),
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

        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testi_icon',
            [
                'label' => esc_html__('Icon', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'sportsmi-quote',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'testi_rating',
            [
                'label' => esc_html__('Rating', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 5,
            ]
        );

        $repeater->add_control(
            'testi_description',
            [
                'label' => esc_html__('Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );

        $repeater->add_control(
            'testimonial_image',
            [
                'label' => esc_html__('Choose Image', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'testi_name',
            [
                'label' => esc_html__('Name', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your name here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'testi_designation',
            [
                'label' => esc_html__('Designation', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your designation here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'testimonial_repeater_two',
            [
                'label' => esc_html__('Testimonial List', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'testi_description' => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in', 'sportsmi-core'),

                    ],

                ],
                'title_field' => '{{{ testi_description }}}',

            ]
        );


        $this->end_controls_section();

        // ====================================== Content Three ============================================//
        $this->start_controls_section(
            'testimonial_content_three',
            [
                'label' => esc_html__('Testimonial Three', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_testimonial_content_style_selection' => 'style_three'
                ]
            ]
        );



        $this->add_responsive_control(
            'sportsmi_heading_content_align_three',
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
                ],

            ],

        );

        $this->add_responsive_control(
            'sportsmi_card_content_align_three',
            [
                'label'         => esc_html__('Slider Text Align', 'sportsmi-core'),
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
                    '{{WRAPPER}} .testimonial__slider-card' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .testimonial__slider-card__author' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .testimonial__slider-card__body-review' => 'justify-content: {{VALUE}};',
                ],
            ],
        );

        $this->add_control(
            'sportsmi_heading_three_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default Subtitle', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_three_content_title',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default Title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_three_content_description',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas doloribus provident assumenda quidem. Minus quia doloribus, eveniet nam esse molestiae iste dolores numquam.', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'testi_icon',
            [
                'label' => esc_html__('Icon', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'sportsmi-quote',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'testi_rating',
            [
                'label' => esc_html__('Rating', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 5,
            ]
        );

        $repeater->add_control(
            'testi_description',
            [
                'label' => esc_html__('Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which do not look even...', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );

        $repeater->add_control(
            'testimonial_image',
            [
                'label' => esc_html__('Choose Image', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'testi_name',
            [
                'label' => esc_html__('Name', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your name here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'testi_designation',
            [
                'label' => esc_html__('Designation', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your designation here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'testimonial_repeater_three',
            [
                'label' => esc_html__('Testimonial List', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'testi_description' => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which do not look even...', 'sportsmi-core'),

                    ],

                ],
                'title_field' => '{{{ testi_description }}}',

            ]
        );


        $this->end_controls_section();


        // ======================= Heading Style =================================//

        // background 
        $this->start_controls_section(
            'bg_style',
            [
                'label' => esc_html__('Background Color', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_bg_style_color',
            [
                'label'     => esc_html__('Slider Box Bg', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial__slider-card' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_style_one_color',
            [
                'label'     => esc_html__('Style One Bg', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial::before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_style_two_color',
            [
                'label'     => esc_html__('Style Two Bg', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial--secondary' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_style_three_color',
            [
                'label'     => esc_html__('Style Three Bg', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial--tertiary' => 'background: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_section();

        // Subtitle 
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
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
                'label' => esc_html__('Title', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'title_style_typ',
                'selector' => '{{WRAPPER}} .title',

            ]
        );

        $this->add_control(
            'title_style_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
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
                'label'      => __('Padding', 'sportsmi-core'),
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
                'label' => esc_html__('Description', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
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
            'button_one_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_one_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_one_bgcolor',
            [
                'label'     => esc_html__('Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .cmn-button:after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_one_hvr_bgcolor',
            [
                'label'     => esc_html__('Hover Background', 'sportsmi-core'),
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


        //    slider style


        // card Icon 
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
                    '{{WRAPPER}} .quotation svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .quotation i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quotation:hover svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .quotation:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Icon Size
        $this->add_responsive_control(
            'icon_custom_dimensionsss',
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
                    '{{WRAPPER}} .quotation i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .quotation svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'facility_icon_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quotation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .quotation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // Star Icon 
        $this->start_controls_section(
            'facility_icon_star_style',
            [
                'label' => esc_html__('Star Icon', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'facility_icon_star_color',
            [
                'label'     => esc_html__('Icon Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial__slider-card__body-review svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .testimonial__slider-card__body-review i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'star_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial__slider-card__body-review:hover svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .testimonial__slider-card__body-review:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Icon Size
        $this->add_responsive_control(
            'star_icon_custom_dimensionsss',
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
                    '{{WRAPPER}} .testimonial__slider-card__body-review i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial__slider-card__body-review svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'facility_icon_star_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial__slider-card__body-review' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'facility_icon_star_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial__slider-card__body-review' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'slider_description_style',
            [
                'label' => esc_html__('Slider Description', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'slider_description_style_typ',
                'selector' => '{{WRAPPER}} .testimonial__slider-card__body p',

            ]
        );

        $this->add_control(
            'slider_description_style_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial__slider-card__body p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_description_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial__slider-card__body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'slider_description_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial__slider-card__body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'slider_author_style',
            [
                'label' => esc_html__('Slider author', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'slider_author_style_typ',
                'selector' => '{{WRAPPER}} .testimonial__slider-card__author-info h6',

            ]
        );

        $this->add_control(
            'slider_author_style_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial__slider-card__author-info h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_author_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial__slider-card__author-info h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'slider_author_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial__slider-card__author-info h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'slider_deg_style',
            [
                'label' => esc_html__('Slider Deg', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'sportsmi-core'),
                'name'     => 'slider_deg_style_typ',
                'selector' => '{{WRAPPER}} .testimonial__slider-card__author-info p',

            ]
        );

        $this->add_control(
            'slider_deg_style_color',
            [
                'label'     => esc_html__('Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial__slider-card__author-info p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_deg_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial__slider-card__author-info p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'slider_deg_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial__slider-card__author-info p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                // testimonial primary slider
                jQuery(".testimonial__slider")
                    .not(".slick-initialized")
                    .slick({
                        infinite: true,
                        autoplay: true,
                        focusOnSelect: true,
                        slidesToShow: 3,
                        speed: 900,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: false,
                        prevArrow: jQuery(".prev-testimonial"),
                        nextArrow: jQuery(".next-testimonial"),
                        centerMode: true,
                        centerPadding: "0px",
                        responsive: [{
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


                // testimonial secondary slider
                jQuery(".testimonial__slider--secondary")
                    .not(".slick-initialized")
                    .slick({
                        infinite: true,
                        autoplay: true,
                        focusOnSelect: true,
                        slidesToShow: 1,
                        speed: 900,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: false,
                        prevArrow: jQuery(".prev-testimonial--secondary"),
                        nextArrow: jQuery(".next-testimonial--secondary"),
                        centerMode: true,
                        centerPadding: "0px",
                        responsive: [{
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


                // testimonial tertiary slider
                jQuery(".testimonial__slider--tertiary")
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
                        prevArrow: jQuery(".prev-testimonial--tertiary"),
                        nextArrow: jQuery(".next-testimonial--tertiary"),
                        centerMode: true,
                        centerPadding: "0px",
                        responsive: [{
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                            },
                        }, ],
                    });
            });
        </script>



        <!-- ==== testimonial section primary start ==== -->
        <?php if ($settings['sportsmi_testimonial_content_style_selection'] == 'style_one') : ?>
            <section class="section testimonial wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
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
                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-12">
                            <div class="testimonial__slider">
                                <?php foreach ($settings['testimonial_repeater'] as $item) : ?>
                                    <div class="testimonial__slider-card">
                                        <div class="testimonial__slider-card__body">
                                            <?php if (!empty($item['testi_rating'])) :   ?>
                                                <div class="testimonial__slider-card__body-review">
                                                    <?php for ($i = 0; $i < $item['testi_rating']; $i++) : ?>
                                                        <i class="fa-solid fa-star"></i>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php endif ?>
                                            <?php if (!empty($item['testi_description'])) :   ?>
                                                <p><?php echo esc_html($item['testi_description']) ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="testimonial__slider-card__author">
                                            <?php if (!empty($item['testimonial_image']['url'])) :   ?>
                                                <div class="testimonial__slider-card__author-thumb">
                                                    <img src="<?php echo esc_url($item['testimonial_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                                </div>
                                            <?php endif ?>
                                            <div class="testimonial__slider-card__author-info">
                                                <?php if (!empty($item['testi_name'])) :   ?>
                                                    <h6><?php echo esc_html($item['testi_name']) ?></h6>
                                                <?php endif ?>
                                                <?php if (!empty($item['testi_designation'])) :   ?>
                                                    <p class="secondary-text"><?php echo esc_html($item['testi_designation']) ?></p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-navigation">
                                <button class="next-testimonial cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                                <button class="prev-testimonial cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== / testimonial section primary end ==== -->


        <!-- ==== testimonial section secondary start ==== -->
        <?php if ($settings['sportsmi_testimonial_content_style_selection'] == 'style_two') : ?>
            <section class="section testimonial testimonial--secondary wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row align-items-center section__row">
                        <div class="col-lg-6 col-xxl-6 section__col">
                            <div class="section__content">
                                <?php if (!empty($settings['sportsmi_heading_two_content_subtitle'])) :   ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_two_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_two_content_title'])) :   ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_two_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_two_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['sportsmi_heading_two_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_content_button'])) : ?>
                                    <div class="section__content-cta">
                                        <a href="<?php echo esc_html($settings['sportsmi_content_button_url']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_content_button']) ?></a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xxl-5 offset-xxl-1 section__col">
                            <div class="testimonial__slider--secondary">
                                <?php foreach ($settings['testimonial_repeater_two'] as $item) : ?>
                                    <div class="testimonial__slider-card">
                                        <div class="testimonial__slider-card__body">
                                            <?php if (!empty($item['testi_icon'])) : ?>
                                                <div class="quotation">
                                                    <?php \Elementor\Icons_Manager::render_icon($item['testi_icon'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                            <?php endif ?>
                                            <?php if (!empty($item['testi_rating'])) :   ?>
                                                <div class="testimonial__slider-card__body-review">
                                                    <?php for ($i = 0; $i < $item['testi_rating']; $i++) : ?>
                                                        <i class="fa-solid fa-star"></i>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php endif ?>
                                            <?php if (!empty($item['testi_description'])) :   ?>
                                                <p><?php echo esc_html($item['testi_description']) ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="testimonial__slider-card__author">
                                            <?php if (!empty($item['testimonial_image']['url'])) :   ?>
                                                <div class="testimonial__slider-card__author-thumb">
                                                    <img src="<?php echo esc_url($item['testimonial_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                                </div>
                                            <?php endif ?>
                                            <div class="testimonial__slider-card__author-info">
                                                <?php if (!empty($item['testi_name'])) :   ?>
                                                    <h6><?php echo esc_html($item['testi_name']) ?></h6>
                                                <?php endif ?>
                                                <?php if (!empty($item['testi_designation'])) :   ?>
                                                    <p class="secondary-text"><?php echo esc_html($item['testi_designation']) ?></p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="slider-navigation justify-content-lg-end">
                                <button class="next-testimonial--secondary cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                                <button class="prev-testimonial--secondary cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== testimonial section secondary end ==== -->


        <!-- ==== testimonial section tertiary start ==== -->
        <?php if ($settings['sportsmi_testimonial_content_style_selection'] == 'style_three') : ?>
            <section class="section testimonial testimonial--secondary testimonial--tertiary wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section__header">
                                <?php if (!empty($settings['sportsmi_heading_three_content_subtitle'])) :   ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_three_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_three_content_title'])) :   ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_three_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_three_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['sportsmi_heading_three_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonial__slider--tertiary">
                                <?php foreach ($settings['testimonial_repeater_three'] as $item) : ?>
                                    <div class="testimonial__slider-card">
                                        <div class="testimonial__slider-card__body">
                                            <?php if (!empty($item['testi_icon'])) : ?>
                                                <div class="quotation">
                                                    <?php \Elementor\Icons_Manager::render_icon($item['testi_icon'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                            <?php endif ?>
                                            <?php if (!empty($item['testi_rating'])) :   ?>
                                                <div class="testimonial__slider-card__body-review">
                                                    <?php for ($i = 0; $i < $item['testi_rating']; $i++) : ?>
                                                        <i class="fa-solid fa-star"></i>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php endif ?>
                                            <?php if (!empty($item['testi_description'])) :   ?>
                                                <p><?php echo esc_html($item['testi_description']) ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="testimonial__slider-card__author">
                                            <?php if (!empty($item['testimonial_image']['url'])) :   ?>
                                                <div class="testimonial__slider-card__author-thumb">
                                                    <img src="<?php echo esc_url($item['testimonial_image']['url']) ?>" alt="<?php echo esc_attr('image') ?>">
                                                </div>
                                            <?php endif ?>
                                            <div class="testimonial__slider-card__author-info">
                                                <?php if (!empty($item['testi_name'])) :   ?>
                                                    <h6><?php echo esc_html($item['testi_name']) ?></h6>
                                                <?php endif ?>
                                                <?php if (!empty($item['testi_designation'])) :   ?>
                                                    <p class="secondary-text"><?php echo esc_html($item['testi_designation']) ?></p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-navigation justify-content-center">
                                <button class="next-testimonial--tertiary cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                                <button class="prev-testimonial--tertiary cmn-button cmn-button--secondary">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== / testimonial section three end ==== -->

<?php
    }
}

$widgets_manager->register(new TP_testimonial());
