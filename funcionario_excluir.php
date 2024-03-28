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
    header("Location: funcionarios.php");
    exit();
}
if(EmprestimoRepos::countByInclusaoFuncionario($funcio->getId()) > 0){
    header("location: funciorios.php");
    exit();
}
if(EmprestimoRepos::countByAlteracaoFuncionario($funcio->getId()) > 0){
    header("location: funciorios.php");
    exit();
}
if(EmprestimoRepos::countByDevolucaoFuncionario($funcio->getId()) > 0){
    header("location: funciorios.php");
    exit();
}
if(EmprestimoRepos::countByRenovacaoFuncionario($funcio->getId()) > 0){
    header("location: funciorios.php");
    exit();
}if(ClienteRepos::countByInclusaoFuncionario($funcio->getId()) > 0){
    header("location: funciorios.php");
    exit();
}
if(ClienteRepos::countByAlteracaoFuncionario($funcio->getId()) > 0){
    header("location: funciorios.php");
    exit();
}if(AutorRepos::countByInclusaoFuncionario($funcio->getId()) > 0){
    header("location: funciorios.php");
    exit();
}
if(AutorRepos::countByAlteracaoFuncionario($funcio->getId()) > 0){
    header("location: funciorios.php");
    exit();
}if(LivroRepos::countByInclusaoFuncionario($funcio->getId()) > 0){
    header("location: funciorios.php");
    exit();
}
if(LivroRepos::countByAlteracaoFuncionario($funcio->getId()) > 0){
    header("location: funciorios.php");
    exit();
}

FuncionarioRepos::delete($funcionario->getId());

header("location: funcionario.php");

?>