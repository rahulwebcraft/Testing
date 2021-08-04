<?php

$args = array(
    'video' => '',
    'align' => 'center'
);
extract(shortcode_atts($args, $atts));
?>

<div class="cl-element cl-lightbox-video cl-lightbox-video--align-<?php echo esc_attr( $align ) ?>">
    <a href="<?php echo esc_url( $video ) ?>" data-fancybox class="lightbox" ><i class="cl-icon-play"></i></a>
</div>