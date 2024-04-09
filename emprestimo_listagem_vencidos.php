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
  <title>EMPRESTIMO VENCIDOS</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="listagensIndx.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>
  <?php include("include/menu.php") ?>
  <main>
    <div class="container">
        <h2>Emprestimo > vencidos</h2>
        <a href="emprestimo_listagem.php" class="btn btn-warning">VOLTAR</a>
      <div class="table-responsive">
        <table class="table">
        <div class="button-container">
        <a href="emprestimo_listagem.php" type="button" class="btn btn-primary">Todos</a>
        <a href="emprestimo_listagem_ativos.php" type="button" class="btn btn-primary">Ativos</a>
        <a href="emprestimo_devolver.php" type="button" class="btn btn-primary">Devolvidos</a>
        <a href="emprestimo_listagem_vencidos.php" type="button" class="btn btn-primary">Vencidos</a>
        <a href="emprestimo_renovado.php" type="button" class="btn btn-primary">Renovados</a>
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
              foreach(EmprestimoRepos::listVencido() as $emprestimo){
              ?>
              <tr>
                <td><?php echo $emprestimo->getId(); ?></td>
                <td><?php 
                        $livro = LivroRepos::get($emprestimo->getLivroId());
                        echo $emprestimo->getLivroId()." - ". $livro->getTitulo(); 
                    ?>
                </td>
                <td>
                    <?php 
                        $cliente = ClienteRepos::get($emprestimo->getClienteId());
                        echo $emprestimo->getClienteId()." - ". $cliente->getNome(); 
                    ?>
                </td>
                <td><?php echo $emprestimo->dtDataVencimento("d/m/Y"); ?></td>
                <td><?php echo $emprestimo->dtDataDevolucao("d/m/Y"); ?></td>
                

              </tr>
              <?php
                }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
 
</body>

</html>