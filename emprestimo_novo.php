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
    <link rel="stylesheet" href="novo.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="listagensIndx.css">

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
    <a href="emprestimo_listagem.php" class="btn btn-warning">VOLTAR</a>
    <div class="container">

        <h1>NOVO EMPRESTIMO</h1>
        <div class="row mt-4">
            <div class="col-md-12">
                <form action="emprestimo_novo_post.php" method="POST">
                    <div class="mb-3">
                        <label for="livro" class="form-label">livro</label>
                        <select name="livro_id" id="livro" class="form-select form-select-lg mb-3" aria-label="Large select example" required>
                        <?php
                                        foreach(LivroRepos::listAll() as $livro){
                                            if(EmprestimoRepos::countByLivros($livro->getId()) == 0 || EmprestimoRepos::countByLivrosDevol($livro->getId()) > 0){
                                    ?>
                                        <option value="<?php echo $livro->getId();?>">
                                            <?php echo $livro->getTitulo(); ?>
                                        </option>
                                    <?php }} ?>
                        </select>
                        <br>
                        <br>
                        <label for="cliente" class="form-label">cliente</label>
                        <select name="cliente_id" id="cliente" class="form-select form-select-lg mb-3" aria-label="Large select example" required>
                        <?php
                                        foreach(ClienteRepos::listAll() as $cliente){
                                            if(EmprestimoRepos::countByClientes($cliente->getId()) == 0 || EmprestimoRepos::countByClientesDevol($cliente->getId()) > 0){
                                    ?>
                                        <option value="<?php echo $cliente->getId();?>">
                                            <?php echo $cliente->getNome(); ?>
                                        </option>
                                    <?php }} ?>
                        </select>
                        <br>
                        <br>
                        <label for="dataVencimento" class="form-label">Data de Vencimento</label>
                            <input type='text' name="dataVencimento" id="dataVencimento" class="form-control vencimento" required placeholder='dd/mm/aaaa' autocomplete='off' value="<?php $datetime = DateTime::createFromFormat('Y-m-d', EmprestimoRepos::autoCompleteVencimento());
                            echo $datetime->format('d/m/Y'); ?>" readonly>
                        </div>
                        <div class="md-3">
                            <button type="submit" class="novo">Salvar</button>
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