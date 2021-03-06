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
<?php get_template_part( 'template-parts/post/content', 'category_title' ) ?>
    <!--Blog News Section-->
<section class="blog-news-section latest-news">
    	<div class="auto-container">
        	<div class="row clearfix">
		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content','category' );

			endwhile;

			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>
</div><!-- .wrap -->
</div>
</section>
<!--Main Features-->
    <section class="main-features parallax-section theme-overlay overlay-deep-white" style="background-image:url(images/parallax/image-1.jpg);">
        <div class="auto-container">
            <div class="title-box text-center mb-0">
                <h1 class="fs-36 mb-15">Quartiers libres en avant !</h1>
                <h2>Contribuer avec nous par aide et donation</h2>
                <div class="text">
                	un petit geste pour faire grandir l'espoir
                </div>
                <div class="">
                    <a class="theme-btn btn-style-four" href="#">Participons ensemble</a>
                    <a class="theme-btn btn-style-two" href="#">Faites un don</a>
                </div>
            </div>
        </div>
    </section>
    

<?php get_footer();
