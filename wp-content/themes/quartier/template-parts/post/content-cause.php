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
<div class="column column-causes default-featured-column style-three col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <article class="inner-box mb-xs-60" id="post-<?php the_ID(); ?>">
        <figure class="image-box">
            <a href="<?php the_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url('medium') ?>" alt=""/></a>
            <div class="post-tag"><?php echo get_post_meta($post->ID,'addresse', true) ?></div>
        </figure>
        <div class="content-box">
            <h3><a href="#"><?php echo mb_strimwidth(get_the_title(), 0, 50, "..."); ?></a></h3>
            <div class="text"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "..."); ?></div>
            <a href="https://www.paypal.me/quartierslibres" class="theme-btn btn-style-two btn-sm mr-10">Faites un don</a>
            <a href="<?php the_permalink(); ?>" class="theme-btn btn-style-two btn-sm">Voir plus</a>
        </div>
    </article>
</div>