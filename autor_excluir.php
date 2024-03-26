<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id'])){
    header("Location: autor_lista.php");
    exit();
}
if($_GET['id'] == '' || $_GET['id'] == null){
    header("Location: autor_lista.php");
    exit();
}

$autor = AutorRepos::get($_GET['id']);

if (!$autor){
    header("Location: autor_lista.php");
    exit();
}
if(LivroRepos::countByAutor($autor->getId()) > 0)
    header("location: autor_lista.php");
    exit();

AutorRepos::delete($autor->getId());

header("location: autor_lista.php");

?>