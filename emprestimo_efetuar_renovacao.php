<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: emprestimo_listagem.php?1");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: emprestimo_listagem.php?2");
    exit();
}

$emprestimo = EmprestimoRepos::get($_POST["id"]);
if(!$emprestimo){
    header("location: emprestimo_listagem.php?3");
    exit();
}

if (!(
    $emprestimo->getDataRenovacao() == null &&
    $emprestimo->getDataRenovacao() == null &&
    $emprestimo->getDataAlteracao() == null
    )){
        header("location: emprestimo_listagem.php?4");
        exit();
    }

    if($emprestimo->getDataVencimento() < date("Y-m-d")){
        header("location: emprestimo_listagem.php");
        exit();
    }
$datetime = DateTime::createFromFormat('d/m/Y', $_POST["data_vencimento"]);
$dateFormatted = $datetime->format('Y-m-d');

$novo_emprestimo = Factory::emprestimo();

$emprestimo->setDataRenovacao(date('Y-m-d'));
$emprestimo->setDataAlteracao(date('Y-m-d'));
$emprestimo->setAlteracaoFuncionarioId($user->getId());
$emprestimo->setRenovacaoFuncionarioId($user->getId());
$emprestimo->setDataVencimento($dateFormatted);


EmprestimoRepos::update($emprestimo);

header("Location: emprestimo_listagem.php?5");


?>