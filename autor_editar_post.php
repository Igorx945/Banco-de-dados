<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

if (!isset($_POST['id'])) {
    header("location: autor_listagem.php");
    exit();
}
if ($_POST["id"] == "" || $_POST["id"] == null) {
    header("location: autor_listagem.php");
    exit();
}

$autor = AutorRepository::get($_POST["id"]);

if (!$autor) {
    header("location: autor_listagem.php");
    exit();
}

if (!isset($_POST['nome'])) {
    header("location: autor_editar.php?>".$autor->getId());
    exit();
}
if ($_POST["nome"] == "" || $_POST["nome"] == null) {
    header("location: autor_editar.php?>".$autor->getId());
    exit();
}

$autor->setNome($_POST['nome']);
$autor->setAlteracaoFuncionarioId($user->getID());
$autor->setDataAlteracao(date('Y-d-m H:i:s'));

AutorRepository::update($autor);

header("Location: autor_editar.php?id=".$autor->getId());
