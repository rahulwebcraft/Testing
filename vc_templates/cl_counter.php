<?php
$args = array(
    "title" => esc_attr__("Completed Projects", 'regn'),
    'number' => 1248,
    'duration' => 2000,
    'alignment' => 'center',
    'custom_numbers_color' => '',
    'custom_text_color' => ''
);

extract(shortcode_atts($args, $atts));

wp_enqueue_style('odometer', get_template_directory_uri().'/css/odometer.css' );
wp_enqueue_script('odometer.min', get_template_directory_uri().'/js/odometer.min.js' );

?>

<div class="cl-element cl-counter cl-animate-on-visible cl-counter--align-<?php echo esc_attr( $alignment ) ?>">
    <?php $custom_color = ''; if( $custom_numbers_color != '' ) $custom_color = 'style="color:'.$custom_numbers_color.';"'; ?>
    <?php $custom_color_txt = ''; if( $custom_text_color != '' ) $custom_color_txt = 'style="color:'.$custom_text_color.';"'; ?>
    <div class="cl-counter__odometer" data-number="<?php echo cl_remove_wpautop($number) ?>" data-duration="<?php echo esc_attr( $duration ) ?>" <?php echo codeless_complex_esc( $custom_color ) ?>></div>
    <h4 class="cl-counter__title" <?php echo codeless_complex_esc( $custom_color_txt ) ?>><?php echo esc_html( $title ) ?></h4>
</div>
        
