<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

if (!isset($_GET["id"])) {
    header("location: emprestimo_listagem.php");
    exit();
}

if ($_GET["id"] == "" || $_GET["id"] == null) {
    header("location: emprestimo_listagem.php");
    exit();
}

$emprestimo = EmprestimoRepository::get($_GET["id"]);

if (!$emprestimo) {
    header("location: emprestimo_listagem.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <title>EDITAR - EMPRESTIMO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <?php include("include/menu.php"); ?>
    </header>
    <div class="container">
        <h1>Emprestimo > Editar</h1>
        <br>
        <div id="botaonovo">
            <a href="emprestimo_listagem.php" class="btn btn-info">Voltar</a>
            <a href="emprestimo_novo.php" class="btn btn-info">Novo</a>

        </div>

        <div class="row mt-4">
            <div class="col-md-10">

                <form action="emprestimo_editar_post.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label" id="nome">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $funcionario->getNome(); ?>">

                        <label for="cpf" class="form-label" id="cpf">CPF</label>
                        <input type="text" name="cpf" class="form-control" id="cpf" value="<?php echo $funcionario->getCpf(); ?>">


                        <label for="telefone" class="form-label" id="telefone">Telefone</label>
                        <input type="text" name="telefone" class="form-control" id="telefone" value="<?php echo $funcionario->getTelefone(); ?>">

                        <label for="email" class="form-label" id="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $funcionario->getEmail(); ?>">

                        <br>
                        <a href="funcionario_senha.php?id=<?php echo $funcionario->getId(); ?>" class="btn btn-light">Alterar senha</a>
                    </div>

                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?php echo $funcionario->getId(); ?>">
                        <button type="submit" class="btn btn-success">Editar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>