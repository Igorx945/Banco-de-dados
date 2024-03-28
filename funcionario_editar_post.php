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
$funcionario = FuncionarioRepos::get($_POST["id"]);
if(!$funcionario){
    header("location: funcionario_lista.php");
    exit();
}

if(!isset($_POST['nome'])){
    header("Location: funcionario_novo.php?id=".$funcionario->getId());
    exit();
}
if($_POST["nome"] == "" || $_POST["nome"] == null){
    header("Location: funcionario_novo.php?id=".$funcionario->getId());
    exit();
}



$funcionario->setNome($_POST['nome']);
$funcionario->setCpf($_POST['cpf']);
$funcionario->setTelefone($_POST['telefone']);
$funcionario->setSenha($_POST['senha']);
$funcionario->setEmail($_POST['email']);
$funcionario->setAlteracaoFuncionarioId($user->getId());
$funcionario->setDataAlteracao(date('Y-d-m H:i:s'));

FuncionarioRepos::update($funcionario);



header("Location: funcionario_editar.php?id=".$funcio->getId());