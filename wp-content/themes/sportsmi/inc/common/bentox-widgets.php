<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bentox_widgets_init() {



    /**
     * blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'sportsmi' ),
        'id'            => 'blog-sidebar',
        'description'          => esc_html__( 'Set Your Blog Widget', 'sportsmi' ),
        'before_widget' => '<div id="%1$s" class="sidebar__widget mb-60 %2$s sidebar__single">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="sidebar__widget-title">',
        'after_title'   => '</h5>',
    ] );

    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // footer default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer %1$s', 'sportsmi' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer column %1$s', 'sportsmi' ), $num ),
            'before_widget' => '<div id="%1$s" class="footer__single footer-box footer__widget footer-col-'.$num.' %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="footer__widget-title">',
            'after_title'   => '</h5>',
        ] );
    }






}
add_action( 'widgets_init', 'bentox_widgets_init' );