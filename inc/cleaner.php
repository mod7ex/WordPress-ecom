<?php



add_filter('removable_query_args', function($args) {
    array_push($args, 'add-to-cart');
    array_push($args, 'clear_cart_content');
    array_push($args, '_clear_cart_nonce');
    return $args;
}, 9000);