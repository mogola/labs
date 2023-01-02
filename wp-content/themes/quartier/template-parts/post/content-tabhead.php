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
<li id="post-<?php the_ID(); ?>" data-service="<?php echo $idContent[0]; ?>" >
    <a data-service="<?php echo $idContent[0]; ?>"><?php the_title(); ?></a>   
</li>