<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user =  Auth::getUser();

if(!isset($_GET['id'])){
    header("Location: livro.php");
    exit();
}
if($_GET['id'] == '' || $_GET['id'] == null){
    header("Location: livro.php");
    exit();
}

$livro = LivroRepos::get($_GET['id']);

if (!$livro){
    header("Location: livro.php");
    exit();
}
if(EmprestimoRepos::countByLivro($livro->getId()) > 0)
    header("location: livro.php");
    exit();

LivroRepos::delete($livro->getId());

header("location: livro.php");

?>