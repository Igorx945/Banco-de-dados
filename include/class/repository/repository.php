<?php
 
interface Repository{
    public static function listAll();
    public static function get($id);
    public static function insert ($obj);
    public static function update ($obj);
    public static function delete ($id);
}   


?>