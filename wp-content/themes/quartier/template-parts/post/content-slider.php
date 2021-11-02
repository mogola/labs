<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<li id="post-<?php the_ID(); ?>" <?php post_class(); ?> 
	data-transition="fade" 
	data-slotamount="1" 
	data-masterspeed="1000" 
	data-thumb="<?php the_post_thumbnail_url() ?>"  
	data-saveperformance="off"  
	data-title="<?php the_title(); ?>">
	<img class="slider-imgs" 
		src="<?php the_post_thumbnail_url('large') ?>"  
		alt=""  
		data-bgposition="center top" 
		data-bgfit="cover" 
		data-bgrepeat="no-repeat" />
	 <div class="tp-caption tp-caption-ttl sfr sfb tp-resizeme"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="-150"
                    data-speed="1500"
                    data-start="1000"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn">
                    <h1>
                    	<span class="normal-font">
                    	<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                    </h1>
      </div>
		<div class="tp-caption tp-caption-resume sfl sfb tp-resizeme"
            data-x="center" data-hoffset="0"
            data-y="center" data-voffset="50"
            data-speed="1500"
            data-start="1500"
            data-easing="easeOutExpo"
            data-splitin="none"
            data-splitout="none"
            data-elementdelay="0.01"
            data-endelementdelay="0.3"
            data-endspeed="1200"
            data-endeasing="Power4.easeIn"><h3 class="bg-color"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "..."); ?></h3>
        </div>
         <div class="tp-caption sfl sfb tp-resizeme text-center"
        data-x="center" data-hoffset="0"
        data-y="center" data-voffset="50"
        data-speed="1500"
        data-start="2000"
        data-easing="easeOutExpo"
        data-splitin="none"
        data-splitout="none"
        data-elementdelay="0.01"
        data-endelementdelay="0.3"
        data-endspeed="1200"
        data-endeasing="Power4.easeIn"><div class="text"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, "..."); ?></div></div>
        <div class="tp-caption sfr sfb tp-resizeme tp-caption-btn"
	        data-x="center" data-hoffset="0"
	        data-y="center" data-voffset="250"
	        data-speed="1500"
	        data-start="2000"
	        data-easing="easeOutExpo"
	        data-splitin="none"
	        data-splitout="none"
	        data-elementdelay="0.01"
	        data-endelementdelay="0.3"
	        data-endspeed="1200"
	        data-endeasing="Power4.easeIn">
				<a href="<?php the_permalink(); ?>" class="theme-btn btn-style-four mr-10">Voir plus</a></div>
	<?php
		if ( is_sticky() && is_home() ) :
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>
	<header class="entry-header">
		<?php
			if ( 'post' === get_post_type() ) :
				echo '<div class="entry-meta">';
					if ( is_single() ) :
						twentyseventeen_posted_on();
					else :
						echo twentyseventeen_time_link();
						twentyseventeen_edit_link();
					endif;
				echo '</div><!-- .entry-meta -->';
			endif;

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header><!-- .entry-header -->
	<?php var_dump(the_post_thumbnail_url())?>
	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
			<!--	<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?> -->
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php twentyseventeen_entry_footer(); ?>
	<?php endif; ?>

</li><!-- #post-## -->