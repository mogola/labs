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

    $classContentPage = $getPostMetaBodyClass['bodyclass'][0] == "engagement" ? "" : "defaultContent";

    $thumpage = '';
    $categorypage = get_post_meta($post->ID)['categorypage'][0];
    // $content = the_content();
    // var_dump($categorypage);
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
<!-- begin specific contact view -->
<?php if($getPostMetaBodyClass['bodyclass'][0] == "contactPage") { ?>
<div class="contact-view">
    <div class="map-canvas"
        data-zoom="12"
        data-lat="48.8876729"
        data-lng="2.488239300000032"			  
        data-type="roadmap"
        data-hue="#ffc400"
        data-title="title default"
        data-content="address">
    </div>
<?php } ?>
<!-- specific contact view -->

<section class="default-section other-info">
    <div class="auto-container">
        <?php 
        
        $getMeta = get_post_meta(get_the_ID(), 'categorypage', true); 

        if($getMeta == 'default'){
            $classContainer = 'row clearfix default'; 
        } else {
            $classContainer = 'row clearfix page-services';
        } 
        ?>
        
        <div class="<?php echo $classContainer ?> ">
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
            <?php 
                if($getPostMetaBodyClass['bodyclass'][0] == "engagement") {
            ?>  
        
        <div class="form_devis">
            <?php
                if(array_key_exists('prestations', $getPostMetaBodyClass) && strtolower($getPostMetaBodyClass['prestations'][0]) == 'oui') {
                    get_template_part( 'template-parts/components/content', 'pageprestation' );
                } 
                else 
                { ?>
                   <div class="pdp_service">
                        <div class="ct_pd ct_pdp_img">
                            <?php the_post_thumbnail('large') ?>
                        </div>
                        <div class="ct_pd ct_pdp_txt">
                            <h3 class="ttl_ct_pd"><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <h2 class="title_devis"><?php echo option_get_config_value('title_page'); ?></h2>
                    <div class="form"> 
                        <?php the_content(); ?> 
                    </div>
                </div>
            <?php } else if ($getPostMetaBodyClass['bodyclass'][0] != "engagement" && $getPostMetaBodyClass['bodyclass'][0] != "contactPage") {?>
                <?php the_content(); ?>
            <?php }?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content <?php addClassFaq('accordion-box'); echo $classContentPage; ?>">
                    <?php
                    if($getPostMetaBodyClass['bodyclass'][0] == "contactPage") {
                        the_content();
                    }
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->
            </article><!-- #post-## -->
		</section>

        <!-- end specific contact view -->
        <?php if($getPostMetaBodyClass['bodyclass'][0] == "contactPage") { ?>
            </div>
        <?php } ?>
        <!-- specific contact view -->

        <?php 
           
            if($getPostMetaBodyClass['bodyclass'][0] == "engagement") {
                get_template_part( 'template-parts/components/content', 'pushbottom' );
            }    
        ?>
		 <!--Sponsors Section-->
         <?php get_template_part( 'include/banner', 'offer' ); ?>
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