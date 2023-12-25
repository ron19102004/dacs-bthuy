<?php
class ENV
{
    public static function getObjectArray($name_object)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . "/env.json";
        $data = json_decode(file_get_contents($path), true);
        return $data[$name_object];
    }
}
