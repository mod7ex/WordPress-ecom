<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function is_selected($orderby, $id){
    return !empty(selected( $orderby, $id, false ));
}

?>

<form class="woocommerce-ordering" method="get" id="orderby">

    <div class="dropdown">
        <div class="select hidden">
            <svg class="ic_triangle_svg" width="24" height="24" viewBox="0 0 20 9" role="presentation">
                <path
                    d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z">
                </path>
            </svg>

            <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
            <span data-orderby="<?php echo esc_attr( $id ); ?>"
                <?php if(is_selected($orderby, $id)){echo 'class="selected"';} ?>>
                <?php echo esc_html( $name ); ?>
            </span>

            <?php
                if(is_selected($orderby, $id)){
                    $nm = $name;
                }
            ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div>
        <span class="active">
            <span><?php echo esc_html( $nm ); ?></span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24">
                    <path
                        d="M23.677 18.52c.914 1.523-.183 3.472-1.967 3.472h-19.414c-1.784 0-2.881-1.949-1.967-3.472l9.709-16.18c.891-1.483 3.041-1.48 3.93 0l9.709 16.18z" />
                </svg>
            </span>
        </span>
    </div>

    <input type="hidden" name="orderby" />

    <input type="hidden" name="paged" value="1" />

    <?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>

</form>