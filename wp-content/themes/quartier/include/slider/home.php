<!--Main Slider-->
    <section class="main-slider revolution-slider">
     <div class="tp-banner-container">
            <div class="tp-banner">
                    <ul>
                        	<?php
                              $args = array(
                            'posts_per_page' => 3,
                            'category_name' => 'slider'
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
                                        get_template_part( 'template-parts/post/content-slider', get_post_format() );

                                   endwhile;

                                   the_posts_pagination( array(
                                        'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
                                        'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
                                   ) );

                              else :

                                   get_template_part( 'template-parts/post/content', 'none' );

                              endif;
                         ?>
               </ul>
          </div>
     </div>
    </section>