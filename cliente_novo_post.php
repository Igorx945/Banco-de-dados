<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['nome'])){
    header("Location: cliente_novo.php");
    exit();
}
if($_POST["nome"] == '' || $_POST["nome"] == null){
    header("Location: cliente_novo.php");
    exit();
}
$email = $_POST["email"];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: cliente_novo.php");
    exit();
}


$cpf = $_POST["cpf"];
if ($cpf == ""){
    $cpf = null;
}
$rg = $_POST["rg"];
if ($rg == ""){
    $rg = null;
}
date_default_timezone_set('America/Sao_Paulo');

$datetime = DateTime::createFromFormat('d/m/Y', $_POST["data_nascimento"]);
$dateFormatted = $datetime->format('Y-m-d');
$cliente = Factory::cliente();

$cliente->setNome($_POST['nome']);
$cliente->setTelefone($_POST["telefone"]);
$cliente->setEmail($email);
$cliente->setCpf($cpf);
$cliente->setRg($rg);
$cliente->setDataNascimento($dateFormatted);
$cliente->setinclusaoFuncionarioId($user->getID());
$cliente->setDataInclusao(date('Y-m-d H:i:s'));

$cliente_retorno = ClienteRepos::insert($cliente);
if($cliente_retorno > 0){
    header("Location: cliente_editar.php?id=".$cliente_retorno);
    exit();
}

header("Location: cliente_novo.php");
    exit();