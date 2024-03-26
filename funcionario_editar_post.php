<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: funcionario_lista.php?1");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: funcionario_lista.php?2");
    exit();
}
$funcio = FuncionarioRepos::get($_POST["id"]);
if(!$funcio){
    header("location: funcionario_lista.php");
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



$funcio->setNome($_POST['nome']);
$funcio->setCpf($_POST['cpf']);
$funcio->setTelefone($_POST['telefone']);
$funcio->setSenha($_POST['senha']);
$funcio->setEmail($_POST['email']);
$funcio->setAlteracaoFuncionarioId($user->getId());
$funcio->setDataAlteracao(date('Y-d-m H:i:s'));

FuncionarioRepos::update($funcio);



header("Location: funcionario_editar.php?id=".$funcio->getId());