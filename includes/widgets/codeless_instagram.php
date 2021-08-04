<?php 

class CodelessInstagram extends WP_Widget{



    function __construct(){

        $options = array('classname' => 'widget_instagram', 'description' => '', 'customize_selective_refresh' => true );

		parent::__construct( 'widget_instagram', THEMENAME.' Widget Instagram', $options );

    }


 
    function widget($atts, $instance){

        extract($atts, EXTR_SKIP);

		echo codeless_complex_esc( $before_widget );

        $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);


        if ( !empty( $title ) ) { 

            echo codeless_complex_esc( $before_title . $title . $after_title ); 

        }

        ?>

       <div class="cl-instafeed" data-token="<?php echo esc_attr( codeless_get_mod( 'show_instagram_feed_token' ) ); ?>" data-userid="<?php echo esc_attr( codeless_get_mod( 'show_instagram_feed_userid' ) ); ?>"></div>

      
        <?php

        echo codeless_complex_esc( $after_widget );

    }

    



    function update($new_instance, $old_instance){

        $instance = $old_instance;

        $instance['title'] = $new_instance['title'];

        return $instance;

    }



    function form($instance){

        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );

        $title = isset($instance['title']) ? $instance['title']: "";

     
        ?>

        <p>

    		<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">Widget Title: 

    		<input id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label>

        </p>

        

        <p>

            <?php esc_attr_e( 'Add token and userid at Theme Options (Customizer) -> Footer', 'regn' ); ?>
           
        </p>

      

   

        <?php

    }

}