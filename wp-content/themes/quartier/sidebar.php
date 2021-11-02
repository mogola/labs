<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">
	<aside class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<div class="widget recent-posts wow ">
                <div class="sidebar-title">
                	<h3>Latest Posts</h3>
                </div>
				<?php 
				$args = array(
					'numberposts' => 10,
				);
					$recentpost = wp_get_recent_posts($args);
					foreach ($recentpost as $mypost){
						$idpost = $mypost['ID'];
						echo '<article class="post"><figure class="post-thumb">'.get_the_post_thumbnail($idpost, 'medium').
						'</figure><h4><a href="'.get_the_permalink($idpost).'">'.$mypost['post_title'] .'</a></h4><div class="post-info"><span class="icon flaticon-people-1"></span>'.
						 get_the_author($idpost).'</div></article>';
					}

					wp_reset_query();
				?>
			</div>
	</aside><!-- #secondary -->
</div>
