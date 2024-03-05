<?php

include_once("db.php");
include_once("class/autor.php");
include_once("class/cliente.php");
include_once("class/emprestimo.php");
include_once("class/funcionario.php");
include_once("class/livro.php");
include_once("class/repository/repository.php");
include_once("class/repository/autor.repository.php");


class Factory{
    public static function db(){
        return db::getInstance();
    }

    public static function autor(){
        return new Autor();
    }
    public static function cliente(){
        return new Cliente();
    }
    public static function emprestimo(){
        return new Emprestimo();
    }
        public static function funcionario(){
        return new Funcionario();
    }    
    public static function livro(){
        return new Livro();
    }
}