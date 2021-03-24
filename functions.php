<?php


require_once(get_template_directory() . '/inc/config.php');

require_once(AP . 'inc/enqueue.php');

require_once(AP . 'inc/theme-support.php');

if(class_exists('WooCommerce')) {
    require_once(AP . 'inc/woo.php');
}