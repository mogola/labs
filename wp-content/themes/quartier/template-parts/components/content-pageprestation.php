<div class="block-prestations">
    <div class="pdp_service pdp_service--prestation">
        <?php 
        
        // Juste une sécurité
        if (class_exists('AstroLune')) {

            global $wp_query;
            $pageId = $wp_query->post->ID;
            $prestations = AstroLune::getPagePrestations($pageId);
            
            foreach($prestations as $prestation) {
        ?>
        <div class="item-presta">
            <div class="ct_pd ct_pdp_img">
                <img src="<?php echo $prestation->ImageUrl ?>" />
            </div>
            <div class="ct_pd ct_pdp_txt">
                <h3 class="ttl_ct_pd"><?php echo $prestation->Title ?></h3>
                <h4 class="ttl_price_pd"><?php echo $prestation->Price ?> &euro;</h4>
                <div class="desc-presta desc-presta-min">
                    <?php echo html_entity_decode(str_replace('\"', '"', $prestation->Description )) ?>
                </div>
                <div class="paypal_container">
                    <?php echo do_shortcode("[wpecpp name='".$prestation->Title." price='". $prestation->Price. "']"); ?>
                </div>
                <div class="container-ttl">
                    <a class="ttl-cta-payment" href="<?php echo option_get_config_value('redirect_Contact'); ?>">Réservez</a> 
                </div>
            </div>      
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>