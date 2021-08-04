<?php

/**
 * Load all styles from register_styles.php
 * Added with wp_add_inline_style on codeless_register_global_styles, action wp_enqueue_scripts
 * @since 1.0.0
 */
function codeless_custom_dynamic_style(){
    include get_template_directory().'/includes/register/register_styles.php';
}


/**
 * Apply Filters for given tag.
 * Use: add_filter('codeless_extra_classes_wrapper') for ex,
 * will add a custom class at wrapper html tag
 * 
 * @since 1.0.0
 * @version 1.0.3
 */
 
function codeless_extra_classes($tag){
    
    if( empty($tag) )
        return '';
      
    $classes = apply_filters('codeless_extra_classes_'.$tag, array()); 
    return (!empty($classes) ? implode(" ", $classes) : '');
}


/**
 * Apply Filters for given tag.
 * Use: add_filter('codeless_extra_attr_viewport') for ex,
 * will add a custom attr at viewport html tag
 * 
 * @since 1.0.0
 * @version 1.0.3
 */
 
function codeless_extra_attr($tag){
    
    if( empty($tag) )
        return '';
      
    $attrs = apply_filters('codeless_extra_attr_'.$tag, array()); 
    return (!empty($attrs) ? implode(" ", $attrs) : '');
}

/**
 * Core Function: Return the value of a specific Mod
 * 
 * @since 1.0.0
 */
function codeless_get_mod( $id, $default = '', $sub_array = '' ){

    //For Online

    global $codeless_online_mods, $cl_from_element;

    if( isset($cl_from_element[$id]) && !empty($cl_from_element[$id]) ){
        return $cl_from_element[$id];
    }

    if( isset($codeless_online_mods[$id])  && ! is_customize_preview() ){
        return $codeless_online_mods[$id];
    }


    if($default == '')
        $default = codeless_theme_mod_default($id);

    if ( is_customize_preview() ) {
        
        if($sub_array == '')
            return get_theme_mod( $id, $default );
        else if(isset($var[$sub_array])){
            $var = get_theme_mod( $id, $default );
            return $var[$sub_array];
        }
    }
    
    global $cl_theme_mods;
    
    if ( ! empty( $cl_theme_mods ) ) {

        if ( isset( $cl_theme_mods[$id] ) ) {

            if($sub_array == '')
                return $cl_theme_mods[$id];
            else
                return $cl_theme_mods[$id][$sub_array];
        }

        else {
            return $default;
        }

    }

    else {

        if($sub_array == '')
            return get_theme_mod( $id, $default );
        else if(isset($var[$sub_array])){
            $var = get_theme_mod( $id, $default );
            return $var[$sub_array];
        }
    }

}


/**
 * Generic Read Function
 * 
 * @since 1.0.0
 */
function codeless_generic_read_file($file){
    if( ! function_exists('codeless_builder_generic_read_file') )
        return false;

    return codeless_builder_generic_read_file( $file );
}


/**
 * Generic Read Function
 * 
 * @since 1.0.0
 */
function codeless_generic_get_content( $file ) {
    if( ! function_exists('codeless_builder_generic_get_content') )
        return false;

    return codeless_builder_generic_get_content( $file );
}


/**
 * Get the Default Value of a theme mod from Codeless Options
 * 
 * @since 1.0.0
 */
function codeless_theme_mod_default($id){

    if( class_exists('Kirki') && isset( Kirki::$fields[$id] ) && isset( Kirki::$fields[$id]['default'] ) && ! empty( Kirki::$fields[$id]['default'] ) )
        return Kirki::$fields[$id]['default'];
    else
        return '';
}


/**
 * Loop Counter
 * @since 1.0.0
 */
function codeless_loop_counter( $i = false ){
    global $codeless_loop_counter;
    
    if( $i !== false )
        $codeless_loop_counter = $i;
    
    return $codeless_loop_counter;
}


/**
 * Convert Width (1/2 or 1/3 etc) to col-sm-6... 
 * @since 1.0.0
 */
function codeless_width_to_span( $width ) {
    preg_match( '/(\d+)\/(\d+)/', $width, $matches );

    if ( ! empty( $matches ) ) {
        $part_x = (int) $matches[1];
        $part_y = (int) $matches[2];
        if ( $part_x > 0 && $part_y > 0 ) {
            $value = ceil( $part_x / $part_y * 12 );
            if ( $value > 0 && $value <= 12 ) {
                $width = codeless_cols_prepend() . $value;
            }
        }
    }

    return $width;
}

/**
 * Convert layout string (14_14_14_14) to an array of
 * 1/4, 1/4, 1/4, 1/4
 * @since 1.0.0
 */
function codeless_layout_to_array( $layout ){
    $layout_arr = explode( "_", $layout );
    $layout_ = array();

    foreach($layout_arr as $layout_col){
        $layout_col_arr = array();
        for ($i = 0, $l = strlen($layout_col); $i < $l; $i++) {
            $layout_col_arr[] = $layout_col[$i];
        }
        array_splice( $layout_col_arr, strlen($layout_col) / 2 , 0, '/' );
        $layout_[] = implode( '', $layout_col_arr );
    }
    
    return $layout_;
}


/**
 * Return true if have widget on given page sidebar
 * 
 * @since 1.0.0
 */
function codeless_is_active_sidebar(){

    return is_active_sidebar( codeless_get_sidebar_name() );
}


/**
 * Array of image crop positions
 *
 * @since 1.0.0
 */
function codeless_image_crop_positions() {
	return array(
		''              => esc_html__( 'Default', 'regn' ),
		'left-top'      => esc_html__( 'Top Left', 'regn' ),
		'right-top'     => esc_html__( 'Top Right', 'regn' ),
		'center-top'    => esc_html__( 'Top Center', 'regn' ),
		'left-center'   => esc_html__( 'Center Left', 'regn' ),
		'right-center'  => esc_html__( 'Center Right', 'regn' ),
		'center-center' => esc_html__( 'Center Center', 'regn' ),
		'left-bottom'   => esc_html__( 'Bottom Left', 'regn' ),
		'right-bottom'  => esc_html__( 'Bottom Right', 'regn' ),
		'center-bottom' => esc_html__( 'Bottom Center', 'regn' ),
	);
}


/**
 * List of share buttons and links
 * 
 * @since 1.0.0
 */
function codeless_share_buttons( $for_element = false ){
    
    // Get current page URL 
    $url = urlencode(get_permalink());
 
    // Get current page title
    $title = str_replace( ' ', '%20', get_the_title());
        
    // Get Post Thumbnail for pinterest
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
    
    $shares = array();

    
    $share_option = codeless_get_mod( 'blog_share_buttons', array( 'twitter', 'facebook', 'linkedin', 'email' ) );
    
    if( $for_element )
        $share_option = array( 'twitter', 'facebook', 'google', 'whatsapp', 'linkedin', 'pinterest' );
    
    // Construct sharing URL without using any script

    if( in_array( 'facebook', $share_option ) ){
        $shares['facebook']['link'] = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
        $shares['facebook']['icon'] = 'cl-icon-facebook';
    }

    
    if( in_array( 'twitter', $share_option ) ){
        $shares['twitter']['link'] = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$url;
        $shares['twitter']['icon'] = 'cl-icon-twitter';
    }
    
    
    
    if( in_array( 'google', $share_option ) ){
        $shares['google']['link'] = 'https://plus.google.com/share?url='.$url;
        $shares['google']['icon'] = 'cl-icon-google-plus';
    }
    
    if( in_array( 'whatsapp', $share_option ) ){
        $shares['whatsapp']['link'] = 'whatsapp://send?text='.$title . ' ' . $url;
        $shares['whatsapp']['icon'] = 'cl-icon-whatsapp';
    }
    
    if( in_array( 'linkedin', $share_option ) ){
        $shares['linkedin']['link'] = 'https://www.linkedin.com/shareArticle?mini=true&url='.$url.'&amp;title='.$title;
        $shares['linkedin']['icon'] = 'cl-icon-linkedin';
    }
    
    if( in_array( 'pinterest', $share_option ) ){
        $shares['pinterest']['link'] = 'https://pinterest.com/pin/create/button/?url='.$url.'&amp;media='.$thumbnail[0].'&amp;description='.$title;
        $shares['pinterest']['icon'] = 'cl-icon-pinterest';
    }

    if( in_array( 'email', $share_option ) ){
        $shares['pinterest']['link'] = 'mailto:?subject='.$title.'&body='.$url;
        $shares['pinterest']['icon'] = 'cl-icon-email';
    }
    
    
    return apply_filters( 'codeless_share_buttons', $shares, $title, $url, $thumbnail );
}





/**
 * Returns Header Element, used on codeless-customizer-options
 * 
 * @since 1.0.0
 */
if(!function_exists('codeless_load_header_element'))
{

    function codeless_load_header_element($element)
    {
        $output = '';      
        $template = locate_template('includes/codeless_builder/header-elements/'.$element.'.php');
        if(is_file($template)){
          ob_start();
            include( $template );
            $output = ob_get_contents();
            ob_end_clean();
        }
        return $output;
    }
}


/**
 * Convert hexdec color string to rgb(a) string
 * 
 * @since 1.0.0
 */
function codeless_hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
    
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}


/**
 * Get Meta by ID
 * 
 * @since 1.0.0
 * @version 1.0.5
 */
function codeless_get_meta( $meta, $default = '', $postID = '' ){
    /* for online */
    global $codeless_online_mods;
    if( isset($codeless_online_mods[$meta])  && ! is_customize_preview() ){
        return $codeless_online_mods[$meta];
    }

    if( function_exists('codeless_get_post_id') )
        $id = codeless_get_post_id();
    else
        $id = 0;
   
    if( $postID != '' )
        $id =  $postID;

    $value = get_post_meta( $id, $meta, true );
    $return = '';
    $nr = 0;

    if( is_array( $value ) )
        $nr = count($value);

    if( is_array( $value ) && ( count( $value ) == 1 || ( count($value) >= 2 && $value[0] == $value[1] )  ) )
        $return = $value[$nr-1];
    else
        $return = $value;

    if( is_array( $value ) && empty( $value ) )
        $return = '';
 

    if( $default != '' && ( $return == '' ) )
        return $default;
    
    return $return;
}



/**
  * Core function for retrieve all terms for a custom taxonomy
  *
  * @since 1.0.0
  */
  function codeless_get_terms( $term, $default_choice = false, $key_type = 'slug' ){ 
    $return = array();
    if( $term == 'post' ){
        $categories = get_categories( array(
            'orderby' => 'name',
            'parent'  => 0
        ) );
 
        foreach ( $categories as $category ) {
            $return[] = array( 'value' => $category->term_id, 'label' => $category->name );
        }
    }
    $terms = get_terms( $term );

    if( $default_choice )
        $return[esc_attr__( 'All', 'regn' )] = 'all';

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $return[ $term->{$key_type} ] = $term->name; 
        }
    }

    return $return;
}


 /**
  * Core function for retrieve all posts for a custom taxonomy
  *
  * @since 1.0.0
  */
  function codeless_get_items_by_term( $term ){ 
    $return = array();
    
    $posts_array = get_posts(
        array(
            'posts_per_page' => -1,
            'post_type' => $term,
        )
    );
    if( ! empty( $posts_array ) && ! is_wp_error( $posts_array )  ){
        foreach ( $posts_array as $post ) {
            $return[ $post->ID ] = $post->post_title; 
        }
    }

    return $return; 
}


/**
 * List of socials to use on Team
 * @since 1.0.0
 */
function codeless_get_team_social_list(){
    $list = array(
        array( 'id' => 'twitter', 'icon' => 'cl-icon-twitter' ),
        array( 'id' => 'facebook', 'icon' => 'cl-icon-facebook-f' ),
        array( 'id' => 'linkedin', 'icon' => 'cl-icon-linkedin' ),
        array( 'id' => 'whatsapp', 'icon' => 'cl-icon-whatsapp' ),
        array( 'id' => 'pinterest', 'icon' => 'cl-icon-pinterest' ),
        array( 'id' => 'google', 'icon' => 'cl-icon-google' ),
    );

    return apply_filters( 'codeless_team_social_list', $list );
}


/**
 * Strip Gallery Shortcode from Content
 * @since 1.0.0
 */
function codeless_strip_shortcode_gallery( $content ) {
    preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if( false !== $pos ) {
                    return substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
                }
            }
        }
    }

    return $content;
}


/**
 * Return a list of all image sizes
 *
 * @since 1.0.0
 */
function codeless_get_additional_image_sizes(){
    $add = codeless_wp_get_additional_image_sizes();
    $array = array('theme_default' => 'default', 'full' => 'full');

    foreach($add as $size => $val){
        $array[$size] = $size . ' - ' . $val['width'] . 'x' . $val['height'];
    }

    return $array;
}


/**
 * Check function for WP versions lower than WP 4.7
 *
 * @since 1.0.3
 */
function codeless_wp_get_additional_image_sizes(){
    if( function_exists( 'wp_get_additional_image_sizes' ) )
        return wp_get_additional_image_sizes();
    
    return array();
}


/**
 * Check if is a shop page
 * @since 1.0.0
 */
function codeless_is_shop_page(){
    if( class_exists( 'woocommerce' ) && is_shop() )
        return true;
    return false;
}


/**
 * return Page Parents
 * @since 1.0.0
 */
function codeless_page_parents() {
    global $post, $wp_query, $wpdb;
    
    if( (int) codeless_get_post_id() != 0 ){
      
        $post = $wp_query->post;

        if( is_object( $post ) ){

            $parent_array = array();
            $current_page = $post->ID;
            $parent = 1;

            while( $parent ) {

                $sql = $wpdb->prepare("SELECT ID, post_parent FROM $wpdb->posts WHERE ID = %d; ", array($current_page) );
                $page_query = $wpdb->get_row($sql);
                $parent = $current_page = $page_query->post_parent;
                if( $parent )
                    $parent_array[] = $page_query->post_parent;
                
            }

            return $parent_array;

        }
      
    }
    
}


/**
 * List Revolution Slides
 * @since 1.0.0
 */
function codeless_get_rev_slides(){

    if ( class_exists( 'RevSlider' ) ) {
        $slider = new RevSlider();
            $arrSliders = $slider->getArrSliders();

            $revsliders = array();
            if ( $arrSliders ) {
                foreach ( $arrSliders as $slider ) {
                    /** @var $slider RevSlider */
                    $revsliders[ $slider->getAlias() ] = $slider->getTitle() ;
                    $revsliders[ 0 ] = 'none';
                }
            } else {
                $revsliders[ 0 ] = 'none';
            }
        return (array) $revsliders;    
    }        
}


/**
 * List LayerSlider Slides
 * @since 1.0.0
 */
function codeless_get_layer_slides(){

    if( class_exists( 'LS_Sliders' )){
            $ls = LS_Sliders::find( array(
                'limit' => 999,
                'order' => 'ASC',
            ) );
            $layer_sliders = array();
            if ( ! empty( $ls ) ) {
                foreach ( $ls as $slider ) {
                    $layer_sliders[  $slider['id'] ] =  $slider['name'];
                }
            } else {
                $layer_sliders[ 0 ] = 'none';
            }
         return (array) $layer_sliders;   
    }

}


/**
 * List Google Fonts
 * @since 1.0.0
 */
function codeless_get_google_fonts(){
    $return = array('theme_default' => 'Theme Default');

    $google_fonts   = Kirki_Fonts::get_google_fonts();
    $standard_fonts = Kirki_Fonts::get_standard_fonts();

    $google_fonts = array_combine(array_keys($google_fonts), array_keys($google_fonts));
    $standard_fonts = array_combine(array_keys($standard_fonts), array_keys($standard_fonts));
    $return = array_merge($return, $google_fonts, $standard_fonts);

    return $return;
} 


/**
 * List of registered nav menus
 * @since 1.0.0
 */
function codeless_get_all_wordpress_menus(){
    $terms = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
    $menus = array(
        'default' => 'Default (Main Theme Location)'
    );

    if( count( $terms ) == 0 )
        return $menus;

    foreach($terms as $term){
        $menus[$term->slug] = $term->name;
    } 

    return $menus;
}


/**
 * in Future to update
 * @since 1.0.0
 */
function codeless_complex_esc( $data ){
    return $data;
}


/**
 * Load extra template parts for codeless-builder
 * @since 1.0.5
 */
function codeless_get_extra_template($template){
    include( get_template_directory() . '/template-parts/extra/' . $template . '.php' );
}



/**
 * Get a list of all registered sidebars
 * @since 1.0.5
 */
function codeless_get_registered_sidebars(){
    global $wp_registered_sidebars;
    $array = get_option( 'sidebars_widgets' );
    if( empty($array) )
        return array();

    $sidebars = array();

    foreach($array as $key => $val){
        if( $key == 'wp_inactive_widgets' )
            continue;
        if( isset( $wp_registered_sidebars[$key] ) ){

            $sidebars[$key] = $wp_registered_sidebars[$key]['name'];
        }
    }

    return $sidebars;
}


/**
 * Get a list of all custom sidebars per page
 * @since 1.0.5
 */
function codeless_get_custom_sidebar_pages(){
    $pages = codeless_get_mod( 'codeless_custom_sidebars_pages' );
    $return = array();

    if( ! empty( $pages ) ){

            foreach($pages as $page)
                $return[(int)$page] = get_the_title( (int)$page );
        
        return $return;
    }

    return array();

}


/**
 * Get a list of all custom sidebars per categories
 * @since 1.0.5
 */
function codeless_get_custom_sidebar_categories(){
    $categories = codeless_get_mod( 'codeless_custom_sidebars_categories' );
    $return = array();

    if( ! empty( $categories ) ){

            foreach($categories as $category){

                $category_name = get_the_category_by_ID( (int)$category );
                $return[(int)$category] = $category_name;
            }
        
        return $return;
    }

    return array();

}


/**
 * Get all Pages for options
 * @since 1.0.5
 */
function codeless_get_pages(){
    $pages = get_pages();

    if( empty( $pages ) )
        return array();

    $result = array();

    foreach( $pages as $page ){
        $result[ $page->ID ] = $page->post_title;
    }

    return $result;
}


/**
 * Calculate Masonry item size
 * @since 1.0.5
 */
function codeless_calculate_masonry_size($preset_alg){
    global $codeless_masonry_size;

    $preset = array( 'preset1' => array( 'large', 'small', 'small' ) );

    $order_index = (codeless_loop_counter() - 1) % 3 ;
    $codeless_masonry_size = $preset[$preset_alg][$order_index];

    return $codeless_masonry_size;
}


 /**
  * Core function for retrieve get option value from element
  *
  * @since 1.0.0
  */
  function codeless_get_from_element( $id, $default = '' ){
    global $cl_from_element;
    if( isset($cl_from_element[$id]) )
        return $cl_from_element[$id];
    else
        return $default;
}


 /**
  * Core function for retrieve get layout option value combined from all attributes
  *
  * @since 1.0.0
  */

  function codeless_get_layout_option( $id, $default = '' ){
    $value = $site_defaults = codeless_get_mod( $id, $default );
    
    if( is_page() && codeless_get_mod( 'overwrite_page_layout', 'default' ) == 'custom' )
        $value = codeless_get_mod( $id.'_page', $value );   

    if( is_single() && get_post_type() == 'post' && codeless_get_mod( 'overwrite_post_layout', 'default' ) == 'custom' )
        $value = codeless_get_mod( $id.'_post', $value );

    if( class_exists( 'Woocommerce' ) && is_product() && codeless_get_mod( 'overwrite_woo_single_layout', 'default' ) == 'custom' )
        $value = codeless_get_mod( $id.'_woo_single', $value );

    /* Page Header Check */
    if( ( is_page() || ( is_single() && ( get_post_type() == 'post' || get_post_type() == 'product' || get_post_type() == 'portfolio' ) ) ) && 
    ( strpos($id, 'page_header_bool') !== false && codeless_get_meta( 'page_header_bool', 'default', get_the_ID() ) != 'default' )   ){
        $value = codeless_get_meta( $id, 'default', get_the_ID() );
    }    

    if( ( is_page() || ( is_single() && ( get_post_type() == 'post' || get_post_type() == 'product' || get_post_type() == 'portfolio' ) ) ) && 
        ( strpos($id, 'page_header') !== false && strpos($id, 'page_header_bool') === false && codeless_get_meta( 'page_header_default', 'default', get_the_ID() ) != 'default' ) ){
   
        $value = codeless_get_meta( $id, 'default', get_the_ID() );
    }

    if( ( is_page() || ( is_single() && ( get_post_type() == 'post' || get_post_type() == 'product' || get_post_type() == 'portfolio' ) ) ) && 
        ( strpos($id, 'page_header') === false  && codeless_get_meta( $id, 'default', get_the_ID() ) != 'default' ) ){
        $value = codeless_get_meta( $id, 'default', get_the_ID() );
    }

    if( is_archive() && codeless_get_mod( 'overwrite_archive_layout', 'default' ) == 'custom'  )
        $value = codeless_get_mod( $id.'_archive', 'default' );
    
    if( class_exists( 'Woocommerce' ) && is_shop() && codeless_get_mod( 'overwrite_woo_archive_layout', 'default' ) == 'custom' )
        $value = codeless_get_mod( $id.'_woo_archive', $value );
    
    return $value;
}


 /**
  * Maintenance
  *
  * @since 1.0.0
  */
add_action( 'template_redirect', 'codeless_maintenance' );

function codeless_maintenance(){
    if( codeless_get_mod( 'maintenance_mode', true ) && codeless_get_mod( 'maintenance_page', '' ) != '' ){
        if( ! is_page( codeless_get_mod( 'maintenance_page' ) ) )
            wp_redirect( get_permalink( codeless_get_mod( 'maintenance_page' ) ), 301 );
    }
}

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'codeless_vc_as_theme' );
function codeless_vc_as_theme() {
  vc_set_as_theme();
}

/**
 * Disable Gutenberg for Pages when visual composer active
 */
/*if (version_compare($GLOBALS['wp_version'], '5.0-beta', '>'))
	add_filter('use_block_editor_for_post_type', 'codeless_disable_gutenberg_pages', 100, 2);
else
    add_filter('gutenberg_can_edit_post_type', 'codeless_disable_gutenberg_pages', 100, 2);
    
function codeless_disable_gutenberg_pages($is_enabled, $post_type) {
	
	if ($post_type === 'page' && function_exists('vc_set_as_theme') ) return false;
	
	return $is_enabled;
	
}*/




function codeless_post_galleries_data( $post, $options = array() ) {
	// Default data
	$data = array(
		'image_ids'		=> array(),
		'image_count'	=> 0,
		'galleries'		=> array(),
	);
	// Default values.
	$galleries_image_ids = array();
	$galleries_data = array();
	$get_attached_images = false;
	// Shortcode.
	// Gather IDs from all gallery shortcodes in content.
	// This is based on the core get_content_galleries() function but slimmed down to do only what is needed.
	if ( preg_match_all( '/' . get_shortcode_regex() . '/s', $post->post_content, $matches, PREG_SET_ORDER ) && ! empty( $matches ) ) {
		// Loop matching shortcodes
		foreach ( $matches as $shortcode ) {
			// Gallery shortcodes only
			if ( 'gallery' === $shortcode[2] ) {
				// Get shortcode attributes
				$gallery_data = shortcode_parse_atts( $shortcode[3] );
				$galleries_data[] = $galleries_data;
				// Has ID attributes, get 'em
				if ( ! empty( $gallery_data['ids'] ) ) {
					// Loop IDs from gallery shortcode
					$gallery_ids_raw = explode( ',', $gallery_data['ids'] );
					foreach ( $gallery_ids_raw as $gallery_id ) {
						// Remove whitespace and exclude empty values (ie. ", 12, ,42,")
						if ( $gallery_id = trim( $gallery_id ) ) {
							// Add to array containing imag IDs from all galleries in post
							$galleries_image_ids[] = $gallery_id;
						}
					}
				}
				// No ID attributes, in which case all attached images shown - get 'em
				else {
					$get_attached_images = true;
				}
			}
		}
	}
	// Gutenberg block.
	if ( preg_match( '/wp-block-gallery/', $post->post_content ) ) {
		// DOM.
		$dom = new domDocument;
		libxml_use_internal_errors( true ); // suppress errors caused by domDocument not recognizing HTML5.
		$dom->loadHTML( $post->post_content );
		libxml_clear_errors();
		// Get gallery blocks.
		$finder = new DomXPath( $dom );
		$gallery_blocks = $finder->query( "//*[contains(@class, 'wp-block-gallery')]" );
		// Loop gallery blocks.
		foreach ( $gallery_blocks as $gallery_block ) {
			$gallery_image_ids = array();
			// Get images.
   			$gallery_images = $gallery_block->getElementsByTagName( 'img' );
   			// Have gallery images.
   			if ( $gallery_images ) {
	   			// Loop images.
	   			foreach ( $gallery_images as $gallery_image ) {
	   				// Get ID attribute.
					$gallery_image_id = $gallery_image->getAttribute( 'data-id' );
					// Add ID to array.
					if ( $gallery_image_id ) {
						$gallery_image_ids[] = $gallery_image_id;
					}
				}
				// Have gallery image IDs.
				if ( $gallery_image_ids ) {
					$galleries_image_ids = array_merge( $galleries_image_ids, $gallery_image_ids );
				}
				// No ID attributes, in which case all attached images shown - get 'em
				else {
					$get_attached_images = true;
				}
			}
		}
	}
	// Get all attached images because at least one gallery had no IDs, which means to use all attached to the page.
	if ( $get_attached_images ) {
		// Get all attached images for this post
		$images = get_children( array(
			'post_parent' => $post->ID,
			'post_type' => 'attachment',
			'post_status' => 'inherit', // for attachments
			'post_mime_type' => 'image',
			'numberposts' => -1, // all
			'orderby' => 'menu_order', // want first manually ordered ('Add Media > Uploaded to this page' lets drag order)
			'order' => 'ASC'
		) ) ;
		// Found some?
		if ( ! empty( $images ) ) {
			// Add to array containing image IDs from all galleries in post
			$attached_image_ids = array_keys( $images );
			$galleries_image_ids = array_merge( $galleries_image_ids, $attached_image_ids );
		}
	}
	// Did we find some images?
	if ( $galleries_image_ids ) {
		// Remove duplicates
		$galleries_image_ids = array_unique( $galleries_image_ids );
		// Build array of data
		$data['image_ids'] = $galleries_image_ids;
		$data['image_count'] = count( $galleries_image_ids );
		$data['galleries'] = $galleries_data;
	}
	// Return filterable
	return $data;
}

function codeless_catch_content_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];

    return $first_img;
  }


  function codeless_get_permalink(){
    if( is_home() )
        return get_home_url();
    else
        return get_permalink();
  }


function codeless_page_from_builder(){
    
    global $codeless_page_from_builder;
    
    if( ! isset( $codeless_page_from_builder ) || is_null( $codeless_page_from_builder ) ){
        
        $codeless_page_from_builder = false;
        $page = get_page( codeless_get_post_id() );
        
        if( is_object($page) ){
            $content = $page->post_content;
            preg_match_all('/\[vc_row(.*?)\]/', $content, $matches_vc );
            preg_match_all('/\[cl_page_header(.*?)\]/', $content, $matches_cl_page_header );
            preg_match_all('/\[cl_row(.*?)\]/', $content, $matches_cl_row );
            
            if ( isset($matches_vc[0]) && !empty($matches_vc[0]) )
                $codeless_page_from_builder = true;
            
            if ( isset($matches_cl_page_header[0]) && !empty($matches_cl_page_header[0]) ) 
                $codeless_page_from_builder = true;
            if ( isset($matches_cl_row[0]) && !empty($matches_cl_row[0]) )
                $codeless_page_from_builder = true;
        }else{
            $codeless_page_from_builder = false;
        }

    }
        
    return $codeless_page_from_builder;
}


function codeless_embed_url_lookup() {
    $reg = preg_match('|^\s*(https?://[^\s"]+)\s*$|im', get_the_content(), $matches);

    if (!$reg) return false;

    return trim($matches[0]);

} // end embed_url_looku


function codeless_get_embed_content(){
    $content = apply_filters( 'the_content', get_the_content() );
    $video = false;
                                
    // Only get video from the content if a playlist isn't present.
    if ( false === strpos( $content, 'wp-playlist-script' ) ) {
        $video = get_media_embedded_in_content( $content );
    }
                                    
    if( is_array( $video ) && isset( $video[0] ) ){
        if( strpos($video[0], 'src' ) !== false ){
            $video = str_replace('src', 'data-src', $video[0]);
        }
    
        return $video;
    }

    return '';
}


function codeless_extract_link($content){
    preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $content, $match);
    return $match[0][0];
}

function codeless_get_current_page_url(){
    global $wp;
    return home_url( add_query_arg( array(), $wp->request ) );
}

function codeless_get_page_simple_link(){
    global $wp;
    $slug = add_query_arg( array(), $wp->request );
    $page = get_page_by_path( $slug, ARRAY_A );
    
    if( $slug == '' )
        return home_url('/');

    if( $page )
        return add_query_arg( array('page_id' => $page['ID']), home_url(). '/' );
    else
        return home_url( $slug );
}

function codeless_excerpt($limit = 260){
    $excerpt = get_the_excerpt();
    $excerpt = substr($excerpt, 0, $limit);
    $result = substr($excerpt, 0, strrpos($excerpt, ' '));
    return $result;
}

function codeless_load_svg($style = 'default', $color = '#ffffff'){
    $svg = array();
    if( $color == '' )
        $color = '#ffffff';

    $svg['default'] = '<svg version="1.1" class="cl-shape-divider-svg cl-shape-divider-svg--default" x="0px" y="0px" width="240px" height="24px" viewBox="0 0 240 24" enable-background="new 0 0 240 24" xml:space="preserve" preserveAspectRatio="none"> <path fill="'.$color.'" fill-opacity="0.33" d="M240,24V0H0v24C0,24,47.861,5.107,119.849,5.107C191.855,5.107,240,24,240,24z"></path> <path fill="'.$color.'" fill-opacity="0.33" d="M119.829,2.661c55.562,0,98.521,9.957,120.171,16.271V0H0v18.902
    C21.582,12.598,64.37,2.65,119.829,2.661z"></path> <path fill="'.$color.'" d="M119.81,0.117c50.737,0,92.456,6.89,120.19,13.271V0H0v13.34C27.651,6.979,69.17,0.117,119.81,0.117z"></path> </svg>';
    
    $svg['wave'] = '<svg xmlns="http://www.w3.org/2000/svg" class="cl-shape-divider-svg cl-shape-divider-svg--wave" viewBox="0 0 1920 144" preserveAspectRatio="none">
    <g class="n2-ss-divider-end">
    <path fill="'.$color.'" d="M0,120 C710,212,1020,-70,1920,70 L1920,-2 L0,-2 L0,105Z"></path>
    </g>
    </svg>';

    $svg['clouds'] = '<svg width="100%" class="cl-shape-divider-svg cl-shape-divider-svg--clouds" viewBox="0 0 1280 86" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg"><g fill="'.$color.'"><path d="M1280 66.1c-3.8 0-7.6.3-11.4.8-18.3-32.6-59.6-44.2-92.2-25.9-3.5 2-6.9 4.3-10 6.9-22.7-41.7-74.9-57.2-116.6-34.5-14.2 7.7-25.9 19.3-33.8 33.3-.2.3-.3.6-.5.8-12.2-1.4-23.7 5.9-27.7 17.5-11.9-6.1-25.9-6.3-37.9-.6-21.7-30.4-64-37.5-94.4-15.7-12.1 8.6-21 21-25.4 35.2-10.8-9.3-24.3-15-38.5-16.2-8.1-24.6-34.6-38-59.2-29.9-14.3 4.7-25.5 16-30 30.3-4.3-1.9-8.9-3.2-13.6-3.8-13.6-45.5-61.5-71.4-107-57.8a86.38 86.38 0 0 0-43.2 29.4c-8.7-3.6-18.7-1.8-25.4 4.8-23.1-24.8-61.9-26.2-86.7-3.1-7.1 6.6-12.5 14.8-15.9 24-26.7-10.1-56.9-.4-72.8 23.3-2.6-2.7-5.6-5.1-8.9-6.9-.4-.2-.8-.4-1.2-.7-.6-25.9-22-46.4-47.9-45.8-11.5.3-22.5 4.7-30.9 12.5-16.5-33.5-57.1-47.3-90.6-30.8-21.9 11-36.3 32.7-37.6 57.1-7-2.3-14.5-2.8-21.8-1.6C84.8 47 55.7 40.7 34 54.8c-5.6 3.6-10.3 8.4-13.9 14-6.6-1.7-13.3-2.6-20.1-2.6-.1 0 0 19.8 0 19.8h1280V66.1z" fill-opacity=".5"/><path d="M15.6 86H1280V48.5c-3.6 1.1-7.1 2.5-10.4 4.4-6.3 3.6-11.8 8.5-16 14.5-8.1-1.5-16.4-.9-24.2 1.7-3.2-39-37.3-68.1-76.4-64.9-24.8 2-46.8 16.9-57.9 39.3-19.9-18.5-51-17.3-69.4 2.6-8.2 8.8-12.8 20.3-13.1 32.3-.4.2-.9.4-1.3.7-3.5 1.9-6.6 4.4-9.4 7.2-16.6-24.9-48.2-35-76.2-24.4-12.2-33.4-49.1-50.6-82.5-38.4-9.5 3.5-18.1 9.1-25 16.5-7.1-6.9-17.5-8.8-26.6-5-30.4-39.3-87-46.3-126.2-15.8-14.8 11.5-25.6 27.4-31 45.4-4.9.6-9.7 1.9-14.2 3.9-8.2-25.9-35.8-40.2-61.7-32-15 4.8-26.9 16.5-31.8 31.5-14.9 1.3-29 7.2-40.3 17-11.5-37.4-51.2-58.4-88.7-46.8-14.8 4.6-27.7 13.9-36.7 26.5-12.6-6-27.3-5.7-39.7.6-4.1-12.2-16.2-19.8-29-18.4-.2-.3-.3-.6-.5-.9-24.4-43.3-79.4-58.6-122.7-34.2-13.3 7.5-24.4 18.2-32.4 31.2C99.8 18.5 50 28.5 25.4 65.4c-4.3 6.4-7.5 13.3-9.8 20.6z"/></g></svg>';
    $svg['square'] = '<svg width="100%" class="cl-shape-divider-svg cl-shape-divider-svg--square" height="300px" viewBox="0 0 1280 140" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"><g fill="'.$color.'"><path d="M0 0l64.8 30.95 91.2-2.54 95.46 27.87 120.04.2L443 83.15l90.09-3.12L640 110.12l102.39-29.73 85.55 8.51 88.11-5.75L992 52.22l73.21 4.26L1132 38.79l77-.33L1280 0v140H0V0z" fill-opacity=".5"/><path d="M0 0l64.8 38.69 91.2-3.18 95.46 34.84 120.04.24 71.5 33.35 90.09-3.91L640 137.65l102.39-37.17 85.55 10.65 88.11-7.19L992 65.28l73.21 5.31 66.79-22.1 77-.41L1280 0v140H0V0z"/></g></svg>';
    
    $svg['wave_thin'] = '<svg version="1.1" class="cl-shape-divider-svg cl-shape-divider-svg--wave_thin" x="0px" y="0px" width="240px" height="24px" viewBox="0 0 240 24" enable-background="new 0 0 240 24" xml:space="preserve" preserveAspectRatio="none">
    <path fill="'.$color.'" fill-opacity="0.33" d="M240,24V0c-51.797,0-69.883,13.18-94.707,15.59c-24.691,2.4-43.872-1.17-63.765-1.08
        c-19.17,0.1-31.196,3.65-51.309,6.58C15.552,23.21,4.321,22.471,0,22.01V24H240z"></path>
    <path fill="'.$color.'" fill-opacity="0.33" d="M240,24V2.21c-51.797,0-69.883,11.96-94.707,14.16
        c-24.691,2.149-43.872-1.08-63.765-1.021c-19.17,0.069-31.196,3.311-51.309,5.971C15.552,23.23,4.321,22.58,0,22.189V24h239.766H240
        z"></path>
    <path fill="'.$color.'" d="M240,24V3.72c-51.797,0-69.883,11.64-94.707,14.021c-24.691,2.359-43.872-3.25-63.765-3.17
        c-19.17,0.109-31.196,3.6-51.309,6.529C15.552,23.209,4.321,22.47,0,22.029V24H240z"></path>
    </svg>';

    $svg['wave_thick'] = '<svg version="1.1" class="cl-shape-divider-svg cl-shape-divider-svg--wave_thick" x="0px" y="0px" width="240px" height="24px" viewBox="0 0 240 24" enable-background="new 0 0 240 24" xml:space="preserve" preserveAspectRatio="none">
    <path fill="'.$color.'" d="M0,0v14.182c3.124-1.22,6.56-2.13,10.27-2.708c17.499-2.73,24.44,5.98,43.547,11.129
                C80.628,29.842,93.06,3.44,117.158,3.44c22.631,0,40.458,26.955,65.074,18.553c14.645-5.021,19.015-13.912,39.855-17.623
                c7.049-1.25,12.926-1.79,17.912-1.02V0"></path>
    <path fill="'.$color.'" fill-opacity="0.33" d="M0,0v13.372c3.764-0.791,7.63-1.391,10.323-1.801
                c17.298-2.74,24.341,5.98,47.129,11.132C89.473,29.934,92.539,4.58,118.224,4.58c24.092,0,45.193,22.971,67.344,14.572
                c13.188-5.021,19.053-13.632,39.426-17.354C230.469,0.81,235.387,0.3,240,0.48V0"></path>
    <path fill="'.$color.'" fill-opacity="0.33" d="M0,0v18.102c4.434-2.317,9.751-4,15.885-4.869c17.067-2.378,23.832,5.16,42.482,9.621
                C84.5,29.109,96.594,6.26,120.117,6.26c22.078,0,39.531,23.332,63.539,16.063c14.271-4.341,18.572-12.032,38.865-15.242
                C229.402,5.98,235.171,5.55,240,6.19V0"></path>
    </svg>';

    return isset( $svg[$style] ) ? $svg[$style] : $svg['default'];
}