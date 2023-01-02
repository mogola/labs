<div class="banner banner-offer">
    <div class="containers containers-offer">
        <div class="ct ct-left">
            <?php the_post_thumbnail(); ?>
           <p><?php the_title(); ?></p>
        </div>
        <div class="ct ct-right">
           <span class="ct-title"><?php the_excerpt(); ?></span>
            <a class="cta-benefit" href="<?php echo get_option('id_config_animate')['skyCard'] ?>">Profitez-en !</a>
        </div>
    </div>
</div>