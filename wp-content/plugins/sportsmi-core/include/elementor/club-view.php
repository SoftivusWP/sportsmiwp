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
class TP_club_view extends Widget_Base
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
        return 'tp-club-view';
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
        return __('Club View', 'tpcore');
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

        // club
        $this->start_controls_section(
            'sportsmi_club_section_genaral',
            [
                'label' => esc_html__('Club View Section', 'sportsmi-core')
            ]
        );


        $this->add_control(
            'sportsmi_club_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'sportsmi-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'sportsmi-core'),
                    'style_one_alt' => esc_html__('Style One Alt', 'sportsmi-core'),
                    'style_two' => esc_html__('Style Two', 'sportsmi-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();

      


        // ====================================== club Content One ============================================//

        $this->start_controls_section(
            'club_counter_one',
            [
                'label' => esc_html__('Counter', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_club_content_style_selection' => ['style_one','style_one_alt'],
                ]
            ]
        );
        

        $this->add_control(
            'sportsmi_club_one_content_image',
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
                'label' => esc_html__('Counter Number', 'sportsmi-core'),
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

        $this->end_controls_section();


        $this->start_controls_section(
            'club_content_one',
            [
                'label' => esc_html__('Content', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_club_content_style_selection' => ['style_one','style_one_alt'],
                ]
            ]
        );
        
        $this->add_control(
            'sportsmi_heading_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Club View', 'sportsmi-core'),
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
        

        // list content
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'sportsmi_list_content',
            [
                'label' => esc_html__('list content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Lorem Ipsum is simply.', 'plugin-name'),
                'placeholder' => esc_html__('Type your list content here', 'plugin-name'),
            ]
        );

        $this->add_control(
            'list_content_repeater',
            [
                'label' => esc_html__('pricing Card List', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sportsmi_list_content' => esc_html__( 'Type your list content', 'plugin-name' ),
                       
                    ],
                    [
                        'sportsmi_list_content' => esc_html__( 'Type your list content', 'plugin-name' ),
                       
                    ],
                    [
                        'sportsmi_list_content' => esc_html__( 'Type your list content ', 'plugin-name' ),
                       
                    ],
                    [
                        'sportsmi_list_content' => esc_html__( 'Type your list content ', 'plugin-name' ),
                       
                    ],
                    
                ],
                'title_field' => '{{{ sportsmi_list_content }}}',
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


        // ====================================== club Content Two ============================================//
        
        // content
        $this->start_controls_section(
            'club_content_two',
            [
                'label' => esc_html__('Content', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_club_content_style_selection' => 'style_two',
                ]
            ]
        );
        
        $this->add_control(
            'sportsmi_heading_two_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'sportsmi-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Club View', 'sportsmi-core'),
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
        

        // list content
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'sportsmi_list_two_content',
            [
                'label' => esc_html__('list content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Lorem Ipsum is simply.', 'plugin-name'),
                'placeholder' => esc_html__('Type your list content here', 'plugin-name'),
            ]
        );

        $this->add_control(
            'list_two_content_repeater',
            [
                'label' => esc_html__('pricing Card List', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sportsmi_list_two_content' => esc_html__( 'Type your list content', 'plugin-name' ),
                       
                    ],
                    [
                        'sportsmi_list_two_content' => esc_html__( 'Type your list content', 'plugin-name' ),
                       
                    ],
                    [
                        'sportsmi_list_two_content' => esc_html__( 'Type your list content ', 'plugin-name' ),
                       
                    ],
                    [
                        'sportsmi_list_two_content' => esc_html__( 'Type your list content ', 'plugin-name' ),
                       
                    ],
                    
                ],
                'title_field' => '{{{ sportsmi_list_two_content }}}',
            ]
        );

         // Button text
         $this->add_control(
            'sportsmi_content_button_two',
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
            'sportsmi_content_button_url_two',
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
        
        $this->start_controls_section( 
            'club_popup_content_two',
            [
                'label' => esc_html__('Popup Content', 'sportsmi-core'),
                'condition' => [
                    'sportsmi_club_content_style_selection' => 'style_two'
                ]
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
                'label' => esc_html__( 'Icon', 'sportsmi-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-solid fa-play',
                    'library' => 'solid',
                ],
            ]
        );
        $this->end_controls_section();

        
        // ======================= Style =================================//

        
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
                'label'     => esc_html__('Club Bg', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .club' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_bg_two_style_color',
            [
                'label'     => esc_html__('Club-2 Bg', 'sportsmi-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .club-view' => 'background: {{VALUE}};',
                ],
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
                'label' => esc_html__( 'Margin', 'sportsmi-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
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
                'label' => esc_html__( 'Margin', 'sportsmi-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
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
                'label' => esc_html__( 'Margin', 'sportsmi-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
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
                'label' => esc_html__( 'Margin', 'sportsmi-core' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
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

 
        // ======================= List Style =================================//
        
        // list content 
        $this->start_controls_section(
            'pricing_list_style',
            [
            'label' => esc_html__('List Content', 'plugin-name'),
            'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'pricing_list_style_typ',
                'selector' => '{{WRAPPER}} .section__content-inner li',

            ]
        );

        $this->add_control(
            'pricing_list_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section__content-inner li' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section__content-inner li i' => 'color: {{VALUE}};',
                ],
            ]
        );
    
        $this->add_responsive_control(
            'pricing_list_style_margin',
            [
                'label' => esc_html__( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .section__content-inner li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_list_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .section__content-inner li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
            'label' => esc_html__( 'Margin', 'sportsmi-core' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
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

    <!-- ==== club section start ==== -->
    <?php if ($settings['sportsmi_club_content_style_selection'] == 'style_one') : ?>
        <section class="section club">
            <div class="container">
                <div class="row section__row">
                    <div class="col-lg-6 section__col">
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
                            <?php if (!empty($settings['list_content_repeater'])) : ?>
                                <div class="section__content-inner">
                                    <ul>
                                        <?php foreach ($settings['list_content_repeater'] as $item) : ?>
                                            <li>
                                                <i class="fa-solid fa-check"></i>
                                                <?php echo !empty($item['sportsmi_list_content']) ? esc_html($item['sportsmi_list_content']) : ''; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif ?>
                            <?php if(!empty($settings['sportsmi_content_button_one'])) : ?>
                                <div class="section__content-cta">  
                                    <a href="<?php echo esc_html($settings['sportsmi_content_button_url_one']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_content_button_one']) ?></a>
                                </div>          
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5 offset-xl-1 section__col d-none d-lg-block">
                        <div class="club__thumb wow fadeInUp" data-wow-duration="0.4s">
                            <?php if (!empty($settings['sportsmi_club_one_content_image']['url'])) :   ?>
                                <img src="<?php echo esc_url($settings['sportsmi_club_one_content_image']['url']) ?>"  alt="<?php echo esc_attr('Image') ?>" class="unset">
                            <?php endif ?>   
                            <div class="club__thumb-experience">
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
    <!-- ==== / club section end ==== -->

    
    <!-- ==== club section one alt start ==== -->
    <?php if ($settings['sportsmi_club_content_style_selection'] == 'style_one_alt') : ?>
        <section class="section club club--alt">
            <div class="container">
                <div class="row section__row">
                    <div class="col-lg-6 col-xl-5 section__col order-2 order-lg-0">
                        <div class="club__thumb d-flex justify-content-end wow fadeInUp" data-wow-duration="0.4s">
                            <?php if (!empty($settings['sportsmi_club_one_content_image']['url'])) :   ?>
                                <img src="<?php echo esc_url($settings['sportsmi_club_one_content_image']['url']) ?>"  alt="<?php echo esc_attr('Image') ?>" class="unset">
                            <?php endif ?>   
                            <div class="club__thumb-experience">
                                <?php if (!empty($settings['sportsmi_counter_number'])) :   ?>
                                    <h3 class="counter-part"><span class="odometer" data-odometer-final="<?php echo esc_html($settings['sportsmi_counter_number']) ?>"></span> <span><?php echo esc_html($settings['sportsmi_counter_sign']) ?></span></h3>
                                <?php endif ?>    
                                <?php if (!empty($settings['sportsmi_counter_text'])) :   ?>
                                    <p class="counter_text"><?php echo wp_kses($settings['sportsmi_counter_text'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-xl-1 section__col">
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
                            <?php if (!empty($settings['list_content_repeater'])) : ?>
                                <div class="section__content-inner">
                                    <ul>
                                        <?php foreach ($settings['list_content_repeater'] as $item) : ?>
                                            <li>
                                                <i class="fa-solid fa-check"></i>
                                                <?php echo !empty($item['sportsmi_list_content']) ? esc_html($item['sportsmi_list_content']) : ''; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif ?>
                            <?php if(!empty($settings['sportsmi_content_button_one'])) : ?>
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
    <!-- ==== club section one alt start ==== -->

    <!-- ==== club section two start ==== -->
    <?php if ($settings['sportsmi_club_content_style_selection'] == 'style_two') : ?>
        <section class="section club-view">
            <div class="container">
                <div class="row align-items-center section__row">
                    <div class="col-lg-6 col-xl-6 section__col">
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
                            <?php if (!empty($settings['list_two_content_repeater'])) : ?>
                                <div class="section__content-inner">
                                    <ul>
                                        <?php foreach ($settings['list_two_content_repeater'] as $item) : ?>
                                            <li>
                                                <i class="fa-solid fa-check"></i>
                                                <?php echo !empty($item['sportsmi_list_two_content']) ? esc_html($item['sportsmi_list_two_content']) : ''; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif ?>
                            <?php if(!empty($settings['sportsmi_content_button_two'])) : ?>
                                <div class="section__content-cta">  
                                    <a href="<?php echo esc_html($settings['sportsmi_content_button_url_two']['url']) ?>" class="cmn-button"><?php echo esc_html($settings['sportsmi_content_button_two']) ?></a>
                                </div>          
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5 offset-xl-1 section__col d-none d-lg-block">
                        <div class="join-club__thumb wow fadeInUp" data-wow-duration="0.4s">
                            <?php if (!empty($settings['sportsmi_popup_content_image']['url'])) :   ?>
                                <img src="<?php echo esc_url($settings['sportsmi_popup_content_image']['url']) ?>"  alt="<?php echo esc_attr('Image') ?>" >
                            <?php endif ?>   
                            <div class="play-wrapper">
                                <?php if (!empty($settings['sportsmi_popup_card_icon'])) :   ?>
                                    <a href="<?php echo esc_html($settings['sportsmi_popup_link']['url']) ?>" class="play-btn" target="<?php echo esc_attr('_blank') ?>" title="<?php echo esc_attr('Youtube Video Player') ?>" >
                                        <?php  \Elementor\Icons_Manager::render_icon( $settings['sportsmi_popup_card_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- ==== club section two End ==== -->

<?php
    }
}

$widgets_manager->register(new TP_club_view());
