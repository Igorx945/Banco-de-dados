<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_GET['id'])){
    header("Location: funcionario.php");
    exit();
}
if($_GET['id'] == '' || $_GET['id'] == null){
    header("Location: funcionario.php");
    exit();
}

$funcionario = ClienteRepos::get($_GET['id']);

if (!$funcionario){
    header("Location: funcionario.php");
    exit();
}
if(EmprestimoRepos::countByFuncionario($funcionario->getId()) > 0)
    header("location: funcionario.php");
    exit();

FuncionarioRepos::delete($funcionario->getId());

header("location: funcionario.php");

?>