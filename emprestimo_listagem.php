<?php
include_once("include/factory.php");
if (!Auth::isAuthenticated()) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPRESTIMO LISTAGEM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="listagensIndx.css">
    <link rel="stylesheet" href="index.css">
    <style>
        #titAndButton {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;

        }
        .button-container button {
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <?php include("include/menu.php"); ?>

    <div class="container">
        <div id="titAndButton">
            <h2>EMPRESTIMO < LISTAGEM</h2>
                    <a href="emprestimo_novo.php" class="btn btn-success">NOVO EMPRESTIMO</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <div class="button-container">
        <a href="emprestimo_listagem.php" type="button" class="btn btn-primary">Todos</a>
        <a href="emprestimo_listagem_ativos.php" type="button" class="btn btn-primary">Ativos</a>
        <a href="emprestimo_devolvidos.php" type="button" class="btn btn-primary">Devolvidos</a>
        <a href="emprestimo_listagem_vencidos.php" type="button" class="btn btn-primary">Vencidos</a>
        <a href="emprestimo_renovado.php" type="button" class="btn btn-primary">Renovados</a>
        <a href="emprestimo_listagem_naoRenovados.php" type="button" class="btn btn-primary">Não Renovados</a>
    </div>
                    <tr>
                        <th>ID</th>
                        <th>Livro</th>
                        <th>Cliente</th>
                        <th>Vencimento</th>
                        <th>Devolução</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (EmprestimoRepos::listAll() as $emprestimo) {
                    ?>
                        <tr>
                            <td><?php echo $emprestimo->getId(); ?></td>
                            <td><?php
                                $livro = LivroRepos::get($emprestimo->getLivroId());
                                echo $emprestimo->getLivroId() . " - " . $livro->getTitulo();
                                ?>
                            </td>
                            <td>
                                <?php
                                $cliente = ClienteRepos::get($emprestimo->getClienteId());
                                echo $emprestimo->getClienteId() . " - " . $cliente->getNome();
                                ?>
                            </td>
                            <td><?php echo $emprestimo->dtDataVencimento("d/m/Y"); ?></td>
                            <td><?php echo $emprestimo->dtDataDevolucao("d/m/Y"); ?></td>
                            <td>
                                <?php
                                if (
                                    $emprestimo->getDataRenovacao("Y-m-d") >= date("Y-m-d") == null &&
                                    $emprestimo->getDataDevolucao() == null &&
                                    $emprestimo->getDataAlteracao() == null
                                ) { ?>
                                    <a href="emprestimo_excluir.php?id=<?php echo $emprestimo->getId(); ?>" class="btn btn-danger">Excluir</a>
                                <?php } ?>
                                <?php if (EmprestimoRepos::countByDataAlteracao($emprestimo->getId()) == null && EmprestimoRepos::countByDataDevolucao($emprestimo->getId()) == null && EmprestimoRepos::countByDataRenovacao($emprestimo->getId()) == null) { ?>
                                    <a class="btn btn-warning" href="emprestimo_renovar.php?id=<?php echo $emprestimo->getId(); ?>" id="deletar">Renovar</a>
                                <?php } ?>

                                <?php if (EmprestimoRepos::countByDataAlteracao($emprestimo->getId()) == null && EmprestimoRepos::countByDataDevolucao($emprestimo->getId()) == null && EmprestimoRepos::countByDataRenovacao($emprestimo->getId()) == null) { ?>
                                    <a href="emprestimo_excluir.php?id=<?php echo $emprestimo->getId(); ?>" type="button" class="btn btn-danger" href="emprestimo_excluir.php?id=<?php echo ($emprestimo->getDataVencimento() == null); ?>" class="data_vencimento">DELETAR</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
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