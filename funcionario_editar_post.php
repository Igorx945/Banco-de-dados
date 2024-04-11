<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: funcionarios.php");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: funcionarios.php");
    exit();
}
$funcio = FuncionarioRepos::get($_POST["id"]);
if(!$funcio){
    header("location: funcionarios.php");
    exit();
}

if(!isset($_POST['nome'])){
    header("Location: funcionario_novo.php?id=".$funcio->getId());
    exit();
}
if($_POST["nome"] == "" || $_POST["nome"] == null){
    header("Location: funcionario_novo.php?id=".$funcio->getId());
    exit();
}
date_default_timezone_set('America/Sao_Paulo');

$email = $_POST["email"];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: funcionario_novo.php");
    exit();
}


$cpf = $_POST["cpf"];
if ($cpf == ""){
    $cpf = null;
}


$funcio->setNome($_POST['nome']);
$funcio->setCpf($cpf);
$funcio->setTelefone($_POST['telefone']);
$funcio->setSenha($_POST['senha']);
$funcio->setEmail($email);
$funcio->setAlteracaoFuncionarioId($user->getId());
$funcio->setDataAlteracao(date('Y-d-m H:i:s'));

FuncionarioRepos::update($funcio);



header("Location: funcionario_editar.php?id=".$funcio->getId());