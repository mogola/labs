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
<?php 
    $idContent = get_post_meta($post->ID, 'content', false);
?>
<!-- begin block --> 
    <div class="info-block" data-content="<?php echo $idContent[0]; ?>">
        <div class="info-block--left">
            <h2 class="tab-title"><?php the_title(); ?></h2>
            <div class="tab-content">
                <?php echo get_the_content(); ?>
            </div>
            <p>
                <a class="tab-link" href="<?php the_permalink(); ?>">
                En savoir plus </a>
            </p>
        </div>

        <div class="info-block--right info-block--img">
            <p><?php the_post_thumbnail(); ?></p>
        </div>
    </div>
<!-- end block -->