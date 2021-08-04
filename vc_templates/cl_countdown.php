<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>
	
<div class="cl-element cl-countdown">

    <div class="cl-countdown-container" data-dt="<?php echo esc_attr($year) ?>/<?php echo esc_attr($month) ?>/<?php echo esc_attr($day) ?>">

    </div>

</div>