<?php

Kirki::add_panel( 'cl_footer', array(
		'priority' => 12,
	    'type' => '',
	    'title'       => esc_attr__( 'Footer', 'regn' ),
	    'tooltip' => esc_attr__( 'Footer Options and Layout', 'regn' ),
	) );


	require_once 'footer/main.php';
	require_once 'footer/copyright.php';
?>