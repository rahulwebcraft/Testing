<?php

Kirki::add_section( 'cl_buttons', array(
    'title'          => esc_attr__( 'Buttons', 'regn' ),
    'description'    => esc_attr__( 'Buttons Default Options', 'regn' ),
    'type'			 => '',
    'priority'		 => 10,
    'capability'     => 'edit_theme_options'
) );


Kirki::add_field('cl_regn', array(
	'settings' => 'button_color',
	'label' => esc_attr__('Button Colors', 'regn') ,
	'section' => 'cl_buttons',
	'type' => 'radio-buttonset',
	'default' => 'normal',
	'priority' => 10,
	'choices' => array(
		'normal' => esc_attr__('Normal', 'regn') ,
        'alt' => esc_attr__('Alternative', 'regn')
	) ,
	'transport' => 'postMessage',
));


Kirki::add_field('cl_regn', array(
	'settings' => 'button_size',
	'label' => esc_attr__('Button Size', 'regn') ,
	'tooltip' => esc_attr__('Select predefined button sizes', 'regn') ,
	'section' => 'cl_buttons',
	'type' => 'radio-buttonset',
	'default' => 'medium',
	'priority' => 10,
	'choices' => array(
		'small' => esc_attr__('Small', 'regn') ,
        'medium' => esc_attr__('Medium', 'regn'),
        'large' => esc_attr__('Large', 'regn'),
        'custom' => esc_attr__('Custom', 'regn'),
	) ,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_regn', array(
	'settings' => 'button_custom_typography',
	'description' => esc_attr__('Typography', 'regn') ,
	'tooltip' => esc_attr__('Set custom typography for buttons', 'regn') ,
	'section' => 'cl_buttons',
	'type' => 'typography',
	'priority' => 10,
	'default' => array(
		'font-family' => 'Poppins',
		'variant' => '600',
		'font-size' => '12px',
		'line-height' => '20px',
		'letter-spacing' => '0.5px',
		'text-align' => 'center',
		'text-transform' => 'uppercase',
	) ,
    'transport' => 'auto',
    'output' => array(
        array(
            'element' => '.cl-btn--size-custom'
        )
    ),
    'required'    => array(
        array(
            'setting'  => 'button_size',
            'operator' => '==',
            'value'    => 'custom',
            'transport' => 'postMessage'
        ),
                    
    ),
));

Kirki::add_field( 'cl_regn', array(
    'settings'  => 'button_custom_padding',
    'section'   => 'cl_buttons',
    'description'     => esc_html__( 'Button Padding', 'regn' ),
    'type'      => 'spacing',
    'default'   => array(
      'top'    => '5px',
      'right'  => '10px',
      'bottom' => '5px',
      'left'   => '10px',
    ),
    'transport' => 'auto',
    'output'    => array(
      array(
        'element'  => '.cl-btn--size-custom',
        'property' => 'padding',
      ),
    ),
    'required'    => array(
        array(
            'setting'  => 'button_size',
            'operator' => '==',
            'value'    => 'custom',
            'transport' => 'postMessage'
        ),
                    
    ),
  ) );

  Kirki::add_field('cl_regn', array(
	'settings' => 'button_style',
	'label' => esc_attr__('Button Style', 'regn') ,
	'tooltip' => esc_attr__('Select form of button', 'regn') ,
	'section' => 'cl_buttons',
	'type' => 'radio-buttonset',
	'default' => 'rounded',
	'priority' => 10,
	'choices' => array(
        'square' => esc_attr__('Square', 'regn') ,
		'small-radius' => esc_attr__('Small Radius', 'regn') ,
        'rounded' => esc_attr__('Rounded', 'regn'),
        'only_text' => esc_attr__('Text', 'regn'),
	) ,
	'transport' => 'postMessage',
));

  Kirki::add_field('cl_regn', array(
	'settings' => 'button_border',
	'label' => esc_attr__('Button Border', 'regn') ,
	'tooltip' => esc_attr__('Button Border Width', 'regn') ,
	'section' => 'cl_buttons',
	'type' => 'slider',
	'default' => '1',
    'priority' => 10,
	'choices' => array(
		'min' => '0',
		'max' => '10',
		'step' => '1',
	) ,
    'transport' => 'auto',
    'output' => array(

        array(
            'element' => '.cl-btn',
            'property' => 'border-width',
            'suffix' => 'px'
        )

    )
));

?>