<?php


add_action('after_setup_theme', function(){
    
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

});