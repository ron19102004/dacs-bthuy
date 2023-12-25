<?php
session_start();
$role = $_SESSION['role'] ?? null;
class Guard{
    public static function Admin(){
        global $role;
        if ($role == null) {
            header('Location: ../views/pages/login.php');
            false;
        }
        if($role != 'admin'){
            header('Location: ../views/pages/errors/page-403.php');
            false;
        }
        return true;
    }
}