<?php

Kirki::add_section('cl_layout_defaults_pages', array(
	'title' => esc_attr__('Defaults for Pages', 'regn') ,
	'description' => 'Default Site Layout for all pages/posts/archives etc on this site. For specific post types you can change them on respective section',
	'panel' => 'cl_layout',
	'type' => '',
	'priority' => 7,
	'capability' => 'edit_theme_options'
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'overwrite_page_layout',
    'label'    => esc_attr__( 'Defaults for Pages', 'regn' ),
    'section'  => 'cl_layout_defaults_pages',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'fullwidth',
    'choices'     => array(
        'default'  => esc_attr__( '--- Use Site Defaults ---', 'regn' ),
        'custom'  => esc_attr__( 'Custom for Pages', 'regn' )
    ),
    
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'layout_page',
    'description'    => esc_attr__( 'Layout', 'regn' ),
    'section'  => 'cl_layout_defaults_pages',
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
			'setting' => 'overwrite_page_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'fullwidth_content_page',
    'description'    => esc_attr__( 'Fullwidth Content', 'regn' ),
    'section'  => 'cl_layout_defaults_pages',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 0,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0  => esc_attr__( 'Off', 'regn' )
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_page_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'wrapper_content_page',
    'description'    => esc_attr__( 'Wrapper Content', 'regn' ),
    'section'  => 'cl_layout_defaults_pages',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 0,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0  => esc_attr__( 'Off', 'regn' )
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_page_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));


Kirki::add_field( 'cl_regn', array(
    'settings' => 'header_color_page',
    'description'    => esc_attr__( 'Header Color', 'regn' ),
    'section'  => 'cl_layout_defaults_pages',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'dark',
    'choices'     => array(
        'dark'  => esc_attr__( 'Dark', 'regn' ),
        'light'  => esc_attr__( 'Light', 'regn' )
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_page_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'header_transparent_page',
    'description'    => esc_attr__( 'Header Transparent', 'regn' ),
    'section'  => 'cl_layout_defaults_pages',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 0,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0  => esc_attr__( 'Off', 'regn' )
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_page_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'page_header_bool_page',
    'label'    => esc_attr__( 'Page Header Active', 'regn' ),
    'section'  => 'cl_layout_defaults_pages',
    'type'     => 'switch',
    'priority' => 10,
    'default'  => 1,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0  => esc_attr__( 'Off', 'regn' )
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_page_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));

Kirki::add_field( 'cl_regn', array(
    'type' => 'image',
    'settings' => 'page_header_bg_image_page',
    'description' => 'Page Header Image',
    'default' => '',
    'section'  => 'cl_layout_defaults_pages',
    'transport' => 'refresh',
    'required' => array(
        array(
			'setting' => 'overwrite_page_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'page_header_style_page',
    'description'    => esc_attr__( 'Page Header Style', 'regn' ),
    'section'  => 'cl_layout_defaults_pages',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'with_breadcrumbs',
    'choices'     => array(
        'all_center'  => esc_attr__( 'All Center', 'regn' ),
        'with_breadcrumbs'  => esc_attr__( 'With Breadcrumbs', 'regn' )
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_page_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'page_header_color_page',
    'description'    => esc_attr__( 'Page Header Color', 'regn' ),
    'section'  => 'cl_layout_defaults_pages',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'dark',
    'choices'     => array(
        'dark'  => esc_attr__( 'Dark', 'regn' ),
        'light'  => esc_attr__( 'Light', 'regn' )
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_page_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    )
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'page_header_height_page',
    'description'    => esc_attr__( 'Page Header Height', 'regn' ),
    'section'  => 'cl_layout_defaults_pages',
    'type'     => 'slider',
    'choices'     => array(
        'min'  => '100',
        'max'  => '1600',
        'step' => '1',
    ),
    'required' => array(
        array(
			'setting' => 'overwrite_page_layout',
			'operator' => '==',
			'value' => 'custom',
		) ,
    ),
    'priority' => 10,
    'default'  => '270'
));
