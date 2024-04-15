<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}



$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: empresListAll.php?1");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: empresListAll.php?2");
    exit();
}
$empres = EmprestimoRepository::get($_POST["id"]);
if(!$empres){
    header("location: empresListAll.php?3");
    exit();
}

if(EmprestimoRepository::countByDataDevolucao($_POST["id"]) > 0){
    header("location: empresListAll.php?4");
    exit(); 
}
if(EmprestimoRepository::countByDataDevolucao($_POST["id"]) > 0){
    header("location: empresListAll.php?5");
    exit(); 
}


date_default_timezone_set('America/Sao_Paulo');

$empres->setAlteracaoFuncionarioId($user->getId());
$empres->setDevolucaoFuncionarioId($user->getId());
$empres->setDataAlteracao(date('Y-d-m H:i:s'));
$empres->setDataDevolucao(date('Y-d-m H:i:s'));

EmprestimoRepository::update($empres);

header("Location: empresListAll.php?alteFunId=". $empres->getAlteracaoFuncionarioId() ."?renovFunId=". $empres->getDevolucaoFuncionarioId() ."?dataAlter=". $empres->getDataAlteracao() ."?dataRenov=" . $empres->getDataRenovacao(). "?id=". $empres->getId());