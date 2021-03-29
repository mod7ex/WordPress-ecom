<?php

function dd($var) {
    add_action('wp_head', function() use ($var){
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die;
    });

}

function pd($var) {
    add_action('wp_head', function() use ($var){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        die;
    });

}

require_once(get_template_directory() . '/inc/config.php');

require_once(AP . 'inc/enqueue.php');

require_once(AP . 'inc/theme-support.php');

if(class_exists('WooCommerce')) {
    require_once(AP . 'inc/woo.php');
}