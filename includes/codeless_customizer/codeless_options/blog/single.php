<?php

Kirki::add_section('cl_blog_single', array(
	'title' => esc_attr__('Single Post', 'regn') ,
	'panel' => 'cl_blog',
	'type' => '',
	'priority' => 11,
	'capability' => 'edit_theme_options'
));


        Kirki::add_field( 'cl_regn', array(
			'settings' => 'single_blog_share',
			'label'    => esc_attr__( 'Single Blog Shares', 'regn' ),
			
			'section'  => 'cl_blog_single',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'regn' ),
				0 => esc_attr__( 'Off', 'regn' ),
			),
		) );

		Kirki::add_field( 'cl_regn', array(
			'settings' => 'single_blog_tags',
			'label'    => esc_attr__( 'Single Blog Tags', 'regn' ),
			
			'section'  => 'cl_blog_single',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'regn' ),
				0 => esc_attr__( 'Off', 'regn' ),
			),
		) );
		
		Kirki::add_field( 'cl_regn', array(
			'settings' => 'single_blog_author_box',
			'label'    => esc_attr__( 'Single Blog Author Info', 'regn' ),
			
			'section'  => 'cl_blog_single',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'regn' ),
				0 => esc_attr__( 'Off', 'regn' ),
			),
		) );


		Kirki::add_field( 'cl_regn', array(
			'settings' => 'single_blog_related',
			'label'    => esc_attr__( 'Single Blog Related Posts', 'regn' ),
			
			'section'  => 'cl_blog_single',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'regn' ),
				0 => esc_attr__( 'Off', 'regn' ),
			),
		) );

		Kirki::add_field( 'cl_regn', array(
			'settings' => 'single_blog_pagination',
			'label'    => esc_attr__( 'Single Blog Pagination', 'regn' ),
			
			'section'  => 'cl_blog_single',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'regn' ),
				0 => esc_attr__( 'Off', 'regn' ),
			),
		) );
		