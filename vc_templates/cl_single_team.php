<?php

$args = array(
    "member"             => "",
    "style"            => 'overlay1'
);

extract(shortcode_atts($args, $atts));


$new_query = array( 
    'post_type' => 'staff',
    'p' => (int) $member,
    'posts_per_page' => 1
);

?>

<?php
        
    $the_query = new WP_Query( $new_query );
                                
        // Display posts
    if ( $the_query->have_posts() ) :
            // Start loop
        $i = 0;
        while ( $the_query->have_posts() ) : $the_query->the_post();

            codeless_loop_counter(++$i);
                                    
        ?>

                <div class="cl-single-team cl-element cl-single-team--style-<?php echo esc_attr( $style ) ?>">
                    <div class="cl-single-team__wrapper">
                        <div class="cl-single-team__image">
                            <?php the_post_thumbnail( 'full' ); ?>
                        </div>
                        <div class="cl-single-team__overlay">
                            <div class="cl-single-team__content">
                                <h4 class="cl-single-team__title">
                                    <?php if( codeless_get_meta( 'staff_link', '', get_the_ID() ) != '' ): ?>
                                        <a href="<?php echo esc_url( codeless_get_meta( 'staff_link', '', get_the_ID() ) ) ?>">
                                    <?php endif; ?>
                                        <?php echo get_the_title() ?>
                                    <?php if( codeless_get_meta( 'staff_link', '', get_the_ID() ) != '' ): ?>
                                        </a>
                                    <?php endif; ?>
                                </h4>
                                <span class="cl-single-team__position"><?php echo esc_html( codeless_get_meta( 'staff_position', esc_attr__('Developer', 'regn') , get_the_ID() ) ) ?></span>
                                <span class="cl-single-team__divider"></span>

                                <ul class="cl-single-team__socials">
                                    <?php if( codeless_get_meta( 'staff_facebook', '#' ) != '' ): ?>
                                    <li><a href="<?php echo esc_url( codeless_get_meta( 'staff_facebook', '#', get_the_ID() ) ) ?>"><i class="cl-icon-facebook"></i></a></li>
                                    <?php endif; ?>

                                    <?php if( codeless_get_meta( 'staff_twitter', '#' ) != '' ): ?>
                                    <li><a href="<?php echo esc_url( codeless_get_meta( 'staff_twitter', '#', get_the_ID() ) ) ?>"><i class="cl-icon-twitter"></i></a></li>
                                    <?php endif; ?>

                                    <?php if( codeless_get_meta( 'staff_skype', '#' ) != '' ): ?>
                                    <li><a href="<?php echo esc_url( codeless_get_meta( 'staff_skype', '#' , get_the_ID() ) ) ?>"><i class="cl-icon-skype"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>            
                        </div>
                    </div>
                </div>

                <?php
                    
            // End loop
            endwhile;     

            wp_reset_postdata();
                    
    endif; ?>