<?php
/**
 * Template part for displaying page content in page.php
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
<?php 
    $getPostMetaBodyClass = get_post_meta($post->ID);

    $classContentPage = $getPostMetaBodyClass['bodyclass'][0] == "engagement" ? "" : "defaultContent";

    $thumpage = '';
    $categorypage = get_post_meta($post->ID)['categorypage'][0];

    if(has_post_thumbnail()){
        $thumpage = wp_make_link_relative(get_the_post_thumbnail_url());
    }else{
        $thumpage = wp_make_link_relative(wp_upload_dir()['baseurl'].'/default.jpg');
    }
    has_post_thumbnail()
?>
<section class="page-title"  <?php echo 'style="background-image:url('.$thumpage.');"'?>>
    <div class="auto-container">
        <div class="sec-title">
            <h1> <?php echo get_the_title() ?><span class="normal-font"></span></h1>
            <div class="bread-crumb">
                <a href="#" class="current">
                    <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php if(array_key_exists('prestations', $getPostMetaBodyClass) 
     && strtolower($getPostMetaBodyClass['prestations'][0]) == 'oui') {
        $prestaClass = 'presta-content';
    } else { 
        $prestaClass = '';
    }
?>

<section class="default-section other-info <?php echo $prestaClass; ?>">
    <div class="auto-container">
        <?php $getMeta = get_post_meta(get_the_ID(), 'categorypage', true);

        if($getMeta == 'default'){
            $classContainer = 'row clearfix default'; 
        } else {
            $classContainer = 'row clearfix page-services';
        } 
        ?>
        
        <?php 
         if($getPostMetaBodyClass['bodyclass'][0] == "engagement") {
            get_template_part( 'template-parts/components/content', 'engage' ); 
         }
        ?>
        <div class="<?php echo $classContainer ?> ">
            <div class="container-presta">
                <?php
                    if(array_key_exists('prestations', $getPostMetaBodyClass) && strtolower($getPostMetaBodyClass['prestations'][0]) == 'oui') {
                        echo '<div class="desc-presta">'. get_the_excerpt() .'</div>';
                        get_template_part('template-parts/components/content', 'pageprestation');

                    } 
                ?>
            </section>
        </div>
    </div>
