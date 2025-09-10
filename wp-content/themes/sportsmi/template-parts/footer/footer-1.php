<?php
/**
 * Template part for displaying footer layout one
 *
 * @package bentox
 */

// Theme mods and ACF fields
$footer_bg_img = get_theme_mod('bentox_footer_bg');
$bentox_footer_logo = get_theme_mod('bentox_footer_logo');
$bentox_footer_top_space = function_exists('get_field') ? get_field('bentox_footer_top_space') : '0';
$bentox_footer_bg_url_from_page = function_exists('get_field') ? get_field('bentox_footer_bg') : '';
$bentox_footer_bg_color_from_page = function_exists('get_field') ? get_field('bentox_footer_bg_color') : '';
$footer_bg_color = get_theme_mod('bentox_footer_bg_color');

// Backgrounds
$bg_img = !empty($bentox_footer_bg_url_from_page['url']) ? $bentox_footer_bg_url_from_page['url'] : $footer_bg_img;
$bg_color = !empty($bentox_footer_bg_color_from_page) ? $bentox_footer_bg_color_from_page : $footer_bg_color;

// Footer widget columns from Kirki setting
$footer_columns = get_theme_mod('footer_widget_number', 4);

// Column classes based on number of columns
$footer_class = [];
switch ($footer_columns) {
    case 1:
        $footer_class[1] = 'col-12 section__col';
        break;
    case 2:
        $footer_class[1] = 'col-md-6 section__col';
        $footer_class[2] = 'col-md-6 section__col';
        break;
    case 3:
        $footer_class[1] = 'col-md-6 col-xl-4 section__col';
        $footer_class[2] = 'col-md-6 col-xl-4 section__col';
        $footer_class[3] = 'col-md-6 col-xl-4 section__col';
        break;
    case 4:
        $footer_class[1] = 'col-md-6 col-lg-4 col-xl-3 section__col';
        $footer_class[2] = 'col-md-6 col-lg-2 col-xl-3 section__col';
        $footer_class[3] = 'col-md-6 col-lg-3 col-xl-3 section__col';
        $footer_class[4] = 'col-md-6 col-lg-3 col-xl-3 section__col';
        break;
    case 5:
        $footer_class[1] = 'col-xl-3 col-lg-3 col-md-4 col-6 section__col';
        $footer_class[2] = 'col-xl-2 col-lg-2 col-6 section__col';
        $footer_class[3] = 'col-xl-2 col-lg-2 col-6 section__col';
        $footer_class[4] = 'col-xl-2 col-lg-2 col-6 section__col';
        $footer_class[5] = 'col-xl-3 col-8 section__col';
        break;
    default:
        for ($i = 1; $i <= $footer_columns; $i++) {
            $footer_class[$i] = 'col-md-6 col-lg-3 section__col';
        }
        break;
}

// Footer style
$style_attributes = '';
if (isset($bg_color)) {
    $style_attributes .= 'background-color: ' . esc_attr($bg_color) . '; ';
}
?>

<!-- Footer area start -->
<footer style="<?php echo esc_attr($style_attributes); ?>" class="footer">
    <div class="container">
        <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') || is_active_sidebar('footer-5')) : ?>
            <div class="row section__row section-footer">
                <?php
                for ($num = 1; $num <= $footer_columns; $num++) {
                    if (!is_active_sidebar('footer-' . $num)) {
                        continue;
                    }
                    $class = isset($footer_class[$num]) ? $footer_class[$num] : 'col-md-6 col-lg-3 section__col';
                    echo '<div class="' . esc_attr($class) . '">';
                    dynamic_sidebar('footer-' . $num);
                    echo '</div>';
                }
                ?>
            </div>
        <?php endif; ?>

        <hr>

        <div class="row">
            <div class="col-12">
                <div class="copyright copyright_link">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <p><?php echo bentox_copyright_text(); ?></p>
                        </div>
                        <div class="col-lg-6">
                            <?php bentox_footer_menu(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>