<div class="services services-offer">
    <div class="containers containers-services">
        <div class="ct ct-left">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="ct ct-right">
            <span class="ct-title"><?php the_title(); ?></span>
            <?php the_excerpt(); ?>
        </div>
    </div>
    <a class="cta-benefit" href="<?php the_permalink(); ?>"><span>Voir plus</span> <span class="flaticon-arrows-8"></span></a>
</div>