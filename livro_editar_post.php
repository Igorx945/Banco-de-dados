<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: livro_lista.php");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: livro_lista.php");
    exit();
}
$livro = LivroRepos::get($_POST["id"]);
if(!$livro){
    header("location: livro_lista.php");
    exit();
}

if(!isset($_POST['titulo'])){
    header("Location: livro_novo.php?id=".$livro->getId());
    exit();
}
if($_POST["titulo"] == "" || $_POST["titulo"] == null){
    header("Location: livro_novo.php?id=".$livro->getId());
    exit();
}



$livro->setTitulo($_POST['titulo']);
$livro->setAno($_POST['ano']);
$livro->setGenero($_POST['genero']);
$livro->setIsbn($_POST['isbn']);
$livro->setAutorId($_POST['autor']);
$livro->setinclusaoFuncionarioId($user->getID());
$livro->setDataInclusao(date('Y-d-m H:i:s'));

LivroRepos::update($livro);



header("Location: livro_editar.php?id=".$livro->getId());