<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_GET['id'])){
    header("location: livros.php?1");
    exit();
}
if($_GET["id"] == "" || $_GET["id"] == NULL){
    header("location: livros.php?2");
    exit();
}
$livro = LivroRepos::get($_GET["id"]);
if(!$livro){
    header("location: livros.php?3");
    exit();
}


LivroRepos::delete($livro->getId());
header("location:livros.php");