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
<!--News Post-->
<div class="news-post">
    <div class="news-content">
    	<figure class="image-thumb">
    		<?php echo '<img src="'.get_the_post_thumbnail_url().'" alt=""/>' ?>
    	</figure>
    	<?php echo '<a href="'. get_the_permalink() .'">'?>
    	<?php echo mb_strimwidth(get_the_title(), 0, 50, "..."); ?>
    	</a>
    </div>
    	<div class="time"><?php echo get_the_date(); ?></div>
</div>