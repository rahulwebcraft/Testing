<?php

if( function_exists( 'vc_shortcode_add_param' ) )
    vc_shortcode_add_param( 'image_select', 'codeless_vc_image_select', get_template_directory_uri().'/includes/core/js/image_select.js' );

function codeless_vc_image_select( $settings, $value ) {
    ob_start();
    ?>
    <div class="vc_image_select">
        <input name="<?php echo esc_attr( $settings['param_name'] ) ?>" class="wpb_vc_param_value wpb-textinput <?php echo esc_attr( $settings['param_name'] ) ?> <?php echo esc_attr( $settings['type'] ) ?>_field" type="hidden" value="<?php echo esc_attr( $value )?>" />
        <div class="vc_image_select__wrapper">
            <?php foreach( $settings['value'] as $url => $value_ ): ?>
                <?php $ex_cl = ''; if( $value_ == $value ) $ex_cl = 'selected'; ?>
                <a href="#" class="vc_image_select__button <?php echo esc_attr( $ex_cl ) ?>" style="background-image:url( '<?php echo esc_url( $url ) ?>' );" data-value="<?php echo esc_attr( $value_ ) ?>"></a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php

    $return = ob_get_clean();

    return $return;
}



// Create multi dropdown param type
if( function_exists( 'vc_shortcode_add_param' ) )
    vc_shortcode_add_param( 'dropdown_multi', 'codeless_dropdown_multi_settings_field' );
function codeless_dropdown_multi_settings_field( $param, $value ) {

    $param_line = '';
    $param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
    foreach ( $param['value'] as $text_val => $val ) {
        if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
            $text_val = $val;
        }
        $selected = '';

        if(!is_array($value)) {
            $param_value_arr = explode(',',$value);
        } else {
            $param_value_arr = $value;
        }

        if ($value!=='' && in_array($val, $param_value_arr)) {
            $selected = ' selected="selected"';
        }
        $param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
    }
    $param_line .= '</select>';

    return  $param_line;
}

/* BUTTON ELEMENT ------------------------------------------------------ */
/* --------------------------------------------------------------------- */

vc_map(array(
    'name'                    => "Button",
    'base'                    => "cl_button",
    'show_settings_on_create' => true,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => 'icon-wpb-ui-button',
    'description'             => 'Use this element to add codeless button.',
    'js_view'                 => '',

    'params'                  => array(
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Text", "regn" ),
            'description' => esc_attr__( "Text of the button", "regn" ),
            "param_name" => "text",
            'std' => 'Click Me',
            'admin_label' => true
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Link", "regn" ),
            "param_name" => "link",
            'std' => '#',
            'admin_label' => true
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Button Color", "regn" ),
            "param_name" => "button_color",
            "value" => array(
                esc_attr__( 'Default', 'regn' ) => 'default',
                esc_attr__( 'Normal', 'regn' ) => 'normal',
                esc_attr__( 'Alternate', 'regn' ) => 'alt',
            ),
            'std' => 'default'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Button Size", "regn" ),
            "param_name" => "button_size",
            "value" => array(
                esc_attr__( 'Default', 'regn' ) => 'default',
                esc_attr__( 'Small', 'regn' ) => 'small',
                esc_attr__( 'Medium', 'regn' ) => 'medium',
                esc_attr__( 'Large', 'regn' ) => 'large',
            ),
            'std' => 'default'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Button Style", "regn" ),
            "param_name" => "button_style",
            "value" => array(
                esc_attr__( 'Default', 'regn' ) => 'default',
                esc_attr__( 'Square', 'regn' ) => 'square',
                esc_attr__( 'Small Radius', 'regn' ) => 'small-radius',
                esc_attr__( 'Rounded', 'regn' ) => 'rounded',
                esc_attr__( 'Only Text', 'regn' ) => 'only_text'
            ),
            'std' => 'default'
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Align", "regn" ),
            "param_name" => "align",
            "value" => array(
                esc_attr__( 'Left', 'regn' ) => 'left',
                esc_attr__( 'Center', 'regn' ) => 'center',
                esc_attr__( 'Right', 'regn' ) => 'right',
            ),
            'std' => 'center'
        ),
    )
));

class WPBakeryShortCode_cl_button extends WPBakeryShortCode {}

/* POSTS ELEMENT ------------------------------------------------------- */
/* --------------------------------------------------------------------- */
vc_map(array(
    'name'                    => "Posts",
    'base'                    => "cl_posts",
    'show_settings_on_create' => true,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/full_blog.png',
    'description'             => 'Use this element to add blog posts',
    'admin_enqueue_js'        => get_template_directory_uri() . '/includes/core/js/cl_posts_view.js',
    'js_view'                 => 'ClPostsView',
    'params'                  => array(

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Unique ID", "regn" ),
            "param_name" => "unique_id",
            "std" => 'id' . str_replace( ".", '-', uniqid("", true) ),
            "description" => esc_attr__( "If you need to modify this, please add an unique identifier", "regn" ),
            'group' => esc_attr__( "General", "regn" )
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Module", "regn" ),
            "param_name" => "module",
            "value" => array(
                esc_attr__( 'Isotope', 'regn' ) => 'isotope',
                esc_attr__( 'Carousel', 'regn' ) => 'carousel',
                esc_attr__( 'Grid Blocks (Recommended Media Styles)', 'regn' ) => 'grid-blocks',
            ),
            'edit_field_class' => 'vc_col-xs-4',
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'isotope',
            'admin_label' => true,
        ),


                array(
                    "type" => "dropdown",
                    "heading" => esc_attr__( "Isotope Type", "regn" ),
                    "param_name" => "isotope_type",
                    "value" => array(
                        esc_attr__( 'Masonry', 'regn' ) => 'masonry',
                        esc_attr__( 'Fit Rows', 'regn' ) => 'fitRows',
                        esc_attr__( 'Vertical', 'regn' ) => 'vertical',
                        esc_attr__( 'Packery', 'regn' ) => 'packery',
                    ),
                    'edit_field_class' => 'vc_col-xs-4',
                    'group' => esc_attr__( "General", "regn" ),
                    'std' => 'masonry',
                    'dependency' => array(
                        'element' => 'module',
                        'value' => array( 'isotope' )
                    ),
                ),

                array(
                    "type" => "image_select",
                    "heading" => esc_attr__( "Grid Blocks", "regn" ),
                    "param_name" => "grid_block_type",
                    "value" => array(
                        get_template_directory_uri() . '/img/grid/grid-1.png' => 'grid-1',
                        get_template_directory_uri() . '/img/grid/grid-2.png' => 'grid-2',
                        get_template_directory_uri() . '/img/grid/grid-3.png' => 'grid-3',
                        get_template_directory_uri() . '/img/grid/grid-6.png' => 'grid-6',
                        get_template_directory_uri() . '/img/grid/grid-8.png' => 'grid-8',
                        get_template_directory_uri() . '/img/grid/grid-9.png' => 'grid-9',
                        get_template_directory_uri() . '/img/grid/grid-10.png' => 'grid-10',
                        get_template_directory_uri() . '/img/grid/grid-11.png' => 'grid-11',
                        get_template_directory_uri() . '/img/grid/grid-14.png' => 'grid-14',
                    ),
                    'edit_field_class' => 'vc_col-xs-12',
                    'group' => esc_attr__( "General", "regn" ),
                    'description' => esc_attr__( "It's recommended to use only Media, Media-ALT blog styles for grid-blocks. Also, use only Ajax filters for GRIDS", "regn" ),
                    'std' => '',
                    'dependency' => array(
                        'element' => 'module',
                        'value' => array( 'grid-blocks' )
                    ),
                ),


                array(
                    "type" => "dropdown",
                    "holder" => "",
                    "heading" => esc_attr__( "Columns", "regn" ),
                    "param_name" => "columns",
                    "value" => array(
                        esc_attr__( '1 Column', 'regn' ) => '1',
                        esc_attr__( '2 Columns', 'regn' ) => '2',
                        esc_attr__( '3 Columns', 'regn' ) => '3',
                        esc_attr__( '4 Columns', 'regn' ) => '4',
                        esc_attr__( '5 Columns', 'regn' ) => '5',
                    ),
                    'edit_field_class' => 'vc_col-xs-4',
                    'group' => esc_attr__( "General", "regn" ),
                    'std' => '3',
                    'dependency' => array(
                        'element' => 'module',
                        'value' => array( 'isotope', 'carousel' )
                    ),
                    'admin_label' => true,
                ),

                array(
                    "type" => "dropdown",
                    "holder" => "",
                    "heading" => esc_attr__( "Carousel Nav", "regn" ),
                    "param_name" => "carousel_nav",
                    "value" => array(
                        esc_attr__( 'Yes', 'regn' ) => 'yes',
                        esc_attr__( 'No', 'regn' ) => 'no'
                    ),
                    'edit_field_class' => 'vc_col-xs-4',
                    'group' => esc_attr__( "General", "regn" ),
                    'std' => 'no',
                    'dependency' => array(
                        'element' => 'module',
                        'value' => array( 'carousel' )
                    ),
                ),


        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Article Style", "regn" ),
            'description' => esc_attr__( 'NOTE: Alternate Style is recommended to use with 1 - 2 columns only!', 'regn' ),
            "param_name" => "style",
            "value" => array(
                esc_attr__( 'Default', 'regn' ) => 'default',
                esc_attr__( 'Media', 'regn' ) => 'media',
                esc_attr__( 'Media Alternative', 'regn' ) => 'media-alt',
                esc_attr__( 'Modern', 'regn' ) => 'modern',
                esc_attr__( 'No Image', 'regn' ) => 'noimage',
            ),
            'edit_field_class' => 'vc_col-xs-6',
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'default',
            'admin_label' => true,
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Animations", "regn" ),
            'description' => esc_attr__( 'Animation for items', 'regn' ),
            "param_name" => "animation",
            "value" => array(
                'None'	=> 'none',
                'Top to Bottom' =>	'top-t-bottom',
                'Bottom to Top' =>	'bottom-t-top',
                'Right to Left' => 'right-t-left',
                'Left to Right' => 'left-t-right',
                'Alpha' => 'alpha-anim',	
                'Zoom In' => 'zoom-in',	
                'Zoom Out' => 'zoom-out',
                'Zoom Reverse' => 'zoom-reverse',
            ),
            'edit_field_class' => 'vc_col-xs-6',
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'none'
        ),

        /*array(
            "type" => "textfield",
            "holder" => "",
            "heading" => esc_attr__( "Gap between Items", "regn" ),
            'description' => esc_attr__( "Example values: 20px, 4rem, 20%", "regn" ),
            "param_name" => "gap_items",
            'group' => esc_attr__( "General", "regn" ),
            'edit_field_class' => 'vc_col-xs-6',
            'std' => ''
        ),*/

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Pagination", "regn" ),
            "param_name" => "pagination",
            "value" => array(
                esc_attr__( 'Without Pagination', 'regn' ) => 'none',
                esc_attr__( 'With Numbers', 'regn' ) => 'numbers',
                esc_attr__( 'Next / Prev Arrows', 'regn' ) => 'next_prev',
                esc_attr__( 'Next / Prev Ajax', 'regn' ) => 'next_prev_ajax',
                esc_attr__( 'Load More', 'regn' ) => 'load_more',
                esc_attr__( 'Infinite Scroll', 'regn' ) => 'infinite_scroll',
            ),
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'none',
            'dependency' => array(
                'element' => 'module',
                'value' => array( 'isotope', 'grid-blocks' )
            ),
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Category Filters", "regn" ),
            "param_name" => "filters",
            "value" => array(
                esc_attr__( 'No Filters', 'regn' ) => 'disabled',
                esc_attr__( 'Isotope Filter', 'regn' ) => 'isotope',
                esc_attr__( 'Ajax', 'regn' ) => 'ajax',
            ),
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'disabled',
            'dependency' => array(
                'element' => 'module',
                'value' => array( 'isotope', 'grid-blocks' )
            ),
        ),

        array(
            "type" => "textfield",
            "holder" => "",
            "heading" => esc_attr__( "Image Size", "regn" ),
            'description' => esc_attr__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Find theme sizes here: Codeless -> Codeless Image Sizes', 'regn' ),
            "param_name" => "image_size",
            "value" => '',
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'theme_default',
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Image Filter", "regn" ),
            "param_name" => "image_filter",
            "value" => array(
                'normal' => 'normal',
                'darken' => 'darken',
                '_1977' => '_1977',
                'aden' => 'aden',
                'brannan' => 'brannan',
                'brooklyn' => 'brooklyn',
                'clarendon' => 'clarendon',
                'earlybird' => 'earlybird',
                'gingham' => 'gingham',
                'hudson' => 'hudson',
                'inkwell' => 'inkwell',
                'kelvin' => 'kelvin',
                'lark' => 'lark',
                'lofi' => 'lofi',
                'maven' => 'maven',
                'mayfair' => 'mayfair',
                'moon' => 'moon',
                'nashville' => 'nashville',
                'perpetua' => 'perpetua',
                'reyes' => 'reyes',
                'rise' => 'rise',
                'slumber' => 'slumber',
                'stinson' => 'stinson',
                'toaster' => 'toaster',
                'valencia' => 'valencia',
                'walden' => 'walden',
                'willow' => 'willow',
                'xpro2' => 'xpro2',
            ),
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'normal',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Excerpt Length", "regn" ),
            "param_name" => "excerpt_length",
            "std" => codeless_get_mod('blog_excerpt_length', 62),
            "description" => esc_attr__( "Excerpt Length", "regn" ),
            'group' => esc_attr__( "General", "regn" )
        ),

        



        

        array(
            'type' => 'autocomplete',
            'heading' => esc_attr__( 'Narrow data source', 'regn' ),
            'param_name' => 'taxonomies',
            'settings' => array(
                'multiple' => true,
                'min_length' => 1,
                'groups' => true,
                // In UI show results grouped by groups, default false
                'unique_values' => true,
                // In UI show results except selected. NB! You should manually check values in backend, default false
                'display_inline' => true,
                // In UI show results inline view, default false (each value in own line)
                'delay' => 500,
                // delay for search. default 500
                'auto_focus' => true,
                // auto focus input, default true
            ),
            'param_holder_class' => 'vc_not-for-custom',
            'description' => esc_attr__( 'Enter categories, tags or custom taxonomies.', 'regn' ),
            'group' => esc_attr__( "Data Settings", "regn" ),
            
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Post Count", "regn" ),
            'description' => esc_attr__( "Number of posts to show, if pagination is active, represent number of posts per page", "regn" ),
            "param_name" => "count",
            'group' => esc_attr__( "Data Settings", "regn" ),
            'std' => '12'
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Order By", "regn" ),
            "param_name" => "order_by",
            "value" => array(
                esc_attr__( 'None', 'regn' ) => 'none',
                esc_attr__( 'Date', 'regn' ) => 'date',
                esc_attr__( 'Post ID', 'regn' ) => 'ID',
                esc_attr__( 'Title', 'regn' ) => 'title',
                esc_attr__( 'Random', 'regn' ) => 'rand',
                esc_attr__( 'Preserve Include Order', 'regn' ) => 'post__in'
            ),
            'group' => esc_attr__( "Data Settings", "regn" ),
            'std' => 'date',
            'edit_field_class' => 'vc_col-xs-6',
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Order", "regn" ),
            "param_name" => "order",
            "value" => array(
                esc_attr__( 'DESC', 'regn' ) => 'desc',
                esc_attr__( 'ASC', 'regn' ) => 'asc'
            ),
            'group' => esc_attr__( "Data Settings", "regn" ),
            'std' => 'date',
            'edit_field_class' => 'vc_col-xs-6',
        ),

        array(
            'type' => 'autocomplete',
            'heading' => esc_attr__( 'Include only', 'regn' ),
            'param_name' => 'include',
            'description' => esc_attr__( 'Add posts, pages, etc. by title. Leave empty otherwise', 'regn' ),
            'settings' => array(
                'multiple' => true,
                'sortable' => true,
                'groups' => true,
            ),
            'group' => esc_attr__( 'Data Settings', 'regn' ),
        ),

        array(
            'type' => 'autocomplete',
            'heading' => esc_attr__( 'Exclude', 'regn' ),
            'param_name' => 'exclude',
            'description' => esc_attr__( 'Exclude posts, pages, etc. by title. Leave empty otherwise', 'regn' ),
            'group' => esc_attr__( 'Data Settings', 'regn' ),
            'settings' => array(
                'multiple' => true,
            ),
            'param_holder_class' => 'vc_grid-data-type-not-ids',
        ),






        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Custom Width", "regn" ),
            "param_name" => "custom_width",

            "std" => '',
            "description" => esc_attr__( "Set a custom width for blog items of this element. Leave empty to use the default. For example 600px", "regn" ),
            'group' => esc_attr__( "Custom Design", "regn" )
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Custom Heading Size", "regn" ),
            "param_name" => "custom_heading_size",
            "std" => '',
            "description" => esc_attr__( "Set a custom heading size for blog items of this element. Leave empty to use the default. Use example: 24px. This is applicable only on large screens.", "regn" ),
            'group' => esc_attr__( "Custom Design", "regn" )
        ),


        

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Custom Grid Gap", "regn" ),
            "param_name" => "custom_grid_gap",

            "std" => '',
            "description" => esc_attr__( "Set custom grid gap between grid-blocks or isotope items, ex: 5px", "regn" ),
            'group' => esc_attr__( "Custom Design", "regn" ),
            'dependency' => array(
                'element' => 'module',
                'value' => array( 'grid-blocks', 'isotope' ) 
            ),
        ),


        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Carousel Nav Position", "regn" ),
            "param_name" => "carousel_nav_position",
            "value" => array(
                esc_attr__( 'Left', 'regn' ) => 'left',
                esc_attr__( 'Center', 'regn' ) => 'center',
            ),
            'group' => esc_attr__( "Custom Design", "regn" ),
            'std' => 'left'
        ),

    )
));


class WPBakeryShortCode_cl_posts extends WPBakeryShortCode {}


/* PORTFOLIO ELEMENT --------------------------------------------------- */
/* --------------------------------------------------------------------- */
vc_map(array(
    'name'                    => "Portfolio",
    'base'                    => "cl_portfolio",
    'show_settings_on_create' => true,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/recent_portfolio.png',
    'description'             => 'Use this element to add portfolio items',
    'admin_enqueue_js'        => get_template_directory_uri() . '/includes/core/js/cl_posts_view.js',
    'js_view'                 => 'ClPostsView',
    'params'                  => array(

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Unique ID", "regn" ),
            "param_name" => "unique_id",
            "std" => 'id' . str_replace( ".", '-', uniqid("", true) ),
            "description" => esc_attr__( "If you need to modify this, please add an unique identifier", "regn" ),
            'group' => esc_attr__( "General", "regn" )
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Module", "regn" ),
            "param_name" => "module",
            "value" => array(
                esc_attr__( 'Isotope', 'regn' ) => 'isotope',
                esc_attr__( 'Carousel', 'regn' ) => 'carousel',
                esc_attr__( 'Grid Blocks', 'regn' ) => 'grid-blocks',
            ),
            'edit_field_class' => 'vc_col-xs-4',
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'isotope',
            'admin_label' => true,
        ),


                array(
                    "type" => "dropdown",
                    "heading" => esc_attr__( "Isotope Type", "regn" ),
                    "param_name" => "isotope_type",
                    "value" => array(
                        esc_attr__( 'Masonry', 'regn' ) => 'masonry',
                        esc_attr__( 'Fit Rows', 'regn' ) => 'fitRows',
                        esc_attr__( 'Vertical', 'regn' ) => 'vertical',
                        esc_attr__( 'Packery', 'regn' ) => 'packery',
                    ),
                    'edit_field_class' => 'vc_col-xs-4',
                    'group' => esc_attr__( "General", "regn" ),
                    'std' => 'masonry',
                    'dependency' => array(
                        'element' => 'module',
                        'value' => array( 'isotope' )
                    ),
                ),

                array(
                    "type" => "image_select",
                    "heading" => esc_attr__( "Grid Blocks", "regn" ),
                    "param_name" => "grid_block_type",
                    "value" => array(
                        get_template_directory_uri() . '/img/grid/grid-creative.png' => 'grid-creative',
                        get_template_directory_uri() . '/img/grid/grid-13.png' => 'grid-13',
                    ),
                    'edit_field_class' => 'vc_col-xs-12',
                    'group' => esc_attr__( "General", "regn" ),
                    'std' => '',
                    'dependency' => array(
                        'element' => 'module',
                        'value' => array( 'grid-blocks' )
                    ),
                ),

                array(
                    "type" => "textfield",
                    "holder" => "",
                    "heading" => esc_attr__( "Grid Block Title", "regn" ),
                    'description' => esc_attr__( 'Enter title for this grid block', 'regn' ),
                    "param_name" => "grid_block_title",
                    "value" => esc_html__('What we do', 'regn'),
                    'group' => esc_attr__( "General", "regn" ),
                    'std' => esc_html__('What we do', 'regn'),
                    'dependency' => array(
                        'element' => 'module',
                        'value' => array( 'grid-blocks' )
                    ),
                ),

                array(
                    "type" => "textarea",
                    "holder" => "",
                    "heading" => esc_attr__( "Grid Block Description", "regn" ),
                    'description' => esc_attr__( 'Enter desc for this grid block', 'regn' ),
                    "param_name" => "grid_block_description",
                    "value" => esc_html__('Developing the simplest static single page of plain text to the most complex web-based internet applications, electronic businesses, and social network services.  For larger organizations and businesses, web ... ', 'regn'),
                    'group' => esc_attr__( "General", "regn" ),
                    'std' => esc_html__('Developing the simplest static single page of plain text to the most complex web-based internet applications, electronic businesses, and social network services.  For larger organizations and businesses, web ... ', 'regn'),
                    'dependency' => array(
                        'element' => 'module',
                        'value' => array( 'grid-blocks' )
                    ),
                ),


                array(
                    "type" => "dropdown",
                    "holder" => "",
                    "heading" => esc_attr__( "Columns", "regn" ),
                    "param_name" => "columns",
                    "value" => array(
                        esc_attr__( '1 Column', 'regn' ) => '1',
                        esc_attr__( '2 Columns', 'regn' ) => '2',
                        esc_attr__( '3 Columns', 'regn' ) => '3',
                        esc_attr__( '4 Columns', 'regn' ) => '4',
                        esc_attr__( '5 Columns', 'regn' ) => '5',
                    ),
                    'edit_field_class' => 'vc_col-xs-4',
                    'group' => esc_attr__( "General", "regn" ),
                    'std' => '3',
                    'dependency' => array(
                        'element' => 'module',
                        'value' => array( 'isotope', 'carousel' )
                    ),
                    'admin_label' => true,
                ),

                array(
                    "type" => "dropdown",
                    "holder" => "",
                    "heading" => esc_attr__( "Carousel Nav", "regn" ),
                    "param_name" => "carousel_nav",
                    "value" => array(
                        esc_attr__( 'Yes', 'regn' ) => 'yes',
                        esc_attr__( 'No', 'regn' ) => 'no'
                    ),
                    'edit_field_class' => 'vc_col-xs-4',
                    'group' => esc_attr__( "General", "regn" ),
                    'std' => 'no',
                    'dependency' => array(
                        'element' => 'module',
                        'value' => array( 'carousel' )
                    ),
                ),

                array(
                    "type" => "dropdown",
                    "holder" => "",
                    "heading" => esc_attr__( "Carousel Centered", "regn" ),
                    "param_name" => "carousel_centered",
                    "value" => array(
                        esc_attr__( 'Yes', 'regn' ) => 'yes',
                        esc_attr__( 'No', 'regn' ) => 'no'
                    ),
                    'edit_field_class' => 'vc_col-xs-4',
                    'group' => esc_attr__( "General", "regn" ),
                    'std' => 'no',
                    'dependency' => array(
                        'element' => 'module',
                        'value' => array( 'carousel' )
                    ),
                ),


        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Item Style", "regn" ),
            "param_name" => "style",
            "value" => array(
                esc_attr__( 'Overlay 1', 'regn' ) => 'overlay1',
                esc_attr__( 'Overlay 2', 'regn' ) => 'overlay2',
                esc_attr__( 'Minimal', 'regn' ) => 'minimal',
                esc_attr__( 'Media and Title', 'regn' ) => 'media_title',
                esc_attr__( 'Presentation', 'regn' ) => 'presentation',
            ),
            'edit_field_class' => 'vc_col-xs-6',
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'default',
            'admin_label' => true,
        ),

        array(
            "type" => "checkbox",
            "holder" => "",
            "heading" => esc_attr__( "Use as Image Gallery", "regn" ),
            "param_name" => "image_gallery",
            "value" => array( esc_html__( 'Use as Image Gallery. Remove Buttons, open lightbox when click', 'regn' ) => 'yes' ),
            'edit_field_class' => 'vc_col-xs-12',
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'no',
            'admin_label' => true,
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Animations", "regn" ),
            'description' => esc_attr__( 'Animation for items', 'regn' ),
            "param_name" => "animation",
            "value" => array(
                'None'	=> 'none',
                'Top to Bottom' =>	'top-t-bottom',
                'Bottom to Top' =>	'bottom-t-top',
                'Right to Left' => 'right-t-left',
                'Left to Right' => 'left-t-right',
                'Alpha' => 'alpha-anim',	
                'Zoom In' => 'zoom-in',	
                'Zoom Out' => 'zoom-out',
                'Zoom Reverse' => 'zoom-reverse',
            ),
            'edit_field_class' => 'vc_col-xs-6',
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'none'
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Pagination", "regn" ),
            "param_name" => "pagination",
            "value" => array(
                esc_attr__( 'Without Pagination', 'regn' ) => 'none',
                esc_attr__( 'With Numbers', 'regn' ) => 'numbers',
                esc_attr__( 'Next / Prev Arrows', 'regn' ) => 'next_prev',
                esc_attr__( 'Next / Prev Ajax', 'regn' ) => 'next_prev_ajax',
                esc_attr__( 'Load More', 'regn' ) => 'load_more',
                esc_attr__( 'Infinite Scroll', 'regn' ) => 'infinite_scroll',
            ),
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'none',
            'dependency' => array(
                'element' => 'module',
                'value' => array( 'isotope', 'grid-blocks' )
            ),
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Category Filters", "regn" ),
            "param_name" => "filters",
            "value" => array(
                esc_attr__( 'No Filters', 'regn' ) => 'disabled',
                esc_attr__( 'Isotope Filter', 'regn' ) => 'isotope',
                esc_attr__( 'Ajax', 'regn' ) => 'ajax',
            ),
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'disabled',
            'dependency' => array(
                'element' => 'module',
                'value' => array( 'isotope', 'grid-blocks' )
            ),
        ),

        array(
            "type" => "textfield",
            "holder" => "",
            "heading" => esc_attr__( "Image Size", "regn" ),
            'description' => esc_attr__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Find theme sizes here: Codeless -> Codeless Image Sizes', 'regn' ),
            "param_name" => "image_size",
            "value" => '',
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'theme_default',
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Image Filter", "regn" ),
            "param_name" => "image_filter",
            "value" => array(
                'normal' => 'normal',
                'darken' => 'darken',
                '_1977' => '_1977',
                'aden' => 'aden',
                'brannan' => 'brannan',
                'brooklyn' => 'brooklyn',
                'clarendon' => 'clarendon',
                'earlybird' => 'earlybird',
                'gingham' => 'gingham',
                'hudson' => 'hudson',
                'inkwell' => 'inkwell',
                'kelvin' => 'kelvin',
                'lark' => 'lark',
                'lofi' => 'lofi',
                'maven' => 'maven',
                'mayfair' => 'mayfair',
                'moon' => 'moon',
                'nashville' => 'nashville',
                'perpetua' => 'perpetua',
                'reyes' => 'reyes',
                'rise' => 'rise',
                'slumber' => 'slumber',
                'stinson' => 'stinson',
                'toaster' => 'toaster',
                'valencia' => 'valencia',
                'walden' => 'walden',
                'willow' => 'willow',
                'xpro2' => 'xpro2',
            ),
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'normal',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Custom Grid Gap", "regn" ),
            "param_name" => "custom_grid_gap",

            "std" => '',
            "description" => esc_attr__( "Set custom grid gap between grid-blocks or isotope items, ex: 5px", "regn" ),
            'group' => esc_attr__( "General", "regn" ),
            'dependency' => array(
                'element' => 'module',
                'value' => array( 'isotope', 'carousel' ) 
            ),
        ),

        array(
            'type' => 'autocomplete',
            'heading' => esc_attr__( 'Narrow data source', 'regn' ),
            'param_name' => 'taxonomies',
            'settings' => array(
                'multiple' => true,
                'min_length' => 1,
                'groups' => true,
                // In UI show results grouped by groups, default false
                'unique_values' => true,
                // In UI show results except selected. NB! You should manually check values in backend, default false
                'display_inline' => true,
                // In UI show results inline view, default false (each value in own line)
                'delay' => 500,
                // delay for search. default 500
                'auto_focus' => true,
                // auto focus input, default true
            ),
            'param_holder_class' => 'vc_not-for-custom',
            'description' => esc_attr__( 'Enter categories, tags or custom taxonomies.', 'regn' ),
            'group' => esc_attr__( "Data Settings", "regn" ),
            
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Post Count", "regn" ),
            'description' => esc_attr__( "Number of posts to show, if pagination is active, represent number of posts per page", "regn" ),
            "param_name" => "count",
            'group' => esc_attr__( "Data Settings", "regn" ),
            'std' => '12'
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Order By", "regn" ),
            "param_name" => "order_by",
            "value" => array(
                esc_attr__( 'None', 'regn' ) => 'none',
                esc_attr__( 'Date', 'regn' ) => 'date',
                esc_attr__( 'Post ID', 'regn' ) => 'ID',
                esc_attr__( 'Title', 'regn' ) => 'title',
                esc_attr__( 'Random', 'regn' ) => 'rand',
                esc_attr__( 'Preserve Include Order', 'regn' ) => 'post__in'
            ),
            'group' => esc_attr__( "Data Settings", "regn" ),
            'std' => 'date',
            'edit_field_class' => 'vc_col-xs-6',
        ),

        array(
            "type" => "dropdown",
            "holder" => "",
            "heading" => esc_attr__( "Order", "regn" ),
            "param_name" => "order",
            "value" => array(
                esc_attr__( 'DESC', 'regn' ) => 'desc',
                esc_attr__( 'ASC', 'regn' ) => 'asc'
            ),
            'group' => esc_attr__( "Data Settings", "regn" ),
            'std' => 'date',
            'edit_field_class' => 'vc_col-xs-6',
        ),

        array(
            'type' => 'autocomplete',
            'heading' => esc_attr__( 'Include only', 'regn' ),
            'param_name' => 'include',
            'description' => esc_attr__( 'Add posts, pages, etc. by title. Leave empty otherwise', 'regn' ),
            'settings' => array(
                'multiple' => true,
                'sortable' => true,
                'groups' => true,
            ),
            'group' => esc_attr__( 'Data Settings', 'regn' ),
        ),

        array(
            'type' => 'autocomplete',
            'heading' => esc_attr__( 'Exclude', 'regn' ),
            'param_name' => 'exclude',
            'description' => esc_attr__( 'Exclude posts, pages, etc. by title. Leave empty otherwise', 'regn' ),
            'group' => esc_attr__( 'Data Settings', 'regn' ),
            'settings' => array(
                'multiple' => true,
            ),
            'param_holder_class' => 'vc_grid-data-type-not-ids',
        ),

    )
));


class WPBakeryShortCode_cl_portfolio extends WPBakeryShortCode {}






/* SERVICE ICON CENTER ELEMENT ----------------------------------------- */
/* --------------------------------------------------------------------- */

vc_map(array(
    'name'                    => "Service Icon Center",
    'base'                    => "cl_service_icon_center",
    'show_settings_on_create' => true,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/media.png',
    'description'             => 'Add a service element with icon centered on top.',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Icon / Image", "regn" ),
            "description" => esc_attr__( 'Possibility to select an Icon or an image', 'regn' ),
            "param_name" => "icon_type",
            "value" => array(
                esc_attr__( 'Icon', 'regn' ) => 'icon',
                esc_attr__( 'Image', 'regn' ) => 'image',
            ),
            'std' => 'icon',
            'group' => esc_attr__( "General", "regn" ),
        ),
        array(
            "type" => "iconpicker",
            "heading" => esc_attr__( "Icon", "regn" ),
            "param_name" => "icon",
            "std" => 'cl-icon-camera',
            "settings" => array(
                "type" => 'codeless_icons'
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => array( 'icon' )
            ),
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "attach_image",
            "heading" => esc_attr__( "Image Icon", "regn" ),
            "param_name" => "image",
            "std" => '',
            'dependency' => array(
                'element' => 'icon_type',
                'value' => array( 'image' )
            ),
            'group' => esc_attr__( "General", "regn" ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Title", "regn" ),
            'description' => esc_attr__( "Main Title of the Service", "regn" ),
            "param_name" => "title",
            'std' => esc_attr__('Element Title','regn'),
            'admin_label' => true,
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Show Subtitle", "regn" ),
            "param_name" => "subtitle_bool",
            "value" => array(
                esc_attr__( 'No', 'regn' ) => 'no',
                esc_attr__( 'Yes', 'regn' ) => 'yes',
            ),
            'group' => esc_attr__( "General", "regn" ),
            'std' => 'no',
            'admin_label' => true
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Subtitle", "regn" ),
            "param_name" => "subtitle",
            'std' => esc_attr__('Element Subtitle','regn'),
           
            'group' => esc_attr__( "General", "regn" ),
            'dependency' => array(
                'element' => 'subtitle_bool',
                'value' => array( 'yes' )
            ),
        ),


        array(
            "type" => "textarea_html",
            "heading" => esc_attr__( "Content", "regn" ),
            'description' => esc_attr__( "Content of the Service", "regn" ),
            "param_name" => "content",
            'std' => esc_attr__('Element Content Here','regn'),
           
            'group' => esc_attr__( "General", "regn" ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Link", "regn" ),
            "param_name" => "link",
            'std' => '#',
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Link Target", "regn" ),
            "param_name" => "link_target",
            'std' => '_self',
            "value" => array(
                esc_attr__( 'Open in the same page', 'regn' ) => '_self',
                esc_attr__( 'Open in new window', 'regn' ) => '_blank',
            ),
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_attr__( "Custom Icon Color", "regn" ),
            "description" => esc_attr__('Leave empty to use the default colors', 'regn'),
            "param_name" => "custom_icon_color",
            'std' => '',
            'group' => esc_attr__( "Design", "regn" ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Custom Icon Font Size", "regn" ),
            "param_name" => "custom_icon_size",
            'std' => '',
            'group' => esc_attr__( "Design", "regn" ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Custom Distance Icon-Title", "regn" ),
            "param_name" => "custom_distance_from_icon",
            'std' => '',
            'group' => esc_attr__( "Design", "regn" ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Custom Title Size", "regn" ),
            "param_name" => "custom_title_size",
            'std' => '',
            'group' => esc_attr__( "Design", "regn" ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Custom Distance Title-DESC", "regn" ),
            "param_name" => "custom_distance_title_desc",
            'std' => '',
            'group' => esc_attr__( "Design", "regn" ),
        ),
    )
));

class WPBakeryShortCode_cl_service_icon_center extends WPBakeryShortCode {}




/* SERVICE ICON CENTER CIRCLE ----------------------------------------- */
/* --------------------------------------------------------------------- */

vc_map(array(
    'name'                    => "Service Icon Circle",
    'base'                    => "cl_service_icon_circle",
    'show_settings_on_create' => true,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/services_circle.png',
    'description'             => 'Add a service element with a circle icon on top',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Icon / Image", "regn" ),
            "description" => esc_attr__( 'Possibility to select an Icon or an image', 'regn' ),
            "param_name" => "icon_type",
            "value" => array(
                esc_attr__( 'Icon', 'regn' ) => 'icon',
                esc_attr__( 'Image', 'regn' ) => 'image',
            ),
            'std' => 'icon',
            'group' => esc_attr__( "General", "regn" ),
        ),
        array(
            "type" => "iconpicker",
            "heading" => esc_attr__( "Icon", "regn" ),
            "param_name" => "icon",
            "std" => 'cl-icon-camera',
            "settings" => array(
                "type" => 'codeless_icons'
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => array( 'icon' )
            ),
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "attach_image",
            "heading" => esc_attr__( "Image Icon", "regn" ),
            "param_name" => "image",
            "std" => '',
            'dependency' => array(
                'element' => 'icon_type',
                'value' => array( 'image' )
            ),
            'group' => esc_attr__( "General", "regn" ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Title", "regn" ),
            'description' => esc_attr__( "Main Title of the Service", "regn" ),
            "param_name" => "title",
            'std' => esc_attr__('Element Title','regn'),
            'admin_label' => true,
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "textarea_html",
            "heading" => esc_attr__( "Content", "regn" ),
            'description' => esc_attr__( "Content of the Service", "regn" ),
            "param_name" => "content",
            'std' => esc_attr__('Element Content Here','regn'),
            'admin_label' => true,
            'group' => esc_attr__( "General", "regn" ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Link", "regn" ),
            "param_name" => "link",
            'std' => '#',
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Link Target", "regn" ),
            "param_name" => "link_target",
            'std' => '_self',
            "value" => array(
                esc_attr__( 'Open in the same page', 'regn' ) => '_self',
                esc_attr__( 'Open in new window', 'regn' ) => '_blank',
            ),
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_attr__( "Icon Color", "regn" ),
            "param_name" => "icon_color",
            'std' => '#222a2c',
            'group' => esc_attr__( "Design", "regn" ),
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_attr__( "Circle BG Color", "regn" ),
            "param_name" => "icon_wrapper_bg_color",
            'std' => '#f9f9f9',
            'group' => esc_attr__( "Design", "regn" ),
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_attr__( "Circle Border Color", "regn" ),
            "param_name" => "icon_wrapper_border_color",
            'std' => '#e4e5e5',
            'group' => esc_attr__( "Design", "regn" ),
        ),
    )
));

class WPBakeryShortCode_cl_service_icon_circle extends WPBakeryShortCode {}





/* SERVICE ICON CENTER SMALL - ----------------------------------------- */
/* --------------------------------------------------------------------- */

vc_map(array(
    'name'                    => "Service Icon Small",
    'base'                    => "cl_service_icon_small",
    'show_settings_on_create' => true,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/services_small.png',
    'description'             => 'Add a left aligned small icon service',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Icon / Image", "regn" ),
            "description" => esc_attr__( 'Possibility to select an Icon or an image', 'regn' ),
            "param_name" => "icon_type",
            "value" => array(
                esc_attr__( 'Icon', 'regn' ) => 'icon',
                esc_attr__( 'Image', 'regn' ) => 'image',
            ),
            'std' => 'icon',
            'group' => esc_attr__( "General", "regn" ),
        ),
        array(
            "type" => "iconpicker",
            "heading" => esc_attr__( "Icon", "regn" ),
            "param_name" => "icon",
            "std" => 'cl-icon-camera',
            "settings" => array(
                "type" => 'codeless_icons'
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => array( 'icon' )
            ),
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "attach_image",
            "heading" => esc_attr__( "Image Icon", "regn" ),
            "param_name" => "image",
            "std" => '',
            'dependency' => array(
                'element' => 'icon_type',
                'value' => array( 'image' )
            ),
            'group' => esc_attr__( "General", "regn" ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Title", "regn" ),
            'description' => esc_attr__( "Main Title of the Service", "regn" ),
            "param_name" => "title",
            'std' => esc_attr__('Element Title','regn'),
            'admin_label' => true,
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "textarea_html",
            "heading" => esc_attr__( "Content", "regn" ),
            'description' => esc_attr__( "Content of the Service", "regn" ),
            "param_name" => "content",
            'std' => esc_attr__('Element Content Here','regn'),
            'admin_label' => true,
            'group' => esc_attr__( "General", "regn" ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Link", "regn" ),
            "param_name" => "link",
            'std' => '#',
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Link Target", "regn" ),
            "param_name" => "link_target",
            'std' => '_self',
            "value" => array(
                esc_attr__( 'Open in the same page', 'regn' ) => '_self',
                esc_attr__( 'Open in new window', 'regn' ) => '_blank',
            ),
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_attr__( "Custom Icon Color", "regn" ),
            "description" => esc_attr__('Leave empty to use the default colors', 'regn'),
            "param_name" => "custom_icon_color",
            'std' => '',
            'group' => esc_attr__( "Design", "regn" ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_attr__( "Custom Title Font Color", "regn" ),
            "description" => esc_attr__('Leave empty to use the default colors', 'regn'),
            "param_name" => "custom_font_color",
            'std' => '',
            'group' => esc_attr__( "Design", "regn" ),
        ),
    )
));

class WPBakeryShortCode_cl_service_icon_small extends WPBakeryShortCode {}











/* Counter ------------------------------------------- */
/* --------------------------------------------------- */

vc_map(array(
    'name'                    => "Counter",
    'base'                    => "cl_counter",
    'show_settings_on_create' => true,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/counter.png',
    'description'             => 'Counter Element',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Number", "regn" ),
            "param_name" => "number",
            'std' => 1248,
            'admin_label' => true,
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Duration", "regn" ),
            "param_name" => "duration",
            'std' => 2000,
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Title", "regn" ),
            "param_name" => "title",
            'std' => esc_attr__( "Completed Projects", "regn" ),
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true,
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Alignment", "regn" ),
            "param_name" => "alignment",
            'std' => 'center',
            'value' => array(
                'Left' => 'left',
                'Center' => 'center',
                'Right' => 'right',
            ),
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_attr__( "Custom Numbers Color", "regn" ),
            "description" => esc_attr__('Leave empty to use the default colors', 'regn'),
            "param_name" => "custom_numbers_color",
            'std' => '',
            'group' => esc_attr__( "General", "regn" ),
        ),
        
         array(
            "type" => "colorpicker",
            "heading" => esc_attr__( "Custom Text Color", "regn" ),
            "description" => esc_attr__('Leave empty to use the default colors', 'regn'),
            "param_name" => "custom_text_color",
            'std' => '',
            'group' => esc_attr__( "General", "regn" ),
        ),
    )
));

class WPBakeryShortCode_cl_counter extends WPBakeryShortCode {}



/* Team GRID ------------------------------------------- */
/* ----------------------------------------------------- */

vc_map(array(
    'name'                    => "Team Grid",
    'base'                    => "cl_team_grid",
    'show_settings_on_create' => true,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/staff_carousel.png',
    'description'             => 'Team Members shown in a grid',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "dropdown_multi",
            "heading" => esc_attr__( "Select Team Members", "regn" ),
            "param_name" => "members",
            'admin_label' => true,
            'value' => array_flip( codeless_get_items_by_term( 'staff' ) ),
            'group' => esc_attr__( "General", "regn" ),
        ),
        
    )
));

class WPBakeryShortCode_cl_team_grid extends WPBakeryShortCode {}



/* Single Team  ------------------------------------------- */
/* -------------------------------------------------------- */

vc_map(array(
    'name'                    => "Single Team",
    'base'                    => "cl_single_team",
    'show_settings_on_create' => true,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/staff_single.png',
    'description'             => 'Add a single team member element into one column',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Overlay Style", "regn" ),
            "param_name" => "style",
            'value' => array(
                esc_attr__('Overlay 1', 'regn') => 'overlay1',
                esc_attr__('Overlay 2', 'regn') => 'overlay2'

            ),
            'std' => 'overlay1',
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Select Team Member", "regn" ),
            "param_name" => "member",
            'value' => array_flip( codeless_get_items_by_term( 'staff' ) ),
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true,
        ),
    )
));

class WPBakeryShortCode_cl_single_team extends WPBakeryShortCode {}




/* Clients --------------------------------------------- */
/* ----------------------------------------------------- */

vc_map(array(
    'name'                    => "Clients",
    'base'                    => "cl_clients",
    'show_settings_on_create' => true,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/clients.png',
    'description'             => 'Show Clients',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Carousel", "regn" ),
            'description' => esc_attr__( "Switch on to show items as carousel", "regn" ),
            "param_name" => "carousel",
            'std' => 'yes',
            'value' => array(
                esc_attr__('Yes', 'regn') => 'yes',
                esc_attr__('No', 'regn') => 'no'
            ),
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Item per Slide / Row", "regn" ),
            'description' => esc_attr__( "If carousel is ON, this option set number of items to show for one carousel slide", "regn" ),
            "param_name" => "item_to_show",
            'std' => 4,
            'value' => array(
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6
            ),
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "attach_images",
            "heading" => esc_attr__( "Attach Client Images", "regn" ),
            "param_name" => "images",
            'std' => '',
            'group' => esc_attr__( "General", "regn" ),
        ),
    )
));

class WPBakeryShortCode_cl_clients extends WPBakeryShortCode {}


/* Testimonial Single Image ------------------------------------------- */
/* ------------------------------------------------------------------ */

vc_map(array(
    'name'                    => "Testimonial Single",
    'base'                    => "cl_testimonial_single",
    'show_settings_on_create' => false,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/testimonial_carousel.png',
    'description'             => 'Testimonial Single Image',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Select Testimonial Member", "regn" ),
            "param_name" => "member",
            'value' => array_flip( codeless_get_items_by_term( 'testimonial' ) ),
            'group' => esc_attr__( "General", "regn" ),
        ),
    )
));

class WPBakeryShortCode_cl_testimonial_single extends WPBakeryShortCode {}


/* Testimonial Left Image ------------------------------------------- */
/* ------------------------------------------------------------------ */

vc_map(array(
    'name'                    => "Testimonial - Left Image",
    'base'                    => "cl_testimonial_left",
    'show_settings_on_create' => false,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/testimonial_carousel.png',
    'description'             => 'Testimonial Carousel with Image left aligned',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "dropdown_multi",
            "heading" => esc_attr__( "Select Testimonial Members", "regn" ),
            "param_name" => "members",
            'value' => array_flip( codeless_get_items_by_term( 'testimonial' ) ),
            'group' => esc_attr__( "General", "regn" ),
        ),
    )
));

class WPBakeryShortCode_cl_testimonial_left extends WPBakeryShortCode {}



/* Testimonial Bottom Image ------------------------------------------- */
/* ------------------------------------------------------------------ */

vc_map(array(
    'name'                    => "Testimonial - Bottom Image",
    'base'                    => "cl_testimonial_bottom",
    'show_settings_on_create' => false,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/testimonial_carousel.png',
    'description'             => 'Testimonial Carousel with Image in bottom',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "dropdown_multi",
            "heading" => esc_attr__( "Select Testimonial Members", "regn" ),
            "param_name" => "members",
            'admin_label' => true,
            'value' => array_flip( codeless_get_items_by_term( 'testimonial' ) ),
            'group' => esc_attr__( "General", "regn" ),
        ),
    )
));

class WPBakeryShortCode_cl_testimonial_bottom extends WPBakeryShortCode {}

/* Testimonial Top Image ------------------------------------------- */
/* ------------------------------------------------------------------ */

vc_map(array(
    'name'                    => "Testimonial - Top Image",
    'base'                    => "cl_testimonial_top",
    'show_settings_on_create' => false,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/testimonial_carousel.png',
    'description'             => 'Testimonial Carousel with Image in top',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "dropdown_multi",
            "heading" => esc_attr__( "Select Testimonial Members", "regn" ),
            "param_name" => "members",
            'value' => array_flip( codeless_get_items_by_term( 'testimonial' ) ),
            'group' => esc_attr__( "General", "regn" ),
        ),
    )
));

class WPBakeryShortCode_cl_testimonial_top extends WPBakeryShortCode {}




/* Price List ------------------------------------------- */
/* ------------------------------------------------------ */

vc_map(array(
    'name'                    => "Price List",
    'base'                    => "cl_price_list",
    'show_settings_on_create' => false,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/price_list.png',
    'description'             => 'Price List Element',
    'as_parent'               => array( 'only' => 'cl_list_item' ),

    'is_container'            => true,
    'js_view'                 => 'VcColumnView',
    'params'                  => array(

        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Recommended", "regn" ),
            'description' => esc_attr__( "Switch ON to show this price list as RECOMMENDED", "regn" ),
            "param_name" => "recommended",
            'std' => 'no',
            'value' => array(
                esc_attr__( 'Yes', 'regn' ) => 'yes',
                esc_attr__( 'No', 'regn' ) => 'no'
                
            ),
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),


        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Title", "regn" ),
            "param_name" => "title",
            'std' => esc_attr__( 'Price List Title', 'regn' ),
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Price Currency", "regn" ),
            "param_name" => "price_currency",
            'std' => '$',
            'group' => esc_attr__( "General", "regn" ),
            'edit_field_class' => 'vc_col-xs-3',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Price", "regn" ),
            "param_name" => "price",
            'std' => '9',
            'group' => esc_attr__( "General", "regn" ),
            'edit_field_class' => 'vc_col-xs-3',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Price Cent", "regn" ),
            "param_name" => "price_cent",
            'std' => '99',
            'group' => esc_attr__( "General", "regn" ),
            'edit_field_class' => 'vc_col-xs-3',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Price Period", "regn" ),
            "param_name" => "price_period",
            'std' => esc_attr__('monthly', 'regn'),
            'group' => esc_attr__( "General", "regn" ),
            'edit_field_class' => 'vc_col-xs-3',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Button Text", "regn" ),
            "param_name" => "button_text",
            'std' => esc_attr__('Sign Up', 'regn'),
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Button Link", "regn" ),
            "param_name" => "button_link",
            'std' => '#',
            'group' => esc_attr__( "General", "regn" ),
        ),
    )
));

class WPBakeryShortCode_cl_price_list extends WPBakeryShortCodesContainer {}



/* List Element */
vc_map(array(
    'name'                    => "List",
    'base'                    => "cl_list",
    'show_settings_on_create' => false,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/list.png',
    'description'             => 'List with various styles',
    'as_parent'               => array( 'only' => 'cl_list_item' ),

    'is_container'            => true,
    'js_view'                 => 'VcColumnView',
    'params'                  => array(
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Style", "regn" ),
            "param_name" => "style",
            'std' => 'arrow',
            'value' => array(
                esc_attr__( 'Arrow', 'regn' ) => 'arrow'
                
            ),
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),
    )
));
class WPBakeryShortCode_cl_list extends WPBakeryShortCodesContainer {}

/* List Item -------------------------------------------- */
/* ------------------------------------------------------ */

vc_map(array(
    'name'                    => "List Item",
    'base'                    => "cl_list_item",
    'show_settings_on_create' => false,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/list_item.png',
    'description'             => '',
    'as_child'               => array( 'cl_price_list', 'cl_list' ) ,
    'params'                  => array(
        array(
            "type" => "textarea_html",
            "heading" => esc_attr__( "Text", "regn" ),
            "param_name" => "content",
            'std' => '',
            'group' => esc_attr__( "General", "regn" ),
            'holder' => 'div'
        ),
    )
));

class WPBakeryShortCode_cl_list_item extends WPBakeryShortCode {}


/* List Item -------------------------------------------- */
/* ------------------------------------------------------ */

vc_map(array(
    'name'                    => esc_attr__("Skill - Progress Bar", 'regn'),
    'base'                    => "cl_skill",
    'show_settings_on_create' => true,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/skills.png',
    'description'             => '',
    'params'                  => array(
        array(
            "type" => "textarea",
            "heading" => esc_attr__( "Title", "regn" ),
            "param_name" => "title",
            'std' => esc_attr__('Graphic Design', 'regn'),
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),

        array(
            "type" => "textarea",
            "heading" => esc_attr__( "Percentage", "regn" ),
            "param_name" => "percentage",
            'std' => '75',
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),
    )
));

class WPBakeryShortCode_cl_skill extends WPBakeryShortCode {}

/* Social Icons ------------------------------------------- */
/* ------------------------------------------------------------------ */

vc_map(array(
    'name'                    => "Social Icons",
    'base'                    => "cl_social_icons",
    'show_settings_on_create' => false,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/testimonial_carousel.png',
    'description'             => 'Show social icons that you have selected on Theme Options',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "colorpicker",
            "heading" => esc_attr__( "Custom Color", "regn" ),
            'description' => esc_attr__( "Leave empty to use default", "regn" ),
            "param_name" => "custom_color",
            'std' => '',
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Alignment", "regn" ),
            "param_name" => "align",
            'std' => 'left',
            'value' => array(
                'Left' => 'left',
                "Center" => 'center',
                'Right' => 'right'
            ),
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),
    )
));

class WPBakeryShortCode_cl_social_icons extends WPBakeryShortCode {}

/* Countdown ------------------------------------------- */
/* ------------------------------------------------------------------ */

vc_map(array(
    'name'                    => "Countdown",
    'base'                    => "cl_countdown",
    'show_settings_on_create' => false,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/countdown.png',
    'description'             => 'Add Countdown',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Day", "regn" ),
            "param_name" => "day",
            'std' => esc_attr__('13', 'regn'),
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Month", "regn" ),
            "param_name" => "month",
            'std' => esc_attr__('8', 'regn'),
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Year", "regn" ),
            "param_name" => "year",
            'std' => esc_attr__('2020', 'regn'),
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),
    )
));

class WPBakeryShortCode_cl_countdown extends WPBakeryShortCode {}


/* Countdown ------------------------------------------- */
/* ------------------------------------------------------------------ */

vc_map(array(
    'name'                    => "Lightbox Video Button",
    'base'                    => "cl_lightbox_video",
    'show_settings_on_create' => false,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/media.png',
    'description'             => '',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Video URL", "regn" ),
            "param_name" => "video",
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_attr__( "Alignment", "regn" ),
            "param_name" => "align",
            'std' => 'center',
            'value' => array(
                'Left' => 'left',
                "Center" => 'center',
                'Right' => 'right'
            ),
            'group' => esc_attr__( "General", "regn" ),
            'admin_label' => true
        ),
    )
));

class WPBakeryShortCode_cl_lightbox_video extends WPBakeryShortCode {}


/* Tabbed WOO ------------------------------------------- */
/* ------------------------------------------------------------------ */

vc_map(array(
    'name'                    => "Tabbed Woocommerce",
    'base'                    => "cl_tabbed_woocommerce",
    'show_settings_on_create' => false,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => 'icon-wpb-woocommerce',
    'js_view'                 => '',
    'params'                  => array(
       
    )
));

class WPBakeryShortCode_cl_tabbed_woocommerce extends WPBakeryShortCode {}


/* Table Row ------------------------------------------- */
/* ----------------------------------------------------- */

vc_map(array(
    'name'                    => "Table Row",
    'base'                    => "cl_table_row",
    'show_settings_on_create' => true,
    'category'                => esc_html__("Regn",'regn'),
    'icon'                    => get_template_directory_uri().'/img/icons/list_item.png',
    'description'             => 'Table Row Element Inline, like timetable',
    'js_view'                 => '',
    'params'                  => array(
        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Heading", "regn" ),
            "param_name" => "heading",
            'admin_label' => true,
            'group' => esc_attr__( "General", "regn" ),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_attr__( "Text", "regn" ),
            "param_name" => "text",
            'admin_label' => true,
            'group' => esc_attr__( "General", "regn" ),
        ),
        
    )
));

class WPBakeryShortCode_cl_table_row extends WPBakeryShortCode {}


vc_remove_param( 'vc_single_image', 'thumbnail' );
vc_add_param( 'vc_single_image', array(
    'type' => 'textfield',
    'heading' => esc_html__( 'Image size', 'regn' ),
    'param_name' => 'img_size',
    'value' => 'full',
    'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)). You can create custom sizes on Codeless -> Image Sizes', 'regn' ),
    'dependency' => array(
        'element' => 'source',
        'value' => array(
            'media_library',
            'featured_image',
        ),
    ),
));

vc_remove_element( 'vc_btn' );

vc_add_param( 'vc_row', array(
    'type' => 'colorpicker',
    'heading' => esc_html__( 'Background Overlay', 'regn' ),
    'param_name' => 'background_overlay',
    'edit_field_class' => 'vc_col-xs-12',
    'description' => esc_html__( 'Set an extra overlay layer for this ROW. This is useful when you use a background image.', 'regn' ),
    'group' => esc_attr__( "Design Options", "regn" ),
) );


vc_add_param( 'vc_row', array(
    'type' => 'dropdown',
    'heading' => esc_html__( 'Shape Top Style', 'regn' ),
    'param_name' => 'shape_top_style',
    'value' => array(
        esc_attr__( 'None', 'regn' ) => 'none',
        esc_attr__( 'Default', 'regn' ) => 'default',
        esc_attr__('Wave', 'regn') => 'wave',
        esc_attr__('Clouds', 'regn') => 'clouds',
        esc_attr__('Square', 'regn') => 'square',
        esc_attr__('Wave Thin', 'regn') => "wave_thin",
        esc_attr__('Wave Thick', 'regn') => "wave_thick",
    ),
    'edit_field_class' => 'vc_col-xs-12',
    'group' => esc_attr__( "Shape Divider", "regn" ),
) );

vc_add_param( 'vc_row', array(
    'type' => 'textfield',
    'heading' => esc_html__( 'Shape Top Height', 'regn' ),
    'param_name' => 'shape_top_height',
    'value' => '',
    'edit_field_class' => 'vc_col-xs-6',
    'description' => esc_html__( 'Leave empty for default height', 'regn' ),
    'group' => esc_attr__( "Shape Divider", "regn" ),
) );

vc_add_param( 'vc_row', array(
    'type' => 'colorpicker',
    'heading' => esc_html__( 'Shape Top Color', 'regn' ),
    'param_name' => 'shape_top_color',
    'value' => '',
    'edit_field_class' => 'vc_col-xs-6',
    'description' => esc_html__( 'Leave empty for default color', 'regn' ),
    'group' => esc_attr__( "Shape Divider", "regn" ),
) );


vc_add_param( 'vc_row', array(
    'type' => 'dropdown',
    'heading' => esc_html__( 'Shape Bottom Style', 'regn' ),
    'param_name' => 'shape_bottom_style',
    'value' => array(
        esc_attr__( 'None', 'regn' ) => 'none',
        esc_attr__( 'Default', 'regn' ) => 'default',
        esc_attr__('Wave', 'regn') => 'wave',
        esc_attr__('Clouds', 'regn') => 'clouds',
        esc_attr__('Square', 'regn') => 'square',
        esc_attr__('Wave Thin', 'regn') => "wave_thin",
        esc_attr__('Wave Thick', 'regn') => "wave_thick",
    ),
    'edit_field_class' => 'vc_col-xs-12 large_space',
    'group' => esc_attr__( "Shape Divider", "regn" ),
) );

vc_add_param( 'vc_row', array(
    'type' => 'textfield',
    'heading' => esc_html__( 'Shape Bottom Height', 'regn' ),
    'param_name' => 'shape_bottom_height',
    'value' => '',
    'edit_field_class' => 'vc_col-xs-6',
    'description' => esc_html__( 'Leave empty for default height', 'regn' ),
    'group' => esc_attr__( "Shape Divider", "regn" ),
) );

vc_add_param( 'vc_row', array(
    'type' => 'colorpicker',
    'heading' => esc_html__( 'Shape Bottom Color', 'regn' ),
    'param_name' => 'shape_bottom_color',
    'value' => '',
    'edit_field_class' => 'vc_col-xs-6',
    'description' => esc_html__( 'Leave empty for default color', 'regn' ),
    'group' => esc_attr__( "Shape Divider", "regn" ),
) );



$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

$contact_forms = array();
if ( $cf7 ) {
    foreach ( $cf7 as $cform ) {
        $contact_forms[ $cform->post_title ] = $cform->ID;
    }
} else {
    $contact_forms[ esc_html__( 'No contact forms found', 'regn' ) ] = 0;
}
/* Contat form 7 */
vc_map(array(
    'base' => 'cl_contact_form7',
    'name' => esc_html__( 'Contact Form 7', 'regn' ),
    'icon' => 'icon-wpb-contactform7',
    'category' => esc_html__( 'Content', 'regn' ),
    'description' => esc_html__( 'Place Contact Form7', 'regn' ),
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Select contact form', 'regn' ),
            'param_name' => 'id',
            'value' => $contact_forms,
            'save_always' => true,
            'description' => esc_html__( 'Choose previously created contact form from the drop down list.', 'regn' ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_attr__("Style", 'regn'),
            "param_name" => "style",
            "value" => array(
                esc_attr__("Minimal", 'regn') => "minimal",
                esc_attr__("Square", 'regn')  => 'square'
            )
        )
    ),
));

class WPBakeryShortCode_cl_contact_form7 extends WPBakeryShortCode {}


vc_add_param("vc_column", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_attr__("Column text skin", 'regn'),
    "param_name" => "text_skin",
    "value" => array(
        "Dark" => "dark",
        "Light" => "light"
    ),
    'weight' => 900
));

vc_add_param("vc_column", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_attr__("Sticky Column (inside row)", 'regn'),
    "param_name" => "sticky_column",
    "value" => array(
        "No" => "no",
        "Yes" => "yes"
    ),
    'weight' => 900
));

vc_remove_param( "vc_custom_heading", "use_theme_fonts" ); // Note: 'vc_message' was used as a base for "Message box" element
vc_add_param("vc_custom_heading", array(
    'type' => 'checkbox',
    'heading' => esc_html__( 'Use theme default font family?', 'regn' ),
    'param_name' => 'use_theme_fonts',
    'value' => array( esc_html__( 'Yes', 'regn' ) => 'yes' ),
    'std' => 'yes',
    'weight' => 900,
    'description' => esc_html__( 'Use font family from the theme.', 'regn' ),
));

vc_add_param("vc_custom_heading", array(
    'type' => 'textfield',
    'heading' => esc_html__( 'Custom Font Size (Small Screen)', 'regn' ),
    'param_name' => 'responsive_font_size',
    'value' => '',
    'std' => '',
    'weight' => 900,
    'group' => esc_attr( 'Responsive', 'regn' ),
    'description' => esc_html__( 'Leave empty to use theme default values', 'regn' ),
));

vc_add_param("vc_custom_heading", array(
    'type' => 'textfield',
    'heading' => esc_html__( 'Custom Line Height (Small Screen)', 'regn' ),
    'param_name' => 'responsive_line_height',
    'value' => '',
    'std' => '',
    'weight' => 900,
    'group' => esc_attr( 'Responsive', 'regn' ),
    'description' => esc_html__( 'Leave empty to use theme default values', 'regn' ),
));


vc_remove_param( "vc_separator", "el_width" );

vc_add_param("vc_separator", array(
    'type' => 'textfield',
    'heading' => esc_html__( 'Element Width', 'regn' ),
    'param_name' => 'el_width',
    'std' => '30px',
    'weight' => 900,
));





add_filter( 'vc_iconpicker-type-codeless_icons', 'codeless_vc_map_icons' );

function codeless_vc_map_icons(){
    return Codeless_Icons::get_icons();
}


vc_add_param( 'vc_widget_sidebar', array(
    "type" => "textfield",
    "heading" => esc_attr__( "Sticky Widgets from Bottom", "regn" ),
    'description' => esc_attr__( "Number of widgets to make sticky on this sidebar.", "regn" ),
    "param_name" => "sticky_widgets",
    'std' => 0
));

vc_remove_param( "vc_tta_tabs", "style" );

vc_add_param("vc_tta_tabs", array(
    'type' => 'dropdown',
    'heading' => esc_html__( 'Style', 'regn' ),
    'param_name' => 'style',
    'std' => 'default',
    'value' => array(
        esc_attr__( 'Default Theme Style', 'regn' ) => 'default',
        esc_attr__( 'Classic', 'regn' ) => 'classic',
        esc_attr__( 'Modern', 'regn' ) => 'modern',
        esc_attr__( 'Flat', 'regn' ) => 'flat',
        esc_attr__( 'Outline', 'regn' ) => 'outline',
    ),
    'weight' => 900,
));

add_filter( 'vc_autocomplete_cl_posts_taxonomies_callback', 'cl_autocomplete_taxonomies_field_search', 10, 1 );
add_filter( 'vc_autocomplete_cl_posts_taxonomies_render', 'cl_autocomplete_taxonomies_field_render', 10, 1 );

add_filter( 'vc_autocomplete_cl_posts_exclude_callback', 'cl_exclude_field_search', 10, 1 ); // Get suggestion(find). Must return an array
add_filter( 'vc_autocomplete_cl_posts_exclude_render', 'cl_exclude_field_render', 10, 1 );

add_filter( 'vc_autocomplete_cl_posts_include_callback', 'cl_include_field_search', 10, 1 ); // Get suggestion(find). Must return an array
add_filter( 'vc_autocomplete_cl_posts_include_render', 'cl_include_field_render', 10, 1 );






function cl_autocomplete_taxonomies_field_render( $term ) {
	$terms = get_terms( array('category', 'post_tag'), array(
		'include' => array( $term['value'] ),
		'hide_empty' => false,
	) );
	$data = false;
	if ( is_array( $terms ) && 1 === count( $terms ) ) {
		$term = $terms[0];
		$data = vc_get_term_object( $term );
	}

	return $data;
}


function cl_autocomplete_taxonomies_field_search( $search_string ) {
	$data = array();
	$vc_filter_by = vc_post_param( 'vc_filter_by', '' );
	$vc_taxonomies = get_terms( array('category', 'post_tag'), array(
		'hide_empty' => false,
		'search' => $search_string,
	) );
	if ( is_array( $vc_taxonomies ) && ! empty( $vc_taxonomies ) ) {
		foreach ( $vc_taxonomies as $t ) {
			if ( is_object( $t ) ) {
				$data[] = vc_get_term_object( $t );
			}
		}
	}

	return $data;
}


function cl_include_field_search( $search_string ) {
	$query = $search_string;
	$data = array();
	$args = array(
		's' => $query,
		'post_type' => 'post',
	);
	$args['vc_search_by_title_only'] = true;
	$args['numberposts'] = - 1;
	if ( 0 === strlen( $args['s'] ) ) {
		unset( $args['s'] );
	}
	add_filter( 'posts_search', 'vc_search_by_title_only', 500, 2 );
	$posts = get_posts( $args );
	if ( is_array( $posts ) && ! empty( $posts ) ) {
		foreach ( $posts as $post ) {
			$data[] = array(
				'value' => $post->ID,
				'label' => $post->post_title,
				'group' => $post->post_type,
			);
		}
	}

	return $data;
}


function cl_include_field_render( $value ) {
	$post = get_post( $value['value'] );

	return is_null( $post ) ? false : array(
		'label' => $post->post_title,
		'value' => $post->ID,
		'group' => $post->post_type,
	);
}






function cl_exclude_field_search( $data_arr ) {
	$query = isset( $data_arr['query'] ) ? $data_arr['query'] : null;
	$term = isset( $data_arr['term'] ) ? $data_arr['term'] : '';
	$data = array();
	$args = ! empty( $query ) ? array(
		's' => $term,
		'post_type' => 'post',
	) : array(
		's' => $term,
		'post_type' => 'post',
	);
	$args['vc_search_by_title_only'] = true;
	$args['numberposts'] = - 1;
	if ( 0 === strlen( $args['s'] ) ) {
		unset( $args['s'] );
	}
	add_filter( 'posts_search', 'vc_search_by_title_only', 500, 2 );
	$posts = get_posts( $args );
	if ( is_array( $posts ) && ! empty( $posts ) ) {
		foreach ( $posts as $post ) {
			$data[] = array(
				'value' => $post->ID,
				'label' => $post->post_title,
				'group' => $post->post_type,
			);
		}
	}

	return $data;
}


function cl_exclude_field_render( $value ) {
	$post = get_post( $value['value'] );

	return is_null( $post ) ? false : array(
		'label' => $post->post_title,
		'value' => $post->ID,
		'group' => $post->post_type,
	);
}




remove_action( 'vc_activation_hook', 'vc_page_welcome_set_redirect' );
remove_action( 'admin_init', 'vc_page_welcome_redirect' );


add_filter( 'vc_get_all_templates', 'codeless_modify_default_template_name', 999 );
function codeless_modify_default_template_name($data){
    $data[1]['category_name'] = esc_attr__('Regn Templates', 'regn');
    $data[1]['category_description'] = esc_attr__( 'Append predefined Regn Templates to the actual layout', 'regn' );
    $default_templates = visual_composer()->templatesPanelEditor()->getDefaultTemplates();

    foreach( $data[1]['templates'] as $index => $template_data ){
        if( isset( $template_data['unique_id'] ) && isset( $default_templates[ $template_data['unique_id'] ] ) ){
            
            $data[1]['templates'][$index]['cat_display_name'] = isset( $default_templates[ $template_data['unique_id'] ]['cat_display_name'] ) ? $default_templates[$template_data['unique_id']]['cat_display_name'] : '';
        }
    }
    $data[1]['category_weight'] = 5;

    return $data;
    
}


add_filter( 'vc_templates_render_category', 'codeless_templates_render_category', 999 );
function codeless_templates_render_category($category){
    if( $category['category'] == 'default_templates' ){
        $output = $category['output'];
        $category['output'] = '<div class="library_categories">';
            $category['output'] .= '<ul>';
            $codeless_library_cats = codeless_vc_cat_list();
            $category['output'] .=  '<li data-sort="all" class="active">'.esc_html__('All', 'regn').'</li>';
            foreach($codeless_library_cats as $cat_id => $cat_name) {
                $category['output'] .=  '<li data-sort="'.$cat_id.'">'.$cat_name.'</li>';
            }
            $category['output'] .= '</ul>';

        $category['output'] .= '</div>';
        $category['output'] .= '<div class="cl-templates-wrap">';
        $category['output'] .= $output;
        $category['output'] .= '</div>';
    }

    return $category;
}


add_filter( 'vc_templates_render_template', 'codeless_templates_render_template', 99, 2 );
function codeless_templates_render_template($name, $template){
    $name = $template['name'];
    $cat_display_name = isset( $template['cat_display_name'] ) ? $template['cat_display_name'] : '';

    $output = '';
    $output .= '<div class="cl-template-wrap">';
        if( isset( $template['image'] ) && !empty(  $template['image'] ) )
            $output .= '<div class="img-wrap"><img class="lazy" data-src="'.$template['image'].'" alt="'.$name.'" width="300" height="200"></div>';
        $output .= '<div class="title-wrap">';
            $output .= '<div class="display_cat">'.$cat_display_name.'</div>';
            $output .= $name;
        $output .= '</div>';
        $output .= '<a type="button" class="vc_ui-list-bar-item-trigger" title="$add_template_title"
    data-template-handler=""
    data-vc-ui-element="template-title"></a>';
    $output .= '</div>';
    return $output;
}


add_action( 'vc_load_default_templates_action','codeless_templates_for_vc' ); 

function codeless_vc_cat_list(){
    $cat_display_names = array(
        'ajax' => esc_attr__('Ajax', 'regn'),
        'blog' => esc_attr__('Blog', 'regn'),
        'block' => esc_attr__('Posts Block', 'regn'),
        'carousel' => esc_attr__('Carousel', 'regn'),
        'featured' => esc_attr__('Featured', 'regn'),
        'grid' => esc_attr__('Grid', 'regn'),
        'masonry' => esc_attr__('Masonry', 'regn'),
        'magazine' => esc_attr__('Magazine', 'regn'),
    );

    return $cat_display_names;
}


function codeless_templates_for_vc() {

$cat_display_names = codeless_vc_cat_list();


// Blog Masonry 2 Columns
$data = array();
$data['name'] = esc_html__( 'Blog Masonry 2 Columns', 'regn' );
$data['cat_display_name'] = $cat_display_names['blog']  .', '. $cat_display_names['masonry'];
$data['custom_class'] = 'blog masonry';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/blog-masonry-two-columns.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row][vc_column css=".vc_custom_1544263389548{margin-top: -10px !important;}"][cl_posts unique_id="id5c0ab4de21b321-88688305" columns="2" animation="bottom-t-top" pagination="load_more" excerpt_length="30" count="4" order="desc" taxonomies="204, 206, 205"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Blog Alternate Ajax Pagination
$data = array();
$data['name'] = esc_html__( 'Blog Alternate Ajax Pagination', 'regn' );
$data['cat_display_name'] = $cat_display_names['blog']  .', '. $cat_display_names['ajax'];
$data['custom_class'] = 'blog ajax';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/blog-alternate-ajax-pagination.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row][vc_column css=".vc_custom_1544263389548{margin-top: -10px !important;}"][cl_posts title="Popular Posts" unique_id="id5c0ab4e173eac7-66403554" columns="1" style="alternate" animation="bottom-t-top" pagination="next_prev_ajax" excerpt_length="10" count="2" order="desc" taxonomies="207"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Blog Carousel Alternate 2 Columns
$data = array();
$data['name'] = esc_html__( 'Blog Carousel Alternate 2 Columns', 'regn' );
$data['cat_display_name'] = $cat_display_names['blog']  .', '. $cat_display_names['carousel'];
$data['custom_class'] = 'blog carousel';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/blog-carousel-alternate-two-columns.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row][vc_column][cl_posts title="Popular Posts" unique_id="id5c0bf2ce0efca1-35792436" module="carousel" columns="2" carousel_nav="yes" style="alternate" excerpt_length="62" order="desc" include="2644, 2520, 2557, 2626"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Blog Masonry Infinite Scroll 3 Columns
$data = array();
$data['name'] = esc_html__( 'Blog Masonry Infinite Scroll 3 Columns', 'regn' );
$data['cat_display_name'] = $cat_display_names['blog']  .', '. $cat_display_names['masonry'];
$data['custom_class'] = 'blog masonry';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/blog-masonry-infinite-scroll-3-columns.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row content_placement="middle" css=".vc_custom_1545581376967{margin-top: 0px !important;padding-top: 170px !important;}"][vc_column][cl_posts unique_id="id5c18fa06dc7916-48171606" animation="bottom-t-top" pagination="infinite_scroll" excerpt_length="19" count="9" order_by="post__in" order="desc" custom_wrapper_color="#ffffff"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );



// Blog Carousel Gradient
$data = array();
$data['name'] = esc_html__( 'Blog Carousel Gradient', 'regn' );
$data['cat_display_name'] = $cat_display_names['blog']  .', '. $cat_display_names['carousel'];
$data['custom_class'] = 'blog carousel';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/blog-carousel-gradient.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row css=".vc_custom_1546961787602{padding-top: 0px !important;}" el_id="gradient_row"][vc_column css=".vc_custom_1546961686275{padding-top: 40px !important;padding-right: 20px !important;padding-bottom: 30px !important;padding-left: 20px !important;background-image: url(https://codeless.co/regn/blog/wp-content/uploads/2019/01/gradient.png?id=2962) !important;background-position: 0 0 !important;background-repeat: repeat !important;}"][cl_posts unique_id="id5c34b82ad0eea4-53147074" module="carousel" columns="2" style="alternate" animation="bottom-t-top" excerpt_length="62" count="3" order_by="post__in" order="desc" custom_heading_size="26px" post_text_color="light" include="2600, 2557, 2590"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );



// Blog Featured 3 Columns Image
$data = array();
$data['name'] = esc_html__( 'Blog Featured 3 Columns Image', 'regn' );
$data['cat_display_name'] = $cat_display_names['blog']  .', '. $cat_display_names['featured'];
$data['custom_class'] = 'blog featured';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/blog-featured-3-columns-image.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row content_placement="middle" css=".vc_custom_1545143022884{margin-top: -17px !important;}"][vc_column][vc_custom_heading text="Featured Posts" font_container="tag:h2|font_size:26px|text_align:center|color:%23191e23|line_height:1.5" use_theme_fonts="yes" css=".vc_custom_1545923244231{margin-bottom: 10px !important;}"][vc_separator color="black" style="double" el_width="10" css=".vc_custom_1545923303311{margin-bottom: 20px !important;}"][cl_posts unique_id="id5c18fa06dc7916-48171606" style="media" animation="bottom-t-top" excerpt_length="67" count="3" order_by="post__in" order="desc" include="2520, 2557, 2593"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );



// Blog Grid 3 Columns Image
$data = array();
$data['name'] = esc_html__( 'Blog Grid 3 Columns Image', 'regn' );
$data['cat_display_name'] = $cat_display_names['blog']  .', '. $cat_display_names['grid'];
$data['custom_class'] = 'blog grid';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/blog-grid-3-columns-image.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row][vc_column][vc_custom_heading text="What's New" font_container="tag:h2|font_size:26px|text_align:center|color:%23191e23|line_height:1.5" use_theme_fonts="yes" css=".vc_custom_1545923333857{margin-bottom: 10px !important;}"][vc_separator color="black" style="double" el_width="10" css=".vc_custom_1545923303311{margin-bottom: 20px !important;}"][cl_posts unique_id="id5c1a103e0353b6-46716569" isotope_type="fitRows" style="simple-no_content" pagination="load_more" excerpt_length="62" count="7" order="desc" exclude="2569"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Magazine Grid 1
$data = array();
$data['name'] = esc_html__( 'Magazine Grid 1', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['grid']. ', '.  $cat_display_names['featured'];
$data['custom_class'] = 'magazine grid featured';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-grid-1.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row css=".vc_custom_1544637370209{padding-top: 0px !important;}"][vc_column][cl_posts unique_id="id5c10d4da51db99-13812925" module="grid-blocks" grid_block_type="grid-2" style="media" animation="alpha-anim" excerpt_length="62" count="3" order="asc" include="2698, 2702, 2707, 2813, 2741"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Magazine Grid 2
$data = array();
$data['name'] = esc_html__( 'Magazine Grid 2', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['grid']. ', '.  $cat_display_names['featured'];
$data['custom_class'] = 'magazine grid featured';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-grid-2.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row css=".vc_custom_1546792697093{margin-top: 0px !important;padding-top: 0px !important;}"][vc_column css=".vc_custom_1546792704236{padding-top: 0px !important;}"][cl_posts unique_id="id5c322eb50f9c05-42780382" module="grid-blocks" grid_block_type="grid-9" style="media" excerpt_length="62" count="4" order_by="post__in" order="desc" include="2698, 2702, 2707, 2734"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );



// Magazine Grid Fullwidth
$data = array();
$data['name'] = esc_html__( 'Magazine Grid Fullwidth', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['grid'];
$data['custom_class'] = 'magazine grid featured';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-grid-fullwidth.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1546859928722{margin-top: 0px !important;padding-top: 5px !important;}"][vc_column css=".vc_custom_1546792704236{padding-top: 0px !important;}"][cl_posts unique_id="id5c322eb50f9c05-42780382" module="grid-blocks" grid_block_type="grid-8" style="media" excerpt_length="62" count="5" order_by="post__in" order="desc" custom_grid_gap="5px" include="2698, 2702, 2707, 2734, 2737"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Magazine Grid 4
$data = array();
$data['name'] = esc_html__( 'Magazine Grid 4', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['grid']. ', '.  $cat_display_names['featured'];
$data['custom_class'] = 'magazine grid featured';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-grid-4.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row css=".vc_custom_1546880958165{margin-top: 0px !important;padding-top: 0px !important;}"][vc_column css=".vc_custom_1546792704236{padding-top: 0px !important;}"][cl_posts unique_id="id5c322eb50f9c05-42780382" module="grid-blocks" grid_block_type="grid-10" style="media" excerpt_length="0" count="5" order_by="post__in" order="desc" include="2698, 2702, 2707, 2734, 2737"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Magazine Grid 5
$data = array();
$data['name'] = esc_html__( 'Magazine Grid 5', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['grid']. ', '.  $cat_display_names['featured'];
$data['custom_class'] = 'magazine grid featured';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-grid-5.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row css=".vc_custom_154688095814545{margin-top: 0px !important;padding-top: 0px !important;}"][vc_column css=".vc_custom_1546792704236{padding-top: 0px !important;}"][cl_posts unique_id="id5c322eb50f9c05-427845454545" module="grid-blocks" grid_block_type="grid-8" style="media" excerpt_length="0" count="5" order_by="post__in" order="desc" include="2698, 2702, 2707, 2734, 2737"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Magazine Block 1
$data = array();
$data['name'] = esc_html__( 'Magazine Block 1', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['block'];
$data['custom_class'] = 'magazine block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-block-1.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row][vc_column][cl_posts title="Latest News" unique_id="id5c0ab4de21b321-88688305" module="grid-blocks" grid_block_type="grid-4" style="simple-no_content" animation="alpha-anim" filters="ajax" image_size="news_grid" excerpt_length="26" count="10" order="desc" taxonomies="204, 206, 205"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );



// Magazine Block 2
$data = array();
$data['name'] = esc_html__( 'Magazine Block 2', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['block'];
$data['custom_class'] = 'magazine block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-block-2.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row][vc_column][cl_posts unique_id="id5c114eacce5b65-36272521" module="grid-blocks" grid_block_type="grid-5" style="simple-no_content" animation="alpha-anim" image_size="news_grid" excerpt_length="62" count="6" order="asc" taxonomies="204, 1, 206"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Magazine Block 3
$data = array();
$data['name'] = esc_html__( 'Magazine Block 3', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['block'];
$data['custom_class'] = 'magazine block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-block-3.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row][vc_column width="1/2"][cl_posts title="Popular" unique_id="id5c32308a28b716-69944257" module="grid-blocks" grid_block_type="grid-7" style="simple-no_content" excerpt_length="30" count="4" order="desc" title_design="with_bg" taxonomies="207"][/vc_column_inner][vc_column_inner width="1/2"][cl_posts title="Tech" unique_id="id5c32308a28b716-69944257" module="grid-blocks" grid_block_type="grid-7" style="simple-no_content" excerpt_length="30" count="4" order="desc" title_design="with_bg" taxonomies="206"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Magazine Video Block
$data = array();
$data['name'] = esc_html__( 'Magazine Video Block', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['block'];
$data['custom_class'] = 'magazine block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-video-block.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row][vc_column][cl_posts title="Video Gallery" unique_id="id5c32308a28b716-69944257" columns="2" style="media" excerpt_length="30" count="4" order="desc" custom_grid_gap="10px" title_design="with_bg"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Magazine Big Posts
$data = array();
$data['name'] = esc_html__( 'Magazine Big Posts', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['grid'];
$data['custom_class'] = 'magazine grid';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-big-posts.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row][vc_column][cl_posts title="Design" unique_id="id5c322edd075bb0-38328068" columns="2" style="simple-no_content" image_size="news_grid" excerpt_length="30" count="4" order_by="post__in" order="desc" title_design="with_bg" taxonomies="205"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Magazine Headlines
$data = array();
$data['name'] = esc_html__( 'Magazine Headlines', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['block'];
$data['custom_class'] = 'magazine block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-headlines.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row][vc_column][cl_posts title="Latest Headlines" unique_id="id5c335d83250794-05255137" columns="1" style="headlines" filters="isotope" excerpt_length="62" count="7" order="desc" custom_heading_size="24px" title_design="with_bg" taxonomies="207, 204, 206"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Magazine Block Media
$data = array();
$data['name'] = esc_html__( 'Magazine Block Media', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['block'];
$data['custom_class'] = 'magazine block';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-block-media.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row][vc_column][cl_posts title="Popular" unique_id="id5c322edd075bb0-38328068" columns="2" style="media" image_size="news_grid" image_filter="darken" excerpt_length="30" count="4" order_by="post__in" order="desc" custom_grid_gap="3px" title_design="with_bg" include="2741, 2740, 2739, 2738, 2737, 2628"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );


// Magazine Carousel Posts
$data = array();
$data['name'] = esc_html__( 'Magazine Carousel Posts', 'regn' );
$data['cat_display_name'] = $cat_display_names['magazine']  .', '. $cat_display_names['carousel'];
$data['custom_class'] = 'magazine carousel';
$data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory_uri() .'/img/templates/magazine-carousel-posts.jpg' ); 
$data['content'] = <<<CONTENT
[vc_row][vc_column][cl_posts title="Top of Month" unique_id="id5c322edd075bb0-38328068" module="carousel" style="simple-no_content" image_size="news_grid" image_filter="darken" excerpt_length="30" count="4" order_by="post__in" order="asc" title_design="with_bg"][/vc_column][/vc_row]
CONTENT;

vc_add_default_templates( $data );



}


?>