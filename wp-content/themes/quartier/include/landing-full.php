<?php
     $args = array(
     'posts_per_page' => 1,
     'tag' => 'immersive'
);

$query = new WP_Query($args);
// var_dump($query);
     if ( $query->have_posts() ) :

          /* Start the Loop */
          while ( $query->have_posts() ) : $query->the_post();

               /*
                    * Include the Post-Format-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                    */
               get_template_part( 'template-parts/post/content-full', get_post_format() );

          endwhile;
     else :

          get_template_part( 'template-parts/post/content', 'none' );

     endif;
?>