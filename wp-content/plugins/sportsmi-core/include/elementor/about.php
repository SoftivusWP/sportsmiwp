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
class TP_about extends Widget_Base
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
        return 'tp-about';
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
        return __('about', 'tpcore');
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

        // about
        $this->start_controls_section(
            'sportsmi_about_section_genaral',
            [
                'label' => esc_html__('About Section', 'sportsmi-core')
            ]
        );


        $this->add_control(
            'sportsmi_about_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'sportsmi-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'sportsmi-core'),
                    'style_one_alt' => esc_html__('Style One Alt', 'sportsmi-core'),
                    'style_two' => esc_html__('Style Two', 'sportsmi-core'),
                    'style_three' => esc_html__('Style Three', 'sportsmi-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();




        // ====================================== About Content One ============================================//

        $this->start_controls_section(
            'about_content_one_left',
            [
                'label' => esc_html__('Counter', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_about_content_style_selection' => ['style_one', 'style_one_alt'],
                ]
            ]
        );


        $this->add_control(
            'sportsmi_about_one_content_image',
            [
                'label' => esc_html__('Choose Image', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'sportsmi_counter_number',
            [
                'label' => esc_html__('Counter number', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('30', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your number here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sportsmi_counter_sign',
            [
                'label' => esc_html__('Counter Sign', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your number here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_counter_text',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('experience', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sportsmi_counter_card_icon',
            [
                'label' => esc_html__('Icon', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'sportsmi-ball',
                    'library' => 'solid',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'about_content_one_right',
            [
                'label' => esc_html__('Content', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_about_content_style_selection' => ['style_one', 'style_one_alt'],
                ]
            ]
        );


        $this->add_control(
            'sportsmi_heading_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('About Us', 'sportsmi-core'),
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
                'default' => esc_html__('We offer a lot of courses of varying difficulty and beautiful scenery that Sportser of all skill levels can enjoy. You will learn Sports from professionals with our competent and experienced staff. You will have a great fun with our magnificent illuminated field.', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
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
            'card_one_repeater',
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

                ],
                'title_field' => '{{{ sportsmi_card_title_one }}}',
            ]
        );

        // Button text
        $this->add_control(
            'sportsmi_content_button_one',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your button here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        // Button URL
        $this->add_control(
            'sportsmi_content_button_url_one',
            [
                'label' => esc_html__('Button URL', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'sportsmi-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // ====================================== About Content Two ============================================//
        $this->start_controls_section(
            'about_content_two',
            [
                'label' => esc_html__('Left Content', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_about_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'sportsmi_about_two_content_image',
            [
                'label' => esc_html__('Choose Image', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'sportsmi_counter_two_number',
            [
                'label' => esc_html__('Counter number', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('30', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your number here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sportsmi_counter_two_sign',
            [
                'label' => esc_html__('Counter Sign', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your number here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_counter_two_text',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Years of experience', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
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
        $this->add_control(
            'sportsmi_popup_card_icon',
            [
                'label' => esc_html__('Icon', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-solid fa-play',
                    'library' => 'solid',
                ],
            ]
        );

        $this->end_controls_section();

        // right content
        //Heading Section
        $this->start_controls_section(
            'sportsmi_heading_two_section_genaral',
            [
                'label' => esc_html__('Right Content', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_about_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_responsive_control(
            'sportsmi_heading_content_two_align',
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
                'default'         => 'auto',
                'selectors'     => [
                    '{{WRAPPER}} .section__content' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .section__content-cta' => 'justify-content: {{VALUE}};',
                ],

            ]
        );


        $this->add_control(
            'sportsmi_heading_content_two_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('About Us', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_content_two_title',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default Title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_content_two_description',
            [
                'label' => esc_html__('Short Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('We offer a lot of courses of varying difficulty and beautiful scenery that Sportser of all skill levels can enjoy. You will learn Sports from professionals with our competent and experienced staff. You will have a great fun with our magnificent illuminated field.', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );



        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'sportsmi_card_icon',
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
            'sportsmi_card_title',
            [
                'label' => esc_html__(' Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'card_two_repeater',
            [
                'label' => esc_html__('Card', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sportsmi_card_title' => esc_html__('Default title', 'sportsmi-core'),

                    ],
                    [
                        'sportsmi_card_title' => esc_html__('Default title', 'sportsmi-core'),

                    ],
                    [
                        'sportsmi_card_title' => esc_html__('Default title', 'sportsmi-core'),

                    ],

                ],
                'title_field' => '{{{ sportsmi_card_title }}}',
            ]
        );

        // Button text
        $this->add_control(
            'sportsmi_content_two_button',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your button here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        // Button URL
        $this->add_control(
            'sportsmi_content_two_button_url',
            [
                'label' => esc_html__('Button URL', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'sportsmi-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // ====================================== About Content Three ============================================//

        $this->start_controls_section(
            'about_content_three_left',
            [
                'label' => esc_html__('Counter', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_about_content_style_selection' => 'style_three',
                ]
            ]
        );


        $this->add_control(
            'sportsmi_about_three_content_image',
            [
                'label' => esc_html__('Choose Image', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'sportsmi_counter_number_three',
            [
                'label' => esc_html__('Counter number', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('30', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your number here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sportsmi_counter_sign_three',
            [
                'label' => esc_html__('Counter Sign', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your number here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_counter_text_three',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('experience', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'about_content_three_right',
            [
                'label' => esc_html__('Content', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_about_content_style_selection' => 'style_three'
                ]
            ]
        );


        $this->add_control(
            'sportsmi_heading_content_three_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('About Us', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sportsmi_heading_content_three_title',
            [
                'label' => esc_html__('Title', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Default Title', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your title here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'sportsmi_card_tab',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('button', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your tab name here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sportsmi_card_content_tab',
            [
                'label' => esc_html__('Description', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic...', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your description here', 'sportsmi-core'),
            ]
        );


        $this->add_control(
            'card_tab_repeater',
            [
                'label' => esc_html__('Card', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sportsmi_card_tab' => esc_html__('button1', 'sportsmi-core'),

                    ],
                    [
                        'sportsmi_card_tab' => esc_html__('button2', 'sportsmi-core'),

                    ],
                    [
                        'sportsmi_card_tab' => esc_html__('button3', 'sportsmi-core'),

                    ],

                ],
                'title_field' => '{{{ sportsmi_card_tab }}}',
            ]
        );

        // Button text
        $this->add_control(
            'sportsmi_content_button_three',
            [
                'label' => esc_html__('Button', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'sportsmi-core'),
                'placeholder' => esc_html__('Type your button here', 'sportsmi-core'),
                'label_block' => true,
            ]
        );

        // Button URL
        $this->add_control(
            'sportsmi_content_button_url_three',
            [
                'label' => esc_html__('Button URL', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'sportsmi-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // ======================= Style =================================//


        // counter Icon 
        $this->start_controls_section(
            'facility_counter_icon_style',
            [
                'label' => esc_html__('Counter Icon', 'sportsmi-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'facility_counter_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_icon svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .counter_icon i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'counter_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_icon:hover svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .counter_icon:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'counter_icon_bgcolor',
            [
                'label'     => esc_html__('Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_icon' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'counter_icon_hvr_bgcolor',
            [
                'label'     => esc_html__('Hover Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_icon:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'facility_counter_bdr_color',
            [
                'label' => esc_html__('Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_icon' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'facility_bdr_counter_hvr_color',
            [
                'label' => esc_html__('Hover Border Color', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_icon:hover' => 'border:1px solid {{VALUE}}',
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
                    '{{WRAPPER}} .counter_icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .counter_icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .counter_icon' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}} !important;',


                ],
            ]
        );

        $this->add_responsive_control(
            'facility_counter_border_radius',
            [
                'label'      => __('Border Radius', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .counter_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'facility_counter_icon_style_margin',
            [
                'label' => esc_html__('Margin', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'facility_counter_icon_style_padding',
            [
                'label'      => __('Padding', 'sportsmi-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .counter_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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

        //    Description
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
                    '{{WRAPPER}} .card_icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .card_icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .card_icon' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}} !important;',


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
                    '{{WRAPPER}} .card_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                    '{{WRAPPER}} .card_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'card_des_style_color',
            [
                'label'     => esc_html__('Description Color', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondary-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'card_title_style_margin',
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
            'card_title_style_padding',
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
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_one_hvr_bgcolor',
            [
                'label'     => esc_html__('Hover Background', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button--secondary:hover' => 'background: {{VALUE}};',
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

        <!-- ==== about section one start ==== -->
        <?php if ($settings['sportsmi_about_content_style_selection'] == 'style_one') : ?>
            <!-- ==== about section start ==== -->
            <section class="section about">
                <div class="container">
                    <div class="row section__row align-items-center">
                        <div class="col-lg-6 col-xl-5 section__col order-last order-lg-first">
                            <div class="about__thumb dir-rtl wow fadeInUp" data-wow-duration="0.4s">
                                <img src="<?php echo esc_url($settings['sportsmi_about_one_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>" class="unset">
                                <div class="about__experience" >
                                    <?php if (!empty($settings['sportsmi_counter_card_icon'])) :   ?>
                                        <div class="counter_icon about__experience-thumb">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['sportsmi_counter_card_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($settings['sportsmi_counter_number'])) :   ?>
                                        <h3 class="counter-part"><span class="odometer" data-odometer-final="<?php echo esc_html($settings['sportsmi_counter_number']) ?>"></span> <span><?php echo esc_html($settings['sportsmi_counter_sign']) ?></span></h3>
                                    <?php endif ?>
                                    <?php if (!empty($settings['sportsmi_counter_text'])) :   ?>
                                        <p class="counter_text"><?php echo wp_kses($settings['sportsmi_counter_text'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6 offset-xl-1 section__col">
                            <div class="section__content">
                                <?php if (!empty($settings['sportsmi_heading_content_subtitle'])) :   ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_title'])) :   ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['sportsmi_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>

                                <div class="about__section-inner">
                                    <?php foreach ($settings['card_one_repeater'] as $item) : ?>
                                        <div class="about__section-inner__single">
                                            <?php if (!empty($item['sportsmi_card_icon_one'])) : ?>
                                                <div class="card_icon about__section-inner__single-thumb icon_thumb">
                                                    <?php \Elementor\Icons_Manager::render_icon($item['sportsmi_card_icon_one'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                            <?php endif ?>

                                            <?php if (!empty($item['sportsmi_card_title_one'])) :   ?>
                                                <div class="about__section-inner__single-content">
                                                    <h5 class="cart_title"><?php echo esc_html($item['sportsmi_card_title_one']) ?></h5>
                                                    <p class="secondary-text"><?php echo esc_html($item['sportsmi_card_content_one']) ?></p>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php if (!empty($settings['sportsmi_content_button_one'])) : ?>
                                    <div class="section__content-cta">
                                        <a href="<?php echo esc_html($settings['sportsmi_content_button_url_one']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_content_button_one']) ?></a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== about section one start ==== -->


        <!-- ==== about section one alt start ==== -->
        <?php if ($settings['sportsmi_about_content_style_selection'] == 'style_one_alt') : ?>
            <!-- ==== about section start ==== -->
            <section class="section about about--alt">
                <div class="container">
                    <div class="row section__row align-items-center">
                        <div class="col-lg-6 col-xl-6 section__col">
                            <div class="section__content">
                                <?php if (!empty($settings['sportsmi_heading_content_subtitle'])) :   ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_title'])) :   ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['sportsmi_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>

                                <div class="about__section-inner">
                                    <?php foreach ($settings['card_one_repeater'] as $item) : ?>
                                        <div class="about__section-inner__single">
                                            <?php if (!empty($item['sportsmi_card_icon_one'])) : ?>
                                                <div class="card_icon about__section-inner__single-thumb">
                                                    <?php \Elementor\Icons_Manager::render_icon($item['sportsmi_card_icon_one'], ['aria-hidden' => 'true']); ?>
                                                </div>
                                            <?php endif ?>

                                            <?php if (!empty($item['sportsmi_card_title_one'])) :   ?>
                                                <div class="about__section-inner__single-content">
                                                    <h5 class="cart_title"><?php echo esc_html($item['sportsmi_card_title_one']) ?></h5>
                                                    <p class="secondary-text"><?php echo esc_html($item['sportsmi_card_content_one']) ?></p>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php if (!empty($settings['sportsmi_content_button_one'])) : ?>
                                    <div class="section__content-cta">
                                        <a href="<?php echo esc_html($settings['sportsmi_content_button_url_one']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_content_button_one']) ?></a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-5 offset-xl-1 section__col">
                            <div class="about__thumb wow fadeInUp" data-wow-duration="0.4s">
                                <img src="<?php echo esc_url($settings['sportsmi_about_one_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>" class="unset">
                                <div class="about__experience">
                                    <?php if (!empty($settings['sportsmi_counter_card_icon'])) :   ?>
                                        <div class="counter_icon about__experience-thumb">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['sportsmi_counter_card_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($settings['sportsmi_counter_number'])) :   ?>
                                        <h3 class="counter-part"><span class="odometer" data-odometer-final="<?php echo esc_html($settings['sportsmi_counter_number']) ?>"></span> <span><?php echo esc_html($settings['sportsmi_counter_sign']) ?></span></h3>
                                    <?php endif ?>
                                    <?php if (!empty($settings['sportsmi_counter_text'])) :   ?>
                                        <p class="counter_text"><?php echo wp_kses($settings['sportsmi_counter_text'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== about section one alt start ==== -->

        <!-- ==== about section two start ==== -->
        <?php if ($settings['sportsmi_about_content_style_selection'] == 'style_two') : ?>
            <section class="section about--secondary wow fadeInUp" data-wow-duration="0.4s">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-xxl-5 d-none d-lg-block">
                            <div class="about--secondary__thumb dir-rtl">
                                <?php if (!empty($settings['sportsmi_about_two_content_image']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['sportsmi_about_two_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>" class="unset">
                                <?php endif ?>
                                <div class="about--secondary__thumb-experience">
                                    <?php if (!empty($settings['sportsmi_counter_two_number'])) :   ?>
                                        <h3 class="counter-part"><span class="odometer" data-odometer-final="<?php echo esc_html($settings['sportsmi_counter_two_number']) ?>"></span> <span><?php echo esc_html($settings['sportsmi_counter_two_sign']) ?></span></h3>
                                    <?php endif ?>
                                    <?php if (!empty($settings['sportsmi_counter_two_text'])) :   ?>
                                        <p class="counter_text"><?php echo wp_kses($settings['sportsmi_counter_two_text'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                </div>
                                <div class="about--secondary__modal">
                                    <?php if (!empty($settings['sportsmi_popup_content_image']['url'])) :   ?>
                                        <img src="<?php echo esc_url($settings['sportsmi_popup_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    <?php endif ?>
                                    <div class="play-wrapper">
                                        <?php if (!empty($settings['sportsmi_popup_card_icon'])) :   ?>
                                            <a href="<?php echo esc_url($settings['sportsmi_popup_link']['url']) ?>" class="play-btn" target="<?php echo esc_attr('_blank') ?>" title="<?php echo esc_attr('Youtube Video Player') ?>">
                                                <?php \Elementor\Icons_Manager::render_icon($settings['sportsmi_popup_card_icon'], ['aria-hidden' => 'true']); ?>
                                            </a>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xxl-6 offset-xxl-1">
                            <div class="section__content">
                                <?php if (!empty($settings['sportsmi_heading_content_two_subtitle'])) :   ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_content_two_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_two_title'])) :   ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_content_two_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_two_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['sportsmi_heading_content_two_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>

                                <div class="row">
                                    <div class="col-sm-12 col-md-11 col-lg-12">
                                        <div class="about--secondary__single">
                                            <div class="row section__row">
                                                <?php foreach ($settings['card_two_repeater'] as $item) : ?>
                                                    <div class="col-6 col-sm-4 section__col">
                                                        <div class="about--secondary__single-item">
                                                            <?php if (!empty($item['sportsmi_card_icon'])) : ?>
                                                                <div class="card_icon about--secondary__single-item__icon icon_thumb">
                                                                    <?php \Elementor\Icons_Manager::render_icon($item['sportsmi_card_icon'], ['aria-hidden' => 'true']); ?>
                                                                </div>
                                                            <?php endif ?>
                                                            <?php if (!empty($item['sportsmi_card_title'])) :   ?>
                                                                <h6 class="cart_title"><?php echo esc_html($item['sportsmi_card_title']) ?></h6>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($settings['sportsmi_content_two_button'])) : ?>
                                    <div class="section__content-cta">
                                        <a href="<?php echo esc_html($settings['sportsmi_content_two_button_url']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_content_two_button']) ?></a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== about section two End ==== -->


        <!-- ==== about section three start ==== -->
        <?php if ($settings['sportsmi_about_content_style_selection'] == 'style_three') : ?>
            <section class="section about--tertiary">
                <div class="container">
                    <div class="row section__row align-items-center">
                        <div class="col-lg-6 col-xl-6 col-xxl-5 section__col">
                            <div class="about--tertiary__thumb wow fadeInUp" data-wow-duration="0.4s">
                                <?php if (!empty($settings['sportsmi_about_three_content_image']['url'])) :   ?>
                                    <img src="<?php echo esc_url($settings['sportsmi_about_three_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                <?php endif ?>
                                <div class="about--tertiary__thumb-experience">
                                    <?php if (!empty($settings['sportsmi_counter_number_three'])) :   ?>
                                        <h3 class="counter-part"><span class="odometer" data-odometer-final="<?php echo esc_html($settings['sportsmi_counter_number_three']) ?>"></span> <span><?php echo esc_html($settings['sportsmi_counter_sign_three']) ?></span></h3>
                                    <?php endif ?>
                                    <?php if (!empty($settings['sportsmi_counter_text_three'])) :   ?>
                                        <p class="counter_text"><?php echo wp_kses($settings['sportsmi_counter_text_three'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6 col-xxl-6 offset-xxl-1 section__col">
                            <div class="section__content">
                                <?php if (!empty($settings['sportsmi_heading_content_three_subtitle'])) :   ?>
                                    <h5 class="sub-title"><?php echo wp_kses($settings['sportsmi_heading_content_three_subtitle'], wp_kses_allowed_html('post'))  ?></h5>
                                <?php endif ?>
                                <?php if (!empty($settings['sportsmi_heading_content_three_title'])) :   ?>
                                    <h2 class="title"><?php echo wp_kses($settings['sportsmi_heading_content_three_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <div class="about--secondary__tabs">
                                    <div class="about--secondary__tabs-btn-wrapper">
                                        <?php foreach ($settings['card_tab_repeater'] as $key => $item) : ?>
                                            <?php if (!empty($item['sportsmi_card_tab'])) :   ?>
                                                <a href="<?php echo "#" . $key ?>" class="about--secondary__tabs-btn <?php echo ($key == 0) ? 'about--secondary__tabs-btn-active' : '' ?>"><?php echo esc_html($item['sportsmi_card_tab']) ?></a>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <hr>
                                    <div class="about--secondary__tabs-content-wrapper">
                                        <?php foreach ($settings['card_tab_repeater'] as $key => $item) : ?>
                                            <div class="about--secondary__tabs-content" id="<?php echo $key ?>">
                                                <?php if (!empty($item['sportsmi_card_content_tab'])) :   ?>
                                                    <p class="tab_content"><?php echo esc_html($item['sportsmi_card_content_tab']) ?></p>
                                                <?php endif ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php if (!empty($settings['sportsmi_content_button_three'])) : ?>
                                    <div class="section__content-cta">
                                        <a href="<?php echo esc_html($settings['sportsmi_content_button_url_three']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_content_button_three']) ?></a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== about section three start ==== -->
<?php
    }
}

$widgets_manager->register(new TP_about());
