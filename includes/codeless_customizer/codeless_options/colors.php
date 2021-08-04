<?php

Kirki::add_panel( 'cl_colors', array(
    'title'          => esc_attr__( 'Colors', 'regn' ),
    'description'    => esc_attr__( 'All theme colors options', 'regn' ),
    'type'			 => '',
    'priority'       => 10,
    'capability'     => 'edit_theme_options'
) );


require_once 'colors/header.php';
require_once 'colors/page_header.php';
require_once 'colors/content.php';
require_once 'colors/footer.php';
require_once 'colors/copyright.php';
?>