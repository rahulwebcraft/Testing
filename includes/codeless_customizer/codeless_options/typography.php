<?php

Kirki::add_panel( 'cl_typography', array(
    'title'          => esc_attr__( 'Typography', 'regn' ),
    'description'    => esc_attr__( 'All theme typography options', 'regn' ),
	'type'			 => '',
	'priority'		 => 9,
    'capability'     => 'edit_theme_options'
) );

require_once 'typography/general.php';
require_once 'typography/header.php';
require_once 'typography/blog.php';
require_once 'typography/elements.php';
require_once 'typography/footer.php';


?>