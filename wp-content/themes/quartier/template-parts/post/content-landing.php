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
        <div class="hero-mya">
            <div class="hero-mya--title">
                <div id="main-title">
                    <?php the_title('<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                </div>
                <div class="intro">
                    <p class="p-lg"> 
                        <?php the_excerpt(); ?>
                    </p>
                </div>
                <!-- <div class="cta">
                    <a href=" #next-slice " class="btn-next-slice btn btn-white"> Découvrir notre offre de service  <i class="flaticon-arrows-10"></i></a>
                </div> -->
            </div>
            <div class="hero-mya--block">
                <p class="h2 title"> 
                    Solutions immobilières sur mesure.
                </p>
                <div class="text">
                    <p class="p-lg"> 
                    C’est avant tout une expérience humaine avec des hommes et des femmes, passionnés de l’immobilier. 
                    Nous vous accompagnons avec passion tout au long de votre projet !   
                </p>
                </div>
                <div class="cta">
                    <a href="/nous-contactez " class="redirect-contact resetcss btn"> Je souhaite être recontacté </a>
                </div>
                <p class="p-sm margin-right-x-large margin-left-x-large margin-top-medium text-align-center"> 
                Échangez avec nos experts pour nous parler de vos besoins au 06 75 49 09 34
                </p>
            </div>
        </div>
</article><!-- #post-## -->
