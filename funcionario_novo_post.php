<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();
echo('5');
if(!isset($_POST['nome'])){
    echo('4');
    header("Location: funcionario_novo.php");
    exit();
}
echo('3');
if($_POST["nome" == ''] || $_POST["nome" == null]){
    echo('2');
    header("Location: funcionario_novo.php");
    exit();
}
echo('1');

$funcio = Factory::funcionario();

$funcio->setNome($_POST['nome']);
$funcio->setCpf($_POST['cpf']);
$funcio->setTelefone($_POST['telefone']);
$funcio->setEmail($_POST['email']);
$funcio->setSenha($_POST['senha']);
$funcio->setinclusaoFuncionarioId($user->getID());
$funcio->setDataInclusao(date('Y-d-m H:i:s'));

$funcio_retorno = FuncionarioRepos::insert($funcio);

if($funcio_retorno > 0){
    header("Location: funcionario_editar.php?id=".$funcio_retorno);
    exit();
}

header("Location: funcionario_novo.php");
    exit();
