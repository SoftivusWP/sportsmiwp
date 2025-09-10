<?php 

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bentox
 */

$categories = get_the_terms( $post->ID, 'category' );
$bentox_blog_date = get_theme_mod( 'bentox_blog_date', true );
$bentox_blog_comments = get_theme_mod( 'bentox_blog_comments', true );
$bentox_blog_author = get_theme_mod( 'bentox_blog_author', true );
$bentox_blog_cat = get_theme_mod( 'bentox_blog_cat', false );

?>


<div class="postbox__meta">
    <?php if ( !empty($bentox_blog_author) ): ?>
    <span><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><i class="far fa-user"></i> <?php print get_the_author();?></a></span>
    <?php endif;?>

    <?php if ( !empty($bentox_blog_cat) ): ?>
    <?php if ( !empty( $categories[0]->name ) ): ?>  
    <span><i class="icon_tag_alt"></i> <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a> </span>
    <?php endif;?>
    <?php endif;?>

    <?php if ( !empty($bentox_blog_date) ): ?>
    <span><i class="far fa-calendar-check"></i> <?php the_time( get_option('date_format') ); ?> </span>
    <?php endif;?>

    <?php if ( !empty($bentox_blog_comments) ): ?>
    <span><a href="<?php comments_link();?>"><i class="far fa-comment"></i> <?php comments_number();?></a></span>
    <?php endif;?>
</div>