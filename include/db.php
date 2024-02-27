<?php 

class db{
    function getIntance(){
        return new PDO("mysql:host=localhost:dbname=bioteca","root","");

    }
}

db::getInstance();

?>