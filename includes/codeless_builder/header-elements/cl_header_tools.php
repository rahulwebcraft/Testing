<?php 
    
    extract( $element['params'] ); 

    global $cl_from_element;
    $cl_from_element['search_type'] = $search_type;
    
    if( !isset( $cl_from_element['sidenav_button'] ) )
        $cl_from_element['sidenav_button'] = $side_nav_button;
?>


<div class="cl-header__tools">
    

    <?php if( ( int ) $search_button ): ?>
       
        <div class="cl-header__tool--search cl-header__tool cl-header__tool--search-style-<?php echo esc_attr($search_type) ?>">

            

            <?php if( $search_type == 'box' ): ?>
                <a href="#" id="cl-header__search-btn" class="cl-header__tool__link"><i class="cl-icon-magnify"></i></a>
                <div class="cl-header__box cl-header__box--search cl-submenu cl-hide-on-mobile ">
                    <?php the_widget( 'WP_Widget_Search', 'title=', array('before_widget' => '<div class="cl-header__search-form">', 'after_widget' => '</div>' ) ); ?>
                </div><!-- .cl-header__box--search -->
            <?php endif; ?>

            <?php if( $search_type == 'inline' ): ?>
                <?php the_widget( 'WP_Widget_Search', 'title=', array('before_widget' => '<div class="cl-header__search-form">', 'after_widget' => '</div>' ) ); ?>
            <?php endif; ?>

        </div>

    <?php endif; ?>
    
    
    <?php if( ( int ) $side_nav_button ): ?>

        <div class="cl-header__tool--side-menu cl-header__tool">
            <a href="#" class="cl-header__tool__link">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>

    <?php endif; ?>


    <?php if(  isset( $shop_cart_button ) && ( int ) $shop_cart_button && function_exists( 'is_woocommerce' ) ): ?>

        <div class="cl-header__tool--shop cl-header__tool">
            
            <?php 
                global $woocommerce;
                $cart_url = wc_get_cart_url();
            ?>

            <a href="<?php echo esc_url($cart_url) ?>" class="cl-header__tool-link">
                <i class="cl-icon-cart"></i>
                <span class="cart-total cl-cart-total-fragment"><?php echo WC()->cart->get_cart_contents_count() ?> <?php echo esc_html__( 'Item(s)', 'regn' ) ?> -</span>
               
                <span class="cart-total-sum cl-cart-total-sum-fragment">&nbsp;<?php echo WC()->cart->get_cart_total() ?></span>
            </a>

            <?php if( ! is_cart() && ! is_checkout() ): ?>

                <div id="site-header-cart" class="cl-submenu cl-hide-on-mobile">
                        <?php the_widget( 'WC_Widget_Cart', 'title=', array('before_widget' => '<div class="header_cart">', 'after_widget' => '</div>' ) ); ?>
                </div><!-- #site-header-cart -->

            <?php endif; ?>

        </div>

    <?php endif; ?>
    

</div>