<?php

require_once(ASTROLUNE__PLUGIN_DIR.'entities/entity.prestation.php');

class PrestationRepository {

    private static string $prestationTableName = "prestations";

    public static function get_all() {

        global $wpdb;
        $tableName = $wpdb->prefix . self::$prestationTableName;
        $result = $wpdb->get_results("SELECT * FROM $tableName");

        $prestations = [];

        foreach($result as $row)
        {
            $prestation = new PrestationEntity();
            $prestation->Id = $row->id;
            $prestation->Title = $row->title;
            $prestation->Description = $row->description;
            $prestation->Price = $row->price;
            $prestation->Pusblished = $row->published;
            $prestation->CreatedDate = $row->created_date;
            $prestation->UpdatedDate = $row->updated_date;

            array_push($prestations, $prestation);
        }

        return $prestations;
    }

    public static function insert(PrestationEntity $prestation) {

        global $wpdb;
        $tableName = $wpdb->prefix . self::$prestationTableName;

        $wpdb->insert($tableName, array(
            'title' => $prestation->Title,
            'description' => $prestation->Description,
            'price' => $prestation->Price,
            'published' => $prestation->Pusblished,
            'created_date' => $prestation->CreatedDate,
            'updated_date' => $prestation->UpdatedDate
        ));
    }
}

?>