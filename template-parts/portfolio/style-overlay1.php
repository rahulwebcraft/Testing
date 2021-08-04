<div class="cl-portfolio-item <?php echo esc_attr( codeless_extra_classes( 'portfolio_item' ) ) ?>" <?php echo codeless_complex_esc( codeless_extra_attr( 'portfolio_item' ) ) ?>>
    <div class="cl-portfolio-item__wrapper">
        <div class="cl-portfolio-item__media">
                <?php get_template_part( 'template-parts/portfolio/parts/thumbnail' ) ?>
        </div>
        <div class="cl-portfolio-item__overlay">
            <div class="cl-portfolio-item__overlay-wrapper">
                <div class="cl-portfolio-item__category">
                    <?php echo get_the_term_list( get_the_ID(), 'portfolio_entries', '', ', ', '' ) ?>
                </div>
                <span class="cl-portfolio-item__divider"></span>
                <h4><?php echo get_the_title() ?></h4>
                
                <?php if( codeless_excerpt() != '' ): ?>
                <p><?php echo codeless_excerpt(100) ?>...</p>
                <?php endif; ?>

                <div class="cl-portfolio-item__links">
                    <a href="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID(),'full') ) ?>" data-fancybox><?php esc_html_e('Zoom', 'regn') ?></a>
                    <a href="<?php echo esc_url( codeless_portfolio_item_permalink() ) ?>"><?php esc_html_e('View Project', 'regn') ?></a>
                </div>
            </div>

            <?php if( codeless_get_mod( 'portfolio_image_gallery', 'no' ) == 'yes' ): ?>
                <a class="cl-portfolio-item__gallery-link" href="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID(),'full') ) ?>" data-fancybox="gallery"></a>
            <?php endif; ?>

        </div>
    </div>
</div>