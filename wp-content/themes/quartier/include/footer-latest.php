<!--Footer Column-->
<div class="col-lg-3 col-sm-6 col-xs-12 column">
    <div class="footer-widget news-widget">
        <h2><?php echo option_get_config_value('latest_news') ?></h2>	
        <?php 
            $args = array(
            'posts_per_page' => 2,
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
                get_template_part( 'template-parts/post/content', 'latest' );

            endwhile;

        endif;
    ?>                            
    </div>
</div>