<div class="popin-ae">
    <div class="t-reinsurance">
        <div class="o-reinsurance o-reinsurance--head">
            <h3 class="m-reinsurance m-reinsurance--title m-reinsurance--title__bold">Covid-19</h3>
            <span class="m-reinsurance m-reinsurance--text m-reinsurance--text__normal">Conscients de la situation actuelle, le service mondial relay est temporairement suspendu</span>
        </div>

        <div class="o-reinsurance o-reinsurance--head">
            <h3 class="m-reinsurance m-reinsurance--title m-reinsurance--title__bold">Besoin d'aide ?</h3>
            <span class="m-reinsurance m-reinsurance--text m-reinsurance--text__normal">Notre service Client est à votre écoute du Lundi au Vendredi 9h à 18h.</span>
            <span class="m-reinsurance m-reinsurance--text m-reinsurance--text__normal">- Par téléphone : 09 69 36 46 56 (Coût d'un appel local)</span>
            <span class="m-reinsurance m-reinsurance--text m-reinsurance--text__normal">- Ou par email : rendez-vous à la rubrique <a>"Aide et Contact"</a></span>

            <div class="o-reinsurance--button">
                <a class="m-reinsurance--button">En savoir plus</a>
            </div>
        </div>

        <div class="o-reinsurance--wrapper">
            <h3 class="m-reinsurance m-reinsurance--title m-reinsurance--title__bold">Tarifs livraison</h3>
            <ul class="o-reinsurance--list">
                <!-- begin block -->
                <li class="m-reinsurance--item">
                    <div class="m-reinsurance--item--block m-reinsurance--item--block-left">
                        <h4>Click & collect - Livraison en boutique</h4>
                    </div>
                    <div class=" m-reinsurance--item--block-block m-reinsurance--item--block-right">
                        <span>Click & collect - Livraison en boutique</span>
                        <span class="a-reinsurance--text__bold">Click & collect - Livraison en boutique</span>
                    </div>
                </li>
                <!-- end block -->
                <!-- begin block -->
                <li class="m-reinsurance--item">
                    <div class="m-reinsurance--item--block m-reinsurance--item--block-left">
                        <h4>Click & collect - Livraison en boutique</h4>
                    </div>
                    <div class=" m-reinsurance--item--block-block m-reinsurance--item--block-right">
                        <span>Click & collect - Livraison en boutique</span>
                        <span class="a-reinsurance--text__bold">Click & collect - Livraison en boutique</span>
                    </div>
                </li>
                <!-- end block -->
                <!-- begin block -->
                <li class="m-reinsurance--item">
                    <div class="m-reinsurance--item--block m-reinsurance--item--block-left">
                        <h4>Click & collect - Livraison en boutique</h4>
                    </div>
                    <div class=" m-reinsurance--item--block-block m-reinsurance--item--block-right">
                        <span>Click & collect - Livraison en boutique</span>
                        <span class="a-reinsurance--text__bold">Click & collect - Livraison en boutique</span>
                    </div>
                </li>
                <!-- end block -->
                <!-- begin block -->
                <li class="m-reinsurance--item">
                    <div class="m-reinsurance--item--block m-reinsurance--item--block-left">
                        <h4>Click & collect - Livraison en boutique</h4>
                    </div>
                    <div class=" m-reinsurance--item--block-block m-reinsurance--item--block-right">
                        <span>Click & collect - Livraison en boutique</span>
                        <span class="a-reinsurance--text__bold">Click & collect - Livraison en boutique</span>
                    </div>
                </li>
                <!-- end block -->
                <!-- begin block -->
                <li class="m-reinsurance--item">
                    <div class="m-reinsurance--item--block m-reinsurance--item--block-left">
                        <h4>Click & collect - Livraison en boutique</h4>
                    </div>
                    <div class=" m-reinsurance--item--block-block m-reinsurance--item--block-right">
                        <span>Click & collect - Livraison en boutique</span>
                        <span class="a-reinsurance--text__bold">Click & collect - Livraison en boutique</span>
                    </div>
                </li>
                <!-- end block -->
                <!-- begin block -->
                <li class="m-reinsurance--item">
                    <div class="m-reinsurance--item--block m-reinsurance--item--block-left">
                        <h4>Click & collect - Livraison en boutique</h4>
                    </div>
                    <div class=" m-reinsurance--item--block-block m-reinsurance--item--block-right">
                        <span>Click & collect - Livraison en boutique</span>
                        <span class="a-reinsurance--text__bold">Click & collect - Livraison en boutique</span>
                    </div>
                </li>
                <!-- end block -->
            </ul>
        </div>
    </div>
</div>
<div class="info-services">
    <div class="info-services--title">
        <h3>Astrologie, sophrologie & Sonothérapie</h3>
    </div> 
    <div class="info-tab-head ">
    
        <ul class="info-tab-head--list">
            <?php
                $args = array(
                    'posts_per_page' => 5,
                    'tag' => 'astro'
                );
                $query = new WP_Query($args);
                if ( $query->have_posts() ) :

                    /* Start the Loop */
                    while ( $query->have_posts() ) : $query->the_post();
                        /*
                            * Include the Post-Format-specific template for the content.
                            * If you want to override this in a child theme, then include a file
                            * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                            */
                        get_template_part( 'template-parts/post/content', 'tabhead');

                    endwhile;

                endif;
            ?>
        </ul>
        <div class="info-tab-block info-tab-block--list">
        <?php
                $args = array(
                    'posts_per_page' => 5,
                    'tag' => 'astro'
                );
                $query = new WP_Query($args);
                if ( $query->have_posts() ) :

                    /* Start the Loop */
                    while ( $query->have_posts() ) : $query->the_post();
                        /*
                            * Include the Post-Format-specific template for the content.
                            * If you want to override this in a child theme, then include a file
                            * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                            */
                        get_template_part( 'template-parts/post/content', 'tabcontent');

                    endwhile;

                endif;
            ?>
        </div>
    </div>
</div>
<div class="wrapper_mya tile-wrapper">
    <div class="head-home">
        <h3><?php echo option_get_config_value('title_events') ?></h3>
    </div>
    <div class="tile-mya-wrapper">
        <?php
            $args = array(
                'posts_per_page' => 2,
                'category_name' => 'home'
            );
            $query = new WP_Query($args);
            if ( $query->have_posts() ) :

                /* Start the Loop */
                while ( $query->have_posts() ) : $query->the_post();

                    /*
                        * Include the Post-Format-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                        */
                    get_template_part( 'template-parts/post/content', 'home' );

                endwhile;

            endif;
        ?>
    </div>
</div>

<div class="wrapper_mya full-mya">
<?php
    $args = array(
        'posts_per_page' => 1,
        'category_name' => 'home'
    );
    $query = new WP_Query($args);
    if ( $query->have_posts() ) :

        /* Start the Loop */
        while ( $query->have_posts() ) : $query->the_post();

            /*
                * Include the Post-Format-specific template for the content.
                * If you want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                */
            get_template_part( 'template-parts/post/content', 'imagefull' );

        endwhile;

    endif;
?>
</div> 

<div class="tarifs-ae">
    <div class="head-tarif">
        <h3 class="ttl-ae-1">Pricing</h3>
        <h4 class="ttl-ae-2">The right price for you, whoever you are</h4>
        <p class="desc-ae">Donec ullamcorper ac nunc at molestie. Nulla maximus lacinia lorem, et commodo felis rutrum eget. Aenean sit amet leo eget tortor dictum elementum vel eu dolor.
        </p>
    </div>
    <div class="list-formule-ae">
        <div class="form-ae--block">
            <div class="form-ae--head">
                <span class="baseline-ae">Sophrologie</span>
                <div class="form-ae--price">
                    <span class="price">99 €</span>
                    <span class="per-ae">/ month</span>
                </div>
            </div>
            <div class="form-ae--list">
                <ul>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                </ul>
            </div>
            <div class="form-ae--button">
                <a class="form-ae--button__cta">Prendre un rendez-vous</a>
            </div>
        </div>
        <!-- block 2 -->
        <div class="form-ae--block">
            <div class="form-ae--head">
                <span class="baseline-ae">Astrologie</span>
                <div class="form-ae--price">
                    <span class="price">399 €</span>
                    <span class="per-ae">/ month</span>
                </div>
            </div>
            <div class="form-ae--list">
                <ul>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                </ul>
            </div>
            <div class="form-ae--button">
                <a class="form-ae--button__cta">Prendre un rendez-vous</a>
            </div>
        </div>
         <!-- block 2 -->
         <div class="form-ae--block">
            <div class="form-ae--head">
                <span class="baseline-ae">Sonothérapie</span>
                <div class="form-ae--price">
                    <span class="price">299 €</span>
                    <span class="per-ae">/ month</span>
                </div>
            </div>
            <div class="form-ae--list">
                <ul>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                    <li><span class="fa-check"></span><span>leo eget tortor dictum elementum vel eu dolo</span></li>
                </ul>
            </div>
            <div class="form-ae--button">
                <a class="form-ae--button__cta">Prendre un rendez-vous</a>
            </div>
        </div>
    </div>
</div>
<div class="wrapper-services">
    <?php
        $args = array(
            'posts_per_page' => 5,
            'tag' => 'services'
        );
        $query = new WP_Query($args);
        if ( $query->have_posts() ) :

            /* Start the Loop */
            while ( $query->have_posts() ) : $query->the_post();
            get_template_part( 'template-parts/post/content', 'service'); 

            endwhile;

        endif;
    ?>
    <div class="services services-offer wt">
        <div class="containers containers-services">
            <div class="ct ct-left wt">
                <img src=<?php echo option_get_config_value('upload_imageDevis') ?> />
            </div>
            <div class="ct ct-right wt">
                <span class="ct-title wt"><?php echo option_get_config_value('title_devis') ?></span>
                <p><?php echo option_get_config_value('resume_devis') ?> </p>
            </div>
        </div>
        <a class="cta-benefit wt" href=<?php echo option_get_config_value('url_devis') ?>>
            <span><?php echo option_get_config_value('cta_devis') ?></span>
            <span class="flaticon-arrows-8"></span>
        </a>
    </div>
</div>
     <!--Testimonials-->
    <section class="testimonials-section">
        <div class="auto-container">
            
            <div class="sec-title text-center">
                <h2>
                    <span class="normal-font theme_color"> 
                        <?php $titleTestimonial = get_option('id_config_animate')['title_testimonial']; 
                             echo $titleTestimonial;
                        ?>
                    </span>
                </h2>
                <div class="text">
                    <?php $resumeTestimonial = get_option('id_config_animate')['resume_testimonial']; 
                         echo $resumeTestimonial;
                    ?>
                </div>
            </div>
            
            <!--Slider-->      
            <div class="testimonials-slider testimonials-carousel">
                <?php
                   $args = array(
                        'category_name' => 'testimonials'
                   );
                   $query = new WP_Query($args);
                    if ( $query->have_posts() ) :

                        /* Start the Loop */
                        while ( $query->have_posts() ) : $query->the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/post/content', 'testimonial' );

                        endwhile;

                    endif;
                ?>

            </div>
            
        </div>    
    </section> 
    <?php get_template_part( 'template-parts/components/content', 'partner' ); ?> 
            </div>
        </div>
    </section>