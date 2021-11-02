<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<!--Page Title-->
<section class="page-title"  <?php echo 'style="background-image:url('.get_the_post_thumbnail_url().');"'?>>
    <div class="auto-container">
        <div class="sec-title">
        	<?php if ( have_posts() ) : ?>
				<h1><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php else : ?>
				<h1><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
			<?php endif; ?>
            <div class="bread-crumb">
                <a href="#" class="current">
                    <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="blog-news-section latest-news">
    	<div class="auto-container">
        	<div class="row clearfix">

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'category' );

			endwhile; // End of the loop.

			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		else : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
			<?php
				get_search_form();

		endif;
		?>
	</div>
</div><!-- .wrap -->
</div>
</section>

<?php get_footer();
