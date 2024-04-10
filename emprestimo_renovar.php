<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("Location: login.php?");
    exit();
}
if(!isset($_GET['id'])){
    header("location: emprestimo_listagem.php?1");
    exit();
}
if($_GET["id"] == "" || $_GET["id"] == null){
    header("location: emprestimo_listagem.php?2");
    exit();
}
$emprestimo = EmprestimoRepos::get($_GET["id"]);
if(!$emprestimo){
    header("location: emprestimo_listagem.php?3");
    exit();
}


$emprestimo_novo = Factory::emprestimo();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPRESTIMO RENOVAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="listagensIndx.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="novo.css">

    <style>
    .container{
        justify-content: center;
        margin: 10px 30px 10px 70px;
    }
    </style>
</head>

<body>
    <?php include("include/menu.php") ?>
    <a class="novo" href="emprestimo_listagem.php">Voltar</a>
    <main>
        <div class="container">
            <h2>EMPRESTIMO > RENOVAR</h2>
            <div class="row mt-4">
                <div class="row mt-4">
                    <div class="col-md-4">

                        <form action="emprestimo_renovar_post.php" method="POST">
                            <div class="mb-3">

                                <label for="livro_id" class="form-label">Livro:</label>
                                <br>
                                <input type="text" name="livro_id" class="form-control" id="livro_id" value="<?php $livro = LivroRepos::get($emprestimo->getLivroId());
                                                                                                                echo $emprestimo->getLivroId() . " - " . $livro->getTitulo(); ?>" disabled>

                                <br>
                                <label for="cliente" class="form-label">Cliente:</label>
                                <br>
                                <input type="text" name="cliente_id" class="form-control" id="cliente_id" value="<?php $cliente = ClienteRepos::get($emprestimo->getClienteId());
                                                                                                                    echo $emprestimo->getClienteId() . " - " . $cliente->getNome(); ?>" disabled>
                                <br>
                                <label for="nome" class="form-label">Data de Vencimento</label>
                                <input type="text" name="data_vencimento" class="form-control" id="data_vencimento" value="<?php echo $emprestimo_novo->getDataVencimento("d/m/Y"); ?>" readonly>


                            </div>

                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?php echo $emprestimo->getId(); ?>">
                                <button type="submit" class="btn btn-success">Renovar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#data_renovacao").mask("00/00/0000");
        });
    </script>
</body>

</html>