<?php

// Declaring Theme Support 
add_action( 'after_setup_theme', function () {
    add_theme_support( 'woocommerce' );

    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ));
});


// add_filter( 'woocommerce_enqueue_styles', function ( $enqueue_styles ) {
// 	unset( $enqueue_styles['woocommerce-general'] );
// 	unset( $enqueue_styles['woocommerce-layout'] );	
// 	unset( $enqueue_styles['woocommerce-smallscreen'] );
// 	return $enqueue_styles;
// });

// add_filter('woocommerce_show_page_title', function(){
// });

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', function () {
    echo '<section id="main">';
});

add_action('woocommerce_after_main_content', function () {
    echo '</section>';
});

// Theme Support
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');