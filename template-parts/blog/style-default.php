<?php
/**
 * Template part for displaying posts
 * Default Style
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
		
	
	<div class="cl-entry__wrapper">
	
	
		<div class="cl-entry__wrapper-content">
		
			<?php

				/**
				 * Entry Header
				 * Output Entry Meta and title
				 */ 
			?>
			
			<header class="cl-entry__header">

				<?php get_template_part( 'template-parts/blog/parts/entry', 'meta' ); ?>

				<?php the_title( '<h2 class="cl-entry__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

			</header><!-- .cl-entry__header -->


			<?php 
	
				$post_format = get_post_format();
				/**
				 * Generate Post Thumbnail for Single Post and Blog Page
				 */ 
				
				if ( ( has_post_thumbnail() || $post_format == 'image' ) && $post_format != 'gallery' ) :
					
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
				
				endif; 
			
			?>

			<?php get_template_part( 'template-parts/blog/parts/entry', 'tools' ); ?>
				
			<?php get_template_part( 'template-parts/blog/formats/content', get_post_format() ) ?>

            <?php get_template_part( 'template-parts/blog/parts/entry', 'readmore' ); ?>
	
		<?php
		/**
		 * Close Entry Wrapper
		 */ 
		?>
		
		</div><!-- .cl-entry__wrapper-content -->
		
	</div><!-- .cl-entry__wrapper -->

</article><!-- #post-## -->
