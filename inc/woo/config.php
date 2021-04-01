<?php

// Theme Support
add_theme_support('woocommerce');

add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');


// add_filter( 'wp_nav_menu_objects', function( $items, $args) {

//     return array_filter( $items, function( $item ) {
//         $urls = array(
//             home_url('cart/'),
//             home_url('checkout/'),
//             home_url('my-account/'),
//         );

//         if(in_array($item->url, $urls)){
//             return !is_user_logged_in();
//         }

//         return true;
//     });

// }, 10, 2 );




// Declaring Theme Support 
// add_action( 'after_setup_theme', function () {
    // add_theme_support( 'woocommerce', array(
    //     'thumbnail_image_width' => 250,
    //     'single_image_width'    => 500,

    //     'product_grid'          => array(
    //         'default_rows'    => 3,
    //         'min_rows'        => 2,
    //         'max_rows'        => 8,
    //         'default_columns' => 4,
    //         'min_columns'     => 3,
    //         'max_columns'     => 5,
    //     ),
    // ));
// });






// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );