<?php
/**
 * Blog Template Part for displaying entry-thumnail image
 * Used for entry overlay too.
 *
 * @package Regn
 * @subpackage Blog Parts
 * @since 1.0.0
 *
 */

$style = '';

if( get_post_format() == 'image' || get_post_format() == 'quote' ){
	
	$image = get_the_post_thumbnail_url();
	if( empty( $image ) )
		$image = codeless_catch_content_image();

	if( codeless_get_mod( 'blog_style', 'default' ) == 'default' || codeless_get_mod( 'blog_style', 'default' ) == 'modern' || codeless_get_mod( 'blog_style', 'default' ) == 'media' || codeless_get_mod( 'blog_style', 'default' ) == 'media-alt' )
		$style = 'background-image:url( \''.$image.'\' ); ';
}

if( codeless_get_mod( 'blog_style', 'default' ) == 'media' || codeless_get_mod( 'blog_style', 'default' ) == 'media-alt' ){
	$image = get_the_post_thumbnail_url(null, codeless_get_post_thumbnail_size());
	$style = 'background-image:url( \''.$image.'\' ); ';
}
	

?>

<div class="cl-entry__media" style="<?php echo esc_attr($style) ?>">
	
	<?php 
	
	/**
	 * Blog Overlay Styles with the appropiate icon
	 * Blog Entry Link
	 */ 
	if( ! codeless_is_single_post() )
		codeless_blog_overlay();

	?>
	

	<div class="cl-entry__post-thumbnail">
		
		<?php if( codeless_get_mod( 'blog_image_filter', 'normal' ) != 'normal' ): ?>
			<figure class="<?php echo esc_attr( codeless_get_mod( 'blog_image_filter', 'normal' ) ) ?>">
		<?php endif; ?>

		<?php  if(  ( get_post_format() != 'image' && codeless_get_mod( 'blog_style', 'default' ) == 'default' ) 
					|| codeless_get_mod( 'blog_style', 'default' ) == 'modern'  ): ?>

			<?php the_post_thumbnail( codeless_get_post_thumbnail_size() ); ?>

			<?php if( get_post_format() == 'video' && ( codeless_get_mod( 'blog_style', 'default' ) == 'media-alt' ) ): ?> 
			<a class="cl-entry__video-play cl-lightbox" href="<?php echo esc_url( codeless_extract_link( codeless_get_embed_content() ) ) . '&autoplay=1&rel=1&showinfo=0&modestbranding=1&vq=hd720' ?>" data-options="width:1920, height:1080">
				<i class="cl-icon-play-circle"></i>
			</a>
			<?php endif; ?>

		<?php endif; ?>
			
		<?php if( codeless_get_mod( 'blog_image_filter', 'normal' ) != 'normal' ): ?>
			</figure>
		<?php endif; ?>

		

	</div><!-- .cl-entry__post-thumbnail --> 
</div><!-- .cl-entry__media --> 