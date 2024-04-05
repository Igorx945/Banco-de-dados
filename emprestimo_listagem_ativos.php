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
  <title>EMPRESTIMO LISTAGEM ATIVOS</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
</head>

<body>
  <?php include("include/menu.php") ?>
  <main>
    <div class="container">
      
        <h2>Emprestimo > Listagem</h2>
        <a href="emprestimo_listagem.php" class="btn btn-warning">VOLTAR</a>
      <div class="table-responsive">
        <table class="table">
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
              foreach(EmprestimoRepos::listAtivos() as $emprestimo){
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