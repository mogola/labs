<?php

require_once(ASTROLUNE__PLUGIN_DIR.'entities/entity.prestation.php');
require_once(ASTROLUNE__PLUGIN_DIR.'repositories/repository.prestation.php');
require_once(ASTROLUNE__PLUGIN_DIR.'repositories/repository.post.php');

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
        add_action( 'admin_enqueue_scripts', array( 'AstroLune_Admin', 'load_resources' ) );
    }

    public static function load_resources() {
        wp_register_style( 'astrolune.css', plugin_dir_url( __FILE__ ) . '_inc/astrolune.css', array(), ASTROLUNE_VERSION );
		wp_enqueue_style( 'astrolune.css');

        // To upload Media Image
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_register_script('my-upload', plugin_dir_url( __FILE__ ).'_inc/astrolune.js', array('jquery','media-upload','thickbox'));
        wp_enqueue_script('my-upload');

        wp_enqueue_style('thickbox');
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
        $pages = PostRepository::get_all_pages();

        AstroLune::view('prestation-list', compact('prestations', 'pages'));
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

        $pages = PostRepository::get_all_pages();

		AstroLune::view('prestation-add', compact('pages'));
	}

    public static function display_edit_page() {

        $pages = PostRepository::get_all_pages();

        $editPrestation = PrestationRepository::getById($_GET['prestationid']);
        $_POST["prestation_id"] = $editPrestation->Id;
        $_POST["title"] = $editPrestation->Title;
        $_POST["imageUrl"] = $editPrestation->ImageUrl;
        $_POST["description"] = $editPrestation->Description;
        $_POST["price"] = $editPrestation->Price;
        $_POST["published"] = $editPrestation->Published;
        $_POST["pageid"] = $editPrestation->PageId;

        AstroLune::view('prestation-edit', compact('pages'));
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
        
        // Check ImageUrl
        if( isset( $_POST['imageUrl'] )) {
            $newPrestation->ImageUrl = $_POST['imageUrl'];
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

        if ( isset ($_POST['pageid']) ) {
            $newPrestation->PageId = intval($_POST['pageid']);
        }
        else {
            $newPrestation->PageId = null;
        }

        if( !$hasError ) {

            PrestationRepository::insert($newPrestation);

            $_POST['success'] = 'Oui';

            unset($_POST['title']);
            unset($_POST['imageUrl']);
            unset($_POST['description']);
            unset($_POST['price']);
            unset($_POST['published']);
            unset($_POST['pageid']);
        }
        else {

            $_POST['has_error'] = 'Oui';
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
        if( isset( $_POST['imageUrl'] )) {
            $editPrestation->ImageUrl = $_POST['imageUrl'];
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

        if ( isset ($_POST['pageid']) ) {
            $editPrestation->PageId = intval($_POST['pageid']);
        }
        else {
            $editPrestation->PageId = null;
        }

        if( !$hasError ) {

            PrestationRepository::update($editPrestation);

            $_POST['success'] = 'Oui';
        }
        else {

            $_POST['has_error'] = 'Oui';
        }
    }

    public static function page_exist($pages, $pageid) {
        
        if (is_null($pageid)) {
            return -1;
        }

        $found = -1;
        $nbElement = count($pages);
        $index = 0;

        while( $found == -1 && $index < $nbElement ) {
            $page = $pages[$index];
            if( $page->Id == $pageid ) {
                $found = $index;  
            }
            else {
                $index++;
            }
        }

        return $found;
    }
}

?>