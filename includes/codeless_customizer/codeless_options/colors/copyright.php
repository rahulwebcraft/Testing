<?php

Kirki::add_section('cl_colors_copyright', array(
	'title' => esc_attr__('Copyright Colors', 'regn') ,
	'tooltip' => '',
	'panel' => 'cl_colors',
	'type' => '',
	'priority' => 8,
	'capability' => 'edit_theme_options'
));

Kirki::add_field( 'cl_regn', array(
    'type' => 'color',
    'settings' => 'copyright_bg_color',
    'label' => 'Background Color',
    'default' => '#22272b',
    'inline_control' => true,
    'section'  => 'cl_colors_copyright',
    'output' => array(
        array(
            'element' => '#copyright',
            'property' => 'background-color'
        ),
        
    ),
    'transport' => 'auto'
));


Kirki::add_field( 'cl_regn', array(
    'type'        => 'color',
    'settings'    => 'copyright_font_color',
    'label'       => esc_attr__( 'Text Color', 'regn' ),
    'section'     => 'cl_colors_copyright',
    'into_group' => true,
    'inline_control' => true,
    'default'     => '#969da3',
    'priority'    => 10,
    'transport' => 'auto',
    'output'      => array(
        array(
            'element' => '#copyright',
            'property' => 'color'
        ),

    )
));

Kirki::add_field( 'cl_regn', array(
    'type'        => 'color',
    'settings'    => 'copyright_link_color',
    'label'       => esc_attr__( 'Link Color', 'regn' ),
    'section'     => 'cl_colors_copyright',
    'into_group' => true,
    'inline_control' => true,
    'default'     => '#969da3',
    'priority'    => 10,
    'transport' => 'auto',
    'output'      => array(
        array(
            'element' => '#copyright a',
            'property' => 'color',
            'suffix' => ' !important'
        ),

    )
));

Kirki::add_field( 'cl_regn', array(
    'type'        => 'color',
    'settings'    => 'copyright_link_color_hover',
    'label'       => esc_attr__( 'Link Hover Color', 'regn' ),
    'section'     => 'cl_colors_copyright',
    'into_group' => true,
    'inline_control' => true,
    'default'     => '#fff',
    'priority'    => 10,
    'transport' => 'auto',
    'output'      => array(
        array(
            'element' => '#copyright a:hover',
            'property' => 'color',
            'suffix' => ' !important'
        ),

    )
));

Kirki::add_field( 'cl_regn', array(
    'type'        => 'color',
    'settings'    => 'copyright_border_color',
    'label'       => esc_attr__( 'Borders Color', 'regn' ),
    'section'     => 'cl_colors_copyright',
    'into_group' => true,
    'inline_control' => true,
    'default'     => '#7f8488',
    'priority'    => 10,
    'transport' => 'auto',
    'output'      => array(
        array(
            'element' => '#copyright .cl-footer__content',
            'property' => 'border-color'
        ),

    )
));