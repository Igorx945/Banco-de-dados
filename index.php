<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}
?> 
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <?php include("include/menu.php")?>
    <main>
        <section class="container">
            <h1>Bem vindo a Bliobliteca!</h1>
            <div id="jobs">
                <div class="block b1" onclick="link('autores.php')">
                    <p>Autor</p>
                </div>

                <div class="block b2" onclick="link('livros.php')">
                    <p>Livros</p>
                </div>

                <div class="block b3" onclick="link('clientes.php')">
                    <p>Clientes</p>
                </div>

                <div class="block b4" onclick="link('funcionarios.php')">
                    <p>Funcionarios</p>
                </div>

            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>

</html>