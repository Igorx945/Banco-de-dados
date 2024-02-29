<?php

include_once("db.php");
include_once("clas/autor.php");
include_once("clas/cliente.php");
include_once("clas/emprestimo.php");
include_once("clas/funcionario.php");
include_once("clas/livro.php");


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