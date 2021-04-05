<?php

// Theme Support
add_theme_support('woocommerce');

add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');


add_filter( 'wp_nav_menu_objects', function( $items, $args) {

    return array_filter( $items, function( $item ) {
        $urls = array(
            home_url('cart/'),
            home_url('checkout/'),
            home_url('my-account/'),
        );

        if(in_array($item->url, $urls)){
            return !is_user_logged_in();
        }

        return true;
    });

}, 10, 2 );



// add_filter('admin_init', function(){
//     register_setting('general', 'store_phone_number');

//     add_settings_field('store_phone_num', '<label for="store_phone_number">' . __('Store Phone Number', 'woocommerce') . '</label>', function(){

//         $store_phone_number = get_option('store_phone_number');
//         echo '<input type="text" name="store_phone_number" id="store_phone_number" value="' . $store_phone_number . '" class="regular-text">';

//     }, 'general');
// });




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



add_filter( 'woocommerce_add_to_cart_fragments', function ( $fragments ) {
	global $woocommerce;

	ob_start();

	?>

<a class="modex" href="<?php echo esc_url(wc_get_cart_url()); ?>"
    title="<?php _e('View your shopping cart', 'woothemes'); ?>">

    <?php echo $woocommerce->cart->get_cart_contents_count(); ?>

</a>
<?php

	$fragments['a.modex'] = ob_get_clean();
	return $fragments;
});



add_action('woocommerce_before_cart_collaterals', function(){
    ob_start();

    ?>
<div>
    <form action="" method="GET">

        <input type="hidden" name="clear_cart_content" value="clear">
        <?php wp_nonce_field('clear_cart_action', '_clear_cart_nonce', false); ?>

        <button class="button">clear cart</button>
    </form>
</div>
<?php

echo ob_get_clean();
});



add_action( 'wp_loaded', function () {
    if(isset($_GET['_clear_cart_nonce']) && !WC()->cart->is_empty()){

        if(!wp_verify_nonce($_GET['_clear_cart_nonce'], 'clear_cart_action')) {
            wc_add_notice( 'Some thing Went Wrong please try later!', 'error' );
            return;
        }
        
        if ( isset( $_GET['clear_cart_content'] ) &&  $_GET['clear_cart_content'] == 'clear' ) {
            WC()->cart->empty_cart();
        }
        
    }
});


add_filter('woocommerce_general_settings', function ($settings) {
    $key = 0;

    foreach( $settings as $setting ){
        $new_settings[$key] = $setting;
        $key++;

        // Inserting array just after the post code in "Store Address" section
        if($setting['id'] == 'woocommerce_store_postcode'){
            $new_settings[$key] = array(
                'title'    => __('Busniss Phone'),
                'desc'     => __('Optional phone number of your business office'),
                'id'       => 'woocommerce_store_phone',
                'default'  => '',
                'type'     => 'text',
                'desc_tip' => true, // or false
            );
            $key++;

            $new_settings[$key] = array(
                'title'    => __('Busniss E-mail'),
                'desc'     => __('Optional E-mail of your business office'),
                'id'       => 'woocommerce_store_email',
                'default'  => '',
                'type'     => 'email',
                'desc_tip' => true, // or false
            );
            $key++;
        }
    }

    return $new_settings;
});