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
            <h1> <?php echo single_cat_title('', true); ?><span class="normal-font"></span></h1>
            <div class="bread-crumb">
                <a href="#" class="current">
                    <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>