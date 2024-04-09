<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("location: emprestimo_listagem.php?1");
    exit();
}
if ($_GET["id"] == "" || $_GET["id"] == null) {
    header("location: emprestimo_listagem.php?2");
    exit();
}
$emprestimo = EmprestimoRepos::get($_GET["id"]);
if (!$emprestimo) {
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
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <title>DEVOLVER EMPRESTIMO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <?php include("include/menu.php"); ?>
    </header>
    <div class="container">
        <h1>Empréstimo > Devolver</h1>
        <br>
        <div id="botaonovo">
            <a href="emprestimo_listagem.php" class="btn btn-info">Voltar</a>
        </div>

        <div class="row mt-4">
            <div class="col-md-7">

                <form action="emprestimo_devolver_post.php" method="POST">
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
                        <label for="data_vencimento" class="form-label">Data de Vencimento</label>
                        <input type="text" name="data_vencimento" class="form-control" id="data_vencimento" value="<?php echo $emprestimo->getDataVencimento("d/m/Y"); ?>" readonly>

                        <br>

                        <label for="data_devolucao" class="form-label">Data de Devolução</label>
                        <input type="text" name="data_devolucao" class="form-control" id="data_devolucao" value="<?php echo date("d/m/Y"); ?>" readonly>
                        <br>

                        <label for="multa">Multa</label>
                        <input type="text" name="multa" class="form-control" id="multa" value="<?php echo 0.00; ?>" readonly>
                        <?php
                        $multa = 0;

                        if ($emprestimo->getDataVencimento() < date("Y-m-d")) {
                            $datetime_vencimento = DateTime::createFromFormat("Y-m-d H:i:s",$emprestimo->getDataVencimento() . "00:00:00");

                            $timesstamp_vencimento = $datetime_vencimento->format("U");

                            $datetime = DateTime::createFromFormat("Y-m-d H:i:s", date("Y-m-d") . "00:00:00");

                            $timestamp_hoje = $datetime->format('U');
                            $diff = $timestamp_hoje - $timesstamp_vencimento;
                            $multa = intval($diff / (60 * 60 * 24)) * 1;
                        }
                        ?>


                    </div>

                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?php echo $emprestimo->getId(); ?>">
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#data_renovacao").mask("00/00/0000")
        });
    </script>
</body>

</html>