<?php

Cl_Post_Meta::map(array(
    'post_type' => array('page', 'post'),
    'priority' => 2,
    'id' => 'layout',
    'type' => 'select',
    'name' => esc_attr__( 'Page Layout', 'regn' ),
    'group_in' => 'layout_sect',
    'std' => 'default',
    'default' => 'default',
    'options'     => array(
        'default' => esc_attr__( '--Site Default--', 'regn' ),
        'fullwidth' => esc_attr__( 'Fullwidth', 'regn' ),
        'left_sidebar'  => esc_attr__( 'Left Sidebar', 'regn' ),
        'right_sidebar'  => esc_attr__( 'Right Sidebar', 'regn' ),
     ),
 ));

 Cl_Post_Meta::map(array(
   
    'post_type' => array('page', 'post'),
    'priority' => 2,
    'id' => 'fullwidth_content',
    'type' => 'select',
    'name' => 'Fullwidth Content',
    'desc' => 'Remove container from page and show page content from left of the screen to the right',
    'options'     => array(
       'default' => esc_attr__( '--Site Default--', 'regn' ),
       0 => esc_attr__( 'Off', 'regn' ),
       1  => esc_attr__( 'On', 'regn' ),
    ),
    'group_in' => 'layout_sect',
    'std' => 'default'
    
 ));

 Cl_Post_Meta::map(array(
   
    'post_type' => array('page', 'post'),
    'priority' => 2,
    'id' => 'wrapper_content',
    'type' => 'select',
    'name' => 'Wrapper Content',
    'desc' => 'Add a wrapper on page content, create a modern styling of page.',
    'options'     => array(
       'default' => esc_attr__( '--Site Default--', 'regn' ),
       0 => esc_attr__( 'Off', 'regn' ),
       1  => esc_attr__( 'On', 'regn' ),
    ),
    'group_in' => 'layout_sect',
    'std' => 'default'
    
 ));

 Cl_Post_Meta::map(array(
   
    'post_type' => array('page', 'post'),
    'priority' => 2,
    'id' => 'header_color',
    'type' => 'select',
    'name' => 'Header Color',
    'options'     => array(
       'default' => esc_attr__( '--Site Default--', 'regn' ),
       'dark' => esc_attr__( 'Dark', 'regn' ),
       'light'  => esc_attr__( 'Light', 'regn' ),
    ),
    'group_in' => 'layout_sect',
    'std' => 'default'
    
 ));
 Cl_Post_Meta::map(array(
   
    'post_type' => array('page', 'post'),
    'priority' => 2,
    'id' => 'header_transparent',
    'type' => 'select',
    'name' => 'Header Transparent',
    'options'     => array(
       'default' => esc_attr__( '--Site Default--', 'regn' ),
       0 => esc_attr__( 'Off', 'regn' ),
       1  => esc_attr__( 'On', 'regn' ),
    ),
    'group_in' => 'layout_sect',
    'std' => 'default'
    
 ));



// ---------- One Page -------------

Cl_Post_Meta::map(array(
   'post_type' => 'page',
   'priority' => 2,
   'id' => 'select_slider',
   'type' => 'post',
   'name' => esc_attr__( 'Select Codeless Slider', 'regn' ),
   'group_in' => 'general',
   'post_type' => array( 'codeless_slider' ),
   'field_type' => 'select_advanced',
   'std' => '',
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'one_page',
   'priority' => 3,
   'id' => 'one_page',
   'type' => 'select',
   'name' => 'Page as One Page',
   'desc' => 'Make this page acts as a one page. Please add a custom id for each section and connect it with a menu item.',
   'options'     => array(
      'off' => esc_attr__( 'Off', 'regn' ),
      'on'  => esc_attr__( 'On', 'regn' ),
      
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'one_page',
   'transport' => 'auto', 
   'std' => 0
   
));


// ---------- Page Layout ------------- //

Cl_Post_Meta::map(array(
    'post_type' => array('page', 'portfolio'),
    'priority' => 2,
    'id' => 'page_header_bool',
    'type' => 'select',
    'name' => esc_attr__( 'Page Header Active', 'regn' ),
    'desc' => esc_attr__( 'Switch On to add page header to this page.', 'regn' ),
    'group_in' => 'page_header',
    'options'     => array(
        'default' => esc_attr__( '--Site Default--', 'regn' ),
        0  => esc_attr__( 'Off', 'regn' ),
        1  => esc_attr__( 'On', 'regn' ),
     ),
    'std' => 'default',
    'style' => 'rounded',
    'yes_label' => '<i class="dashicons dashicons-yes"></i>'
 ));

Cl_Post_Meta::map(array(
   'post_type' => array('page', 'portfolio'),
    'priority' => 2,
    'id' => 'page_header_title',
    'type' => 'text',
    'name' => esc_attr__( 'Page Header Title', 'regn' ),
    'desc' => esc_attr__( 'Add if you need a page header title different from the actual page title', 'regn' ),
    'group_in' => 'page_header',
    'std' => '',
    'placeholder' => esc_attr__( 'Leave empty to use same as Page Title', 'regn' ),
    'size' => 60,
 ));

 Cl_Post_Meta::map(array(
   'post_type' => array('page', 'portfolio'),
    'priority' => 2,
    'id' => 'page_header_desc',
    'type' => 'textarea',
    'name' => esc_attr__( 'Page Header Description', 'regn' ),
    'desc' => esc_attr__( 'Add some description to the page header', 'regn' ),
    'group_in' => 'page_header',
    'std' => '',
    'placeholder' => esc_attr__( 'Leave empty if you dont need description', 'regn' ),
    'size' => 60,
 ));

 Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'portfolio'),
    'priority' => 2,
    'id' => 'page_header_default',
    'type' => 'select',
    'name' => 'Page Header Values',
    'desc' => 'The default page header is set on Customizer -> Layout -> Site Defaults',
    'options'     => array(
       'default' => esc_attr__( '--Site Default--', 'regn' ),
       'custom'  => esc_attr__( 'Custom', 'regn' ),
    ),
    'group_in' => 'page_header',
    'inline_control' => true,
    'transport' => 'postMessage', 
    'std' => 0,

    
 ));

 Cl_Post_Meta::map(array(
   'post_type' => array('page', 'portfolio'),
    'priority' => 2,
    'id' => 'page_header_bg_color',
    'type' => 'color',
    'name' => esc_attr__( 'Page Header Background Color', 'regn' ),
    'desc' => esc_attr__( 'Page Header Background Color, in case that you use image too, this color will be used as overlay color', 'regn' ),
    'group_in' => 'page_header',
    'alpha_channel' => true,
    'std' => '#fafafa',
    'alpha_channel' => true,
    'visible' => array(
        'page_header_default',
        'contains',
        'custom'
    )
 ));

 Cl_Post_Meta::map(array(
   'post_type' => array('page', 'portfolio'),
    'priority' => 2,
    'id' => 'page_header_bg_image',
    'type' => 'single_image',
    'name' => esc_attr__( 'Page Header Background Image', 'regn' ),
    'desc' => esc_attr__( 'In case you select an image as background, background color will be used as overlay', 'regn' ),
    'group_in' => 'page_header',
    'std' => '',
    'visible' => array(
        'page_header_default',
        'contains',
        'custom'
    )
 ));

 Cl_Post_Meta::map(array(
   'post_type' => array('page', 'portfolio'),
    'priority' => 2,
    'id' => 'page_header_style',
    'type' => 'select',
    'name' => esc_attr__( 'Page Header Style', 'regn' ),
    'desc' => esc_attr__( 'Select one of the predefined styles of page header', 'regn' ),
    'group_in' => 'page_header',
    'options' => array(
        'all_center' => esc_attr__( 'All Center', 'regn' ),
        'with_breadcrumbs' => esc_attr__( 'With Breadcrumbs', 'regn' )
    ),
    'std' => 'with_breadcrumbs',
    'visible' => array(
        'page_header_default',
        'contains',
        'custom'
    )
 ));

 Cl_Post_Meta::map(array(
   'post_type' => array('page', 'portfolio'),
    'priority' => 2,
    'id' => 'page_header_color',
    'type' => 'select',
    'name' => esc_attr__( 'Page Header  Text Color', 'regn' ),
    'desc' => esc_attr__( 'Select light when using a dark color/background page header', 'regn' ),
    'group_in' => 'page_header',
    'options' => array(
        'dark' => esc_attr__( 'Dark', 'regn' ),
        'light' => esc_attr__( 'Light', 'regn' )
    ),
    'std' => 'dark',
    'visible' => array(
        'page_header_default',
        'contains',
        'custom'
    )
 ));

 Cl_Post_Meta::map(array(
   'post_type' => array('page', 'portfolio'),
    'priority' => 2,
    'id' => 'page_header_height',
    'type' => 'number',
    'name' => esc_attr__( 'Page Header Height', 'regn' ),
    'desc' => esc_attr__( 'Suggested heights: 500px for Centered Style & 280px for Classic Breadcrumbs', 'regn' ),
    'group_in' => 'page_header',
    'min' => 90,
    'max' => 1000,
    'step' => 1,
    'std' => 280,
    'visible' => array(
        'page_header_default',
        'contains',
        'custom'
    )
 ));

 Cl_Post_Meta::map(array(
   'post_type' => 'page',
   'priority' => 2,
   'id' => 'page_background_color',
   'type' => 'color',
   'name' => esc_attr__( 'Page Custom BG Color', 'regn' ),
   'group_in' => 'general',
   'std' => '',
));


// --------------------- Other Page dividers --------------------------------





// Post


Cl_Post_Meta::map(array(
    'type' => 'select',
    'name' => 'Post Header Text Color',
    'options'     => array(
       'default'  => esc_attr__( '-- Site Default --', 'regn' ),
       'dark'  => esc_attr__( 'Dark', 'regn' ),
       'light'  => esc_attr__( 'Light', 'regn' ),
    ),
    'inline_control' => true,
    'group_in' => 'post_data',
    'id' => 'post_header_color',
    'transport' => 'auto', 
    'std' => 'default',
 ));

 Cl_Post_Meta::map(array(
   'type' => 'select',
   'name' => 'Post Header Layout',
   'options'     => array(
      'default'  => esc_attr__( '-- Site Default --', 'regn' ),
      'container'  => esc_attr__( 'In Container', 'regn' ),
      'fullwidth'  => esc_attr__( 'Fullwidth', 'regn' ),
   ),
   'inline_control' => true,
   'group_in' => 'post_data',
   'id' => 'post_header_layout',
   'transport' => 'auto', 
   'std' => 'default',
));



// Single Portfolio



Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_custom_link',
   'id' => 'portfolio_custom_link',
   'type' => 'text',
   'dynamic' => true,
   'name' => 'Custom Link',
   'priority' => 1,
   'group_in' => 'portfolio_data',
   'id' => 'portfolio_custom_link',
   'transport' => 'postMessage', 
   'std' => '',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_masonry_layout',
   'id' => 'portfolio_masonry_layout',
   'type' => 'image_select',
   'name' => 'Masonry Layout',
   'desc' => esc_attr__('Use this when portfolio isotope is selected as style', 'regn'),
   'options'     => array(
      'small'  => get_template_directory_uri().'/img/masonry-small.jpg',
      'long' => get_template_directory_uri().'/img/masonry-large1.jpg',
      'wide' => get_template_directory_uri().'/img/masonry-large2.jpg',
      
   ),
   'inline_control' => true,
   'group_in' => 'portfolio_data',
   'id' => 'portfolio_masonry_layout',
   'transport' => 'auto', 
   'std' => 'small',
));




// Single Staff


Cl_Post_Meta::map(array(
   
   'post_type' => 'staff',
   'feature' => 'staff_position',
   'id' => 'staff_position',
   'type' => 'text',
   'dynamic' => true,
   'name' => 'Staff Position',
   'priority' => 1,
   'id' => 'staff_position',
   'group_in' => 'staff_data',
   'transport' => 'postMessage', 
   'std' => 'Developer',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'staff',
   'feature' => 'staff_link',
   'id' => 'staff_link',
   'type' => 'text',
   'dynamic' => true,
   'name' => 'Custom Link',
   'priority' => 1,
   'id' => 'staff_link',
   'group_in' => 'staff_data',
   'transport' => 'postMessage', 
   'std' => '',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'staff',
   'feature' => 'staff_facebook',
   'id' => 'staff_facebook',
   'type' => 'text',
   'dynamic' => true,
   'name' => esc_attr('Facebook Link', 'regn'),
   'priority' => 1,
   'id' => 'staff_facebook',
   'group_in' => 'staff_data',
   'transport' => 'postMessage', 
   'std' => '#',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'staff',
   'feature' => 'staff_twitter',
   'id' => 'staff_twitter',
   'type' => 'text',
   'dynamic' => true,
   'name' => esc_attr('Twitter Link', 'regn'),
   'priority' => 1,
   'id' => 'staff_twitter',
   'group_in' => 'staff_data',
   'transport' => 'postMessage', 
   'std' => '#',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'staff',
   'feature' => 'staff_skype',
   'id' => 'staff_skype',
   'type' => 'text',
   'dynamic' => true,
   'name' => esc_attr('Skype Link', 'regn'),
   'priority' => 1,
   'id' => 'staff_skype',
   'group_in' => 'staff_data',
   'transport' => 'postMessage', 
   'std' => '#',
   
));


Cl_Post_Meta::map(array(
   
   'post_type' => 'testimonial',
   'feature' => 'testimonial_position',
   'id' => 'testimonial_position',
   'type' => 'text',
   'dynamic' => true,
   'name' => 'Testimonial Author Position',
   'priority' => 1,
   'id' => 'testimonial_position',
   'group_in' => 'testimonial_data',
   'transport' => 'postMessage', 
   'std' => 'Developer',
   
));




$socials = codeless_get_team_social_list();
if( ! empty($socials) ):

   foreach($socials as $social):

      Cl_Post_Meta::map(array(
         
         'post_type' => 'staff',
         'feature' => $social['id'].'_link',
         'id' => $social['id'].'_link',
         'type' => 'text',
         'name' => ucfirst($social['id']),
         'priority' => 1,
         'dynamic' => true,
         'group_in' => 'staff_social',
         'id' => $social['id'].'_link',
         'transport' => 'auto', 
         'std' => '',
         
      ));

   endforeach;

endif;




/* Slider */

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'slider_style',
   'type' => 'select',
   'name' => esc_attr__( 'Slider Style', 'regn' ),
   'group_in' => 'slider_layout',
   'options' => array(
       'simple' => esc_attr__( 'Simple', 'regn' ),
       'semicarousel' => esc_attr__( 'Semi Carousel Centered', 'regn' ),
       'carousel' => esc_attr__( 'Carousel', 'regn' ),
       'modern' => esc_attr__( 'Modern', 'regn' )
   ),
   'std' => 'simple',

));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'simple_slider_align',
   'type' => 'select',
   'name' => esc_attr__( 'Simple Slider Post Align', 'regn' ),
   'group_in' => 'slider_layout',
   'options' => array(
       'left' => esc_attr__( 'Left', 'regn' ),
       'center' => esc_attr__( 'Center', 'regn' )
   ),
   'std' => 'left',
   'visible' => array(
      'slider_style',
      'contains',
      'simple'
   )
));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'simple_slider_image',
   'type' => 'select',
   'name' => esc_attr__( 'Simple Slider Image', 'regn' ),
   'group_in' => 'slider_layout',
   'options' => array(
       'no' => esc_attr__( 'Without Image', 'regn' ),
       'yes' => esc_attr__( 'With Image', 'regn' )
   ),
   'std' => 'no',
   'visible' => array(
      'slider_style',
      'contains',
      'simple'
   )
));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'semi_carousel_box_color',
   'type' => 'select',
   'name' => esc_attr__( 'Semi Carousel Slider Box color', 'regn' ),
   'group_in' => 'slider_layout',
   'options' => array(
       'dark' => esc_attr__( 'Dark Box', 'regn' ),
       'white' => esc_attr__( 'White Box', 'regn' )
   ),
   'std' => 'white',
   'visible' => array(
      'slider_style',
      'contains',
      'semicarousel'
   )
));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'carousel_slider_columns',
   'type' => 'select',
   'name' => esc_attr__( 'Carousel Slider Columns', 'regn' ),
   'group_in' => 'slider_layout',
   'options' => array(
       '2' => esc_attr__( 'Two Columns', 'regn' ),
       '3' => esc_attr__( 'Three Columns', 'regn' ),
       '4' => esc_attr__( 'Four Columns', 'regn' )
   ),
   'std' => '3',
   'visible' => array(
      'slider_style',
      'contains',
      'carousel'
   )
));



Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'modern_slider_color',
   'type' => 'select',
   'name' => esc_attr__( 'Modern Slider Color', 'regn' ),
   'group_in' => 'slider_layout',
   'options' => array(
       'dark' => esc_attr__( 'Dark Text', 'regn' ),
       'light' => esc_attr__( 'Light Text', 'regn' )
   ),
   'std' => 'dark',
   'visible' => array(
      'slider_style',
      'contains',
      'modern'
   )
));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'slider_bg_color',
   'type' => 'color',
   'name' => esc_attr__( 'Slider BG Color', 'regn' ),
   'group_in' => 'slider_layout',
   'std' => '',
));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'slider_padding_top',
   'type' => 'text',
   'name' => esc_attr__( 'Slider Padding Top', 'regn' ),
   'group_in' => 'slider_layout',
   'std' => '0px',
   'step' => '1',
));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'slider_padding_bottom',
   'type' => 'text',
   'name' => esc_attr__( 'Slider Padding Bottom', 'regn' ),
   'group_in' => 'slider_layout',
   'std' => '0px',
   'step' => '1',
   
));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'slider_container',
   'type' => 'select',
   'name' => esc_attr__( 'Slider Container', 'regn' ),
   'group_in' => 'slider_layout',
   'options' => array(
       'fullwidth' => esc_attr__( 'Fullwidth', 'regn' ),
       'boxed' => esc_attr__( 'Boxed', 'regn' )
   ),
   'std' => 'fullwidth', 

));

// Slider Query
Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'slider_categories',
   'type' => 'taxonomy_advanced',
   'name' => esc_attr__( 'Post Categories', 'regn' ),
   'group_in' => 'slider_query',
   'field_type' => 'select_advanced',
   'multiple' => true
));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'slider_count',
   'type' => 'number',
   'name' => esc_attr__( 'Post Count', 'regn' ),
   'group_in' => 'slider_query',
   'step'        => '1',
				// Minimum value
   'min'         => 0,
   'placeholder' => 'Enter number of posts to show'
));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'slider_orderby',
   'type' => 'select',
   'name' => esc_attr__( 'Order By', 'regn' ),
   'group_in' => 'slider_query',
   'options'     => array(
      'none' =>  esc_attr__( 'None', 'regn' ),
      'date' =>  esc_attr__( 'Date', 'regn' ),
      'ID'   =>  esc_attr__( 'Post ID', 'regn' ),
      'title' =>  esc_attr__( 'Title', 'regn' ),
      'rand'  =>  esc_attr__( 'Random', 'regn' ),
      'post__in' => esc_attr__( 'Preserve Include Order', 'regn' )
   ),
));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'slider_order',
   'type' => 'select',
   'name' => esc_attr__( 'Order', 'regn' ),
   'group_in' => 'slider_query',
   'options'     => array(
      'desc' =>  esc_attr__( 'DESC', 'regn' ),
      'asc' =>  esc_attr__( 'ASC', 'regn' ),
   ),
));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'slider_include_only',
   'type' => 'post',
   'name' => esc_attr__( 'Include Only', 'regn' ),
   'group_in' => 'slider_query',
   'field_type' => 'select_advanced',
   'multiple' => true,
   'post_type'   => array( 'post' ),
));

Cl_Post_Meta::map(array(
   'post_type' => 'codeless_slider',
   'priority' => 2,
   'id' => 'slider_exclude',
   'type' => 'post',
   'name' => esc_attr__( 'Exclude', 'regn' ),
   'group_in' => 'slider_query',
   'field_type' => 'select_advanced',
   'multiple' => true,
   'post_type'   => array( 'post' ),
));

?>
