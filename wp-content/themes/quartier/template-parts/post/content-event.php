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

<div class="link-block" id="post-<?php the_ID(); ?>">
    <div class="default inner">
        <figure class="image-thumb">
  			<?php echo '<img src='.get_the_post_thumbnail_url($post->ID, 'thumbnail').' alt=""/>' ?>
        </figure>
        <h4 class="title"><?php echo mb_strimwidth(get_the_title(), 0, 20, "..."); ?></h4>
        <ul class="event-held">
            <li style="display:none;"><i class="fa fa-clock-o"></i> de <?php echo get_post_meta($post->ID, 'hour_begin', true) ?>H à 
            	<?php echo get_post_meta($post->ID, 'hour_end', true) ?>H </li>
            <li> <i class="fa fa-map-marker"></i> <?php echo get_post_meta($post->ID,'addresse', true) ?></li>
        </ul>
        <ul class="event-date">
            <li class="event-day"><?php echo get_the_date('j') ?></li>
            <li class="event-month"><?php echo get_the_date('M'); ?></li>
        </ul>
    </div>
    <div class="alternate">
        <p class="desc"><?php echo mb_strimwidth(get_the_excerpt(), 0, 45) ?></p>
        <a class="theme-btn btn-style-two btn-xs mr-10" href="<?php the_permalink(); ?>">En savoir plus</a>
    </div>
</div>