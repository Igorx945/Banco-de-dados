<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php?1");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['data_vencimento'])){
    header("Location: emprestimo_novo.php?2");
    exit();
}
if($_POST["data_vencimento"] == '' || $_POST["data_vencimento"] == null){
    header("Location: emprestimo_novo.php?3");
    exit();
}

$datetime = DateTime::createFromFormat('d/m/Y', $_POST["data_vencimento"]);
$dateFormatted = $datetime->format('Y-m-d');
$emprestimo = Factory::emprestimo();

echo $dateFormatted;
$emprestimo->setClienteId($_POST['cliente_id']);
$emprestimo->setLivroId($_POST['livro_id']);
$emprestimo->setDataVencimento($dateFormatted);
$emprestimo->setInclusaoFuncionarioId($user->getId());
$emprestimo->setDataInclusao(date('Y-m-d H:i:s'));
echo $emprestimo->getDataVencimento();
$emprestimo_retorno = EmprestimoRepos::insert($emprestimo);

if($emprestimo_retorno > 0){
    header("Location: emprestimo_listagem.php");
    exit();
}

header("Location: emprestimo_novo.php");
    exit();