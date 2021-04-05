<?php

function dd($var, $die = false) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    if($die) die;
}

function pd($var, $die = false) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    if($die) die;
}

require_once(get_template_directory() . '/inc/config.php');

require_once(AP . 'inc/enqueue.php');

require_once(AP . 'inc/theme-support.php');

require_once(AP . 'inc/cleaner.php');

if(class_exists('WooCommerce')) {

    require_once(AP . 'inc/woo/woo.php');
    
}