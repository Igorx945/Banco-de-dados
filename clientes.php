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
  <title>Clientes Listagem</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="style/listagensIndx.css">
  <link rel="stylesheet" href="style/index.css">
</head>

<body>
  <?php include("include/menu.php") ?>
  <main>
    <div class="container">
      <div id="listagem">
        <h2>CLIENTES > LISTAGEM</h2>
        <button class="novo">Novo Cliente</button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Telefone</th>
              <th>Email</th>
              <th>CPF</th>
              <th>RG</th>
              <th>Data de Nascimento</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
              <?php
              foreach(ClienteRepository::listAll() as $cliente){
              ?>
              <tr>
                <td><?php echo $cliente->getId(); ?></td>
                <td><?php echo $cliente->getNome(); ?></td>
                <td><?php echo $cliente->getTelefone(); ?></td>
                <td><?php echo $cliente->getEmail(); ?></td>
                <td><?php echo $cliente->getCpf(); ?></td>
                <td><?php echo $cliente->getRg(); ?></td>
                <td><?php echo $cliente->getDataNascimento(); ?></td>
                <td>
                  <a href="#" id="editar">Editar</a>
                  <a href="#" id="deletar">Deletar</a>
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
</body>

</html>