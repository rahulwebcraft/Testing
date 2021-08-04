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
                <p><?php echo get_the_excerpt() ?></p>

                <div class="cl-portfolio-item__links">
                    <a href="#"><?php esc_html_e('Zoom', 'regn') ?></a>
                    <a href="<?php echo esc_url( codeless_portfolio_item_permalink() ) ?>"><?php esc_html_e('View Project', 'regn') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>