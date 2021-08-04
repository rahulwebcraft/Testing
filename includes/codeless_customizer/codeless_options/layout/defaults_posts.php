<?php

Kirki::add_section('cl_layout_defaults_posts', array(
	'title' => esc_attr__('Defaults for Posts', 'regn') ,
	'description' => 'Default Site Layout for all pages on this site.',
	'panel' => 'cl_layout',
	'type' => '',
	'priority' => 7,
	'capability' => 'edit_theme_options'
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'overwrite_post_layout',
    'label'    => esc_attr__( 'Defaults for Posts', 'regn' ),
    'section'  => 'cl_layout_defaults_posts',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'fullwidth',
    'choices'     => array(
        'default'  => esc_attr__( '--- Use Site Defaults ---', 'regn' ),
        'custom'  => esc_attr__( 'Custom for Posts', 'regn' )
    ),
    
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'layout_post',
    'description'    => esc_attr__( 'Layout', 'regn' ),
    'section'  => 'cl_layout_defaults_posts',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'fullwidth',
    'choices'     => array(
        'fullwidth'  => esc_attr__( 'Fullwidth', 'regn' ),
        'left_sidebar'  => esc_attr__( 'Left Sidebar', 'regn' ),
        'right_sidebar'  => esc_attr__( 'Right Sidebar', 'regn' )
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_post_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'fullwidth_content_post',
    'description'    => esc_attr__( 'Fullwidth Content', 'regn' ),
    'section'  => 'cl_layout_defaults_posts',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 0,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0  => esc_attr__( 'Off', 'regn' )
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_post_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'wrapper_content_post',
    'description'    => esc_attr__( 'Wrapper Content', 'regn' ),
    'section'  => 'cl_layout_defaults_posts',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 0,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0  => esc_attr__( 'Off', 'regn' )
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_post_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));


Kirki::add_field( 'cl_regn', array(
    'settings' => 'header_color_post',
    'description'    => esc_attr__( 'Header Color', 'regn' ),
    'section'  => 'cl_layout_defaults_posts',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'dark',
    'choices'     => array(
        'dark'  => esc_attr__( 'Dark', 'regn' ),
        'light'  => esc_attr__( 'Light', 'regn' )
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_post_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'header_transparent_post',
    'description'    => esc_attr__( 'Header Transparent', 'regn' ),
    'section'  => 'cl_layout_defaults_posts',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 0,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0  => esc_attr__( 'Off', 'regn' )
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_post_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));


Kirki::add_field( 'cl_regn', array(
    'settings' => 'post_header_color',
    'label'    => esc_attr__( 'Post Header Color', 'regn' ),
    'section'  => 'cl_layout_defaults_posts',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'light',
    'choices'     => array(
        'dark'  => esc_attr__( 'Dark', 'regn' ),
        'light'  => esc_attr__( 'Light', 'regn' )
    ),
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'post_header_layout',
    'label'    => esc_attr__( 'Post Header Layout', 'regn' ),
    'section'  => 'cl_layout_defaults_posts',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'fullwidth',
    'choices'     => array(
        'container'  => esc_attr__( 'Container', 'regn' ),
        'fullwidth'  => esc_attr__( 'Fullwidth', 'regn' )
    ),
));