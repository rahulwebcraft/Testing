<?php

$args = array(
    "id"             => "",
    "style"          => 'minimal'
);

extract(shortcode_atts($args, $atts));
?>
<div class="cl-element cl-contact-form cl-contact-form--style-<?php echo esc_attr( $style ) ?>">

    <?php echo do_shortcode('[contact-form-7 id="'.$id.'"]'); ?>

</div>