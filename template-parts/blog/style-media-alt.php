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
	
	
		
	get_template_part( 'template-parts/blog/parts/entry', 'thumbnail' ); ?>

	
	<div class="cl-entry__wrapper">
	
	
		<div class="cl-entry__wrapper-content">
		
			<?php

				/**
				 * Entry Header
				 * Output Entry Meta and title
				 */ 
			?>
			
			<header class="cl-entry__header">			
                
				<?php the_title( '<h2 class="cl-entry__title cl-custom-font"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
				<?php get_template_part( 'template-parts/blog/parts/entry', 'meta' ); ?>
	
			</header><!-- .cl-entry__header -->
            
            <?php if( $post_format == 'quote' ): ?>
            <?php get_template_part( 'template-parts/blog/formats/content', get_post_format() ) ?>
            <?php endif; ?>
            

			<?php get_template_part( 'template-parts/blog/parts/entry', 'tools' ); ?>
			<?php if($post_format == 'video'): ?>
			<a href="<?php echo esc_url( codeless_extract_link( codeless_get_embed_content() ) ) ?>" data-fancybox class="lightbox cl-entry__video-play-button"><i class="cl-icon-play"></i></a>
			<?php endif; ?>
	
		<?php
		/**
		 * Close Entry Wrapper
		 */ 
		?>
		
		</div><!-- .cl-entry__wrapper-content -->
		
	</div><!-- .cl-entry__wrapper -->
    </div><!-- .cl-entry__media-wrapper -->
</article><!-- #post-## -->
