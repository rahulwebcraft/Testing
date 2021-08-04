<?php

class CodelessDividerWidget extends WP_Widget{



    function __construct(){

        $options = array('classname' => 'widget_divider', 'description' => 'Add a divider widget', 'customize_selective_refresh' => true );

		parent::__construct( 'widget_divider', THEMENAME.' Widget Divider', $options );

    }



    function widget($atts, $instance){

        extract($atts, EXTR_SKIP);

		echo codeless_complex_esc( $before_widget );

        echo codeless_complex_esc( $after_widget );

    }

    



    function update($new_instance, $old_instance){

        $instance = array();

       
        return $instance;

    }



    function form($instance){

        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'ad_url' => '', 'ad_img' => '', 'width' => '', 'height' => '') );

    }

}
?>