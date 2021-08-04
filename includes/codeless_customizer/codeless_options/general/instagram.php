<?php

Kirki::add_section( 'cl_general_insta', array(
    'title'          => esc_attr__( 'Instagram', 'regn' ),
    'description'    => esc_attr__( 'Instagram', 'regn' ),
    'panel'          => 'cl_general',
    'priority'       => 5,
    'type'			 => '',
    'capability'     => 'edit_theme_options'
) );


Kirki::add_field( 'cl_regn', array(
    'settings' => 'show_instagram_feed_token',
    'label'    => esc_attr__( 'Instagram Feed Token', 'regn' ),
    'section'  => 'cl_general_insta',
    'type'     => 'text',
    'priority' => 10,
    'default'  => '',
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0 => esc_attr__( 'Off', 'regn' ),
    ),

) );


Kirki::add_field( 'cl_regn', array(
    'settings' => 'show_instagram_feed_userid',
    'label'    => esc_attr__( 'Instagram Feed User Id', 'regn' ),
    'section'  => 'cl_general_insta',
    'type'     => 'text',
    'priority' => 10,
    'default'  => '',
    'choices'     => array(
        1  => esc_attr__( 'On', 'regn' ),
        0 => esc_attr__( 'Off', 'regn' ),
    ),
) );

?>