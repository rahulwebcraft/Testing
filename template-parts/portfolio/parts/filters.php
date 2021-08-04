<?php
/**
 * Template part for displaying posts filter
 * Switch styles at Theme Options (WP Customizer)
 *
 *
 * @package Regn
 * @subpackage Templates
 * @since 1.0.0
 *
 */

?>

<div class="cl-filter cl-filter--portfolio cl-filter--<?php echo esc_attr( codeless_get_mod( 'portfolio_filters', 'disabled' ) ) ?>">

<?php
	$taxonomies = empty( codeless_get_from_element( 'portfolio_taxonomies' ) ) ? '' : explode(',', codeless_get_from_element( 'portfolio_taxonomies' ) );
	
    if( empty( $taxonomies ) || !is_array( $taxonomies ) ){
        $taxonomies = get_terms( array(
            'taxonomy' => 'portfolio_entries',
            'orderby' => 'name',
            'order'   => 'ASC'
		) );
		$arr = array();
		foreach( $taxonomies as $category ):
			$arr[] = $category->term_id;
		endforeach;

		$taxonomies = $arr;
	}
	
	$categories = get_terms( array(
        'taxonomy' => 'portfolio_entries',
	    'orderby' => 'name',
	    'order'   => 'ASC'
	) );

?>
	<div class="cl-filter__inner">

		<a data-filter="*" href="<?php echo esc_url( codeless_get_page_simple_link() ) ?>" class="active"><?php esc_html_e( 'All', 'regn' ) ?></a>
		

		<?php foreach( $categories as $category ): ?>
		<?php if( is_array( $taxonomies ) && !empty( $taxonomies ) && in_array($category->term_id, $taxonomies) ):   ?>
	  		<a href="<?php echo esc_url( add_query_arg( array('cl_cat' => $category->term_id), codeless_get_page_simple_link() ) ) ?>" data-filter=".category-<?php echo esc_attr( $category->slug ) ?>"><?php echo esc_attr( $category->name ) ?></a>
		<?php endif; ?>
		<?php endforeach; ?>

	</div><!-- .cl-filter__inner -->

</div><!-- .cl-filter -->