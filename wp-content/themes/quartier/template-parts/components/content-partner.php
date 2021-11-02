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