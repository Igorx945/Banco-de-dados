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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="listagensIndx.css">
  <link rel="stylesheet" href="index.css">
  
</head>

<body>
  <?php include("include/menu.php") ?>
  <main>
    <div class="container">
      <button class="novo" onclick="link('index.php')">Voltar</button>
      <div id="listagem">
        <h2>CLIENTES > LISTAGEM</h2>

        <button class="novo" onclick="link('cliente_novo.php')">Novo Cliente</button>
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
            foreach (ClienteRepos::listAll() as $cliente) {
            ?>
              <tr>
                <td><?php echo $cliente->getId(); ?></td>
                <td><?php echo $cliente->getNome(); ?></td>
                <td><?php echo $cliente->getTelefone(); ?></td>
                <td><?php echo $cliente->getEmail(); ?></td>
                <td><?php echo $cliente->getCpf(); ?></td>
                <td><?php echo $cliente->getRg(); ?></td>
                <td><?php echo $cliente->getDataNascimento("d/m/Y"); ?></td>
                <td>
                <a href="cliente_editar.php?id=<?php echo $cliente->getId();?>" type="button" class="btn btn-primary">EDITAR</a>
                    <?php if(EmprestimoRepos::countByClientes($cliente->getId())== 0){?>
                    <a href="cliente_excluir.php?id=<?php echo $cliente->getId();?>" type="button" class="btn btn-danger">DELETAR</a>
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
  <script src="index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>