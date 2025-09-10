<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bentox
 */

get_header();
?>

<section class="error__area section">
   <div class="container">
      <div class="row justify-content-center">
         <?php 
            $bentox_404_bg = get_theme_mod('bentox_404_bg',get_template_directory_uri() . '/assets/images/error.png');
            $bentox_error_title = get_theme_mod('bentox_error_title', __('Oops! Page Not Found', 'sportsmi'));
            $bentox_error_link_text = get_theme_mod('bentox_error_link_text', __('Back To Home', 'sportsmi'));
            $bentox_error_desc = get_theme_mod('bentox_error_desc', __('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'sportsmi'));
         ?>
         <div class="col-sm-10 col-xl-8">
            <div class="error__thumb">
               <img src="<?php echo esc_url($bentox_404_bg); ?>" alt="<?php print esc_attr__('Error 404','sportsmi'); ?>">
            </div>
         </div>
         <div class="col-lg-6">
            <div class="error__inner-content text-center">
               <h2 class="error__title"><?php print esc_html($bentox_error_title);?></h2>
               <p><?php print esc_html($bentox_error_desc);?></p>
               <div class="section__cta">
                  <a href="<?php print esc_url(home_url('/'));?>" class="tp-btn cmn-button"><?php print esc_html($bentox_error_link_text);?></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<?php
get_footer();
