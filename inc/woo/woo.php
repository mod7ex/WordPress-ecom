<?php

require_once('config.php');


// Filters
add_filter('woocommerce_show_page_title', function($bool){
    return false;
});


// Remove actions

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);




// Add actions

add_action('woocommerce_before_main_content', function() {
    get_template_part('template-parts/archive-categories');
});

add_action('woocommerce_before_main_content', function(){
    echo '<div id="primary" class="content-area container-content"><main id="main" class="site-main" role="main">';
}, 10);

add_action('woocommerce_after_main_content', function(){
    echo '</main></div>';
}, 10);

add_action('woocommerce_before_shop_loop', function(){
    echo '<div class="container-content">
            <div class="product-nav">
                <div class="filter-search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M6 18h-2v5h-2v-5h-2v-3h6v3zm-2-17h-2v12h2v-12zm11 7h-6v3h2v12h2v-12h2v-3zm-2-7h-2v5h2v-5zm11 14h-6v3h2v5h2v-5h2v-3zm-2-14h-2v12h2v-12z" />
                    </svg>
                </div>';
});


add_action('woocommerce_before_shop_loop', function(){
    
    echo '</div>';
    
    get_sidebar();

    echo '</div>';

}, 35);

/* ******************************************************************************* */