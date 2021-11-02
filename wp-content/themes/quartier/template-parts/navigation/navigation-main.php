<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<?php 
	function custom_item( $classes, $item, $args ) {
    // Only affect the menu placed in the 'secondary' wp_nav_bar() theme location
    if ( 'top' === $args->theme_location ) {
        // Make these items 3-columns wide in Bootstrap
		$deleteClass = count($classes);
		for ($j=0; $j<$deleteClass; $j++) {
			if($classes[$j] != 'current-menu-item'){
		    	$classes[$j] = '';
		    }else{
		    	 $classes[] = 'current dropdown';
		    }
		}
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'custom_item', 10, 3 ); 
?>
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'quartier',
		'menu_class'	=> 'navigation',
		'container'		=> 'ul'
	) ); ?>
<!-- #site-navigation -->
