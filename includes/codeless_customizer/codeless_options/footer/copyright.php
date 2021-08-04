<?php

Kirki::add_section('cl_footer_copyright', array(
	'title' => esc_attr__('Copyright', 'regn') ,
	'tooltip' => esc_attr__('Copyright Options', 'regn') ,
	'panel' => 'cl_footer',
	'type' => '',
	'priority' => 12,
	'capability' => 'edit_theme_options'
));


Kirki::add_field( 'cl_regn', array(
    'settings' => 'show_copyright',
    'label'    => esc_attr__( 'Copyright Active', 'regn' ),
    'tooltip' => esc_attr__( 'Switch On/Off Copyright on website', 'regn' ),
    'section'  => 'cl_footer_copyright',
    'type'     => 'switch',
    'priority' => 10,
    'default'  => 1,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0 => esc_attr__( 'Off', 'regn' ),
    ),
    'transport' => 'postMessage',
    'partial_refresh' => array(
        'copyright_show' => array(
            'selector'            => '#footer-wrapper',
            'container_inclusive' => true,
            'render_callback'     => 'codeless_show_footer'
        ),
    ),

) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'slider',
    'settings'    => 'copyright_padding_top',
    'label'       => esc_attr__( 'Content Distance From Top', 'regn' ),
    'section'     => 'cl_footer_copyright',
    'into_group' => true,
    'default'     => '25',
    'priority'    => 10,
    'transport' => 'auto',
    'choices'    => array(
        'min' => 0,
        'max' => 200,
        'step' => 1
    ),
    'output'      => array(
        array(
            'element' => '#copyright .cl-footer__content',
            'units'  => 'px',
            'property' => 'padding-top'
        ),

    )
));

Kirki::add_field( 'cl_regn', array(
    'type'        => 'slider',
    'settings'    => 'copyright_padding_bottom',
    'label'       => esc_attr__( 'Content Distance From Bottom', 'regn' ),
    'section'     => 'cl_footer_copyright',
    'into_group' => true,
    'choices'    => array(
        'min' => 0,
        'max' => 200,
        'step' => 1
    ),
    'default'     => '25',
    'priority'    => 10,
    'transport' => 'auto',
    'output'      => array(
        array(
            'element' => '#copyright .cl-footer__content',
            'units'  => 'px',
            'property' => 'padding-bottom'
        ),

    )
));


Kirki::add_field( 'cl_regn', array(
    'settings' => 'copyright_separator',
    'label'    => esc_attr__( 'Copyright Border Separator', 'regn' ),
    'tooltip' => esc_attr__( 'Add Border separator between footer and copyright', 'regn' ),
    'section'  => 'cl_footer_copyright',
    'type'     => 'switch',
    'priority' => 10,
    'default'  => 0,
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0 => esc_attr__( 'Off', 'regn' ),
    ),
    'transport' => 'postMessage',
    'partial_refresh' => array(
        'copyright_show' => array(
            'selector'            => '#footer-wrapper',
            'container_inclusive' => true,
            'render_callback'     => 'codeless_show_footer'
        ),
    ),

) );


?>