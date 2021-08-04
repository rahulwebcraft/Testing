<?php

$args = array(
    "icon_type" => 'icon',
    'icon' => 'cl-icon-camera',
    'image' => '',
    'title' => esc_attr__("Element Title Here", 'regn'),
    'link' => '#',
    'link_target' => '_self',
    'icon_color' => '#222a2c',
    'icon_wrapper_bg_color' => '#f9f9f9',
    'icon_wrapper_border_color' => '#e4e5e5',
);

extract(shortcode_atts($args, $atts));

?>

<div class="cl-element cl-service-icon-circle cl-service-icon-circle--type-<?php echo esc_attr( $icon_type ) ?>">
    
    <div class="cl-service-icon-circle__icon">
        <div class="cl-service-icon-circle__icon-wrapper" style="background-color:<?php echo esc_attr( $icon_wrapper_bg_color ); ?>; border-color:<?php echo esc_attr( $icon_wrapper_border_color ) ?>">
            <?php if( $icon_type == 'icon' ): ?>
                <i class="<?php echo esc_attr( $icon ) ?>" style="color:<?php echo esc_attr( $icon_color ); ?>"></i>
            <?php endif; ?>

            <?php if( $icon_type == 'image' && !empty( $image ) ): ?>
                <?php echo codeless_generate_image( $image, 'full' ); ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="cl-service-icon-circle__content">
        <h4 class="cl-custom-font"><?php echo esc_html( $title ) ?></h4>
        <p><?php echo cl_remove_empty_p( cl_remove_wpautop($content, true) ) ?></p>
    </div>

</div>

