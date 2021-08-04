<?php

Kirki::add_panel( 'cl_blog', array(
	    'priority'    => 11,
	    'type' => '',
	    'title'       => esc_attr__( 'Blog', 'regn' ),
	    'tooltip' => esc_attr__( 'All Blog Styles and options', 'regn' ),
	) );


	require_once 'blog/archives.php';
	require_once 'blog/single.php';


?>