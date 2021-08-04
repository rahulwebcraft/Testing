<?php

Kirki::add_section('cl_typography_elements', array(
	'title' => esc_attr__('Elements', 'regn') ,
	'tooltip' => '',
	'panel' => 'cl_typography',
	'type' => '',
	'priority' => 9,
	'capability' => 'edit_theme_options'
));

Kirki::add_field( 'cl_regn', array(
	'type'        => 'typography',
	'settings'    => 'element_title',
	'label'       => esc_attr__( 'Element Title', 'regn' ),
	'section'     => 'cl_typography_elements',
	'into_group' => true,
	'show_subsets' => false,
	'default'     => array(
		'font-family'    => 'Montserrat',
		'letter-spacing' => '0px',
		'font-weight' => '700',
		'text-transform' => 'uppercase',
		'font-size' => '16px',
		'line-height' => '28px',
	),
	'priority'    => 10,
	'transport' => 'auto',
	'output'      => array(
		array(
			'element' => '.cl-element__title'
		),

	)
));

Kirki::add_field( 'cl_regn', array(
	'type'        => 'typography',
	'settings'    => 'element_title',
	'label'       => esc_attr__( 'Testimonial with Bottom Image Typography', 'regn' ),
	'section'     => 'cl_typography_elements',
	'into_group' => true,
	'show_subsets' => false,
	'default'     => array(
		'font-family'    => 'Libre Baskerville',
		'letter-spacing' => '0px',
		'font-weight' => '400',
		'text-transform' => 'none',
		'font-size' => '24px',
		'line-height' => '1.8',
	),
	'priority'    => 10,
	'transport' => 'auto',
	'output'      => array(
		array(
			'element' => '.cl-testimonial-bottom .cl-testimonial-item__content, .cl-testimonial-top .cl-testimonial-item__content'
		),

	)
));

Kirki::add_field( 'cl_regn', array(
	'type'        => 'typography',
	'settings'    => 'counter_number_typo',
	'label'       => esc_attr__( 'Counter Numbers Typography', 'regn' ),
	'section'     => 'cl_typography_elements',
	'into_group' => true,
	'show_subsets' => false,
	'default'     => array(
		'font-family' => 'Lato',
		'letter-spacing' => '0px',
		'font-weight' => '600',
		'font-size' => '60px',
		'line-height' => '1',
	),
	'priority'    => 10,
	'transport' => 'auto',
	'output'      => array(
		array(
			'element' => '.cl-counter__odometer'
		),

	)
));

?>