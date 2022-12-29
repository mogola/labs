<?php
/**
 * Template part for displaying image posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<article 
	<?php echo 'style="background-image:url('.get_the_post_thumbnail_url().');"'?>
        class="imagefull-mya-landing" 
        id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="txt-full">
            <h1><?php the_title() ?></h1>
            <h2><?php the_excerpt(); ?></h2>
            <a class="ct-landing" href="<?php echo get_option('id_config_animate')['urlOption'] ?>"> Découvrez nos services</a>
        </div>
        
        <a class="scrollDown flaticon-arrows-10"></a>
</article><!-- #post-## -->
