<?php

$args = array(
    "title" => esc_html__('Graphic Design', 'regn'),
    'percentage' => '75',
);

extract(shortcode_atts($args, $atts));

?>

<div class="cl-element cl-skill cl-animate-on-visible" data-percentage="<?php echo esc_attr( $percentage ) ?>">
    <div class="cl-skill__labels">
		<div class="cl-skill__title"><?php echo cl_remove_wpautop( $title ) ?></div>
		<div class="cl-skill__percentage"><?php echo cl_remove_wpautop( $percentage ) ?>%</div>
	</div>
	<div class="cl-skill__progress"><div class="cl-skill__bar"></div></div>
</div>