<?php

$args = array(
    "carousel"             => "yes",
    "item_to_show"         => 4,
    "images"               => ''
);

extract(shortcode_atts($args, $atts));

$array_images_ids = explode(',', $images);

$carousel_classes = '';
if( $carousel == 'yes' )
    $carousel_classes = 'cl-carousel owl-carousel owl-theme';

?>

<div class="cl-element cl-clients cl-clients--carousel-<?php echo esc_attr( $carousel ) ?>">

    <div class="cl-clients__wrapper <?php echo esc_attr( $carousel_classes ) ?>" data-items="<?php echo esc_attr( $item_to_show ) ?>" data-responsive='{"0": {"items": 1}, "992": {"items": <?php echo esc_attr( $item_to_show ) ?> } }'>

        <?php if( is_array( $array_images_ids ) && !empty( $array_images_ids ) ): foreach( $array_images_ids as $img_id ): ?>
        <div class="cl-clients-item">
            <?php $img = wp_get_attachment_image_src($img_id, 'full'); ?>
            <img src="<?php echo esc_url($img[0]) ?>" />
        </div>
        <?php endforeach; endif; ?>
    </div>

</div>