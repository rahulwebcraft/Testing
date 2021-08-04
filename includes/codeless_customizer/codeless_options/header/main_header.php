<?php

/* ---------------------- MAIN ROW ----------------------------- */

Kirki::add_section('cl_header_main', array(
	'title' => esc_attr__('Main Header Area', 'regn') ,
	'tooltip' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 6,
	'capability' => 'edit_theme_options'
));


Kirki::add_field('cl_regn', array(
	'type' => 'slider',
	'settings' => 'header_height',
	'label' => 'Header Height',
	'tooltip' => 'Works on Top, Bottom Layouts or when outter boxed header is actived',
	'default' => 100,
	'choices' => array(
		'min' => '30',
		'max' => '600',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.cl-header__row--main',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (min-width: 992px)'
		),
		array(
			'element' => '.cl-header__padding',
			'units' => 'px',
			'property' => 'padding-top',
			'media_query' => '@media (min-width: 992px)'
		),
	) ,
));

Kirki::add_field('cl_regn', array(
	'type' => 'slider',
	'settings' => 'header_space_el',
	'label' => 'Space between elements',
	'default' => 15,
	'priority' => 10,
	'choices' => array(
		'min' => '0',
		'max' => '80',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.cl-header__row--main .cl-header__element',
			'units' => 'px',
			'property' => 'padding-right',
			'suffix' => '!important',
			'media_query' => '@media (min-width: 768px)'
		),
		array(
			'element' => '.cl-header__row--main .cl-header__element',
			'units' => 'px',
			'property' => 'padding-left',
			'suffix' => '!important',
			'media_query' => '@media (min-width: 768px)'
		)
	) ,
	'transport' => 'auto',
));


Kirki::add_field('cl_regn', array(
	'settings' => 'header_split_border',
	'label' => esc_attr__('Elements Divider', 'regn') ,
	'section' => 'cl_header_main',
	'type' => 'select',
	'priority' => 10,
	'default' => 'none',
	'choices' => array(
		'none' => esc_attr__('None', 'regn'),
		'full' => esc_attr__('Full Divider', 'regn'),
		'small' => esc_attr__( 'Small Divider', 'regn' )
	)
));


Kirki::add_field('cl_regn', array(
	'type'        => 'sortable',
	'settings'    => 'header_main_responsive_columns',
	'label' => esc_attr__( 'Responsive Columns', 'regn' ),
	'tooltip'       => esc_attr__( 'Click "eye" to show or hide the column on mobile, drag and drop to change the position. Works for screen small then 992px', 'regn' ),
	'section'     => 'cl_header_main',
	'default'     => array(
		'left',
		'middle',
		'right'
	),
	'choices'     => array(
		'left' => esc_attr__( 'Left Column', 'regn' ),
		'middle' => esc_attr__( 'Middle Column', 'regn' ),
		'right' => esc_attr__( 'Right Column', 'regn' )
	),
	'priority'    => 10,
));

Kirki::add_field('cl_regn', array(
	'settings' => 'header_main_force_center',
	'label' => esc_attr__('Middle Column - Force Center', 'regn') ,
	'section' => 'cl_header_main',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'regn') ,
		0 => esc_attr__('Off', 'regn') ,
	)
));

Kirki::add_field('cl_regn', array(
	'settings' => 'header_main_box',
	'label' => esc_attr__('Advanced Box Design', 'regn') ,
	'section' => 'cl_header_main',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'regn') ,
		0 => esc_attr__('Off', 'regn') ,
	) ,
	'transport' => 'postMessage'
));



Kirki::add_field('cl_regn', array(
	'settings' => 'header_design',
	'section' => 'cl_header_main',
	'description' => 'Box Design',
	'type' => 'css_tool',
	'default' => array(
		'border-bottom-width' => '1px'
	) ,
	'into_group' => true,
	'transport' => 'postMessage',
	'required' => array(
		array(
			'setting' => 'header_main_box',
			'operator' => '==',
			'value' => 1,
		) ,
	)
));

Kirki::add_field('cl_regn', array(
	'settings' => 'header_main_bg_image',
	'section' => 'cl_header_main',
	'description' => 'Background Image',
	'type' => 'image',
	
	'into_group' => true,
	'transport' => 'refresh',

	'required' => array(
		array(
			'setting' => 'header_main_box',
			'operator' => '==',
			'value' => 1,
		) ,
	)
));


?>