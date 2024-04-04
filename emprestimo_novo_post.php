<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();
if(!isset($_POST["cliente_id"])){
    echo('4');
    header("Location: funcionario_novo.php");
    exit();
}
if(!isset($_POST["livro_id"])){
    echo('4');
    header("Location: funcionario_novo.php");
    exit();
}
if($_POST["cliente_id"] == '' || $_POST["cliente_id"] == null){
    echo('2');
    header("Location: emprestimo_novo.php");
    exit();
}
if($_POST["livro_id"] == '' || $_POST["livro_id"] == null){
    echo('2');
    header("Location: emprestimo_novo.php");
    exit();
}

if(
    EmprestimoRepos::countByClienteWithNoFinished($_POST['cliente_id']) > 0
    ||
    EmprestimoRepos::countByLivroWithNoFinished($_POST['livro_id']) > 0

){
    header("location: emprestimo_novo.php");
}
$emprestimo = Factory::funcionario();

$emprestimo->setClienteId($_POST['cliente_id']);
$emprestimo->setLivroId($_POST['livro_id']);
$emprestimo->setDataInclusao(date('Y-m-d H:i:s'));
$emprestimo->setinclusaoFuncionarioId($user->getID());
$emprestimo_retorno = EmprestimoRepos::insert($emprestimo);

if($emprestimo_retorno > 0){
    header("Location: emprestimo_editar.php?id=".$emprestimo_retorno);
    exit();
}

header("Location: emprestimo_novo.php");
    exit();
