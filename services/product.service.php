<?php
require($_SERVER['DOCUMENT_ROOT'] . "/configs/database.php");
class ProductService
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
            $stmt = Database::get_connection()->prepare("SELECT product.*, brands.*
            FROM product 
            INNER JOIN brands ON product.id_brands = brands.id");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch()) {
                $product = new Product();
                $brand = new Brand();
                $img =  $this->url . $row['img'];
                $product->set_product_from_db(
                    $row['id_pd'],
                    $row['id_brands'],
                    $row['name_pd'],
                    $row['price_pd'],
                    $row['mota'],
                    $img,
                    $row['chitiet'],
                    $row['soluong'],
                );
                $brand->set_brand_from_db(
                    $row['id'],
                    $row['name'],
                );
                array_push($array, [
                    "product" => ($product),
                    "brand" => ($brand),
                ]);
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        } finally {
            Database::close_connection();
        }
        return $array;
    }
    public function findByTwoPrice($price_from, $price_to)
    {
        $array = [];
        try {
            $stmt = Database::get_connection()->prepare("SELECT * FROM product join brands on product.id_brands = brands.id WHERE price_pd BETWEEN :price_from AND :price_to");
            $stmt->bindParam(':price_from', $price_from);
            $stmt->bindParam(':price_to', $price_to);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch()) {
                $product = new Product();
                $brand = new Brand();
                $img =  $this->url . $row['img'];
                $product->set_product_from_db(
                    $row['id_pd'],
                    $row['id_brands'],
                    $row['name_pd'],
                    $row['price_pd'],
                    $row['mota'],
                    $img,
                    $row['chitiet'],
                    $row['soluong'],
                );
                $brand->set_brand_from_db(
                    $row['id_brands'],
                    $row['name'],
                );
                array_push($array, [
                    "product" => ($product),
                    "brand" => ($brand),
                ]);
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        } finally {
            Database::close_connection();
        }
        return $array;
    }
    public function findProductByIdBrand($id)
    {
        $array = [];
        try {
            $stmt = Database::get_connection()->prepare("SELECT *
            FROM product 
            INNER JOIN brands ON product.id_brands = brands.id where brands.id =:id ");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch()) {
                $product = new Product();
                $brand = new Brand();
                $img =  $this->url . $row['img'];
                $product->set_product_from_db(
                    $row['id_pd'],
                    $row['id_brands'],
                    $row['name_pd'],
                    $row['price_pd'],
                    $row['mota'],
                    $img,
                    $row['chitiet'],
                    $row['soluong'],
                );
                $brand->set_brand_from_db(
                    $row['id'],
                    $row['name'],
                );
                array_push($array, [
                    "product" => ($product),
                    "brand" => ($brand),
                ]);
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        } finally {
            Database::close_connection();
        }
        return $array;
    }
    public function findByID($id)
    {
        $product = null;
        try {
            $stmt = Database::get_connection()->prepare("SELECT * FROM product WHERE id_pd = :id_pd");
            $stmt->bindParam(':id_pd', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch()) {
                $product = new Product();
                $img =  $this->url . $row['img'];
                $product->set_product_from_db(
                    $row['id_pd'],
                    $row['id_brands'],
                    $row['name_pd'],
                    $row['price_pd'],
                    $row['mota'],
                    $img,
                    $row['chitiet'],
                    $row['soluong'],
                );
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        } finally {
            Database::close_connection();
        }
        return $product;
    }
}
