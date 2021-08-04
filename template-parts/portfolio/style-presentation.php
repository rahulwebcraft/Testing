<div class="cl-portfolio-item <?php echo esc_attr( codeless_extra_classes( 'portfolio_item' ) ) ?>" <?php echo codeless_complex_esc( codeless_extra_attr( 'portfolio_item' ) ) ?>>
    <div class="cl-portfolio-item__wrapper">
        <div class="cl-portfolio-item__media">
                <?php get_template_part( 'template-parts/portfolio/parts/thumbnail' ) ?>
        </div>
        <div class="cl-portfolio-item__overlay">
            <div class="cl-portfolio-item__overlay-wrapper">
                <h4><?php echo get_the_title() ?></h4>
                
                <p><?php echo get_the_content() ?></p>
            </div>
        </div>

        <a href="<?php echo esc_url( codeless_portfolio_item_permalink() ) ?>" target="_blank" class="cl-portfolio-item__permalink"></a>
    </div>
</div>