<?php
class User
{
    public $id_user, $username, $password, $email, $role;
    public function set_user_from_db($id_user, $username, $password, $email, $role)
    {
        $this->id_user = $id_user;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }
    public function set_user_from_form($username, $password, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
    public function get_user()
    {
        return [
            "username" => $this->username,
            "password" => $this->password,
            "email" => $this->email,
            "role" => $this->role,
            "user_id" => $this->id_user
        ];
    }
}
