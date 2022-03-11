<?php
/**
 * Template part for displaying image posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<article 
	<?php echo 'style="background-image:url('.get_the_post_thumbnail_url().');"'?>
	class="imagefull-mya" 
	id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( is_sticky() && is_home() ) :
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<div class="full-desc-mya">
				<h4 class="ttl-full-mya"><span><?php echo option_get_config_value('title_devis') ?></span></h4>
				<p><?php echo option_get_config_value('resume_devis') ?></p>
				<a class="cta-landing" href=<?php echo option_get_config_value('url_devis') ?>><?php echo option_get_config_value('cta_devis') ?></a>
				<!-- <?php the_title('<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?> -->
			</div>
			<a href="<?php the_permalink(); ?>">
				<!-- <?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?> -->
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">

		<?php if ( is_single() || '' === get_the_post_thumbnail() ) :

			// Only show content if is a single post, or if there's no featured image.
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );

		endif; ?>

	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php twentyseventeen_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->
