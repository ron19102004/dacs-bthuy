<?php
require($_SERVER['DOCUMENT_ROOT'] . "/helpers/env.php");
class Database
{
    private static $conn;
    public static function get_connection()
    {
        $data = ENV::getObjectArray('database');
        Database::$conn = new PDO("mysql:host=$data[host]; dbname=$data[dbname]; charset=utf8", $data['username'], $data['password']);
        return Database::$conn;
    }
    public static function close_connection()
    {
        if (Database::$conn) Database::$conn = null;
    }
}
