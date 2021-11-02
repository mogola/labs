<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/post/content','title_post' );
					
					endwhile; // End of the loop.
			?>
			<?php 
				$booleanJob = false;				
				if(!empty(get_the_tags($post->ID))){
					foreach (get_the_tags($post->ID) as $v) {
						if($v->name == "job"){
							$booleanJob = true;
						}
					}
				}
			
			?>
			<div class="sidebar-page">
		    	<div class="auto-container">
		        	<div class="row clearfix">
		        	<?php
		        		$classpost = array(
							'blog-news-section',
							'blog-detail',
							'no-padd-bottom',
							'no-padd-top',
							'padd-right-20'
						); 
			        	while ( have_posts() ) : the_post();
			        	?>


			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
				        	<section id="post-<?php echo $post->ID ?>" <?php echo post_class($classpost) ?> >
				        		<?php
									/* Start the Loop */
									if($booleanJob != true){
										get_template_part( 'template-parts/post/content', get_post_format() );
									}else {
										get_template_part( 'template-parts/post/content',"job" );
										get_template_part( 'template-parts/components/content', 'pushbottom' );
										get_template_part( 'template-parts/components/content', 'partner' );
									}

										// If comments are open or we have at least one comment, load up the comment template.
										/*
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
										
										the_post_navigation( array(
											'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
											'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
										) );
										*/

								endwhile; // End of the loop.
							?>
						</section>
					</div>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
