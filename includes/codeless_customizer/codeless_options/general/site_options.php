<?php

/* General */
Kirki::add_section( 'cl_general_options', array(
    'title'          => esc_html__( 'Site Options', 'regn' ),
    'description'    => esc_html__( 'Some options about responsive and other theme features.', 'regn' ),
    'panel'          => 'cl_general',
    'type'           => '',
    'priority'       => 5,
    'capability'     => 'edit_theme_options'
) );


    Kirki::add_field( 'cl_regn', array(
        'settings' => 'maintenance_mode',
        'label'    => esc_html__( 'Maintenance Mode', 'regn' ),
        'tooltip' => esc_html__( 'Turn On and select a page that you want to show always someone try to access the website', 'regn' ),
        'section'  => 'cl_general_options',
        'type'     => 'switch',
        'priority' => 10,
        'default'  => 0,
        'choices'     => array(
            1  => esc_html__( 'Enable', 'regn' ),
            0 => esc_html__( 'Disable', 'regn' ),
        ),
    ));

    Kirki::add_field( 'cl_regn', array(
        'settings' => 'maintenance_page',
        'section'  => 'cl_general_options',
        'description' => 'Select a page to show as a manteinence page',
        'type'     => 'select',
        'priority' => 10,
        'choices' => codeless_get_pages(),
        'required'    => array(
            array(
                'setting'  => 'maintenance_mode',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ));

    Kirki::add_field( 'cl_regn', array(
        'settings' => 'nicescroll',
        'label'    => esc_attr__( 'Smooth scroll', 'regn' ),
        'tooltip' => esc_attr__('Active smoothscroll over pages to make scrolling more fluid to create better user experience', 'regn' ),
        'section'  => 'cl_general_options',
        'type'     => 'switch',
        'priority' => 10,
        'default'  => 0,
        'transport' => 'refresh',
        'choices'     => array(
            1  => esc_html__( 'Enable', 'regn' ),
            0 => esc_html__( 'Disable', 'regn' ),
        ),
    ) );

    Kirki::add_field( 'cl_regn', array(
        'settings' => 'page_comments',
        'label'    => esc_html__( 'Page Comments', 'regn' ),
        'tooltip'    => esc_html__( 'Enable this option to active comments in normal pages.', 'regn' ),
        'section'  => 'cl_general_options',
        'type'     => 'switch',
        'priority' => 10,
        'default'  => 1,
        'choices'     => array(
            1  => esc_html__( 'Enable', 'regn' ),
            0 => esc_html__( 'Disable', 'regn' ),
        ),
    ) );

    Kirki::add_field( 'cl_regn', array(
        'settings' => 'back_to_top',
        'label'    => esc_html__( 'Back To Top', 'regn' ),
        'tooltip'    => esc_html__( 'Enable this option to show the "Back to Top" button on site', 'regn' ),
        'section'  => 'cl_general_options',
        'type'     => 'switch',
        'priority' => 10,
        'default'  => 0,
        'choices'     => array(
            1  => esc_html__( 'Show', 'regn' ),
            0 => esc_html__( 'Hide', 'regn' ),
        ),
        'transport' => 'refresh'
    ) );

    Kirki::add_field( 'cl_regn', array(
        'settings' => 'jpeg_quality',
        'label'    => esc_html__( 'JPEG Quality', 'regn' ),
        'section'  => 'cl_general_options',
        'type'     => 'slider',
        'priority' => 10,
        'default'  => 82,
        'choices'     => array(
            'min' => '0',
            'max' => '100',
            'step' => '1'
        ),
        'refresh' => 'postMessage',
        'tooltip' => esc_html__( 'Increase or decrease the compression level for JPEG Images', 'regn' )

    ) );

    
    Kirki::add_field( 'cl_regn', array(
        'type'        => 'textarea',
        'settings'    => '404_error_message',
        'label'       => esc_html__( '404 Error Message', 'regn' ),
        'section'     => 'cl_general_options',
        'default'     => esc_html__('It looks like nothing was found at this location. Maybe try a search?', 'regn' ),
        'priority'    => 10,
        'transport' => 'postMessage'
    ) );
?>