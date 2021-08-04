<?php

$args = array(
    'members' => ''
);
extract(shortcode_atts($args, $atts));

if( !empty( $members ) )
    $members = explode( ',', $members );

$new_query = array( 
    'post_type' => 'testimonial',
    'post__in' => $members,
); 



?>

<div class="cl-element cl-testimonial-bottom">
    
    <div class="cl-testimonial-bottom__wrapper cl-carousel owl-carousel owl-theme" data-items="1" data-nav="1">

        <?php
        
        $the_query = new WP_Query( $new_query );
                                
        // Display posts
        if ( $the_query->have_posts() ) :
            // Start loop
            $i = 0;
            while ( $the_query->have_posts() ) : $the_query->the_post();

                codeless_loop_counter(++$i);
                                    
                ?>

                <div class="cl-testimonial-item">
                    
                    <div class="cl-testimonial-item__content">
                        <?php echo get_the_content() ?> 
                    </div>

                    <div class="cl-testimonial-item__author">
                        <?php the_post_thumbnail( codeless_get_team_thumbnail_size() ); ?>
                        <h4 class="cl-testimonial-item__title"><?php echo get_the_title() ?></h4>
                        <span class="cl-testimonial-item__position"><?php echo esc_html( codeless_get_meta( 'testimonial_position', '', get_the_ID() ) ) ?></span>
                    </div>
                </div>

                <?php
                    
            // End loop
            endwhile;
            
            
        else : ?>
        
            <div class="cl-testimonial-item"><?php esc_html_e( 'No Testimonials found.', 'regn' ); ?></div>

        <?php endif; ?>                         
        
    </div><!-- .cl-testimonial-bottom__wrapper -->

</div><!-- .cl-testimonial-bottom -->

