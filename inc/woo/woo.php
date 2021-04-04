<?php

require_once 'config.php';

// Filters
add_filter('woocommerce_show_page_title', function ($bool) {
	return false;
});

// Remove actions

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

// Add actions

add_action('woocommerce_before_main_content', function () {
	if (is_archive()) {
		get_template_part('template-parts/archive-categories');
	}
});

add_action('woocommerce_before_main_content', function () {
	echo '<div id="primary" class="content-area container-content"><main id="main" class="site-main" role="main">';
}, 10);

add_action('woocommerce_after_main_content', function () {
	echo '</main></div>';
}, 10);

add_action('woocommerce_before_shop_loop', function () {
	echo '<div class="container-content">
	<div class="product-nav">
	<div class="filter-search">
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
	<path
	d="M6 18h-2v5h-2v-5h-2v-3h6v3zm-2-17h-2v12h2v-12zm11 7h-6v3h2v12h2v-12h2v-3zm-2-7h-2v5h2v-5zm11 14h-6v3h2v5h2v-5h2v-3zm-2-14h-2v12h2v-12z" />
	</svg>
	</div>';
}, 25);

add_action('woocommerce_before_shop_loop', function () {

	echo '</div>';

	get_sidebar();

	echo '</div>';

}, 35);

/* ******************************************************************************* */

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_action('woocommerce_before_shop_loop_item', function ($size = 'shop_catalog') {
	global $_wp_additional_image_sizes;
	global $post;

	$image_size = apply_filters('single_product_archive_thumbnail_size', 'woocommerce_thumbnail');
	$url = null;

	$w = $_wp_additional_image_sizes[$image_size]['width'];
	$h = $_wp_additional_image_sizes[$image_size]['height'];

	if (has_post_thumbnail()) {

		$url = get_the_post_thumbnail_url($post->ID, $image_size);

	} elseif (wc_placeholder_img_src()) {

		$url = wc_placeholder_img($image_size);

	}

	echo '<a class="product-link" href="' . get_the_permalink() . '" style="display: inline-block;width: ' . $w . 'px; height: ' . $h . 'px;">';
	echo '<div class="product-item" style="width: ' . $w . 'px; height: ' . $h . 'px; background-image: url(' . $url . ');">';
	echo '<div class="overlay" style="width: ' . $w . 'px; height: ' . $h . 'px;">';
}, 10);

add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash');
// add_action('woocommerce_before_shop_loop_item_title', '');

add_action('woocommerce_after_shop_loop_item', function () {

	echo '</div></div></a>';

}, 5);

add_action('woocommerce_after_shop_loop_item', function () {

	echo '<a class="prod-title" href="' . get_the_permalink() . '"><h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2></a>';

}, 10);

add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_rating', 10);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_filter('woocommerce_post_class', function ($classes, $product) {
	if (is_product()) {
		return $classes;
	}

	return array();
}, 10, 2);

/* ************************************************************************************************* */

// remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
// remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

add_action('woocommerce_before_single_product_summary', function () {
	echo '<div class="product-main-area">';
}, 5);

add_action('woocommerce_single_product_summary', function () {
	echo '</div>';
}, 70);