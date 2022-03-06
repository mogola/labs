<?php

require_once(ASTROLUNE__PLUGIN_DIR.'entities/entity.post.php');

class PostRepository {

    private static string $postTableName = "posts";

    public static function get_all_pages() {

        global $wpdb;
        $tableName = $wpdb->prefix . self::$postTableName;
        $result = $wpdb->get_results("SELECT * FROM $tableName WHERE post_type = 'page'");

        $posts = [];

        foreach($result as $row)
        {
            $post = new PostEntity();
            $post->Id = $row->ID;
            $post->PostTitle = $row->post_title;

            array_push($posts, $post);
        }

        return $posts;
    }
}

?>