<?php

/**
 * Theme Support.
 *
 */
add_action('after_setup_theme', function(){
    
    add_theme_support('post-thumbnails');
    add_image_size('post_image', 1024, 500, true);

    add_theme_support('custom-logo', array(
        'height'                => 100,
        'width'                 => 100,
        'flex-height'           => true,
        'flex-width'            => true,
        'header-text'           => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo'  => true, 
    ));

    register_nav_menus(array(
        'primary'       => __( 'Primary menu', DOMAIN),
        'secondary'     => __( 'Secondary menu', DOMAIN),
        'footer'        => __( 'Footer menu', DOMAIN),
    ));

    add_theme_support('custom-header', array(
        'default-image'          => get_theme_file_uri('assets/img/showcase.svg'),
        'width'                  => 0,
        'height'                 => 0,
        'flex-height'            => true,
        'flex-width'             => true,
        'uploads'                => true,
        'random-default'         => false,
        'header-text'            => true,
        'default-text-color'     => '',
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    ));

    unregister_post_type('post');
});


/**
 * Register our sidebars and widgetized areas.
 *
 */
add_action('widgets_init', function() {
    register_sidebar(array(
        'name'          => 'Page Sidebar',
        'id'            => 'sidebar-page',
        'class'         => 'widget',
        'before_widget' => '<div class="widget-item">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
} );