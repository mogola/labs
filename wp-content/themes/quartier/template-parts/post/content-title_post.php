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
<!--Page Title-->
<section class="page-title"  <?php echo 'style="background-image:url('.get_the_post_thumbnail_url().');"'?>>
	<div class="auto-container">
    	<div class="sec-title">
            <h1> <?php echo get_the_title() ?><span class="normal-font"</span></h1>
            <div class="bread-crumb"> 
	            <a href="#" class="current">
	            	<?php echo get_the_category($post->ID)[0]->name; ?>
	            </a>
        	</div>
        </div>
    </div>
</section>