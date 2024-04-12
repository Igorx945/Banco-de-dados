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
  <title>EMPRESTIMO NAO RENOVADOS</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="listagensIndx.css">
  <link rel="stylesheet" href="index.css">


</head>

<body>
  <?php include("include/menu.php") ?>
  <main>
    <div class="container">
      <h2>Emprestimo > Não Renovados</h2>
      <a href="emprestimo_listagem.php" class="btn btn-warning">VOLTAR</a>
      <div class="table-responsive">
        <table class="table">
          <div class="button-container">
            <a href="emprestimo_listagem.php" type="button" class="btn btn-primary">Todos</a>
            <a href="emprestimo_listagem_ativos.php" type="button" class="btn btn-primary">Ativos</a>
            <a href="emprestimo_listagem_devolvidos.php" type="button" class="btn btn-primary">Devolvidos</a>
            <a href="emprestimo_listagem_vencidos.php" type="button" class="btn btn-primary">Vencidos</a>
            <a href="emprestimo_listagem_renovado.php" type="button" class="btn btn-primary">Renovados</a>
            <a href="emprestimo_listagem_naoRenovados.php" type="button" class="btn btn-primary">Não Renovados</a>
          </div>
          <thead>
            <tr>
              <th>ID</th>
              <th>Livro</th>
              <th>Cliente</th>
              <th>Vencimento</th>
              <th>Devolução</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach (EmprestimoRepos::listNotRenovac() as $empres) {
            ?>
              <tr>
                <td><?php echo $empres->getId(); ?></td>
                <td><?php
                    $livro = LivroRepos::get($empres->getLivroId());
                    echo $empres->getLivroId() . " - " . $livro->getTitulo();
                    ?>
                </td>
                <td>
                  <?php
                  $cliente = ClienteRepos::get($empres->getClienteId());
                  echo $empres->getClienteId() . " - " . $cliente->getNome();
                  ?>
                </td>
                <td><?php echo $empres->showDataVencimento("d/m/Y"); ?></td>
                <td><?php echo $empres->showDataDevolucao("d/m/Y"); ?></td>
                <td>
                  <?php if (EmprestimoRepos::countByDataRenovacao($empres->getId()) == null && EmprestimoRepos::countByDataDevolucao($empres->getId()) == null && $empres->getDataVencimento() >= date('Y-m-d')) { ?>
                    <a href="emprestimo_renovar.php?id=<?php echo $empres->getId(); ?>" class="renovar">Renovar</a>
                  <?php } ?>

                  <?php if (EmprestimoRepos::countByDataAlteracao($empres->getId()) == null && EmprestimoRepos::countByDataDevolucao($empres->getId()) == null && EmprestimoRepos::countByDataRenovacao($empres->getId()) == null) { ?>
                    <a href="emprestimo_excluir.php?id=<?php echo $empres->getId(); ?>" class="deletar">Excluir</a>
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
  </main>
  <script src="js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>