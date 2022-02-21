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
            array( 'AstroLune_Admin', 'display_add_or_edit_page' )
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

    public static function display_add_or_edit_page() {

        if(isset($_GET["prestationid"]) && $_GET["prestationid"] != '') {
            self::display_edit_page();
        }
        else {
            self::display_add_page();
        }
    }

    public static function display_add_page() {
		AstroLune::view('prestation-add');
	}

    public static function display_edit_page() {

        $editPrestation = PrestationRepository::getById($_GET['prestationid']);
        $_POST["prestation_id"] = $editPrestation->Id;
        $_POST["title"] = $editPrestation->Title;
        $_POST["description"] = $editPrestation->Description;
        $_POST["price"] = $editPrestation->Price;
        $_POST["published"] = $editPrestation->Published;

        AstroLune::view('prestation-edit');
    }

    public static function check_post_form() {

        if ( isset( $_POST['action'] ) && $_POST['action'] == 'createpestation' ) {
			self::addPrestation();
		}
        else if( isset( $_POST['action'] ) && $_POST['action'] == 'updatepestation' ) {
            self::updatePrestation();
        }
    }

    private static function addPrestation() {

        $newPrestation = new PrestationEntity();
        $newPrestation->CreatedDate = new DateTime("now");
        $newPrestation->UpdatedDate = new DateTime("now");
        $hasError = false;

        // Check title
        if( isset( $_POST['title'] ) &&  $_POST['title'] != '') {

            $newPrestation->Title = $_POST['title'];
        }
        else {
            $_POST['title_error'] = "Le titre est obligatoire.";
            $hasError = true;
        }

        // Check Description
        if( isset( $_POST['description'] )) {
            $newPrestation->Description = $_POST['description'];
        }

        // Check title
        if( isset( $_POST['price'] ) && $_POST['price'] != '' && is_numeric($_POST['price'])) {

            $newPrestation->Price = floatval($_POST['price']);
        }
        else {
            $_POST['price_error'] = "Le prix est obligatoire.";
            $hasError = true;
        }

        // Check Description
        if( isset( $_POST['published'] )) {
            $newPrestation->Published = true;
        }
        else {
            $newPrestation->Published = false;
        }

        if( !$hasError ) {

            PrestationRepository::insert($newPrestation);
        }
        else {

            $_POST['has_error'] = 'Oui';

            print_r($_POST);
        }
    }

    private static function updatePrestation() {

        $editPrestation = PrestationRepository::getById($_POST['prestation_id']);
        $editPrestation->UpdatedDate = new DateTime("now");
        $hasError = false;

        // Check title
        if( isset( $_POST['title'] ) &&  $_POST['title'] != '') {

            $editPrestation->Title = $_POST['title'];
        }
        else {
            $_POST['title_error'] = "Le titre est obligatoire.";
            $hasError = true;
        }

        // Check Description
        if( isset( $_POST['description'] )) {
            $editPrestation->Description = $_POST['description'];
        }

        // Check title
        if( isset( $_POST['price'] ) && $_POST['price'] != '' && is_numeric($_POST['price'])) {

            $editPrestation->Price = floatval($_POST['price']);
        }
        else {
            $_POST['price_error'] = "Le prix est obligatoire.";
            $hasError = true;
        }

        // Check Description
        if( isset( $_POST['published'] )) {
            $editPrestation->Published = true;
        }
        else {
            $editPrestation->Published = false;
        }

        if( !$hasError ) {

            PrestationRepository::update($editPrestation);
        }
        else {

            $_POST['has_error'] = 'Oui';

            print_r($_POST);
        }
    }
}

?>