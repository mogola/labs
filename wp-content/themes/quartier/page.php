<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<?php

	$metaType = get_post_meta($post->ID)['prestations'];
	$isPrestation = false;

	if($metaType[0] === 'oui'){
       $isPrestation = true;
	}

	while ( have_posts() ) : the_post();
	if($isPrestation === true){
		get_template_part( 'template-parts/page/content', 'prestations' );
	}else {
		get_template_part( 'template-parts/page/content', 'page' );
	}
		

	endwhile; // End of the loop.
	?>

<?php get_footer();
