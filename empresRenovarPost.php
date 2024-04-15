<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}



$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: empresListAll.php");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: empresListAll.php");
    exit();
}
$empres = EmprestimoRepository::get($_POST["id"]);
if(!$empres){
    header("location: empresListAll.php");
    exit();
}
if($empres->getDataVencimento() < date('Y-m-d')){
    header("location: empresListAll.php");
    exit();
}
if(EmprestimoRepository::countByDataDevolucao($_POST["id"]) > 0){
    header("location: empresListAll.php");
    exit(); 
}
if(EmprestimoRepository::countByDataRenovacao($_POST["id"]) > 0){
    header("location: empresListAll.php");
    exit(); 
}
if(EmprestimoRepository::countByDataAlteracao($_POST["id"]) > 0){
    header("location: empresListAll.php");
    exit(); 
}
if($empres->getDataVencimento() < date('Y-m-d')){
    header("location: empresListAll.php");
    exit(); 
}
date_default_timezone_set('America/Sao_Paulo');
$datetime = DateTime::createFromFormat('d/m/Y', $_POST["dataVencimento"]);
$dateFormatted = $datetime->format('Y-m-d');

$empres->setDataVencimento($dateFormatted);
$empres->setAlteracaoFuncionarioId($user->getId());
$empres->setRenovacaoFuncionarioId($user->getId());
$empres->setDataAlteracao(date('Y-d-m H:i:s'));
$empres->setDataRenovacao(date('Y-d-m H:i:s'));

EmprestimoRepository::update($empres);

header("Location: empresListAll.php?dataV=". $empres->getDataVencimento() ."?alteFunId=". $empres->getAlteracaoFuncionarioId() ."?renovFunId=". $empres->getRenovacaoFuncionarioId() ."?dataAlter=". $empres->getDataAlteracao() ."?dataRenov=" . $empres->getDataRenovacao(). "?id=". $empres->getId());