<?php

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


// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Theme Support
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');


// Declaring Theme Support 
add_action( 'after_setup_theme', function () {
    add_theme_support( 'woocommerce' );

    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 250,
        'single_image_width'    => 500,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 3,
            'max_columns'     => 5,
        ),
    ));
});



remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

add_action('woocommerce_before_shop_loop', function(){
    echo '<div class="filter-search">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M6 18h-2v5h-2v-5h-2v-3h6v3zm-2-17h-2v12h2v-12zm11 7h-6v3h2v12h2v-12h2v-3zm-2-7h-2v5h2v-5zm11 14h-6v3h2v5h2v-5h2v-3zm-2-14h-2v12h2v-12z"/></svg>
        </div>';
}, 9);

add_action('woocommerce_archive_description', function() {
    $image = get_theme_file_uri('assets/img/category.svg');

    if ( is_product_category() ){
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
        $img = wp_get_attachment_url( $thumbnail_id );
        if($img){
            $image = $img;
        }

        $output = '<div><h1>' . $cat->name . '</h1>' . '<h3>' . $cat->description . '</h3>' . '</div>';
    }else{
        $output = '<div><h1>SHOP</h1><h3>The e-commerce leaders</h3></div>';
    }

    echo '<div id="category-desc" style="background-image: url(' . $image . ');"><div class="overlay">';
    echo $output;
    echo '</div></div>';
});


/*
// Product Content

add_filter('woocommerce_post_class', function ($classes) {
    return array();
}); 

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


add_action('woocommerce_before_shop_loop_item', function() {
    echo '<a href="' . get_the_permalink() . '" class="product-link">';
});

add_action('woocommerce_before_shop_loop_item_title', function ( $size = 'shop_catalog') { 
    global $post; 

    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size ); 

    global $_wp_additional_image_sizes; 
    $w = $_wp_additional_image_sizes['woocommerce_thumbnail']['width'];
    $h = $_wp_additional_image_sizes['woocommerce_thumbnail']['height'];

    // $data = wc_get_image_size('woocommerce_thumbnail');
    // $w = $data['width'];
    // $h = $data['height'];

    if ( has_post_thumbnail() ) { 
        $url = get_the_post_thumbnail_url( $post->ID, $image_size); 
    } else{
        $url = wc_placeholder_img_src( $image_size ); 
    }

    echo '<div class="product-item" style="background-image: url(' . $url . '); width: ' . $w . 'px; height: ' . $h . 'px;"><div class="overlay">';
}, 10);



add_action('woocommerce_before_shop_loop_item_title', function() {
    echo '<div class="top"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 4.248c-3.148-5.402-12-3.825-12 2.944 0 4.661 5.571 9.427 12 15.808 6.43-6.381 12-11.147 12-15.808 0-6.792-8.875-8.306-12-2.944z"/></svg>';
}, 10);

add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

add_action('woocommerce_before_shop_loop_item_title', function(){
    echo '</div><div>';
}, 10);

// add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10);

add_action('woocommerce_before_shop_loop_item_title', function(){
echo '</div>';
}, 10);


add_action('woocommerce_after_shop_loop_item', function(){
    echo '</div></div></a>';
}, 5);

*/