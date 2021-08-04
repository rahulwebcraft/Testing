<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$operation = 'recent';
if( isset( $_GET['tabbed_woo_op'] ) )
    $operation = esc_attr( $_GET['tabbed_woo_op'] );
?>

<div class="cl-element cl-tabbed-woo">

    <div class="cl-tabbed-woo__wrapper">

        <ul class="cl-tabbed-woo__nav">
            <?php
            
            $map = array(
                'recent' => esc_html__( 'NEW ARRIVALS', 'regn'),
				'featured' => esc_html__( 'FEATURED', 'regn'),
				'top_sellers' => esc_html__( 'BESTSELLERS', ''),
            );
            
            foreach( $map as $option => $label ): $i = $i+1; $active = ''; 
                if( $operation ==  $option )
                    $active = 'active';
            ?>

				<li class="<?php echo esc_attr( $active ) ?>"><a data-load="<?php echo esc_attr( $option ) ?>" href="#" class="h5"><?php echo esc_attr( $label ); ?></a></li>

		    <?php endforeach; ?>
           
        </ul>

        <div class="cl-tabbed-woo__tab">

            <?php

            if( $operation == 'featured' )
                echo do_shortcode( '[featured_products per_page="8" columns="4"]' );
            else if( $operation == 'top_sellers' )
                echo do_shortcode( '[best_selling_products per_page="8" columns="4"]' );
            else if( $operation == 'recent' )
                echo do_shortcode( '[recent_products per_page="8" columns="4"]' );
                
            ?>
        </div>

        </div>

</div>