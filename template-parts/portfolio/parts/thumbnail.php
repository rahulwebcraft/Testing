<div class="cl-portfolio-item__thumbnail">
    <?php if( codeless_get_from_element( 'portfolio_image_filter' ) != 'normal' ): ?>
        <figure class="<?php echo esc_attr( codeless_get_from_element( 'portfolio_image_filter' ) ) ?>">
    <?php endif; ?>
                
        <?php the_post_thumbnail( codeless_get_portfolio_thumbnail_size() ); ?>
                        
    <?php if( codeless_get_from_element( 'portfolio_image_filter' ) != 'normal' ): ?>
        </figure>
    <?php endif; ?>
</div>