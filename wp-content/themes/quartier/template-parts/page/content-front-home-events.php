
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
    <?php get_template_part( 'template-parts/components/content', 'partner' ); ?> 
            </div>
        </div>
    </section>