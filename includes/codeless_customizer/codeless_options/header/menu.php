<?php

/* --------------------- MENU ------------------------------*/

Kirki::add_section('cl_header_menu', array(
	'title' => esc_attr__('Menu', 'regn') ,
	'tooltip' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 6,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_regn', array(
	'type' => 'select',
	'settings' => 'header_menu_id',
	'label' => 'Menu',
	'tooltip' => 'Select one menu to display',
	'default' => 'main',
	'choices' => codeless_get_all_wordpress_menus(),
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'transport' => 'refresh'
));

Kirki::add_field('cl_regn', array(
	'type' => 'select',
	'settings' => 'header_menu_style',
	'label' => 'Main Menu Style',
	'tooltip' => 'Select the Main Navigation Items Style',
	'default' => 'simple',
	'choices' => array(
		'simple' => 'Simple',
		'border_top' => 'Border Top',
		'border_bottom' => 'Border Bottom',
		'fullscreen-overlay' => 'Fullscreen Overlay',
		'background_color' => 'Item Background Color',
		'open_inline' => 'Open Navigation Inline',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
));

Kirki::add_field('cl_regn', array(
	'settings' => 'header_menu_logo_center',
	'label' => esc_attr__('Logo in center of navigation', 'regn') ,
	'tooltip' => esc_attr__('Switch on to place the logo between menu items. After activating the actual logo element will be show only on mobile.', 'regn') ,
	'section' => 'cl_header_menu',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'regn') ,
		0 => esc_attr__('Off', 'regn') ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_regn', array(
	'type' => 'select',
	'settings' => 'header_menu_logo_center_position',
	'description' => 'Show logo after {X} menu items',
	'tooltip' => 'Specify the number of items after which logo should be displayed',
	'default' => '3',
	'choices' => array(
		'2' => '2',
		'3' => '3',
		'4' => '4',
		'5' => '5',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'required' => array(
        array(
			'setting' => 'header_menu_logo_center',
			'operator' => '==',
			'value' => true
        )
    )
));


Kirki::add_field('cl_regn', array(
	'type' => 'select',
	'settings' => 'header_menu_overlay_style',
	'label' => 'Overlay Menu Style',
	'tooltip' => 'Select the Overlay Menu Style',
	'default' => 'vertical',
	'choices' => array(
		'vertical' => 'Vertical',
		'horizontal' => 'Horizontal',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'required' => array(
        array(
			'setting' => 'header_menu_style',
			'operator' => '==',
			'value' => 'fullscreen-overlay'
        )
    )
));


Kirki::add_field('cl_regn', array(
	'type' => 'slider',
	'settings' => 'header_space_menu',
	'label' => 'Space between Menu Items',
	'default' => 15,
	'choices' => array(
		'min' => '0',
		'max' => '40',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.cl-header__menu > li',
			'units' => 'px',
			'property' => 'padding-left',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.cl-header__menu > li',
			'units' => 'px',
			'property' => 'padding-right',
			'media_query' => '@media (min-width: 992px)'
		) ,
	) ,
));


Kirki::add_field('cl_regn', array(
	'type' => 'typography',
	'settings' => 'menu_font',
	'label' => esc_attr__('Menu Typography', 'regn') ,
	'section' => 'cl_header_menu',
	'into_group' => true,
	'default' => array(
		'font-family' => 'Lato',
		'variant' => '400',
		'font-size' => '12px',
		'line-height' => '26px',
		'letter-spacing' => '0.0px',
		'text-align' => 'center',
		'text-transform' => 'uppercase',
	) ,
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('menu_font')
		) ,
	) ,
));


Kirki::add_field('cl_regn', array(
	'type' => 'typography',
	'settings' => 'dropdown_hassubmenu_item',
	'label' => esc_attr__('Submenu Title Typography', 'regn'),
	'tooltip' => esc_attr__('Applied on megamenu title, submenu title and mobile', 'regn'),
	'section' => 'cl_header_menu',
	'into_group' => true,
	'default' => array(
		'variant' => '700',
		'font-size' => '12px',
		'line-height' => '24px',
		'letter-spacing' => '0.0px',
		'text-transform' => '',
		'font-weight' => '700',
		'font-family' => 'Montserrat'
	) , 
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.cl-header__menu__megamenu h6, .cl-header__menu li ul li.has-submenu > a, .cl-mobile-menu nav > ul > li > a'
		) ,
	) ,
));
Kirki::add_field('cl_regn', array(
	'type' => 'typography',
	'settings' => 'dropdown_item_typography',
	'label' => esc_attr__('Submenu Items Typography', 'regn') ,
	'tooltip' => esc_attr( 'All other items without Submenu, Except Main Navigation Items.', 'regn' ),
	'section' => 'cl_header_menu',
	'into_group' => true,
	'default' => array(
		'font-size' => '14px',
		'line-height' => '24px',
		'variant' => '400',
		'letter-spacing' => '0px',
		'text-transform' => 'none',
	) ,
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.cl-header__navigation.cl-mobile-menu li a, .cl-header__navigation:not(.cl-mobile-menu) .cl-header__menu li ul li:not(.has-submenu) a, .cl-submenu a, .cl-submenu .empty, .cl-header__tool--shop .total'
		) ,
	) ,
));

Kirki::add_field('cl_regn', array(
	'settings' => 'header_mobile_menu_hamburger_color',
	'label' => esc_attr__('Mobile Menu Hamburger Color', 'regn') ,
	'section' => 'cl_header_menu',
	'type' => 'radio-buttonset',
	'default' => 'dark',
	'priority' => 10,
	'choices' => array(
		'light' => esc_attr__('Light', 'regn') ,
		'dark' => esc_attr__('Dark', 'regn') ,
	) ,
	'transport' => 'postMessage',
));


Kirki::add_field( 'cl_regn', array(
    'settings' => 'menu_items_animation',
    'label'    => esc_attr__( 'Menu Items Animation', 'regn' ),
    
    'section'  => 'cl_header_menu',
    'type'     => 'select',
    'priority' => 10,
    'default'  => 'none',
    'choices' => array(
        'none'	=> 'None',
        'top-t-bottom' =>	'Top-Bottom',
        'bottom-t-top' =>	'Bottom-Top',
        'right-t-left' => 'Right-Left',
        'left-t-right' => 'Left-Right',
        'alpha-anim' => 'Fade-In',	
        'zoom-in' => 'Zoom-In',	
        'zoom-out' => 'Zoom-Out',
        'zoom-reverse' => 'Zoom-Reverse',
    )
) );

?>