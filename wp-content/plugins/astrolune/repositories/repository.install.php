<?php

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

class InstallRepository {

    private static string $prestationTableName = "prestations";

    public static function prestation_exist() {

        global $wpdb;
        $table_name = $wpdb->prefix . self::$prestationTableName;
        $result = $wpdb->get_results("SELECT * FROM information_schema.tables WHERE table_schema = '". DB_NAME ."' AND table_name = '$table_name' LIMIT 1;");

        return (count($result) > 0);
    }

    public static function create_prestation_table() {

        global $wpdb;

        $table_name = $wpdb->prefix . self::$prestationTableName;
        $charset_collate = $wpdb->get_charset_collate();

        $script = "CREATE TABLE $table_name (
                    id int(11) NOT NULL AUTO_INCREMENT,
                    title varchar(200) NOT NULL,
                    description longtext NULL,
                    price decimal(10,2) NOT NULL,
                    published tinyint(1),
                    created_date datetime NOT NULL,
                    updated_date datetime NOT NULL,
                    PRIMARY KEY  (id)
                   ) $charset_collate;";

        dbDelta( $script );
    }
}

?>