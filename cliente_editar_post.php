<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: cliente_lista.php");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: cliente_lista.php");
    exit();
}
$cliente = ClienteRepos::get($_POST["id"]);
if(!$cliente){
    header("location: cliente_lista.php");
    exit();
}

if(!isset($_POST['nome'])){
    header("Location: cliente_novo.php?id=".$cliente->getId());
    exit();
}
if($_POST["nome"] == "" || $_POST["nome"] == null){
    header("Location: cliente_novo.php?id=".$cliente->getId());
    exit();
}



$cliente->setNome($_POST['nome']);
$cliente->setTelefone($_POST['telefone']);
$cliente->setEmail($_POST['email']);
$cliente->setCpf($_POST['cpf']);
$cliente->setRg($_POST['rg']);
$cliente->setDataNascimento($_POST['dataNascimento']);
$cliente->setAlteracaoFuncionarioId($user->getID());
$cliente->setDataAlteracao(date('Y-d-m H:i:s'));

ClienteRepos::update($cliente);



header("Location: cliente_editar.php?id=".$cliente->getId());