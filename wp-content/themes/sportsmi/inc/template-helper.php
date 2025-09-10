<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bentox
 */

/** 
 *
 * bentox header
 */

function bentox_check_header()
{
    global $sportsmi_current_header_style;
    // Get the current page ID
    if (function_exists('is_shop') && is_shop()) {
        // WooCommerce Shop Page
        $current_page_id = get_option('woocommerce_shop_page_id');
    } elseif (is_home() && !is_front_page()) {
        // Blog Page (Posts Page)
        $current_page_id = get_option('page_for_posts');
    } else {
        // Regular Pages
        $current_page_id = get_the_ID();
    }
    // Retrieve header style from ACF
    $sportsmi_header_style = function_exists('get_field') ? get_field('header_style', $current_page_id) : null;
    // Get default header style from Kirki
    $sportsmi_default_header_style = get_theme_mod('choose_default_header', 'header-style-1');
    // Determine which header to use
    if ($sportsmi_header_style == 'header-style-1') {
        $sportsmi_current_header_style = 'header-style-1';
        get_template_part('template-parts/header/header-1');
    } elseif ($sportsmi_header_style == 'header-style-2') {
        $sportsmi_current_header_style = 'header-style-2';
        get_template_part('template-parts/header/header-2');
    } elseif ($sportsmi_header_style == 'header-style-3') {
        $sportsmi_current_header_style = 'header-style-3';
        get_template_part('template-parts/header/header-3');
    } else {
        // Fallback to Kirki default header
        if ($sportsmi_default_header_style == 'header-style-2') {
            $sportsmi_current_header_style = 'header-style-2';
            get_template_part('template-parts/header/header-2');
        } else {
            $sportsmi_current_header_style = 'header-style-1';
            get_template_part('template-parts/header/header-1');
        }
    }
}
add_action('sportsmi_header_style', 'bentox_check_header', 10);

/**
 * [bentox_header_lang description]
 * @return [type] [description]
 */
function bentox_header_lang_defualt()
{
    $bentox_header_lang = get_theme_mod('bentox_header_lang', false);
    if ($bentox_header_lang) : ?>

        <ul>
            <li><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__('English', 'sportsmi'); ?> <i class="fa-light fa-angle-down"></i></a>
                <?php do_action('bentox_language'); ?>
            </li>
        </ul>

    <?php endif; ?>
    <?php
}

/**
 * [bentox_language_list description]
 * @return [type] [description]
 */
function _bentox_language($mar)
{
    return $mar;
}
function bentox_language_list()
{

    $mar = '';
    $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');
    if (!empty($languages)) {
        $mar = '<ul>';
        foreach ($languages as $lan) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul>';
        $mar .= '<li><a href="#">' . esc_html__('English', 'sportsmi') . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__('Bangla', 'sportsmi') . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__('French', 'sportsmi') . '</a></li>';
        $mar .= ' </ul>';
    }
    print _bentox_language($mar);
}
add_action('bentox_language', 'bentox_language_list');




// header logo
function sportsmi_header_logo()
{
    global $sportsmi_current_header_style;
    // Get the current page ID
    if (function_exists('is_shop') && is_shop()) {
        // WooCommerce Shop Page
        $current_page_id = get_option('woocommerce_shop_page_id');
    } elseif (is_home() && !is_front_page()) {
        // Blog Page (Posts Page)
        $current_page_id = get_option('page_for_posts');
    } else {
        // Regular Pages
        $current_page_id = get_the_ID();
    }

    $sportsmi_logo_add = function_exists('get_field') ? get_field('is_enable_sec_logo', $current_page_id) : NULL;
    $sportsmi_logo = get_template_directory_uri() . '/assets/images/logo/logo.png';
    $sportsmi_logo_black = get_template_directory_uri() . '/assets/images/logo/logo-secondary.png';

    $sportsmi_site_logo = get_theme_mod('logo', $sportsmi_logo);
    $sportsmi_secondary_logo = get_theme_mod('secondary_logo', $sportsmi_logo_black);

    $inner_img = !empty($sportsmi_logo_add) ? $sportsmi_logo_add['url'] : '';

    if (!empty($inner_img)) { ?>
        <a class="secondary-logo navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url($inner_img); ?>" alt="<?php echo esc_attr__('logo', 'sportsmi'); ?>">
        </a>
        <?php } else {
        if ($sportsmi_current_header_style == 'header-style-1') { ?>
            <a class="standard-logo navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url($sportsmi_site_logo); ?>" alt="<?php echo esc_attr__('logo', 'sportsmi'); ?>" />
            </a>
        <?php } elseif ($sportsmi_current_header_style == 'header-style-2') { ?>
            <a class="standard-logo navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url($sportsmi_secondary_logo); ?>" alt="<?php echo esc_attr__('logo', 'sportsmi'); ?>" />
            </a>
    <?php }
    }
}
add_action('sportsmi_header_logo', 'sportsmi_header_logo');




// header logo
function bentox_header_sticky_logo()
{ ?>
    <?php
    $bentox_logo_black = get_template_directory_uri() . '/assets/img/logo/logo-black.png';
    $bentox_secondary_logo = get_theme_mod('seconday_logo', $bentox_logo_black);
    ?>
    <a class="sticky-logo" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($bentox_secondary_logo); ?>" alt="<?php print esc_attr__('logo', 'sportsmi'); ?>" />
    </a>
<?php
}

function bentox_mobile_logo()
{
    // side info
    $bentox_mobile_logo_hide = get_theme_mod('bentox_mobile_logo_hide', false);

    $bentox_site_logo = get_theme_mod('logo', get_template_directory_uri() . '/assets/img/logo/logo.png');

?>

    <?php if (!empty($bentox_mobile_logo_hide)) : ?>
        <div class="side__logo mb-25">
            <a class="sideinfo-logo" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($bentox_site_logo); ?>" alt="<?php print esc_attr__('logo', 'sportsmi'); ?>" />
            </a>
        </div>
    <?php endif; ?>



<?php }

/**
 * [bentox_header_social_profiles description]
 * @return [type] [description]
 */
function bentox_header_social_profiles()
{
    $bentox_topbar_fb_url = get_theme_mod('bentox_topbar_fb_url', __('#', 'sportsmi'));
    $bentox_topbar_twitter_url = get_theme_mod('bentox_topbar_twitter_url', __('#', 'sportsmi'));
    $bentox_topbar_instagram_url = get_theme_mod('bentox_topbar_instagram_url', __('#', 'sportsmi'));
    $bentox_topbar_linkedin_url = get_theme_mod('bentox_topbar_linkedin_url', __('#', 'sportsmi'));
    $bentox_topbar_youtube_url = get_theme_mod('bentox_topbar_youtube_url', __('#', 'sportsmi'));
?>
    <ul>
        <?php if (!empty($bentox_topbar_fb_url)) : ?>
            <li><a href="<?php print esc_url($bentox_topbar_fb_url); ?>"><span><i class="fab fa-facebook-f"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($bentox_topbar_twitter_url)) : ?>
            <li><a href="<?php print esc_url($bentox_topbar_twitter_url); ?>"><span><i class="fab fa-twitter"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($bentox_topbar_instagram_url)) : ?>
            <li><a href="<?php print esc_url($bentox_topbar_instagram_url); ?>"><span><i class="fab fa-instagram"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($bentox_topbar_linkedin_url)) : ?>
            <li><a href="<?php print esc_url($bentox_topbar_linkedin_url); ?>"><span><i class="fab fa-linkedin"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($bentox_topbar_youtube_url)) : ?>
            <li><a href="<?php print esc_url($bentox_topbar_youtube_url); ?>"><span><i class="fab fa-youtube"></i></span></a></li>
        <?php endif; ?>
    </ul>

<?php
}

function bentox_footer_social_profiles()
{
    $bentox_footer_fb_url = get_theme_mod('bentox_footer_fb_url', __('#', 'sportsmi'));
    $bentox_footer_twitter_url = get_theme_mod('bentox_footer_twitter_url', __('#', 'sportsmi'));
    $bentox_footer_instagram_url = get_theme_mod('bentox_footer_instagram_url', __('#', 'sportsmi'));
    $bentox_footer_linkedin_url = get_theme_mod('bentox_footer_linkedin_url', __('#', 'sportsmi'));
    $bentox_footer_youtube_url = get_theme_mod('bentox_footer_youtube_url', __('#', 'sportsmi'));
?>

    <ul>
        <?php if (!empty($bentox_footer_fb_url)) : ?>
            <li>
                <a href="<?php print esc_url($bentox_footer_fb_url); ?>">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($bentox_footer_twitter_url)) : ?>
            <li>
                <a href="<?php print esc_url($bentox_footer_twitter_url); ?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($bentox_footer_instagram_url)) : ?>
            <li>
                <a href="<?php print esc_url($bentox_footer_instagram_url); ?>">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($bentox_footer_linkedin_url)) : ?>
            <li>
                <a href="<?php print esc_url($bentox_footer_linkedin_url); ?>">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($bentox_footer_youtube_url)) : ?>
            <li>
                <a href="<?php print esc_url($bentox_footer_youtube_url); ?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php
}

/**
 * [bentox_header_menu description]
 * @return [type] [description]
 */
function bentox_header_menu()
{
    wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => 'nav__menu-items',
        'container'      => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        // 'after'  => '<i class="fas fa-chevron-down"></i>',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
}

/**
 * [gameplex_header_menu description]
 * @return [type] [description]
 */
function custom_user_menu()
{
    wp_nav_menu([
        'theme_location' => 'user-menu',
        'menu_class'     => 'nav_list',
        'container'      => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
}


/**
 * [bentox_header_menu description]
 * @return [type] [description]
 */
function bentox_mobile_menu()
{

    $bentox_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'        => 'mobile-menu-active',
        'echo'           => false,
    ]);

    $bentox_menu = str_replace("menu-item-has-children", "menu-item-has-children has-children", $bentox_menu);
    echo wp_kses_post($bentox_menu);
}

/**
 * [bentox_search_menu description]
 * @return [type] [description]
 */
function bentox_header_search_menu()
{
    wp_nav_menu([
        'theme_location' => 'header-search-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
}

/**
 * [bentox_footer_menu description]
 * @return [type] [description]
 */
function bentox_footer_menu()
{
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'menu_class'     => 'footer-link justify-content-center flex-wrap position-relative cus-z1',
        'container'      => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
}


/**
 * [bentox_category_menu description]
 * @return [type] [description]
 */
function bentox_category_menu()
{
    wp_nav_menu([
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'Eduker_Navwalker_Class::fallback',
        'walker'         => new Eduker_Navwalker_Class,
    ]);
}

/**
 *
 * bentox footer
 */
add_action('bentox_footer_style', 'bentox_check_footer', 10);

function bentox_check_footer()
{
    $bentox_footer_style = function_exists('get_field') ? get_field('footer_style') : NULL;
    $bentox_default_footer_style = get_theme_mod('choose_default_footer', 'footer-style-1');

    if ($bentox_footer_style == 'footer-style-1') {
        get_template_part('template-parts/footer/footer-1');
    } elseif ($bentox_footer_style == 'footer-style-2') {
        get_template_part('template-parts/footer/footer-2');
    } elseif ($bentox_footer_style == 'footer-style-3') {
        get_template_part('template-parts/footer/footer-3');
    } elseif ($bentox_footer_style == 'footer-style-4') {
        get_template_part('template-parts/footer/footer-4');
    } else {

        /** default footer style **/
        if ($bentox_default_footer_style == 'footer-style-2') {
            get_template_part('template-parts/footer/footer-2');
        } elseif ($bentox_default_footer_style == 'footer-style-3') {
            get_template_part('template-parts/footer/footer-3');
        } elseif ($bentox_default_footer_style == 'footer-style-4') {
            get_template_part('template-parts/footer/footer-4');
        } else {
            get_template_part('template-parts/footer/footer-1');
        }
    }
}

// bentox_copyright_text
function bentox_copyright_text()
{
    $home_url = esc_url(home_url('/')); // Get the home URL
    $copyright_text = get_theme_mod('bentox_copyright', 'Copyright © 2025 <a href="' . $home_url . '">Sportsmi</a> - All Rights Reserved');
    echo wp_kses($copyright_text, array(
        'a' => array(
            'href' => array(),
        ),
    ));
}



/**
 *
 * pagination
 */
if (!function_exists('bentox_pagination')) {

    function _bentox_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navegation
    function bentox_pagination($prev, $next, $pages, $args)
    {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        $pagination = [
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = ['s' => get_query_var('s')];
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul>';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _bentox_pagi_callback($pagi);
    }
}


// Breadcrumb color
function header_breadcrumb_bg_color()
{
    $color_code = get_theme_mod('breadcrumb_bg_color', '');
    $custom_css = '';
    if ($color_code != '') {
        $custom_css .= "body .banner--inner{
            background-color: $color_code !important;
        }";
    }
    // Enqueue and add inline styles for menu Color
    wp_register_style('header-menu-custom', false);
    wp_enqueue_style('header-menu-custom', false);
    wp_add_inline_style('header-menu-custom', $custom_css, true);
}
add_action('wp_enqueue_scripts', 'header_breadcrumb_bg_color');




function header_menu_custom_color()
{
    // Default Menu bg Color
    $color_code_menu_bg = get_theme_mod('header_menu_bg_color', '');
    $custom_menu_css_bg = '';
    if ($color_code_menu_bg != '') {
        $custom_menu_css_bg .= ".header .nav{
            background-color: $color_code_menu_bg !important;
        }";
    }
    // Default Menu active bg
    $color_code_menu_active_bg = get_theme_mod('header_menu_active_bg_color', '');
    $custom_menu_active_css = '';
    if ($color_code_menu_active_bg != '') {
        $custom_menu_active_css .= ".header-active, .header-active .nav{
            background-color: $color_code_menu_active_bg !important;
        }";
    }

    // // Default Menu Color
    // $padding_menu = get_theme_mod('nav_outside_padding', '');
    // $custom_menu_css_padding = '';
    // if ($padding_menu != '') {
    //     $custom_menu_css_padding .= ".header .nav{
    //         padding: $padding_menu !important;
    //     }";
    // }


    // // Default Menu Color
    // $padding_code_menu = get_theme_mod('menu_inner_padding', '');
    // $custom_menu_padding = '';
    // if ($padding_code_menu != '') {
    //     $custom_menu_padding .= ".header .nav__menu-items>li>a{
    //         padding: $padding_code_menu !important;
    //     }";
    // }
    // Default Menu Color
    $color_code_menu = get_theme_mod('header_menu_color', '');
    $custom_menu_css = '';
    if ($color_code_menu != '') {
        $custom_menu_css .= ".header .nav__menu-items>li>a,.header .nav__menu-items li.dropdown>a::after{
            color: $color_code_menu !important;
        }";
    }
    // Default Menu hover Color
    $color_code_menu_hover = get_theme_mod('header_menu_color_hover', '');
    $custom_menu_css_hov = '';
    if ($color_code_menu_hover != '') {
        $custom_menu_css_hov .= ".header .nav__menu-items>li a:hover,.header .nav__menu-items li.dropdown>a:hover::after{
            color: $color_code_menu_hover !important;
        }";
    }

    // Default Menu hover Color
    $color_code_menu_drop_bg = get_theme_mod('header_menu_color_drop', '');
    $custom_menu_css_drop_bg = '';
    if ($color_code_menu_drop_bg != '') {
        $custom_menu_css_drop_bg .= ".header .nav__menu-items li.dropdown:hover>.nav__dropdown{
            background-color: $color_code_menu_drop_bg !important;
        }";
    }

    // Default Menu Color
    $color_code_menu_drop = get_theme_mod('header_menu_drop_color', '');
    $custom_menu_css_drop = '';
    if ($color_code_menu_drop != '') {
        $custom_menu_css_drop .= ".header .nav__menu-items>li.dropdown .nav__dropdown li a,.header .nav__menu-items>li.dropdown .nav__dropdown li.dropdown>a::after{
             color: $color_code_menu_drop !important;
         }";
    }
    // Default Menu hover Color
    $color_menu_css_drop_hover = get_theme_mod('header_menu_drop_color_hover', '');
    $custom_menu_css_drop_hover = '';
    if ($color_menu_css_drop_hover != '') {
        $custom_menu_css_drop_hover .= ".header .nav__menu-items>li.dropdown .nav__dropdown li a:hover,.header .nav__menu-items>li.dropdown .nav__dropdown li.dropdown>a:hover::after{
             color: $color_menu_css_drop_hover !important;
         }";
    }


    // cart box Color
    $color_code_cart_color = get_theme_mod('menu_menu_cart_color', '');
    $custom_menu_css_cart = '';
    if ($color_code_cart_color != '') {
        $custom_menu_css_cart .= ".header .nav__uncollapsed .cart i{
            color: $color_code_cart_color !important;
        }";
    }

    // button box Bg
    $color_code_buttom = get_theme_mod('custom_menu_css_buttom', '');
    $custom_menu_css_buttom = '';
    if ($color_code_buttom != '') {
        $custom_menu_css_buttom .= ".cmn-button::before, .cmn-button::after{
            background-color: $color_code_buttom !important;
        }";
    }

    // buttom box Color
    $color_code_buttom_color = get_theme_mod('custom_menu_css_buttom_color', '');
    $custom_menu_css_buttom_color = '';
    if ($color_code_buttom_color != '') {
        $custom_menu_css_buttom_color .= ".cmn-button {
            color: $color_code_buttom_color !important;
        }";
    }

    // buttom box Color
    $color_code_user_color2 = get_theme_mod('custom_menu2_css_user_color', '');
    $custom_menu_css_user_color2 = '';
    if ($color_code_user_color2 != '') {
        $custom_menu_css_user_color2 .= ".user_name {
            color: $color_code_user_color2 !important;
        }";
    }
    // buttom box Color
    $color_code_user_color = get_theme_mod('custom_menu_css_user_color', '');
    $custom_menu_css_user_color = '';
    if ($color_code_user_color != '') {
        $custom_menu_css_user_color .= ".header--secondary .user_name {
                color: $color_code_user_color !important;
            }";
    }
    // border Color
    $color_code_buttom_border_color = get_theme_mod('custom_menu_css_buttom_border', '');
    $custom_menu_css_buttom_border_color = '';
    if ($color_code_buttom_border_color != '') {
        $custom_menu_css_buttom_border_color .= ".header .nav__uncollapsed .cmn-button--secondary {
           border-color: $color_code_buttom_border_color !important;
        }";
    }
    // Enqueue and add inline styles for menu Color
    wp_register_style('custom_menu_css_bg', false);
    wp_enqueue_style('custom_menu_css_bg', false);
    wp_add_inline_style('custom_menu_css_bg', $custom_menu_css_bg, true);

    // Enqueue and add inline styles for menu Color
    wp_register_style('custom_menu_active_css', false);
    wp_enqueue_style('custom_menu_active_css', false);
    wp_add_inline_style('custom_menu_active_css', $custom_menu_active_css, true);


    // Enqueue and add inline styles for menu Color
    wp_register_style('custom_menu_css_color', false);
    wp_enqueue_style('custom_menu_css_color', false);
    wp_add_inline_style('custom_menu_css_color', $custom_menu_css, true);

    // Enqueue and add inline styles for menu Color
    wp_register_style('custom_menu_css_color_hover', false);
    wp_enqueue_style('custom_menu_css_color_hover', false);
    wp_add_inline_style('custom_menu_css_color_hover', $custom_menu_css_hov, true);

    // Enqueue and add inline styles for menu Color
    wp_register_style('custom_menu_drop_css_bg', false);
    wp_enqueue_style('custom_menu_drop_css_bg', false);
    wp_add_inline_style('custom_menu_drop_css_bg', $custom_menu_css_drop_bg, true);

    // Enqueue and add inline styles for menu Color
    wp_register_style('custom_menu_css_drop_color', false);
    wp_enqueue_style('custom_menu_css_drop_color', false);
    wp_add_inline_style('custom_menu_css_drop_color', $custom_menu_css_drop, true);

    // Enqueue and add inline styles for menu Color
    wp_register_style('custom_menu_css_drop_color_hover', false);
    wp_enqueue_style('custom_menu_css_drop_color_hover', false);
    wp_add_inline_style('custom_menu_css_drop_color_hover', $custom_menu_css_drop_hover, true);

    // button/cart

    // Enqueue and add inline styles for cart Color
    wp_register_style('header-menu-custom-cart', false);
    wp_enqueue_style('header-menu-custom-cart', false);
    wp_add_inline_style('header-menu-custom-cart', $custom_menu_css_cart, true);

    // Enqueue and add inline styles for button bg
    wp_register_style('header-menu-custom-button', false);
    wp_enqueue_style('header-menu-custom-button', false);
    wp_add_inline_style('header-menu-custom-button', $custom_menu_css_buttom, true);

    // Enqueue and add inline styles for button Color
    wp_register_style('header-menu-custom-button-color', false);
    wp_enqueue_style('header-menu-custom-button-color', false);
    wp_add_inline_style('header-menu-custom-button-color', $custom_menu_css_buttom_color, true);

    // Enqueue and add inline styles for button Color
    wp_register_style('header-menu-custom-user-color', false);
    wp_enqueue_style('header-menu-custom-user-color', false);
    wp_add_inline_style('header-menu-custom-user-color', $custom_menu_css_user_color, true);
    // Enqueue and add inline styles for button Color
    wp_register_style('header-menu-custom-user-color', false);
    wp_enqueue_style('header-menu-custom-user-color', false);
    wp_add_inline_style('header-menu-custom-user-color', $custom_menu_css_user_color2, true);

    // Enqueue and add inline styles for button Color
    wp_register_style('custom_menu_css_buttom_border_color', false);
    wp_enqueue_style('custom_menu_css_buttom_border_color', false);
    wp_add_inline_style('custom_menu_css_buttom_border_color', $custom_menu_css_buttom_border_color, true);
}
add_action('wp_enqueue_scripts', 'header_menu_custom_color');




// theme color
function bentox_custom_color()
{
    // Primary Color
    $color_code = get_theme_mod('primary_color_option', '#0e7a31');
    $custom_css = '';

    if ($color_code != '') {
        $custom_css .= ":root{
            --primary-color: $color_code !important; 
            --woo-primary-color: $color_code !important; 
        }";
    }
    // Secondary Color
    $color_code2 = get_theme_mod('secondary_color_option', '#ffffff');
    $custom_css2 = '';
    if ($color_code2 != '') {
        $custom_css2 .= ":root{
            --woo-secondary-color: $color_code2 !important;
        }";
    }

    // Tertiary Color
    $color_code3 = get_theme_mod('tertiary_color_option', '#3f3f3f');
    $custom_css3 = '';
    if ($color_code3 != '') {
        $custom_css3 .= ":root{
            --theme-color: $color_code3 !important;
            --woo-tertiary-color: $color_code3 !important;
        }";
    }


    // Enqueue and add inline styles for Primary Color
    wp_register_style('primary-custom', false);
    wp_enqueue_style('primary-custom', false);
    wp_add_inline_style('primary-custom', $custom_css, true);
    // Enqueue and add inline styles for Secondary Color
    wp_register_style('secondary-custom', false);
    wp_enqueue_style('secondary-custom', false);
    wp_add_inline_style('secondary-custom', $custom_css2, true);
    // Enqueue and add inline styles for tertiary Color
    wp_register_style('tertiary-custom', false);
    wp_enqueue_style('tertiary-custom', false);
    wp_add_inline_style('tertiary-custom', $custom_css3, true);
}
add_action('wp_enqueue_scripts', 'bentox_custom_color');






// bentox_kses_intermediate
function bentox_kses_intermediate($string = '')
{
    return wp_kses($string, bentox_get_allowed_html_tags('intermediate'));
}

function bentox_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function bentox_kses($raw)
{

    $allowed_tags = array(
        'a'                         => array(
            'class'   => array(),
            'href'    => array(),
            'rel'  => array(),
            'title'   => array(),
            'target' => array(),
        ),
        'abbr'                      => array(
            'title' => array(),
        ),
        'b'                         => array(),
        'blockquote'                => array(
            'cite' => array(),
        ),
        'cite'                      => array(
            'title' => array(),
        ),
        'code'                      => array(),
        'del'                    => array(
            'datetime'   => array(),
            'title'      => array(),
        ),
        'dd'                     => array(),
        'div'                    => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'dl'                     => array(),
        'dt'                     => array(),
        'em'                     => array(),
        'h1'                     => array(),
        'h2'                     => array(),
        'h3'                     => array(),
        'h4'                     => array(),
        'h5'                     => array(),
        'h6'                     => array(),
        'i'                         => array(
            'class' => array(),
        ),
        'img'                    => array(
            'alt'  => array(),
            'class'   => array(),
            'height' => array(),
            'src'  => array(),
            'width'   => array(),
        ),
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
        'data-wow-duration'            => array(),
        'data-wow-delay'            => array(),
        'data-wallpaper-options'       => array(),
        'data-stellar-background-ratio'   => array(),
        'ul'                     => array(
            'class' => array(),
        ),
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'g'     => array('fill' => true),
        'title' => array('title' => true),
        'path'  => array('d' => true, 'fill' => true,),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}
