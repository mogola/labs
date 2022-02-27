<?php

/**
 * Plugin Name: Astro Lune
*/    

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'ASTROLUNE_VERSION', '1.0.0' );
define( 'ASTROLUNE__MINIMUM_WP_VERSION', '4.0' );
define( 'ASTROLUNE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

register_activation_hook( __FILE__, array( 'AstroLune', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'AstroLune', 'plugin_deactivation' ) );

require_once( ASTROLUNE__PLUGIN_DIR . 'class.astrolune.php' );

add_action( 'init', array( 'AstroLune', 'init' ) );

if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
	require_once( ASTROLUNE__PLUGIN_DIR . 'class.astrolune-admin.php' );
	add_action( 'init', array( 'AstroLune_Admin', 'init' ) );
}

?>