<?php

$ver = wp_get_theme()->get('Version');

add_action('wp_enqueue_scripts', function() use ($ver) {
    // style
    wp_register_style('theme-style', get_theme_file_uri('style.css'), array(), $ver);
    wp_register_style('main', get_theme_file_uri('assets/css/style.css'), array(), $ver);

    // scripts
    wp_register_script('main', get_theme_file_uri('assets/js/main.js'), array(), $ver, true);
    
    wp_enqueue_style('theme-style');
    wp_enqueue_style('main');
    wp_enqueue_script('main');
});