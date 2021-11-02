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
<div class="column blog-news-column col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <article class="inner-box"id="post-<?php the_ID(); ?>">
            <figure class="image-box">
               <a href="<?php the_permalink(); ?>"> <?php echo '<img src="'.get_the_post_thumbnail_url().'" alt=""/>' ?></a>
                <div class="news-date"><?php the_date('j') ?><span class="month"><?php echo get_the_date('M'); ?></span></div>
            </figure>
            <div class="content-box">
                <h3><a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 30, "..."); ?></a></h3>
                <div class="post-info clearfix">
                    <div class="post-author"><?php echo get_the_author(); ?></div>
                    <div class="post-options clearfix">
                        <a href="<?php the_permalink(); ?>" class="comments-count"><span class="icon flaticon-communication-2"></span> <?php echo $post->comment_count; ?></a>
                    </div>
                </div>
                <div class="text"><?php echo mb_strimwidth(get_the_excerpt(), 0, 50, "..."); ?></div>
                <a href="<?php the_permalink(); ?>" class="theme-btn read-more">Lire l'article</a>
            </div>
    </article>
</div>