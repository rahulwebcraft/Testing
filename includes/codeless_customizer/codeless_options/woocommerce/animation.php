<?php

Kirki::add_section('cl_woocommerce_animation', array(
	'title' => esc_attr__('Animations', 'regn') ,
	'panel' => 'woocommerce',
	'type' => '',
	'priority' => 12,
	'capability' => 'edit_theme_options'
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'shop_animation',
    'label'    => esc_attr__( 'Products Animation', 'regn' ),
    'tooltip' => esc_attr__( 'Use this option to add animation on products grid', 'regn' ),
    'section'  => 'cl_woocommerce_animation',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'none',
    'choices'     => codeless_get_animations_list(),
    'transport' => 'postMessage',
    
) );

?>