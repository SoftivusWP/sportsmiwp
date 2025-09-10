<?php

/**
 * bentox_scripts description
 * @return [type] [description]
 */
function bentox_scripts() {

    /**
     * all css files
    */
    wp_enqueue_style( 'sportsmi-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap' );
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');

    // Font Awesome
    wp_enqueue_style('cus-font-aweswome', get_template_directory_uri() . '/assets/vendor/font-awesome/css/all.min.css');


    // Nice Select
    wp_enqueue_style('nice-select', get_template_directory_uri() . '/assets/vendor/nice-select/css/nice-select.css');

    // Magnific Popup
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/vendor/magnific-popup/css/magnific-popup.css');

    // Slick
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/vendor/slick/css/slick.css');

    // Odometer
    wp_enqueue_style('odometer', get_template_directory_uri() . '/assets/vendor/odometer/css/odometer.css');


    // Animate
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/vendor/animate/animate.css');
    wp_enqueue_style( 'spacing', SPORTSMIN_THEME_CSS_DIR . 'spacing.css', [],time() );
    wp_enqueue_style( 'main-css', SPORTSMIN_THEME_CSS_DIR . 'main.css', [],time() );
    wp_enqueue_style( 'sportsmi-blog-css', SPORTSMIN_THEME_CSS_DIR . 'sportsmi-blog.css', [],time() );
    wp_enqueue_style( 'woocommerce-css', SPORTSMIN_THEME_CSS_DIR . 'woocommerce.css', [],time() );
    wp_enqueue_style( 'sportsmi-unit', SPORTSMIN_THEME_CSS_DIR . 'sportsmi-unit.css', [], time() );
    wp_enqueue_style( 'sportsmi-custom', SPORTSMIN_THEME_CSS_DIR . 'sportsmi-custom.css', [],time() );
    wp_enqueue_style( 'responsive', SPORTSMIN_THEME_CSS_DIR . 'responsive.css', [],time() );
    wp_enqueue_style( 'sportsmi-style', get_stylesheet_uri() );

    // all js
   


    // Bootstrap
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Nice Select
    wp_enqueue_script('nice-select', get_template_directory_uri() . '/assets/vendor/nice-select/js/jquery.nice-select.min.js', array('jquery'), null, true);

    // Magnific Popup
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js', array('jquery'), null, true);

    // Slick
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/vendor/slick/js/slick.min.js', array('jquery'), null, true);

    // Odometer
    wp_enqueue_script('odometer', get_template_directory_uri() . '/assets/vendor/odometer/js/odometer.min.js', array(), null, true);

    // Viewport
    wp_enqueue_script('viewport', get_template_directory_uri() . '/assets/vendor/viewport/viewport.jquery.js', array('jquery'), null, true);


    // Wow
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/vendor/wow/wow.min.js', array('jquery'), null, true);

    // Plugins
    wp_enqueue_script('plugins', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), null, true);

    // Main JS
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'bentox_scripts' );

/*
Register Fonts
 */
function bentox_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'sportsmi' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap';
    }
    return $font_url;
}