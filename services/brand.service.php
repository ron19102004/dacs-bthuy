<?php
require($_SERVER['DOCUMENT_ROOT'] . "/configs/database.php");
class BrandService
{
    private $url = 'http://localhost:3000';
    public function __construct()
    {
        $this->url = ENV::getObjectArray('url');
    }
    public function find()
    {
        $array = [];
        try {
            $stmt = Database::get_connection()->prepare("SELECT *
            FROM brands");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch()) {
                $brand = new Brand();
                $brand->set_brand_from_db(
                    $row['id'],
                    $row['name'],
                );
                array_push($array,$brand);
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        } finally {
            Database::close_connection();
        }
        return $array;
    }
}
