<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

if ($_GET["id"] == "" || $_GET["id"] == null) {
    header("location: emprestimo_listagem.php");
    exit();
}

$emprestimo = EmprestimoRepos::get($_GET["id"]);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Funcionario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="novoAutor.css">
</head>

<body>
    <?php include("include/menu.php") ?>
    <main>
        <div class="container">
            <h2>EMPRESTIMO > Novo</h2>
            <div class="row mt-4">
                <div class="col-md-12">
                    <form action="emprestimo_nome_post.php" method="POST">
                        <div class="md-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control">
                        </div>
                        <div class="md-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control">
                        </div>
                        <div class="md-3">
                            <label for="vencimento" class="form-label">Data Vencimento</label>
                            <input type="text" name="data_vencimento" id="vencimento" class="form-control" value="<?php echo $emprestimo->getDataVencimento("d/m/Y");?>" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#data_vencimento").mask("00/00/0000");
        });
    </script>
</body>

</html>