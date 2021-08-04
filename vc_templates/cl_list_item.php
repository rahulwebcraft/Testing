<?php

extract(shortcode_atts($args, $atts));
//$icon='';
if ($style = "arrow")	$icon = "cl-icon-angle-right";

?>


<li class="cl-list-item <?php echo esc_attr($icon ) ?>"><?php echo do_shortcode( $content ) ?></li>