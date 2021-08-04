<?php

$args = array(
    "icon_type" => 'icon',
    'icon' => 'cl-icon-camera',
    'image' => '',
    'subtitle_bool' => 'no',
    'subtitle' => 'Element Subtitle',
    'title' => esc_attr__("Element Title Here", 'regn'),
    'link' => '#',
    'link_target' => '_self',
    'custom_icon_size' => '',
    'custom_icon_color' => '',
    'custom_distance_from_icon' => '',
    'custom_title_size' => '',
    'custom_distance_title_desc' => ''
); 

extract(shortcode_atts($args, $atts));

$custom_style_wrapper = array();

if( $custom_distance_from_icon != '' )
    $custom_style_wrapper[] = 'margin-bottom:'.$custom_distance_from_icon;

$custom_style_wrapper_output = '';
if( !empty( $custom_style_wrapper ) )
    $custom_style_wrapper_output = 'style="'.implode(';', $custom_style_wrapper).'"';

$custom_icon_style = '';
if( !empty( $custom_icon_color ) )
    $custom_icon_style .= 'color: '. esc_attr($custom_icon_color).';';
if( !empty( $custom_icon_size ) )
    $custom_icon_style .= 'font-size:'. esc_attr($custom_icon_size).';';

$subtitle_class = '';
if( $subtitle_bool == 'yes' ){
    $subtitle_class = 'cl-service-icon-center--type-subtitle';
}
?>

<div class="cl-element cl-service-icon-center cl-service-icon-center--type-<?php echo esc_attr( $icon_type ) ?> <?php echo esc_attr( $subtitle_class ) ?>">
   
    <div class="cl-service-icon-center__icon" <?php echo codeless_complex_esc( $custom_style_wrapper_output ) ?>>
        <?php if( $icon_type == 'icon' ): ?>
            <i class="<?php echo esc_attr( $icon ) ?>" style="<?php echo esc_attr( $custom_icon_style ) ?>"></i>
        <?php endif; ?>

        <?php if( $icon_type == 'image' && !empty( $image ) ): ?>
            <?php echo codeless_generate_image( $image, 'full' ); ?>
        <?php endif; ?>
    </div>

    <div class="cl-service-icon-center__content">
        <h4 class="cl-custom-font" <?php echo !empty($custom_title_size) ? 'style="font-size: '. esc_attr($custom_title_size).';"' : ''; ?>><?php echo esc_html( $title ) ?></h4>

        <?php if( $subtitle_bool == 'yes' && !empty( $subtitle ) ): ?>
            <h6><?php echo esc_html( $subtitle ) ?></h6>
        <?php endif; ?>

        <p <?php echo !empty($custom_distance_title_desc) ? 'style="margin-top: '. esc_attr($custom_distance_title_desc).';"' : ''; ?>><?php echo cl_remove_empty_p( cl_remove_wpautop($content, true) ) ?></p>
    </div>

</div>

