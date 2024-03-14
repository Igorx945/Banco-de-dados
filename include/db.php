<?php 

class db{
    static $instance;
    public static function getInstance(){
        if(self::$instance != null){
            return self::$instance;
        }
        self::$instance = new PDO("mysql:host=localhost;dbname=bioteca","root","");

        return self::$instance;

    }
}

$a = db::getInstance();
$b = db::getInstance();


?>