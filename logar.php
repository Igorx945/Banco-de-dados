<?php
include_once('include/factory.php');

$cpf = $_POST["cpf"];
$senha = $_POST["senha"];

if($cpf == null || $senha ==null){
    header("Location: login.php");
    exit();
}
if($cpf == "" || $senha ==""){
    header("Location: login.php");
    exit();
}
$auth = Auth::login($cpf, $senha);
if(Auth::isAuthenticated()){
    header("Location: index.php");
    exit();
}

header("Location: login.php");
    exit();

