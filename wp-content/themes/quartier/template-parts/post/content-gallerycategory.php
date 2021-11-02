<?php
/**
 * Template part for displaying gallery posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<div id="post-<?php the_ID(); ?>" class=" <?php getCat(the_ID()); ?> column mix  mix_all col-md-4 col-sm-6 col-xs-12">
    <!--Default Portfolio Item-->
    <div class="default-portfolio-item">
        <div class="inner-box text-center">
            <!--Image Box-->
            <figure class="image-box">
            	<?php echo '<img src='.get_the_post_thumbnail_url();'/>' ?>
            </figure>
            <?php 
            $postIdThumb = get_post_thumbnail_id($post->ID);
            $image_alt = get_post_meta($postIdThumb, '_wp_attachment_image_alt', true);
            ?>
            <div class="overlay-box">
                <div class="inner-content">
                    <div class="content">
                        <?php echo '<a class="arrow lightbox-image" href="'. get_the_post_thumbnail_url($post->ID, 'large'). '" title="'. $image_alt .'"><span class="icon flaticon-cross-4"></span></a>'?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
