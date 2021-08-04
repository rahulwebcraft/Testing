<?php
/**
 * Template part for displaying posts
 * Media Style
 * Switch styles at Theme Options (WP Customizer)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Regn
 * @subpackage Templates
 * @since 1.0.0
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( codeless_extra_classes( 'entry' ) ); ?> <?php echo codeless_extra_attr( 'entry' ) ?>>
    <div class="cl-entry__media-wrapper">
	<?php 
	
	$post_format = get_post_format();
	/**
	 * Generate Post Thumbnail for Single Post and Blog Page
	 */ 
	
	if ( $post_format != 'gallery' && ( ! is_single() || ( is_single() && codeless_get_post_style() == 'classic' ) ) ) :
		
		get_template_part( 'template-parts/blog/parts/entry', 'thumbnail' );
	
	endif; ?>
	
	
	<?php

	/**
	 * Generate Slider if needed
	 */ 
	if ( get_post_format() == 'gallery' && !empty( codeless_post_galleries_data(get_post(get_the_ID()) ) ) ):
		
		get_template_part( 'template-parts/blog/parts/entry', 'slider' );
	
	endif; ?>
	
	<?php
	
	
	/**
	 * Generate Audio Output
	 */ 
	if ( get_post_format() == 'audio' ):
	
		get_template_part( 'template-parts/blog/parts/entry', 'audio' );
	
	endif; ?>
		
	
	<div class="cl-entry__wrapper">
	
	
		<div class="cl-entry__wrapper-content">
		
			<?php

				/**
				 * Entry Header
				 * Output Entry Meta and title
				 */ 
			?>
			
			<header class="cl-entry__header">
				
				<div class="cl-entry__category"><?php echo codeless_get_entry_meta_categories() ?></div>
					
				<?php the_title( '<h2 class="cl-entry__title cl-custom-font"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
				
				
				<?php get_template_part( 'template-parts/blog/parts/entry', 'meta' ); ?>
					
			</header><!-- .cl-entry__header -->

			<?php get_template_part( 'template-parts/blog/parts/entry', 'tools' ); ?>
				
			<div class="cl-entry__content"><?php echo get_the_excerpt() ?></div>
				
			<a href="<?php the_permalink() ?>" class="cl-btn cl-btn--style-rounded cl-btn--size-medium"><?php echo esc_html( 'Read More', 'regn' ) ?></a>
	
		<?php
		/**
		 * Close Entry Wrapper
		 */ 
		?>
		
		</div><!-- .cl-entry__wrapper-content -->
		
	</div><!-- .cl-entry__wrapper -->
    </div><!-- .cl-entry__media-wrapper -->
</article><!-- #post-## -->
