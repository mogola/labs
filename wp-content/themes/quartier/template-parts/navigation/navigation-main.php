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
		// var_dump($deleteClass, $classes);
		for ($j=1; $j<$deleteClass; $j++) {
			// var_dump(is_null($classes[0]));
			if(is_null($classes[$j]) != 0) {
				if($classes[$j] != 'current-menu-item'){
					$classes[$j] = '';
				}else{
					$classes[$j] = 'current dropdown';
				}
			}
		}
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'custom_item', 10, 3 ); 
?>
	<?php 
	
	$whiteItem;

	if(option_get_config_value('boolean_rd') === 'true') {
		$whiteItem = 'navigation whiteFixed';
	} else {
		$whiteItem = 'navigation';
	}

	wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'quartier',
		'menu_class'	=> $whiteItem,
		'container'		=> 'ul'
	) ); ?>
<!-- #site-navigation -->
