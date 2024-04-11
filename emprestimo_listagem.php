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
    </style>
</head>

<body>
    <?php include("include/menu.php"); ?>

    <div class="container">
    <a class="novo" href="index.php">Voltar</a>

        <div id="titAndButton">
            <h2>EMPRESTIMO < LISTAGEM</h2>
                    <a href="emprestimo_novo.php" class="btn btn-success">NOVO EMPRESTIMO</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
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
                            <td><?php echo $emprestimo->getDataVencimento("d/m/Y"); ?></td>

                            <td><?php echo $emprestimo->getDataDevolucao("d/m/Y"); ?></td>
                            
                            <td>
                                <?php if (EmprestimoRepos::countByDataDevolucao($emprestimo->getId()) == 0) { ?>
                                    <a href="emprestimo_devolver.php?id=<?php echo $emprestimo->getId() ?>"  class="btn btn-info">Devolver</a>
                                <?php } ?>

                                <?php if (EmprestimoRepos::countByDataRenovacao($emprestimo->getId()) == 0 && EmprestimoRepos::countByDataDevolucao($emprestimo->getId()) == 0 && $emprestimo->getDataVencimento() >= date('Y-m-d')) { ?>
                                    <a href="emprestimo_renovar.php?id=<?php echo $emprestimo->getId(); ?>" class="btn btn-info">Renovar</a>
                                <?php } ?>

                                <?php if (EmprestimoRepos::countByDataAlteracao($emprestimo->getId()) == 0 && EmprestimoRepos::countByDataDevolucao($emprestimo->getId()) == 0 && EmprestimoRepos::countByDataRenovacao($emprestimo->getId()) == 0) { ?>
                                    <a onclick="popUpExc(<?php echo $emprestimo->getId() ?>)" type="button" class="btn btn-danger">Excluir</a>
                            <?php }
                            } ?>
                            </td>


                        </tr>
                        <?php


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