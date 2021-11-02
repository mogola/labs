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
<div class="container-mya container-mya-padd">
    <?php the_content(); ?>
</div>
<!-- <div class="container-mya container-mya-padd">
    <div class="link-block-mya" id="post-<?php the_ID(); ?>">
        <div class="default inner img-mya">
            <figure class="image-thumb">
                <?php echo '<img src='.wp_make_link_relative(get_the_post_thumbnail_url($post->ID, 'large')).' alt=""/>' ?>
            </figure>
        </div>
        <div class="default inner text-mya">
            <h4 class="title title-h-mya"><?php echo mb_strimwidth(get_the_title(), 0, 60, "..."); ?></h4>
            <p class="desc desc-mya"><?php echo mb_strimwidth(get_the_excerpt(), 0, 100, "...") ?></p>
            <a class="theme-btn btn-style-two btn-xs mr-10" href="<?php the_permalink(); ?>">En savoir plus</a>
        </div>
    </div>
</div> -->