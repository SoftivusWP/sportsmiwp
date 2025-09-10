<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage tpcore
 */

get_header();
?>

<section class="games__details sec-mar">
	<?php if (class_exists('\Elementor\Plugin') && is_a(\Elementor\Plugin::$instance, '\Elementor\Plugin') && \Elementor\Plugin::$instance->documents->get($post->ID)->is_built_with_elementor()) : ?>
		<div class="container-fluid custom-container">
	<?php else : ?>
		<div class="container">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post();
					the_content();
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	<?php endif; ?>
</section>

<?php get_footer(); ?>
