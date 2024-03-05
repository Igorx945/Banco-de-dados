<?php
include_once("include/factory.php");

$autor = AutorRepository::get(1);

print_r($autor);