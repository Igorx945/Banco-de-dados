<?php

session_start();

include_once("db.php");
include_once('class/autor.php');
include_once('class/cliente.php');
include_once('class/emprestimo.php');
include_once('class/funcionario.php');
include_once('class/livro.php');
include_once('class/repository/repository.php');
include_once('class/repository/autor-repos.php');
include_once('class/repository/cliente-repos.php');
include_once('class/repository/emprestimo-repos.php');
include_once('class/repository/funcionario-repos.php');
include_once('class/repository/livro-repos.php');
include_once('class/auth.php');

class Factory{
    public static function db(){
        return DB::getInstance();
    }

    public static function funcionario(){
        return new Funcionario();
    }
    public static function autor(){
        return new Autor();
    }
    public static function cliente(){
        return new Cliente();
    }
    public static function emprestimo(){
        $emprestimo = new Emprestimo();

        $datetime = new DateTime(); 
        $datetime->add(new DateInterval("P7D"));
        $emprestimo->setDataVencimento($datetime->format("Y-m-d"));
        
        return $emprestimo;
    }
    public static function livro(){
        return new Livro();
    }
}
