<?php
require($_SERVER['DOCUMENT_ROOT'] . "/configs/database.php");
class UserService
{
    public function findUserByUsername($username)
    {
        $user = null;
        try {
            $stmt = Database::get_connection()->prepare('SELECT * FROM users WHERE username = :username');
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch()) {
                $user = new User();
                $user->set_user_from_db(
                    $row['id_user'],
                    $row['username'],
                    $row['password'],
                    $row['email'],
                    $row['role']
                );
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        } finally {
            Database::close_connection();
        }
        return $user;
    }
    public function create($username, $password, $email)
    {
        try {
            $stmt = Database::get_connection()->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
        } catch (Exception $th) {
            echo $th->getMessage();
        } finally {
            Database::close_connection();
        }
    }
}
