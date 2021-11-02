<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<!--Page Title-->
<?php 
 $getPostMetaBodyClass = get_post_meta($post->ID);

$thumpage = '';

if(has_post_thumbnail()){
	$thumpage = wp_make_link_relative(get_the_post_thumbnail_url());
}else{
	$thumpage = wp_make_link_relative(wp_upload_dir()['baseurl'].'/default.jpg');
}
has_post_thumbnail()
?>
<section class="page-title"  <?php echo 'style="background-image:url('.$thumpage.');"'?>>
    <div class="auto-container">
        <div class="sec-title">
            <h1> <?php echo get_the_title() ?><span class="normal-font"></span></h1>
            <div class="bread-crumb">
                <a href="#" class="current">
                    <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="default-section other-info">
    	<div class="auto-container">
        
        	<div class="row clearfix">
				<?php 
					if(is_page('faq')){ 
						$titleFaq = option_get_config_value('faq_title');
						$descFaq = option_get_config_value('faq_desc');
						
						echo 
							'<div class="sec-title text-center small-container padd-bott-30">
								<h3 class="bigger-text">'. $titleFaq .'</h3>
							    <div class="text">'. $descFaq.'</div>
							</div>';
					}
				?>

            <?php 
           
                if($getPostMetaBodyClass['bodyclass'][0] == "engagement") {
                    get_template_part( 'template-parts/components/content', 'engage' );
                }    
            ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content <?php addClassFaq('accordion-box') ?>">
						<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
		</section>
        <?php 
           
            if($getPostMetaBodyClass['bodyclass'][0] == "engagement") {
                get_template_part( 'template-parts/components/content', 'pushbottom' );
            }    
        ?>
		 <!--Sponsors Section-->
    <section class="sponsors-section">
        <div class="auto-container">
            <div class="slider-outer">
                <!--Sponsors Slider-->
                <ul class="sponsors-slider">
                    <?php
                   $args = array(
                        'category_name' => 'partner'
                   );
                   $query = new WP_Query($args);
                    if ( $query->have_posts() ) :

                        /* Start the Loop */
                        while ( $query->have_posts() ) : $query->the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/post/content', 'partner' );

                        endwhile;

                    endif;
                ?>
                </ul>
            </div>            
        </div>
    </section> 
	</div>
</div>