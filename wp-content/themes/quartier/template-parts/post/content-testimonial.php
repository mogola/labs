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

      <article class="slide-item" id="post-<?php the_ID(); ?>" >
    <!--Default Portfolio Item-->
    <!--Slide-->

                    
        <div class="info-box">
            <figure class="image-box">
                <?php the_post_thumbnail('medium'); ?>
            </figure>
            <h3><?php the_title(); ?></h3>
            <p class="designation">France</p>
        </div>
        
        <div class="slide-text">
            <p><?php echo mb_strimwidth(get_the_excerpt(), 0 ,100, '...'); ?></p>
        </div>
    </article>
                
    
