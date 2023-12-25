<?php
class CartService
{
    public function count_cart_by_id_user($id_user)
    {
        $count = 0;
        try {
            $stmt = Database::get_connection()->prepare("SELECT COUNT(*) AS total_items FROM cart WHERE ID_user = :id_user");
            $stmt->bindParam(':id_user', $id_user);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch()) {
                $count = $row['total_items'];
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        } finally {
            Database::close_connection();
        }
        return $count;
    }
    public function findByIdUserAndIdProduct($id_user, $id_product)
    {
        $cart = null;
        try {
            $stmt = Database::get_connection()->prepare("SELECT * FROM `cart` WHERE ID_user=:ID_user and ID_sp =:ID_sp ");
            $stmt->bindParam(':ID_user', $id_user);
            $stmt->bindParam(':ID_sp', $id_product);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch()) {
                $cart = new Cart();
                $cart->set_cart_from_db(
                    $row['ID'],
                    $row['ID_user'],
                    $row['ID_sp'],
                    $row['soluong'],
                    $row['gia']
                );
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        } finally {
            Database::close_connection();
        }
        return $cart;
    }
    public function updateSoluongAndGia($id_cart, $soluong, $gia)
    {
        try {
            $stmt = Database::get_connection()->prepare("UPDATE `cart` SET soluong =:soluong , gia = :gia WHERE ID = :id_cart ");
            $stmt->bindParam(':id_cart', $id_cart);
            $stmt->bindParam(':soluong', $soluong);
            $stmt->bindParam(':gia', $gia);
            $stmt->execute();
        } catch (Exception $th) {
            echo $th->getMessage();
        } finally {
            Database::close_connection();
        }
    }
    public function save($ID_user,$ID_sp,$soluong,$gia){
        try {
            $stmt = Database::get_connection()->prepare("INSERT INTO `cart` (`ID`, `ID_user`, `ID_sp`, `soluong`, `gia`) VALUES (NULL, :ID_user, :ID_sp, :soluong, :gia);");
            $stmt->bindParam(':ID_user', $ID_user);
            $stmt->bindParam(':ID_sp', $ID_sp);
            $stmt->bindParam(':soluong', $soluong);
            $stmt->bindParam(':gia', $gia);
            $stmt->execute();
        } catch (Exception $th) {
            echo $th->getMessage();
        } finally {
            Database::close_connection();
        }
    }
}
