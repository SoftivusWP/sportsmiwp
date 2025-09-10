<?php




function bentox_breadcrumb_func()
{
    global $post;
    $breadcrumb_class = '';
    $breadcrumb_show = 1;


    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'sportsmi'));
        $breadcrumb_class = 'home_front_page';
    } elseif (is_front_page()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'sportsmi'));
        $breadcrumb_show = 0;
    } elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    } elseif (is_single() && 'post' == get_post_type()) {
        $title = get_the_title();
        // } elseif (is_single() && 'product' == get_post_type()) {
        //     $title = get_theme_mod('breadcrumb_product_details', __('Shop', 'sportsmi'));
    } elseif (is_single() && 'courses' == get_post_type()) {
        $title = esc_html__('Course Details', 'sportsmi');
    } elseif ('courses' == get_post_type()) {
        $title = esc_html__('Courses', 'sportsmi');
    } elseif (is_search()) {
        $title = esc_html__('Search Results for : ', 'sportsmi') . get_search_query();
    } elseif (is_404()) {
        $title = esc_html__('Page not Found', 'sportsmi');
    } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop', __('Shop', 'sportsmi'));
    } elseif (is_archive()) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }



    $_id = get_the_ID();

    if (is_single() && 'product' == get_post_type()) {
        $_id = $post->ID;
    } elseif (function_exists("is_shop") and is_shop()) {
        $_id = wc_get_page_id('shop');
    } elseif (is_home() && get_option('page_for_posts')) {
        $_id = get_option('page_for_posts');
    }

    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb', $_id) : '';
    if (!empty($_GET['s'])) {
        $is_breadcrumb = null;
    }

    if (empty($is_breadcrumb) && $breadcrumb_show == 1) {

        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image', $_id) : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $_id) : '';

        // get_theme_mod
        $bg_img = get_theme_mod('breadcrumb_bg_img');
        $breadcrumb_switch = get_theme_mod('breadcrumb_switch', true);
        $breadcrumb_text_switch = get_theme_mod('breadcrumb_text_switch', true);
        $breadcrumb_title_switch = get_theme_mod('breadcrumb_title_switch', true);

        if ($hide_bg_img && empty($_GET['s'])) {
            $bg_img = '';
        } else {
            $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;
        } ?>


        <script>
            jQuery(document).ready(function($) {
                var breadcrumb_shop = "<?php echo esc_js($title); ?>";

                if ($('body').hasClass('woocommerce')) {
                    $('.banner--inner__breadcrumb > [property="itemListElement"]:nth-child(2) [property="name"]').text(breadcrumb_shop);
                }
            });
        </script>

        <?php if (!empty($breadcrumb_switch)) : ?>
            <section style="background: url('<?php echo esc_url($bg_img); ?>') left bottom / cover no-repeat;" class="banner--inner">
                <div class="container">
                    <div class="row align-items-center gy-4">
                        <?php if (!empty($breadcrumb_title_switch)) : ?>
                            <div class="col-12">
                                <div class="banner--inner__content">
                                    <h2><?php echo wp_kses_post($title); ?></h2>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($breadcrumb_text_switch)) : ?>
                            <div class="col-12">
                                <div class="banner--inner__breadcrumb d-flex justify-content-start">

                                    <?php if (function_exists('bcn_display')) {
                                        bcn_display();
                                    } ?>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>






        <!-- page title area end -->
    <?php
    }
}

add_action('bentox_before_main_content', 'bentox_breadcrumb_func');

// bentox_search_form
function bentox_search_form()
{
    ?>
    <div class="search-wrapper p-relative transition-3 d-none">
        <div class="search-form transition-3">
            <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                <input type="search" name="s" value="<?php print esc_attr(get_search_query()) ?>" placeholder="<?php print esc_attr__('Enter Your Keyword', 'sportsmi'); ?>">
                <button type="submit" class="search-btn"><i class="far fa-search"></i></button>
            </form>
            <a href="javascript:void(0);" class="search-close"><i class="far fa-times"></i></a>
        </div>
    </div>
<?php
}

add_action('bentox_before_main_content', 'bentox_search_form');
