<?php

Kirki::add_panel( 'cl_layout', array(
	    'priority'    => 7,
	    'type' => '',
	    'title'       => esc_attr__( 'Layout', 'regn' ),
	    'tooltip' => esc_attr__( 'Overall site layout options', 'regn' ),
	) );


	require_once 'layout/site_layout.php';
	require_once 'layout/defaults.php';
	require_once 'layout/defaults_pages.php';
	require_once 'layout/defaults_posts.php';
	require_once 'layout/defaults_archives.php';
	if( class_exists( 'Woocommerce' ) ){
		require_once 'layout/defaults_woo_archives.php';
		require_once 'layout/defaults_woo_single.php';
	}

?>