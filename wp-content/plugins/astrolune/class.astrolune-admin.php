<?php

require_once(ASTROLUNE__PLUGIN_DIR.'entities/entity.prestation.php');
require_once(ASTROLUNE__PLUGIN_DIR.'repositories/repository.prestation.php');

class AstroLune_Admin {

    private static $initiated = false;

    public static $prestationSlug = 'astrolune-prestation';
    public static $addPrestationSlug = 'astrolune-add-prestation';

    public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}

        self::check_post_form();
	}

    public static function init_hooks() {
		// The standalone stats page was removed in 3.0 for an all-in-one config and stats page.
		// Redirect any links that might have been bookmarked or in browser history.
		// if ( isset( $_GET['page'] ) && 'akismet-stats-display' == $_GET['page'] ) {
		// 	wp_safe_redirect( esc_url_raw( self::get_page_url( 'stats' ) ), 301 );
		// 	die;
		// }

		self::$initiated = true;

        add_action( 'admin_menu', array( 'AstroLune_Admin', 'admin_menu' ), 5 );
    }

    public static function admin_menu() {
		self::load_menu();
	}

    public static function load_menu() {

        add_menu_page(
            __('Prestations', 'astrolune-prestation-plugin'), // Page title
            __('Prestations', 'astrolune-prestation-plugin'), // Menu title
            'manage_options',  // Capability
            self::$prestationSlug, // Slug
            array( 'AstroLune_Admin', 'display_list_page' ), // Callback page function
        );

        add_submenu_page(
            self::$prestationSlug, 
            __('Ajouter prestation', 'astrolune-prestation-plugin'),
            __('Ajouter', 'astrolune-prestation-plugin'),
            'manage_options',
            self::$addPrestationSlug,
            array( 'AstroLune_Admin', 'display_add_page' )
        );

		// if ( class_exists( 'Jetpack' ) ) {
		// 	$hook = add_submenu_page( 'jetpack', __( 'Akismet Anti-Spam' , 'akismet'), __( 'Akismet Anti-Spam' , 'akismet'), 'manage_options', 'akismet-key-config', array( 'Akismet_Admin', 'display_page' ) );
		// }
		// else {
		// 	$hook = add_options_page( __('Akismet Anti-Spam', 'akismet'), __('Akismet Anti-Spam', 'akismet'), 'manage_options', 'akismet-key-config', array( 'Akismet_Admin', 'display_page' ) );
		// }
		
		// if ( $hook ) {
		// 	add_action( "load-$hook", array( 'Akismet_Admin', 'admin_help' ) );
		// }
	}

    public static function display_list_page() {
        // Akismet::view( 'config', compact( 'api_key', 'akismet_user', 'stat_totals', 'notices' ) );
        
        $prestations = PrestationRepository::get_all();

        AstroLune::view('prestation-list', compact('prestations'));
    }

    public static function display_add_page() {
		AstroLune::view('prestation-edit');
	}

    public static function check_post_form() {

        if ( isset( $_POST['action'] ) && $_POST['action'] == 'createpestation' ) {
			self::addPrestation();
		}
    }

    private static function addPrestation() {

        $newPrestation = new PrestationEntity();
        $hasError = false;

        if( isset( $_POST['id_test'] ) &&  $_POST['id_test'] != '') {

            $newPrestation->IdTest = intval($_POST['id_test']);
        }
        else {
            $hasError = true;
        }

        if( !$hasError ) {

            PrestationRepository::insert($newPrestation);
        }
        else {

            $_POST['has_error'] = 'Oui';
        }
    }
}

?>