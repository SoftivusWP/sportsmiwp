<?php
/**
 * TPCore Social Info Widget
 *
 * @author      Theme_Pure
 * @category    Widgets
 * @package     TPCore/Widgets
 * @version     1.0.0
 * @extends     WP_Widget
 */
add_action('widgets_init', 'tp_social_info_widget');

function tp_social_info_widget() {
    register_widget('TP_Social_Info_Widget');
}

class TP_Social_Info_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'tp_social_info_widget',
            esc_html__('TP Social Info', 'tpcore'),
            array(
                'description' => esc_html__('TP Social Info Widget by Theme_Pure', 'tpcore'),
            )
        );
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        print $before_widget;

        if (!empty($title)) {
            print $before_title . apply_filters('widget_title', $title) . $after_title;
        }
        ?>

        <div class="social justify-content-start">
            <a href="#">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#">
                <i class="fab fa-instagram"></i>
            </a>
        </div>

        <?php print $after_widget;
    }

    public function form($instance) {
        $title = isset($instance['title']) ? $instance['title'] : '';
		$social_links = isset($instance['social_links']) ? $instance['social_links'] : array();
        ?>
        <p>
            <label for="<?php print esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'tpcore'); ?></label>
        </p>
        <input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"
               class="widefat"
               name="<?php print esc_attr($this->get_field_name('title')); ?>"
               value="<?php print esc_attr($title); ?>">
			 
        <?php
		
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}
