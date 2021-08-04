<?php

$args = array(
    "members"             => "",
);

extract(shortcode_atts($args, $atts));

if( !empty( $members ) )
    $members = explode( ',', $members );

$new_query = array( 
    'post_type' => 'staff',
    'post__in' => $members,
); 

?>

<div class="cl-element cl-team-grid">
    
    <div class="cl-team-grid__wrapper"">

        <?php
        
        $the_query = new WP_Query( $new_query );
                                
        // Display posts
        if ( $the_query->have_posts() ) :
            // Start loop
            $i = 0;
            while ( $the_query->have_posts() ) : $the_query->the_post();

                codeless_loop_counter(++$i);
                                    
                ?>

                <div class="cl-team-grid-item">
                    <div class="cl-team-grid-item__image">
                        <?php the_post_thumbnail( 'codeless_team_entry' ); ?>
                    </div>
                    <div class="cl-team-grid-item__overlay"></div>
                    <div class="cl-team-grid-item__data">
                        <h4 class="cl-team-grid-item__title">
                            <?php if( codeless_get_meta( 'staff_link', '', get_the_ID() ) != '' ): ?>
                                <a href="<?php echo esc_url( codeless_get_meta( 'staff_link', '', get_the_ID() ) ) ?>">
                            <?php endif; ?>
                                <?php echo get_the_title() ?>
                            <?php if( codeless_get_meta( 'staff_link', '', get_the_ID() ) != '' ): ?>
                                </a>
                            <?php endif; ?>
                        </h4>
                        <span class="cl-team-grid-item__position"><?php echo esc_html( codeless_get_meta( 'staff_position', esc_attr__('Developer', 'regn' ) , get_the_ID() ) ) ?></span>
                        <span class="cl-team-grid-item__divider"></span>
                        <div class="cl-team-grid-item__triangle"></div>
                        <ul class="cl-team-grid-item__socials">
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

                <?php
                    
            // End loop
            endwhile;
            
            
        else : ?>
        
            <div class="cl-team-grid-item"><?php esc_html_e( 'No Team Members found.', 'regn' ); ?></article>

        <?php endif; ?>
        
        <?php wp_reset_postdata(); ?>
        
    </div><!-- .cl-team-grid__wrapper -->

</div><!-- .cl-team-grid -->

