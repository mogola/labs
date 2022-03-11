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

<div class="flex-ms-content">
    <div class="">
        <?php echo '<img src='.wp_make_link_relative(get_the_post_thumbnail_url($post->ID, 'large')).' alt=""/>' ?>
    </div>
    <div class="content-info-ms">
        <h2 class="title-info-ms"><?php echo mb_strimwidth(get_the_title(), 0, 60, "..."); ?></h2>
        <div class="cta-ms-push">
            <a class="cta-link-ms" href="<?php the_permalink(); ?>">Je découvre</a>
        </div>
    </div>
</div>