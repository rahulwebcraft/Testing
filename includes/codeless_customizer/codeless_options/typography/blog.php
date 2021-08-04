<?php

Kirki::add_section('cl_typography_blog', array(
	'title' => esc_attr__('Blog', 'regn') ,
	'tooltip' => '',
	'panel' => 'cl_typography',
	'type' => '',
	'priority' => 9,
	'capability' => 'edit_theme_options'
));


Kirki::add_field( 'cl_regn', array(
    'settings' => 'blog_entry_title_overwrite',
    'label'    => esc_attr__( 'Blog Entry Title Overwrite', 'regn' ),
    'tooltip'  => esc_attr__( 'Switch on to add a custom Blog Entry Title Typography', 'regn'),
    'section'  => 'cl_typography_blog',
    'type'     => 'switch',
    'priority' => 10,
    'default'  => 0,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0 => esc_attr__( 'Off', 'regn' ),
    ),
  
) );


Kirki::add_field( 'cl_regn', array(
		'type'        => 'typography',
		'settings'    => 'blog_entry_title',
		'description'       => esc_attr__( 'Blog Entry Title Typography', 'regn' ),
		'section'     => 'cl_typography_blog',
		'into_group' => true,
		'show_subsets' => false,
		'default'     => array(
			'font-family'    => 'Montserrat',
			'letter-spacing' => '0',
			'font-weight' => '600',
			'text-transform' => 'none',
			'font-size' => '48px',
			'line-height' => '1.2',
		),
		'priority'    => 10,
		'transport' => 'auto',
		'output'      => array(
			array(
				'element' => codeless_dynamic_css_register_tags( 'blog_entry_title' ),
				
			),
	
		),
		'required' => array(
			array(
				'setting' => 'blog_entry_title_overwrite',
				'operator' => '==',
				'value' => true
			)
		)

));

Kirki::add_field( 'cl_regn', array(
	'type'        => 'typography',
	'settings'    => 'blog_single_title',
	'label'       => esc_attr__( 'Blog Single Title', 'regn' ),
	'section'     => 'cl_typography_blog',
	'into_group' => true,
	'show_subsets' => false,
	'default'     => array(
		'font-family'    => 'Montserrat',
		'letter-spacing' => '0',
		'font-weight' => '700',
		'text-transform' => 'none',
		'font-size' => '48px',
		'line-height' => '1.2',
	),
	'priority'    => 10,
	'transport' => 'auto',
	'output'      => array(
		array(
			'element' => '.cl-post-header__title',
			'media_query' => '@media (min-width: 992px)'
			
		),

	)
));


Kirki::add_field( 'cl_regn', array(
	'type'        => 'typography',
	'settings'    => 'blog_text_size',
	'label'       => esc_attr__( 'Blog Text Size', 'regn' ),
	'section'     => 'cl_typography_blog',
	'into_group' => true,
	'show_subsets' => false,
	'default'     => array(
		'font-size' => '18px',
		'line-height' => '1.75',
	),
	'priority'    => 10,
	'transport' => 'auto',
	'output'      => array(
		array(
			'element' => '.cl-single-blog .cl-content, .cl-blog .cl-entry .cl-entry__content'
		),

	)
));

Kirki::add_field( 'cl_regn', array(
	'type'        => 'typography',
	'settings'    => 'single_blog_section_title',
	'label'       => esc_attr__( 'Single Blog Sections Title', 'regn' ),
	'section'     => 'cl_typography_blog',
	'into_group' => true,
	'show_subsets' => false,
	'default'     => array(
		'font-family'    => 'Montserrat',
		'letter-spacing' => '0px',
		'font-weight' => '700',
		'text-transform' => 'uppercase',
		'font-size' => '18px',
		'line-height' => '27px',
	),
	'priority'    => 10,
	'transport' => 'auto',
	'output'      => array(
		array(
			'element' => '.cl-entry-single-section__title'
		),

	)
));

Kirki::add_field( 'cl_regn', array(
	'type'        => 'typography',
	'settings'    => 'blockquote_typo',
	'label'       => esc_attr__( 'Blockquote Typography', 'regn' ),
	'section'     => 'cl_typography_blog',
	'into_group' => true,
	'show_subsets' => false,
	'default'     => array(
		'font-family'    => 'Lato',
		'letter-spacing' => '0',
		'font-weight' => '300italic',
		'text-transform' => 'none',
		'font-size' => '24px',
		'line-height' => '36px',
	),
	'priority'    => 10,
	'transport' => 'auto',
	'output'      => array(
		array(
			'element' => 'blockquote p'
		),

	)
));