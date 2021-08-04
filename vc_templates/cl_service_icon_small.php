<?php

$args = array(
    "icon_type" => 'icon',
    'icon' => 'cl-icon-camera',
    'image' => '',
    'title' => esc_attr__("Element Title Here", 'regn'),
    'link' => '#',
    'link_target' => '_self',
    'custom_icon_color' => '',
    'custom_font_color' => '',
);

extract(shortcode_atts($args, $atts));

?>

<div class="cl-element cl-service-icon-small cl-service-icon-small--type-<?php echo esc_attr( $icon_type ) ?>">
    
    <div class="cl-service-icon-small__icon">
        <?php if( $icon_type == 'icon' ): ?>
            <i class="<?php echo esc_attr( $icon ) ?>" <?php echo !empty($custom_icon_color) ? 'style="color: '. esc_attr($custom_icon_color).';"' : ''; ?>></i>
        <?php endif; ?>

        <?php if( $icon_type == 'image' && !empty( $image ) ): ?>
            <?php echo codeless_generate_image( $image, 'full' ); ?>
        <?php endif; ?>
    </div>

    <div class="cl-service-icon-small__content">
        <h4 class="cl-custom-font" <?php echo !empty($custom_font_color) ? 'style="color: '. esc_attr($custom_font_color).';"' : ''; ?>><?php echo esc_html( $title ) ?></h4>
        <p><?php echo cl_remove_empty_p( cl_remove_wpautop($content, true) ) ?></p>
    </div>

</div>

