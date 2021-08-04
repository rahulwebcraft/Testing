<?php

Kirki::add_section('cl_layout_defaults', array(
	'title' => esc_attr__('Site Defaults', 'regn') ,
	'description' => 'Default Site Layout for all pages/posts/archives etc on this site. For specific post types you can change them on respective section',
	'panel' => 'cl_layout',
	'type' => '',
	'priority' => 7,
	'capability' => 'edit_theme_options'
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'layout',
    'label'    => esc_attr__( 'Layout', 'regn' ),
    'section'  => 'cl_layout_defaults',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'right_sidebar',
    'choices'     => array(
        'fullwidth'  => esc_attr__( 'Fullwidth', 'regn' ),
        'left_sidebar'  => esc_attr__( 'Left Sidebar', 'regn' ),
        'right_sidebar'  => esc_attr__( 'Right Sidebar', 'regn' )
    ),
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'fullwidth_content',
    'label'    => esc_attr__( 'Fullwidth Content', 'regn' ),
    'section'  => 'cl_layout_defaults',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 0,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0  => esc_attr__( 'Off', 'regn' )
    ),
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'wrapper_content',
    'label'    => esc_attr__( 'Wrapper Content', 'regn' ),
    'section'  => 'cl_layout_defaults',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 0,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0  => esc_attr__( 'Off', 'regn' )
    ),
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'header_divider_',
    'label'    => '',
    'section'  => 'cl_layout_defaults',
    'type'     => 'groupdivider',
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'header_color',
    'label'    => esc_attr__( 'Header Color', 'regn' ),
    'section'  => 'cl_layout_defaults',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'dark',
    'choices'     => array(
        'dark'  => esc_attr__( 'Dark', 'regn' ),
        'light'  => esc_attr__( 'Light', 'regn' )
    ),
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'header_transparent',
    'label'    => esc_attr__( 'Header Transparent', 'regn' ),
    'section'  => 'cl_layout_defaults',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 0,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0  => esc_attr__( 'Off', 'regn' )
    ),
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'page_header_divider_',
    'label'    => '',
    'section'  => 'cl_layout_defaults',
    'type'     => 'groupdivider',
));


Kirki::add_field( 'cl_regn', array(
    'settings' => 'page_header_bool',
    'label'    => esc_attr__( 'Page Header Active', 'regn' ),
    'section'  => 'cl_layout_defaults',
    'type'     => 'switch',
    'priority' => 10,
    'default'  => 1,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0  => esc_attr__( 'Off', 'regn' )
    ),
));


Kirki::add_field( 'cl_regn', array(
    'type' => 'image',
    'settings' => 'page_header_bg_image',
    'label' => 'Page Header Image',
    'default' => '',
    'section'  => 'cl_layout_defaults',
    'transport' => 'refresh'
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'page_header_style',
    'label'    => esc_attr__( 'Page Header Style', 'regn' ),
    'section'  => 'cl_layout_defaults',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'with_breadcrumbs',
    'choices'     => array(
        'all_center'  => esc_attr__( 'All Center', 'regn' ),
        'with_breadcrumbs'  => esc_attr__( 'With Breadcrumbs', 'regn' )
    ),
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'page_header_color',
    'label'    => esc_attr__( 'Page Header Color', 'regn' ),
    'section'  => 'cl_layout_defaults',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'dark',
    'choices'     => array(
        'dark'  => esc_attr__( 'Dark', 'regn' ),
        'light'  => esc_attr__( 'Light', 'regn' )
    ),
));

Kirki::add_field( 'cl_regn', array(
    'settings' => 'page_header_height',
    'label'    => esc_attr__( 'Page Header Height', 'regn' ),
    'section'  => 'cl_layout_defaults',
    'type'     => 'slider',
    'choices'     => array(
        'min'  => '100',
        'max'  => '1600',
        'step' => '1',
    ),
    'priority' => 10,
    'default'  => '180'
));