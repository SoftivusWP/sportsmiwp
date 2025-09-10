<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bentox
 */

// info
$header_button_switch = get_theme_mod('header_button_switch', false);
$header_user_switch = get_theme_mod('header_user_switch', false);
$bentox_cart_switch = get_theme_mod('bentox_cart_switch', false);
$choose_style_button = get_theme_mod('choose_style_button', false);
$choose_style_login_button = get_theme_mod('choose_style_login_button', false);


// contact button
$loginbtn_text = get_theme_mod('loginbtn_text', __('Sign In', 'sportsmi'));
$loginbtn_link = get_theme_mod('loginbtn_link', __('', 'sportsmi'));
$header_button_text = get_theme_mod('header_button_text', __('Button', 'sportsmi'));
$header_button_link = get_theme_mod('header_button_link', __('#', 'sportsmi'));


// header right
$bentox_header_right = get_theme_mod('bentox_header_right', false);
$bentox_menu_col = $bentox_header_right ? 'col-xxl-7 col-xl-7 col-lg-8 d-none d-lg-block' : 'col-xxl-10 col-xl-10 col-lg-9 d-none d-lg-block text-end';

?>

<!-- header area start -->

<?php
$bentox_preloader = get_theme_mod('bentox_preloader', false);
$preloader_text = get_theme_mod('preloader_text', '');
$preloader_image = get_theme_mod('preloader_image', '');
$bentox_backtotop = get_theme_mod('bentox_backtotop', false);

?>

<style>
	.ctn-preloader .animation-preloader .txt-loading .letters-loading::before {
		animation-delay: calc(var(--char-index) * 0.2s);
	}
</style>

<?php if (!empty($bentox_preloader)) : ?>
   <!-- pre loader area start -->
   <div id="preloader">
      <div id="ctn-preloader" class="ctn-preloader" style="--char-count: <?php echo strlen($preloader_text); ?>;">
         <div class="animation-preloader">
            <?php if (!empty($preloader_image)) : ?>
               <div class="preloader_image mb-40 text-center">
                  <img
                     src="<?php echo esc_url($preloader_image); ?>"
                     alt="<?php echo esc_attr__('Loading...', 'sportsmi'); ?>"
                     class="preloader-custom-image">
               </div>
            <?php else : ?>
               <div class="spinner"></div>
            <?php endif; ?>
            <div class="txt-loading">
               <?php
               if (!empty($preloader_text)) :
                  $chars = str_split($preloader_text);
                  foreach ($chars as $index => $char) :
                     if (trim($char) !== '') : ?>
                        <span data-text-preloader="<?php echo esc_attr($char); ?>" class="letters-loading" style="--char-index: <?php echo esc_attr($index); ?>;">
                           <?php echo esc_html($char); ?>
                        </span>
                  <?php endif;
                  endforeach; ?>
               <?php else : ?>
                  <span data-text-preloader="L" class="letters-loading">
                     L
                  </span>
                  <span data-text-preloader="O" class="letters-loading">
                     O
                  </span>
                  <span data-text-preloader="A" class="letters-loading">
                     A
                  </span>
                  <span data-text-preloader="D" class="letters-loading">
                     D
                  </span>
                  <span data-text-preloader="I" class="letters-loading">
                     I
                  </span>
                  <span data-text-preloader="N" class="letters-loading">
                     N
                  </span>
                  <span data-text-preloader="G" class="letters-loading">
                     G
                  </span>
               <?php endif; ?>
            </div>
         </div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
   </div>
   <!-- pre loader area end -->
<?php endif; ?>

<?php if (!empty($bentox_backtotop)) : ?>
   <!-- back to top start -->
   <!-- scroll to top -->
   <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
         <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
   </div>
   <!-- back to top end -->
<?php endif; ?>

<header class="header header--secondary">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <nav class="nav">
               <div class="nav__content">
                  <div class="nav__logo">
                     <?php sportsmi_header_logo(); ?>
                  </div>
                  <div class="nav__menu">
                     <div class="nav__menu-logo d-flex d-xl-none">
                        <!--<a href="index.html" class="text-center hide-nav">-->
                        <?php sportsmi_header_logo(); ?>
                        <!--</a>-->
                        <a href="javascript:void(0)" class="nav__menu-close">
                           <i class="fa-solid fa-xmark"></i>
                        </a>
                     </div>

                     <?php bentox_header_menu(); ?>

                     <li class="nav__menu-item d-flex flex-column d-md-none mt-4">
                        <?php if (!empty($header_button_switch)) :
                           $button_class = 'cmn-button align-items-center';
                           if ($choose_style_button == 'style_two') {
                              $button_class .= ' cmn-button--secondary';
                           }
                        ?>
                           <a href="<?php echo esc_url($header_button_link); ?>" class="<?php echo esc_attr($button_class); ?>">
                              <?php echo esc_html($header_button_text); ?>
                           </a>
                        <?php endif; ?>
                     </li>
                     <!-- <div class="social">
                        <a href="#">
                           <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#">
                           <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#">
                           <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                           <i class="fa-brands fa-square-instagram"></i>
                        </a>
                     </div> -->

                  </div>



                  <?php if (!empty($bentox_cart_switch) || !empty($header_button_switch) || !empty($header_user_switch)) : ?>
                     <div class="nav__uncollapsed">
                        <?php if (!empty($bentox_cart_switch)) : ?>
                           <?php
                           // Check if WooCommerce is active
                           if (class_exists('WooCommerce')) :
                           ?>
                              <a href="<?php echo wc_get_cart_url(); ?>" class="cart">
                                 <i class="fa-solid fa-cart-shopping"></i>
                                 <span class="card_count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                              </a>
                           <?php endif; ?>
                        <?php endif; ?>

                        <div class="nav__uncollapsed-item">
                           <?php if (!empty($header_button_switch)) :
                              $button_class = 'cmn-button align-items-center lh-sm d-none d-sm-flex';
                              if ($choose_style_button == 'style_two') {
                                 $button_class .= ' cmn-button--secondary';
                              }
                           ?>
                              <a href="<?php echo esc_url($header_button_link); ?>" class="<?php echo esc_attr($button_class); ?>">
                                 <?php echo esc_html($header_button_text); ?>
                              </a>
                           <?php endif; ?>

                           <?php
                           // Display User Menu and Login/Register Links
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
                                    $button_url = !empty(esc_url($loginbtn_link)) ? esc_url($loginbtn_link) : wp_login_url();
                                    $button_text = !empty(esc_html($loginbtn_text)) ? esc_html($loginbtn_text) : __('Login', 'sportsmi');

                                    $button_class = 'cmn-button btn-login align-items-center';
                                    if ($choose_style_login_button == 'style_two') {
                                       $button_class .= ' cmn-button--secondary';
                                    }

                                    echo '<div class="pricing__card-cta">';
                                    echo '<a href="' . esc_url($button_url) . '" class="' . esc_attr($button_class) . '">';
                                    echo '<span class="fa fa-sign-in d-sm-none"></span><span class="d-none d-sm-flex lh-sm fw-bold">' . esc_html($button_text) . '</span>';
                                    echo '</a>';
                                    echo '</div>';
                                 }
                              }
                           endif;
                           ?>
                        </div>
                     </div>
                  <?php else : ?>
                     <style>
                        .nav__uncollapsed {
                           display: none;
                        }
                     </style>
                  <?php endif; ?>
                  <button class="nav__bar d-block d-xl-none">
                     <span class="icon-bar top-bar"></span>
                     <span class="icon-bar middle-bar"></span>
                     <span class="icon-bar bottom-bar"></span>
                  </button>
               </div>
            </nav>
         </div>
      </div>
   </div>
   <div class="backdrop"></div>
</header>




<!-- header area end -->