<?php
include_once('include/factory.php');
$emprestimos = EmprestimoRepos::listAll();
if (!empty($emprestimos)) {
    $emprestimo = $emprestimos[0];
} else {
    $emprestimo = new Emprestimo();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="nov.css">
    <link rel="stylesheet" href="index.css">
    <title>NOVO EMPRESTIMO</title>
</head>
<style>
    .container {
        border: 2px solid black;
        border-radius: 20px;
        margin: 5em 10em 5em 10em;
        padding: 50px;
        text-align: center;
        align-items: center;
    }
    #titAndButton {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>

<body>
    <?php include("include/menu.php"); ?>
    <div class="container">

        <h1>NOVO EMPRESTIMO</h1>
        <a href="emprestimo_listagem.php" class="btn btn-warning">VOLTAR</a>

        <div class="row mt-4">
            <div class="col-md-12">
                <form action="emprestimo_novo_post.php" method="POST">
                    <div class="mb-3">
                        <label for="livro" class="form-label">livro</label>
                        <select name="livro_id" id="livro" class="form-select form-select-lg mb-3" aria-label="Large select example" required>
                            <?php
                            foreach (LivroRepos::listAll() as $livro) {
                                if (EmprestimoRepos::countByLivros($livro->getId()) == 0) {
                            ?>
                                    <option selected value="<?php echo $livro->getId(); ?>">
                                        <?php echo $livro->getTitulo() ?>
                                    </option>
                            <?php }
                            } ?>
                        </select>
                        <br>
                        <br>
                        <label for="cliente" class="form-label">cliente</label>
                        <select name="cliente_id" id="cliente" class="form-select form-select-lg mb-3" aria-label="Large select example" required>
                            <?php
                            foreach (ClienteRepos::listAll() as $cliente) {
                                if (EmprestimoRepos::countByClientes($cliente->getId()) == 0) {
                            ?>
                                    <option selected value="<?php echo $cliente->getId(); ?>">
                                        <?php echo $cliente->getNome() ?>
                                    </option>
                            <?php }
                            } ?>
                        </select>
                        <br>
                        <br>
                        <label for="data_vencimento" class="form-label">vencimento</label>
                        <input type="text" name="data_vencimento" id="data_vencimento" class="form-control data_vencimento" value="<?php echo $emprestimo->getDataVencimento(); ?> " required>

                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-info">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.data_vencimento').mask('00/00/0000');
        })
    </script>
</body>

</html>