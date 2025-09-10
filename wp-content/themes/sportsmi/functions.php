<?php

/**
 * bentox functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bentox
 */

if (!function_exists('bentox_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function bentox_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on bentox, use a find and replace
         * to change 'sportsmi' to the name of your theme in all the template files.
         */
        load_theme_textdomain('sportsmi', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus([
            'main-menu' => esc_html__('Main Menu', 'sportsmi'),
            'user-menu' => esc_html__('User Menu', 'sportsmi'),
            'category-menu' => esc_html__('Category Menu', 'sportsmi'),
            'footer-menu' => esc_html__('Footer Menu', 'sportsmi'),
        ]);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('bentox_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ]));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        //Enable custom header
        add_theme_support('custom-header');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ]);

        /**
         * Enable suporrt for Post Formats
         *
         * see: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', [
            'image',
            'audio',
            'video',
            'gallery',
            'quote',
        ]);

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        remove_theme_support('widgets-block-editor');

        add_image_size('bentox-blog', 416, 235, ['center', 'center']);

        add_theme_support('woocommerce');

        // Add support for WooCommerce product galleries
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
endif;
add_action('after_setup_theme', 'bentox_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bentox_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('bentox_content_width', 640);
}
add_action('after_setup_theme', 'bentox_content_width', 0);



/**
 * Enqueue scripts and styles.
 */

define('SPORTSMIN_THEME_DIR', get_template_directory());
define('SPORTSMIN_THEME_URI', get_template_directory_uri());
define('SPORTSMIN_THEME_CSS_DIR', SPORTSMIN_THEME_URI . '/assets/css/');
define('SPORTSMIN_THEME_JS_DIR', SPORTSMIN_THEME_URI . '/assets/js/');
define('SPORTSMIN_THEME_INC', SPORTSMIN_THEME_DIR . '/inc/');



// wp_body_open
if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}

/**
 * Implement the Custom Header feature.
 */
require SPORTSMIN_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require SPORTSMIN_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require SPORTSMIN_THEME_INC . 'template-helper.php';

/**
 * initialize kirki customizer class.
 */
include_once SPORTSMIN_THEME_INC . 'kirki-customizer.php';
include_once SPORTSMIN_THEME_INC . 'class-bentox-kirki.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require SPORTSMIN_THEME_INC . 'jetpack.php';
}


/**
 * include bentox functions file
 */
require_once SPORTSMIN_THEME_INC . 'class-navwalker.php';
require_once SPORTSMIN_THEME_INC . 'class-tgm-plugin-activation.php';
require_once SPORTSMIN_THEME_INC . 'add_plugin.php';
require_once SPORTSMIN_THEME_INC . '/common/bentox-breadcrumb.php';
require_once SPORTSMIN_THEME_INC . '/common/bentox-scripts.php';
require_once SPORTSMIN_THEME_INC . '/common/bentox-widgets.php';

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bentox_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'bentox_pingback_header');

// change textarea position in comment form
// ----------------------------------------------------------------------------------------
function bentox_move_comment_textarea_to_bottom($fields)
{
    $comment_field       = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'bentox_move_comment_textarea_to_bottom');


// bentox_comment 
if (!function_exists('bentox_comment')) {
    function bentox_comment($comment, $args, $depth)
    {
        $GLOBAL['comment'] = $comment;
        extract($args, EXTR_SKIP);
        $args['reply_text'] = 'Reply';
        $replayClass = 'comment-depth-' . esc_attr($depth);
?>
        <li id="comment-<?php comment_ID(); ?>">
            <div class="comments-box grey-bg-2">
                <div class="comments-avatar">
                    <?php print get_avatar($comment, 102, null, null, ['class' => []]); ?>
                </div>
                <div class="comments-text">
                    <div class="avatar-name">
                        <h5><?php print get_comment_author_link(); ?></h5>
                        <span><?php comment_time(get_option('date_format')); ?></span>
                    </div>
                    <?php comment_text(); ?>

                    <div class="comments-replay">
                        <?php comment_reply_link(array_merge($args, ['depth' => $depth, 'max_depth' => $args['max_depth']])); ?>
                    </div>

                </div>
            </div>
    <?php
    }
}


/**
 * shortcode supports for removing extra p, spance etc
 *
 */
add_filter('the_content', 'bentox_shortcode_extra_content_remove');
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function bentox_shortcode_extra_content_remove($content)
{

    $array = [
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
    ];
    return strtr($content, $array);
}

// bentox_search_filter_form
if (!function_exists('bentox_search_filter_form')) {
    function bentox_search_filter_form($form)
    {

        $form = sprintf(
            '<div class="sidebar__widget-px"><div class="search-px"><form class="sidebar__search p-relative" action="%s" method="get">
      	<input type="text" value="%s" required name="s" placeholder="%s">
      	<button type="submit"> <i class="far fa-search"></i>  </button>
		</form></div></div>',
            esc_url(home_url('/')),
            esc_attr(get_search_query()),
            esc_html__('Search', 'sportsmi')
        );

        return $form;
    }
    add_filter('get_search_form', 'bentox_search_filter_form');
}

add_action('admin_enqueue_scripts', 'bentox_admin_custom_scripts');

function bentox_admin_custom_scripts()
{
    wp_enqueue_media();
    wp_enqueue_style('customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css', array());
    wp_register_script('bentox-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', ['jquery'], '', true);
    wp_enqueue_script('bentox-admin-custom');
}

// Redirect logged-in users away from the login page
function redirect_logged_in_users_from_login()
{
    // Allow the logout process to complete
    if (isset($_GET['action']) && $_GET['action'] === 'logout') {
        return;
    }

    // Redirect logged-in users away from the login page
    if (is_user_logged_in() && is_login()) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('init', 'redirect_logged_in_users_from_login');


// Woocommerce


/**
 * remove default woocommerce sidebar
 */

if (!function_exists('custom_woocommerce_shop_columns')) {
    function custom_woocommerce_shop_columns($cols)
    {
        return 3; // Set the number of columns per row
    }
    add_filter('loop_shop_columns', 'custom_woocommerce_shop_columns');
}

// Show plus minus buttons
add_action('woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus');
function bbloomer_display_quantity_plus()
{
    echo '<button type="button" class="plus"><i class="fas fa-plus"></i></button>';
}

add_action('woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus');
function bbloomer_display_quantity_minus()
{
    echo '<button type="button" class="minus"><i class="fas fa-minus"></i></button>';
}

// Trigger update quantity script
add_action('woocommerce_init', 'bbloomer_add_cart_quantity_plus_minus');
function bbloomer_add_cart_quantity_plus_minus()
{
    if (! function_exists('is_product') || ! function_exists('wc_enqueue_js')) {
        return;
    }

    // Debugging output
    error_log('Function bbloomer_add_cart_quantity_plus_minus is running.');

    wc_enqueue_js("
     $(document).on( 'click', 'button.plus, button.minus', function() {
        var qty = $( this ).parent( '.quantity' ).find( '.qty' );
        var val = parseFloat(qty.val());
        var max = parseFloat(qty.attr( 'max' ));
        var min = parseFloat(qty.attr( 'min' ));
        var step = parseFloat(qty.attr( 'step' ));

        if ( $( this ).is( '.plus' ) ) {
           if ( max && ( max <= val ) ) {
              qty.val( max ).change();
           } else {
              qty.val( val + step ).change();
           }
        } else {
           if ( min && ( min >= val ) ) {
              qty.val( min ).change();
           } else if ( val > 1 ) {
              qty.val( val - step ).change();
           }
        }
     });
  ");
}


// Number of Woocommerce Related Product  
add_filter('woocommerce_output_related_products_args', 'bbloomer_change_number_related_products', 9999);
function bbloomer_change_number_related_products($args)
{
    $args['posts_per_page'] = 3; // # of related products
    $args['columns'] = 3; // # of columns per row
    return $args;
}


// RECOMMENDED:
function finview_add_editor_styles()
{
    add_editor_style('css/custom-editor-style.css');
}
add_action('admin_init', 'finview_add_editor_styles');

function finview_register_block_patterns()
{
    register_block_pattern('my-theme/my-pattern', array(
        'title'       => __('My Pattern', 'sportsmi'),
        'description' => _x('A custom pattern for my theme.', 'Block pattern description', 'sportsmi'),
        'content'     => "<!-- wp:paragraph --><p>" . __('Hello world!', 'sportsmi') . "</p><!-- /wp:paragraph -->",
    ));
}
add_action('init', 'finview_register_block_patterns');

function finview_register_block_styles()
{
    register_block_style('core/quote', array(
        'name'  => 'fancy-quote',
        'label' => __('Fancy Quote', 'sportsmi'),
    ));
}
add_action('init', 'finview_register_block_styles');



