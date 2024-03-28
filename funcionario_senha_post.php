<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: funcionario.php");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: funcionario.php");
    exit();
}
$funcionario = FuncionarioRepos::get($_POST["id"]);
if(!$funcionario){
    header("location: funcionario.php");
    exit();
}

if(!isset($_POST['senha'])){
    header("Location: funcionario_editar.php?id=".$funcionario->getId());
    exit();
}
if($_POST["senha"] == "" || $_POST["senha"] == null){
    header("Location: funcionario_editar.php?id=".$funcionario->getId());
    exit();
}

if($_POST["senha"] != $_POST["repSenha"]){
    header("Location: funcionario_editar.php?id=".$funcionario->getId());
    exit();
}


$funcionario->setSenha($_POST['senha']);
$funcionario->setAlteracaoFuncionarioId($user->getId());
$funcionario->setDataAlteracao(date('Y-d-m H:i:s'));

FuncionarioRepos::update($funcionario);



header("Location: funcionario_editar.php?id=".$funcionario->getId());