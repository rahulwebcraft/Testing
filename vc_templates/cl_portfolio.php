<?php

$args = array(
    "title"             => "",
    "unique_id"         => 'id' . str_replace( ".", '-', uniqid("", true) ),
    'module'            => 'isotope',
    'isotope_type'      => 'masonry',
    'grid_block_type'   => '',
    'grid_block_title'  => 'What we do',
    'grid_block_desc'   => 'Developing the simplest static single page of plain text to the most complex web-based internet applications, electronic businesses, and social network services.  For larger organizations and businesses, web ... ',
    'columns'           => '3',
    'carousel_nav'      => 'no',
    'carousel_centered' => 'no',
    'style'             => 'default',
    'image_gallery'     => 'no',
    'animation'         => 'none',
    'pagination'        => 'none',
    'filters'           => 'disabled',
    'image_size'        => 'theme_default',
    'image_filter'      => 'normal',
    'custom_grid_gap'   => '',

    'taxonomies'        => '',
    'count'             => '12',
    'order_by'          => 'date',
    'order'             => 'DESC',
    'include'           => '',
    'exclude'           => '',

);

extract(shortcode_atts($args, $atts));

/* Force fixes for blocks */
if( $module == 'grid-blocks' ){
    if( in_array( $grid_block_type, array( 'grid-1', 'grid-2', 'grid-3', 'grid-8', 'grid-9', 'grid-10' ) ) )
        $style = 'media';
}


// Set global params
global $cl_from_element;
$cl_from_element['portfolio_style'] = $style;
$cl_from_element['portfolio_module'] = $module;
$cl_from_element['portfolio_grid_block'] = $grid_block_type;
$cl_from_element['portfolio_isotope_type'] = $isotope_type;
$cl_from_element['portfolio_columns'] = $columns;
$cl_from_element['portfolio_carousel_nav'] = $carousel_nav;
$cl_from_element['portfolio_carousel_centered'] = $carousel_centered;
$cl_from_element['portfolio_animation'] = $animation;
$cl_from_element['portfolio_pagination_style'] = $pagination;
$cl_from_element['portfolio_filters'] = $filters;
$cl_from_element['portfolio_image_size'] = $image_size;
$cl_from_element['portfolio_image_filter'] = $image_filter;
$cl_from_element['portfolio_taxonomies'] = $taxonomies;
$cl_from_element['portfolio_image_gallery'] = $image_gallery;

$extra_classes = $custom_css = '';

$new_query = array( 
    'post_type' => 'portfolio',
    'orderby'   => $order_by, 
    'order'     => $order,
    'posts_per_page' => $count,
    
); 

if( !empty( $include ) ){
    $new_query['ignore_sticky_posts'] = 1;
    $new_query['post__in'] = explode(',', $include);
    $new_query['ignore_custom_sort'] = true;
}
    

if( !empty( $exclude ) )
    $new_query['post__not_in'] = explode(',', $exclude);

if( !empty( $taxonomies ) ){
    $vc_taxonomies_types = get_taxonomies( array( 'public' => true ) );
    $terms = get_terms( array_keys( $vc_taxonomies_types ), array(
            'hide_empty' => false,
            'include' => $atts['taxonomies'],
        ) );
    $tax_query = array();

    $tax_queries = array(); // List of taxnonimes
    foreach ( $terms as $t ) {
        if ( ! isset( $tax_queries[ $t->taxonomy ] ) ) {
            $tax_queries[ $t->taxonomy ] = array(
                'taxonomy' => $t->taxonomy,
                'field' => 'id',
                'terms' => array( $t->term_id ),
                'relation' => 'IN',
            );
        } else {
            $tax_queries[ $t->taxonomy ]['terms'][] = $t->term_id;
        }
    }

    $tax_query = array_values( $tax_queries );
    $tax_query['relation'] = 'OR';

    $new_query['tax_query'] = $tax_query;
}

$paged_attr = 'paged';

if( is_front_page() )
	$paged_attr = 'page';

if( get_query_var( $paged_attr ) )
	$new_query['paged'] = get_query_var( $paged_attr );
else
    $new_query['paged'] = 1;

global $paged;
$paged = $new_query['paged'];

if( isset( $_GET['cl_cat'] ) && !empty( $_GET['cl_cat'] ) ){
    if( isset( $new_query['tax_query'] ) )
        unset( $new_query['tax_query'] );
    
        $new_query['tax_query'] = array( 
            array(
                'taxonomy' => 'portfolio_entries',  
                'field' => 'id',
                'terms' => array( esc_attr( $_GET['cl_cat'] ) ),
                'relation' => 'IN',
            )
        );
}


/*if( !empty( $custom_heading_size ) ){
    $custom_css .= '@media (min-width:992px){ #'.$unique_id.' h2.cl-entry__title{ font-size:'.$custom_heading_size.'; } }';
}*/


if( $image_filter != 'normal' )
    wp_enqueue_style('codeless-image-filters', get_template_directory_uri() . '/css/codeless-image-filters.css');

if( !empty( $custom_grid_gap ) ){
    if( $module != 'carousel' )
        $custom_css .= ' #'.$unique_id.' .cl-portfolio__list{ margin-left:-'.$custom_grid_gap.';margin-right:-'.$custom_grid_gap.'; }';
    $custom_css .= '#'.$unique_id.' .cl-portfolio-item{ padding: '.$custom_grid_gap.'; }';
}

?>
<div id="<?php echo esc_attr( $unique_id ) ?>" class="cl-element  cl-portfolio <?php echo esc_attr( codeless_extra_classes( 'portfolio_entries' ) ) ?>" <?php echo codeless_extra_attr( 'portfolio_entries' ) ?>>
    
    <?php if( $filters != 'disabled' && !($module == 'grid-blocks' && $grid_block_type == 'grid-creative') ): ?>
        <div class="cl-filters">
            <?php get_template_part( 'template-parts/portfolio/parts/filters' ); ?>
        </div>
    <?php endif; ?>



    <div class="cl-portfolio__list cl-items-container <?php echo esc_attr( codeless_extra_classes( 'portfolio_entries_list' ) ) ?>" <?php echo codeless_extra_attr( 'portfolio_entries_list' ) ?>>

        <?php
        
        $the_query = new WP_Query( $new_query );
                                
        // Display posts
        if ( $the_query->have_posts() ) :
            // Start loop
            $i = 0;
            while ( $the_query->have_posts() ) : $the_query->the_post();

                codeless_loop_counter(++$i);

                if( $i == 1 && $module == 'grid-blocks' && $grid_block_type == 'grid-creative' ): ?>
                    <div class="cl-grid-creative-info">
                        <h2 class="cl-custom-font h3"><?php echo esc_html( $grid_block_title ) ?></h2>
                        <p><?php echo esc_html( $grid_block_desc ) ?></p>
                        <?php if( $filters != 'disabled' ): ?>
                            <div class="cl-filters">
                                <?php get_template_part( 'template-parts/portfolio/parts/filters' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif;
                                    
                /*
                * Get Blog Template Style
                * Codeless_blog_style returns the style selected
                * from Theme Options or a custom filter
                */
                
                get_template_part( 'template-parts/portfolio/style', $style  );
                    
            // End loop
            endwhile;
            
            
        else : ?>
        
            <article class="content-none"><?php esc_html_e( 'No Posts found.', 'regn' ); ?></article>

        <?php endif; ?>                         
        
    </div><!-- .cl-portfolio__list -->

    <?php if( $pagination != 'none' ) codeless_blog_pagination($the_query, $unique_id ); ?>
    <?php wp_reset_postdata(); ?>

    <?php if( !empty($custom_css) ): ?>
        <style type="text/css"><?php echo codeless_complex_esc( $custom_css ) ?></style>
    <?php endif; ?>
</div><!-- .cl-portfolio -->

