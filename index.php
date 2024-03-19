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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/home.css">
</head>

<body>
    <?php include("include/menu.php")?>
    <main>
        <section class="container">
            <h1>Bem vindo a Bliobliteca!</h1>
            <div id="jobs">
                <div class="block b1" onclick="link('autorList.php')">
                    <p>Autor</p>
                </div>

                <div class="block b2">
                    <p>Livros</p>
                </div>

                <div class="block b3">
                    <p>Cadastrar Clientes</p>
                </div>

                <div class="block b4">
                    <p>Funcionarios</p>
                </div>

            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>