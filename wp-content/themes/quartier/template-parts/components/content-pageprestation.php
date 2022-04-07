<div class="block-prestations">
    <div class="pdp_service">
        <?php 
        
        // Juste une sécurité
        if (class_exists('AstroLune')) {

            global $wp_query;
            $pageId = $wp_query->post->ID;
            $prestations = AstroLune::getPagePrestations($pageId);
            
            foreach($prestations as $prestation) {
        ?>
        <div class="ct_pd ct_pdp_img">
           <?php echo html_entity_decode(str_replace('\"', '"', $prestation->Description )) ?>
        </div>
        <div class="ct_pd ct_pdp_txt">
            <h3 class="ttl_ct_pd"><?php echo $prestation->Title ?></h3>
            <h4 class="ttl_price_pd"><?php echo $prestation->Price ?> &euro;</h4>
            <?php the_excerpt(); ?>
            <div class="paypal_container">
                <?php echo do_shortcode("[wpecpp name='".$prestation->Title." price='". $prestation->Price. "']"); ?>
            </div>
            <div class="container-ttl">
                <a class="ttl-cta-payment">Réservez</a> 
            </div>
        <?php
            }
        }
        ?>
    </div>
</div>