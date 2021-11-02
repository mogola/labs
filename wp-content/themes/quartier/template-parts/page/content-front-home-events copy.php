
<div class="wrapper_mya">
    <div class="head-home">
        <h3>Notre <span>Vision</span></h3>
    </div>
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
<!--Events Section-->
    <section class="welcome-section pt-70 pb-70" data-bac="#fcfcfc">
        <div class="auto-container">

            <div class="row clearfix">
                
                <!--Cause Column-->
                <div class="column default-featured-column links-column col-lg-4 col-md-12">
                    <article class="inner-box mb-md-60">
                        <div class="vertical-links-outer events-post">
                            <div class="text-uppercase p-20 mb-5" data-bac="#393d42">
                                <h2 class="white_color fw-b fs-24 mr-xs-80 mr-xxs-0">
                                    <?php $speed = get_option('id_config_animate')['title_events']; 
                                         echo "<div>" . $speed . "</div>";
                                    ?>
                                    <span class="theme_color"></span> </h2>
                            </div>

                            <div class="bx-event-carousel">
                                <?php
                                   $args = array(
                                        'posts_per_page' => 6,
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
                                            get_template_part( 'template-parts/post/content', 'event' );

                                        endwhile;

                                    endif;
                                    ?>
                            </div>
                            
                        </div>
                    </article>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="row">
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
                                get_template_part( 'template-parts/post/content', 'cause' );

                            endwhile;

                        endif;
                        ?>

                    </div>
                </div>
    </section>            
                    <!--Gallery Section-->
    <section class="gallery-section gutterless pb-0">
        <div class="container">
            <div class="row">            
                <div class="sec-title text-center">
                    <h2>
                        <span class="normal-font theme_color"> 
                            <?php $titleGallery = get_option('id_config_animate')['title_gallery']; 
                                 echo $titleGallery;
                            ?>
                        </span>
                    </h2>
                    <div class="text">
                        <?php $resumeGallery = get_option('id_config_animate')['resume_gallery']; 
                             echo $resumeGallery;
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            
            <!--Filter-->
            <div class="filters text-center">
                <ul class="filter-tabs filter-btns clearfix anim-3-all">
                    <?php  

                    $categorybyname = get_category_by_slug('gallery');
                    
                    $get_children_cat = get_categories(array(
                        'child_of' => $categorybyname->term_id,
                        'hierarchical' => false,
                        'depth' => 0
                    ));
                    
                    foreach($get_children_cat as $gallery_child){
                        $getName = $gallery_child;
                        $getName = $getName->name;
                       
                            $cat_id = str_replace(' ','_',$getName);
                            $cat_classname = iconv('UTF-8','ASCII//TRANSLIT', $cat_id);
                            $cat_classname = str_replace("'","",$cat_classname);
                            
                            echo '<li class="filter" data-role="button" data-filter=".'.$cat_classname.'">'.$getName.'</li>';
                    }
                       /*
                       $categories = get_all_category_ids();

                       foreach($categories as $category_id){
                            $nameCat = get_the_category_by_ID($category_id); 
                            $cat_id = str_replace(' ','_',get_the_category_by_ID($category_id));
                            $cat_classname = iconv('UTF-8','ASCII//TRANSLIT', $cat_id);
                            $cat_classname = str_replace("'","",$cat_classname);
                            
                            echo '<li class="filter" data-role="button" data-filter=".'.$cat_classname.'">'.$nameCat.'</li>';
                       }
                       */
                    ?>
                </ul>
            </div>
            
            <!--Filter List-->
            <div class="row filter-list clearfix">
                <?php
                   $args = array(
                        'category_name' => 'gallery'
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
                            get_template_part( 'template-parts/post/content', 'gallery' );

                        endwhile;

                    endif;
                    ?>
            </div>
            
        </div>
    </section>
     <!--Testimonials-->
    <section class="testimonials-section" data-bac="#f5f5f5">
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
     <!--Sponsors Section-->
    <section class="sponsors-section">
        <div class="auto-container">
            <div class="slider-outer">
                <!--Sponsors Slider-->
                <ul class="sponsors-slider">
                    <?php
                   $args = array(
                        'category_name' => 'partner'
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
                            get_template_part( 'template-parts/post/content', 'partner' );

                        endwhile;

                    endif;
                ?>
                </ul>
            </div>            
        </div>
    </section> 
            </div>
        </div>
    </section>