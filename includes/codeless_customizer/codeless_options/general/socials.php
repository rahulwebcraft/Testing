<?php

Kirki::add_section( 'cl_general_socials', array(
    'title'          => esc_attr__( 'Social Networks Links', 'regn' ),
    'description'    => esc_attr__( 'Set links of wesite social networks', 'regn' ),
    'panel'          => 'cl_general',
    'priority'       => 5,
    'type'			 => '',
    'capability'     => 'edit_theme_options'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'facebook_link',
    'label'       => esc_attr__( 'Facebook', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'twitter_link',
    'label'       => esc_attr__( 'Twitter', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'google_link',
    'label'       => esc_attr__( 'Google', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'dribbble_link',
    'label'       => esc_attr__( 'Dribbble', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'foursquare_link',
    'label'       => esc_attr__( 'Foursquare', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'pinterest_link',
    'label'       => esc_attr__( 'Pinterest', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'youtube_link',
    'label'       => esc_attr__( 'Youtube', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'linkedin_link',
    'label'       => esc_attr__( 'Linkedin', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'email_link',
    'label'       => esc_attr__( 'Email', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'instagram_link',
    'label'       => esc_attr__( 'Instagram', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );
Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'github_link',
    'label'       => esc_attr__( 'Github', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'skype_link',
    'label'       => esc_attr__( 'Skype', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );
Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'soundcloud_link',
    'label'       => esc_attr__( 'Soundcloud', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'slack_link',
    'label'       => esc_attr__( 'Slack', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );

Kirki::add_field( 'cl_regn', array(
    'type'        => 'text',
    'settings'    => 'behance_link',
    'label'       => esc_attr__( 'Behance', 'regn' ),
    'section'     => 'cl_general_socials',
    'priority'    => 10,
    'transport' => 'postMessage'
) );