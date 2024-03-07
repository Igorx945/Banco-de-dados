<?php
include_once("include/factory.php");

$autor = Factory::autor();
$autor ->setNome('igor');
$autor ->setData_inclusao(date(10-01-25));
$autor ->setInclusao_funcionario(1);

AutorRepository::insert( $autor );
$autor_up =  AutorRepository::get(1);

