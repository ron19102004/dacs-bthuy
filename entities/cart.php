<?php
class Cart
{
    public $id, $id_user, $id_sp, $soluong, $gia;
    public function set_cart_from_db($id, $id_user, $id_sp, $soluong, $gia)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->id_sp = $id_sp;
        $this->soluong = $soluong;
        $this->gia = $gia;
    }
    public function set_cart_from_form($id_user, $id_sp, $soluong, $gia)
    {
        $this->id_user = $id_user;
        $this->id_sp = $id_sp;
        $this->soluong = $soluong;
        $this->gia = $gia;
    }
    public function get_cart()
    {
        return [
            "id" => $this->id,
            "soluong" => $this->soluong,
            "gia" => $this->gia,
            "id_sp" => $this->id_sp,
            "id_user" => $this->id_user
        ];
    }
}
