<?php
class Brand
{
    public $id, $name;
    public function set_brand_from_db($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    public function set_brand_from_form($name)
    {
        $this->name = $name;
    }
    public function get_brand()
    {
        return [
            "id" => $this->id,
            "name" => $this->name
        ];
    }
}
