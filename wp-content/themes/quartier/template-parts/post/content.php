<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<!--News Column-->
<div class="column blog-news-column">
	<article class="inner-box">
    	<figure class="image-box">
            <a href="#">
            	<?php the_post_thumbnail(); ?>
            </a>
            <div class="news-date"><?php echo get_the_date('j'); ?>
            	<span class="month"><?php echo get_the_date('M'); ?></span></div>
        </figure> 
        <div class="content-box padd-top-30">
			<?php
				if ( is_sticky() && is_home() ) :
					echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
				endif;
			?>
			<header class="entry-header">
				<div class="news-date"><?php echo get_the_date('j'); ?>
            	<span class="month"><?php echo get_the_date('M'); ?></span></div>
				<?php
					if ( 'post' === get_post_type() ) :
						echo '<div class="entry-meta">';
							if ( is_single() ) :
							//	twentyseventeen_posted_on();
							else :
							//	echo twentyseventeen_time_link();
								twentyseventeen_edit_link();
							endif;
						echo '</div><!-- .entry-meta -->';
					endif;

					if ( is_single() ) {
						the_title( '<h3><a>', '</a></h3>' );
					} else {
						the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					}
				?>
				<div class="post-info clearfix">
					<?php echo '<div class="post-author">Posted by '.get_the_author_meta('last_name').' '.get_the_author_meta('first_name').'</div>'; ?>
                </div>
			</header><!-- .entry-header -->
			<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
					</a>
				</div><!-- .post-thumbnail -->
			<?php endif; ?>

			<div class="text">
				<?php
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
				?>
			</div><!-- .entry-content -->
		</div>
	</article> <!-- article -->
</div>
