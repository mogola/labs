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

<li  id="post-<?php the_ID(); ?>" >
<a href="#">
    <?php the_post_thumbnail(); ?>
</a>
</li>
