<?php

$args = array(
    'heading' => esc_html__('Row Heading', 'regn'),
    'text'    => esc_html__('Some values', 'regn'),
);

extract(shortcode_atts($args, $atts));

?>

<div class="cl-element cl-table-row">
    <div class="cl-table-row__heading"><?php echo esc_html( $heading ) ?></div>
    <div class="cl-table-row__text"><?php echo esc_html( $text ) ?></div>
</div>