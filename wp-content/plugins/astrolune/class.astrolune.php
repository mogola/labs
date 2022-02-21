<?php

require_once(ASTROLUNE__PLUGIN_DIR.'repositories/repository.install.php');

class AstroLune {

    private static $initiated = false;

    public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

    /**
	 * Initializes WordPress hooks
	 */
	private static function init_hooks() {
		self::$initiated = true;
    }

    /**
	 * Attached to activate_{ plugin_basename( __FILES__ ) } by register_activation_hook()
	 * @static
	 */
	public static function plugin_activation() {

        if(!InstallRepository::prestation_exist()) {

            InstallRepository::create_prestation_table();
        }

		// if ( version_compare( $GLOBALS['wp_version'], AKISMET__MINIMUM_WP_VERSION, '<' ) ) {
		// 	load_plugin_textdomain( 'akismet' );
			
		// 	$message = '<strong>'.sprintf(esc_html__( 'Akismet %s requires WordPress %s or higher.' , 'akismet'), AKISMET_VERSION, AKISMET__MINIMUM_WP_VERSION ).'</strong> '.sprintf(__('Please <a href="%1$s">upgrade WordPress</a> to a current version, or <a href="%2$s">downgrade to version 2.4 of the Akismet plugin</a>.', 'akismet'), 'https://codex.wordpress.org/Upgrading_WordPress', 'https://wordpress.org/extend/plugins/akismet/download/');

		// 	Akismet::bail_on_activation( $message );
		// } elseif ( ! empty( $_SERVER['SCRIPT_NAME'] ) && false !== strpos( $_SERVER['SCRIPT_NAME'], '/wp-admin/plugins.php' ) ) {
		// 	add_option( 'Activated_Akismet', true );
		// }
	}

    /**
	 * Removes all connection options
	 * @static
	 */
	public static function plugin_deactivation( ) {
		// self::deactivate_key( self::get_api_key() );
		
		// // Remove any scheduled cron jobs.
		// $akismet_cron_events = array(
		// 	'akismet_schedule_cron_recheck',
		// 	'akismet_scheduled_delete',
		// );
		
		// foreach ( $akismet_cron_events as $akismet_cron_event ) {
		// 	$timestamp = wp_next_scheduled( $akismet_cron_event );
			
		// 	if ( $timestamp ) {
		// 		wp_unschedule_event( $timestamp, $akismet_cron_event );
		// 	}
		// }
	}

    public static function view( $name, array $args = array() ) {
		$args = apply_filters( 'astrolune_view_arguments', $args, $name );
		
		foreach ( $args AS $key => $val ) {
			$$key = $val;
		}
		
		//load_plugin_textdomain( 'akismet' );

		$file = ASTROLUNE__PLUGIN_DIR . 'views/'. $name . '.php';

		include( $file );
	}
}

?>