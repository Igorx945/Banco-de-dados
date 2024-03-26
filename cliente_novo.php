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
    <title>Novo Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="novo.css">
</head>

<body>
    <?php include("include/menu.php") ?>
    <main>
        <div class="container">
            <h2>CLIENTE > Novo</h2>
            <div class="row mt-4">
                <div class="col-md-12">
                    <form action="cliente_novo_post.php" method="POST">
                        <div class="md-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" required>
                        </div>
                        <div class="md-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control" required>
                        </div>
                        <div class="md-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="md-3">
                            <label for="cpf" class="form-label">Cpf</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" required>
                        </div>
                        <div class="md-3">
                            <label for="rg" class="form-label">Rg</label>
                            <input type="text" name="rg" id="rg" class="form-control" required>
                        </div>
                        <div class="md-3">
                            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" name="dataNascimento" id="dataNascimento" class="form-control" required>
                        </div>
                        <div class="md-3">
                            <button type="submit" class="enviar">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>