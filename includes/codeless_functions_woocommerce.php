<?php

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open' );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating' );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close' );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );


// Build new PRODUCT (CONTENT-PRODUCT)
add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woo_loop_product_image_open' );
    add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' );
    add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );
    add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woo_loop_product_overlay_open' );
        add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woo_overlay_buttons' );
            add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart' );
            add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woo_view_details_link' );
        add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woo_close_overlay_buttons' ); // Overlay Buttons Close
    add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woo_close_product_overlay' ); // Overlay Close
add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woo_close_product_image' ); // Product Image Wrapper Close

add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woo_title_wrapper' );
    add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open' );
        add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
    add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close' );
    add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_price' );
add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woo_close_title_wrapper' ); // Title Wrapper Close

add_filter( 'woocommerce_product_loop_title_classes', 'codeless_woo_add_class_loop_title' );
function codeless_woo_add_class_loop_title( $class ){
    $class .= ' cl-custom-font';
    return $class;
}

function codeless_woo_title_wrapper(){
    ?>
    <div class="cl-woo-product__title-wrapper">
    <?php
}
function codeless_woo_close_title_wrapper(){
    ?>
    </div>
    <?php
}


function codeless_woo_loop_product_image_open(){
    ?>
    <div class="cl-woo-product__wrapper">
    <?php
}
function codeless_woo_close_product_image(){
    ?>
    </div>
    <?php
}


function codeless_woo_loop_product_overlay_open(){
    ?>
    <div class="cl-woo-product__overlay">
    <?php
}
function codeless_woo_close_product_overlay(){
    ?>
    </div>
    <?php
}


function codeless_woo_overlay_buttons(){
    ?>
    <div class="cl-woo-product__overlay-buttons">
    <?php
}
function codeless_woo_close_overlay_buttons(){
    ?>
    </div>
    <?php
}

function codeless_woo_view_details_link(){
    ?>
    <a href="<?php echo get_permalink() ?>" class="cl-view-details"><?php esc_html_e( 'View Details', 'regn' ); ?></a>
    <?php
}

add_filter( 'woocommerce_format_sale_price', 'codeless_woo_format_sale_price', 999, 3 );
function codeless_woo_format_sale_price( $price, $regular_price, $sale_price ) {
	$price = '<del>' . ( is_numeric( $regular_price ) ? wc_price( $regular_price ) : $regular_price ) . '</del> <ins>' . esc_html__('NOW', 'regn') . ' ' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) : $sale_price ) . '</ins>';
	return $price;
}

// function that generate woocommerce plugin content
function codeless_woocommerce_content(){
	woocommerce_content();
}


function codeless_woo_product_class($classes){

    if( codeless_get_mod( 'shop_animation', 'bottom-t-top' ) != 'none' && !is_single() ){
        $classes[] = 'cl-animate-on-visible';
        $classes[] = codeless_get_mod( 'shop_animation', 'bottom-t-top' );
    }
    return $classes;
}
add_filter('woocommerce_post_class', 'codeless_woo_product_class');


if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'codeless_cart_update_count' );
} else {
	add_filter( 'add_to_cart_fragments', 'codeless_cart_update_count' );
}

function codeless_cart_update_count( $fragments ){
	ob_start();
	echo '<span class="cl-cart-total-fragment cart-total">' . WC()->cart->get_cart_contents_count() . ' '.esc_html__('Item(s)', 'regn').' - </span>';

    $fragments['.cl-cart-total-fragment'] = ob_get_clean();
    
    ob_start();
	echo '<span class="cl-cart-total-sum-fragment cart-total-sum">&nbsp;' . WC()->cart->get_cart_total() .'</span>'; 

    $fragments['.cl-cart-total-sum-fragment'] = ob_get_clean();


	return $fragments;
}


/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
        if( codeless_get_page_layout() == 'fullwidth' )
            return 4; // 3 products per row
        else
            return 3;
        
	}
}

?>