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
use \Elementor\Plugin;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for login button.
 *
 * @since 1.0.0
 */
class TP_login_button extends Widget_Base
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
        return 'tp-login-button';
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
        return __('Login Button', 'tpcore');
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
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'tp_button_section_general',
            [
                'label' => esc_html__('Button', 'tpcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tp_button_content_style',
            [
                'type' => \Elementor\Controls_Manager::SELECT,
                'label' => esc_html__('Select Style', 'tpcore'),
                'options' => [
                    'style_one' => esc_html__('Style One', 'tpcore'),
                    'style_two' => esc_html__('Style Two', 'tpcore'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_responsive_control(
            'tp_button_content_align',
            [
                'label' => esc_html__('Button Align', 'tpcore'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'tpcore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'tpcore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'tpcore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'tpcore'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .pricing__card-cta' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Button text
        $this->add_control(
            'tp_content_button',
            [
                'label' => esc_html__('Button Text', 'tpcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Login', 'tpcore'),
                'placeholder' => esc_html__('Type your button text here', 'tpcore'),
                'label_block' => true,
            ]
        );

        // Button URL
        $this->add_control(
            'tp_content_button_url',
            [
                'label' => esc_html__('Button URL', 'tpcore'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'tpcore'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // ======================= Button Style ===========================//
        $this->start_controls_section(
            'button_style',
            [
                'label' => esc_html__('Button Style', 'tpcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography', 'tpcore'),
                'name' => 'button_typ',
                'selector' => '{{WRAPPER}} .cmn-button',
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Color', 'tpcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'tp_button_content_style' => 'style_one',
                ]
            ]
        );

        $this->add_control(
            'button_color_hover',
            [
                'label' => esc_html__('Hover Color', 'tpcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:hover' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'tp_button_content_style' => 'style_one',
                ]
            ]
        );

        $this->add_control(
            'button_secondary_color',
            [
                'label' => esc_html__('Secondary Color', 'tpcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'tp_button_content_style' => 'style_two',
                ]
            ]
        );

        $this->add_control(
            'button_secondary_color_hover',
            [
                'label' => esc_html__('Secondary Hover Color', 'tpcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:hover' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'tp_button_content_style' => 'style_two',
                ]
            ]
        );

        $this->add_control(
            'button_bgcolor',
            [
                'label' => esc_html__('Background Color', 'tpcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .cmn-button:after' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'tp_button_content_style' => 'style_one',
                ]
            ]
        );

        $this->add_control(
            'button_hvr_bgcolor',
            [
                'label' => esc_html__('Hover Background Color', 'tpcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:hover' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'tp_button_content_style' => 'style_one',
                ]
            ]
        );

        $this->add_control(
            'button_secondary_hvr_bgcolor',
            [
                'label' => esc_html__('Secondary Background', 'tpcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button--secondary' => 'background: {{VALUE}} !important;',
                ],
                'condition' => [
                    'tp_button_content_style' => 'style_two',
                ]
            ]
        );

        $this->add_control(
            'button_secondary_bgcolor',
            [
                'label' => esc_html__('Secondary Hover Background', 'tpcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .cmn-button.cmn-button--secondary:after' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'tp_button_content_style' => 'style_two',
                ]
            ]
        );

        $this->add_control(
            'button_bdr_color',
            [
                'label' => esc_html__('Border Color', 'tpcore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bdr_hvr_color',
            [
                'label' => esc_html__('Hover Border Color', 'tpcore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cmn-button:hover' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'tpcore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'button_style_margin',
            [
                'label' => esc_html__('Margin', 'tpcore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_style_padding',
            [
                'label' => __('Padding', 'tpcore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cmn-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $header_user_switch = get_theme_mod('header_user_switch', false);

        if (!empty($header_user_switch)) :
            if (is_user_logged_in()) {
                $loggedin_user = wp_get_current_user();
                if ($loggedin_user instanceof \WP_User) {
                    $user_link = get_edit_profile_url($loggedin_user->ID);
                    
                    // Check if custom_user_menu exists and menu is not empty
                    $has_user_menu = function_exists('custom_user_menu') && wp_get_nav_menu_items('user-menu');
                
                    echo '<div class="user_nav">';
                    echo '<a class="user_nav_link ms-lg-1" href="' . ($has_user_menu ? '#' : esc_url($user_link)) . '">';
                    echo '<span class="user_name d-none d-lg-flex">' . esc_html($loggedin_user->display_name) . '</span>';
                    echo get_avatar($loggedin_user->user_email, 48);
                    echo '</a>';
                
                    // Only output menu if it exists and has items
                    if ($has_user_menu) {
                        custom_user_menu();
                    }
                
                    echo '</div>';
                }
            } else {
                if (true === get_theme_mod('site_login_link', true)) {
                    $button_url = !empty($settings['tp_content_button_url']['url']) ? $settings['tp_content_button_url']['url'] : wp_login_url();
                    $button_text = !empty($settings['tp_content_button']) ? $settings['tp_content_button'] : __('Login', 'tpcore');

                    $button_class = 'cmn-button btn-login align-items-center';
                    if ($settings['tp_button_content_style'] == 'style_two') {
                        $button_class .= ' cmn-button--secondary';
                    }

                    echo '<div class="pricing__card-cta">';
                    echo '<a href="' . esc_url($button_url) . '" class="' . esc_attr($button_class) . '">';
                    echo esc_html($button_text);
                    echo '</a>';
                    echo '</div>';
                }
            }
        endif;
    }
}

// Register widget
if (class_exists('TPCore\Widgets\TP_login_button')) {
    Plugin::instance()->widgets_manager->register(new \TPCore\Widgets\TP_login_button());
}
