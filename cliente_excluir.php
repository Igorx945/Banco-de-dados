<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_GET['id'])){
    header("Location: cliente.php");
    exit();
}
if($_GET['id'] == '' || $_GET['id'] == null){
    header("Location: cliente.php");
    exit();
}

$cliente = ClienteRepos::get($_GET['id']);

if (!$cliente){
    header("Location: cliente.php");
    exit();
}
if(EmprestimoRepos::countByClientes($cliente->getId()) > 0)
    header("location: cliente.php");
    exit();

ClienteRepos::delete($cliente->getId());

header("location: cliente.php");

?>