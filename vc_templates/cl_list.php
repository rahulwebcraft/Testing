<?php

$args = array(
    "style"             => "arrow"
);

extract(shortcode_atts($args, $atts));

?>

<div class="cl-element cl-list cl-list--style-<?php echo esc_attr( $style ) ?>">
    <ul>
        <?php echo do_shortcode( $content ); ?>
    </ul>
</div>