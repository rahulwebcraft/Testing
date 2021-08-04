<?php

$args = array(
    "recommended" => "no",
    "title" => esc_attr__( "Price List Title", 'regn' ),
    "price_currency" => '$',
    'price' => '9',
    'price_cent' => '99',
    'price_period' => 'monthly',
    'button_text' => esc_attr__('Sign Up', 'regn'),
    'button_link' => '#'
);

extract(shortcode_atts($args, $atts));

?>

<div class="cl-element cl-price-list cl-price-list--recommended-<?php echo esc_attr( $recommended ) ?>">
    <div class="cl-price-list__wrapper">
        <?php if( $recommended == 'yes' ): ?>
        <div class="cl-price-list__recommended">
            <i class="cl-icon-star"></i>
            <span><?php echo esc_html__('Recommend', 'regn') ?></span>
        </div>
        <?php endif; ?>
        <div class="cl-price-list__header">
            <h4><?php echo esc_html( $title ); ?></h4>
        </div>
        <span class="cl-price-list__divider"></span>
        <div class="cl-price-list__price">
            <sup class="cl-price-list__price-currency"><?php echo esc_html( $price_currency ) ?></sup>
            <span class="cl-price-list__price-main"><?php echo esc_html( $price ) ?></span>
            <sup class="cl-price-list__price-cent"><?php echo esc_html( $price_cent ) ?></span>
            <span class="cl-price-list__period"><?php echo esc_html( $price_period ) ?></span>
        </div>
        <div class="cl-price-list__list">
            <ul>
                <?php echo do_shortcode( $content ) ?>
            </ul>
        </div>
        <div class="cl-price-list__button">
            <a href="<?php echo esc_url( $button_link ) ?>"><?php echo esc_html( $button_text ) ?></a>
        </div>
    </div>
</div>