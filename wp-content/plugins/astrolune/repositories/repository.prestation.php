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
            $prestation->Published = $row->published;
            $prestation->PageId = $row->page_id;
            $prestation->CreatedDate = new DateTime($row->created_date);
            $prestation->UpdatedDate = new DateTime($row->updated_date);

            array_push($prestations, $prestation);
        }

        return $prestations;
    }

    public static function getById($id) {

        global $wpdb;
        $tableName = $wpdb->prefix . self::$prestationTableName;
        $result = $wpdb->get_row("SELECT * FROM $tableName WHERE id = $id");

        $prestation = new PrestationEntity();
        $prestation->Id = $result->id;
        $prestation->Title = $result->title;
        $prestation->Description = $result->description;
        $prestation->Price = $result->price;
        $prestation->Published = $result->published;
        $prestation->PageId = $result->page_id;
        $prestation->CreatedDate = new DateTime($result->created_date);
        $prestation->UpdatedDate = new DateTime($result->updated_date);

        return $prestation;
    }

    public static function insert(PrestationEntity $prestation) {

        global $wpdb;
        $tableName = $wpdb->prefix . self::$prestationTableName;

        $wpdb->insert($tableName, array(
            'title' => $prestation->Title,
            'description' => $prestation->Description,
            'price' => $prestation->Price,
            'published' => $prestation->Published ? 1 : 0,
            'page_id' => $prestation->PageId,
            'created_date' => $prestation->CreatedDate->format('Y-m-d H:i:s'),
            'updated_date' => $prestation->UpdatedDate->format('Y-m-d H:i:s')
        ));
    }

    public static function update(PrestationEntity $prestation) {

        global $wpdb;
        $tableName = $wpdb->prefix . self::$prestationTableName;

        $wpdb->update($tableName, array(
            'title' => $prestation->Title,
            'description' => $prestation->Description,
            'price' => $prestation->Price,
            'published' => $prestation->Published ? 1 : 0,
            'page_id' => $prestation->PageId,
            'updated_date' => $prestation->UpdatedDate->format('Y-m-d H:i:s')
        ), array(
            "id" => $prestation->Id
        ));
    }
}

?>