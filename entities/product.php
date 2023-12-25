<?php
class Product
{
    public $id_pd, $id_branch, $name_pd, $price_pd, $mota, $img, $chitiet, $soluong;
    public function set_product_from_db($id_pd, $id_branch, $name_pd, $price_pd, $mota, $img, $chitiet, $soluong)
    {
        $this->id_pd = $id_pd;
        $this->id_branch = $id_branch;
        $this->name_pd = $name_pd;
        $this->price_pd = $price_pd;
        $this->mota = $mota;
        $this->img = $img;
        $this->chitiet = $chitiet;
        $this->soluong = $soluong;
    }
    public function set_product_from_form($id_branch, $name_pd, $price_pd, $mota, $img, $chitiet, $soluong)
    {
        $this->id_branch = $id_branch;
        $this->name_pd = $name_pd;
        $this->price_pd = $price_pd;
        $this->mota = $mota;
        $this->img = $img;
        $this->chitiet = $chitiet;
        $this->soluong = $soluong;
    }
    public function get_product()
    {
        return [
            "id_pd" => $this->id_pd,
            "id_branch" => $this->id_branch,
            "name_pd" => $this->name_pd,
            "price_pd" => $this->price_pd,
            "mota" => $this->mota,
            "img" => $this->img,
            "chitiet" => $this->chitiet,
            "soluong" => $this->soluong
        ];
    }
}
