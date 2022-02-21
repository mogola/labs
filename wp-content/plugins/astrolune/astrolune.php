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

//global $wpdb;

/**class ECommerce {

    public function __construct()
    {
        register_activation_hook( __FILE__, 'ecommerce_install' );
        add_action( 'admin_menu', [ $this, 'admin_ecommerce_plugin_menu'] );
    }

    public function ecommerce_install()
    {
        global $wpdb;
        $wpdb->insert('installtrace', array(
            'idTest' => '1'
        ));
    }

    public function admin_ecommerce_plugin_menu()
    {
        add_menu_page(
            __('ECommerce Titre', 'my-awesome-plugin'), // Page title
            __('ECommerce Menu', 'my-awesome-plugin'), // Menu title
            'manage_options',  // Capability
            'ecommerce-plugin', // Slug
            [ &$this, 'load_ecommerce_plugin_page'], // Callback page function
        );
    }

    public function load_ecommerce_plugin_page() 
    { 
        global $wpdb;
        echo '<h1>' . __( 'ECommerce Plugin', 'ecommerce-plugin' ) . '</h1>'; 
        echo '<p>' . __( 'Bienvenue dans la gestion ecommerce', 'ecommerce-plugin' ) . '</p>';

        $result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}terms");

        foreach($result as $row)
        {
            //echo $key;
            echo $row->name;
        }
    }
}

new ECommerce();*/

?>